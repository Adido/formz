<?php
/**
 * Formz
 *
 * Copyright 2012 by Andrew Smith <a.smith@silentworks.co.uk>
 *
 * The base class for formz.
 *
 * @package formz
 */
class formzHooks {
    /** @var \modX $modx */
    public $modx;

    public function __construct(Formz &$fmz, $hook) {
        $this->fmz =& $fmz;
        $this->modx = $fmz->modx;
        $this->hook = $hook;

        $this->config = new stdClass();
        $this->config->formid = $this->modx->getOption('formid', $this->hook->formit->config, '');
        $this->config->excludedFields = $this->modx->getOption('excludeFields', $this->hook->formit->config, '');
        $this->config->processorPath = $this->fmz->config['processorsPath'];

        // Retrieve form
        $formIdentifier = 'form' . $this->config->formid . '-' . session_id();
        $this->formArray = $_SESSION[$formIdentifier];
        unset($_SESSION[$formIdentifier]);

        $this->config->emailFrom = $this->modx->getOption('emailFrom', $this->hook->formit->config, $this->modx->getOption('emailsender'), true);
        $this->config->emailTo = $this->modx->getOption('emailTo', $this->hook->formit->config, '');
        $this->config->emailTpl = $this->modx->getOption('emailTpl', $this->hook->formit->config, 'emailTpl');
        $this->config->senderName = $this->modx->getOption('senderName', $this->hook->formit->config, $this->formArray['formName'], true);
        $this->config->subject = $this->modx->getOption('subject', $this->hook->formit->config, 'Website Contact Form on ' . date('Y-m-d'));

        $this->config->data = $this->hook->getValues();
    }

    public function dbSave()
    {
        if (!$this->hook->hasErrors()) {
            // exclude fields from database save
            $this->excludeFields();

            $formDataResponse = $this->modx->runProcessor('mgr/formz/form/data/create', array(
                'form_id' => $this->config->formid
            ), array(
                'processors_path' => $this->config->processorPath
            ));

            if ($formDataResponse->isError()) {
                $this->modx->log(modX::LOG_LEVEL_ERROR, 'An error occurred while trying to save the Form: ' . $formDataResponse->getMessage());
            }
            $formData = $formDataResponse->getObject();

            // Save Fields
            foreach ($this->config->data as $field => $value) {
                if (is_array($value)) {
                    switch ($this->formArray[$field]['type']) {
                        case 'select':
                        case 'radio':
                            $value = implode('', $value);
                        break;
                    }
                }

                $formDataFieldResponse = $this->modx->runProcessor('mgr/formz/field/data/create', array(
                    'data_id' => $formData['id'],
                    'label' => $this->formArray[$field]['label'],
                    'value' => serialize($value),
                ), array(
                    'processors_path' => $this->config->processorPath
                ));

                if ($formDataFieldResponse->isError()) {
                    $this->modx->log(modX::LOG_LEVEL_ERROR, 'An error occurred while trying to save the Form: ' . $formDataFieldResponse->getMessage());
                }
            }
        }
        return true;
    }

    public function dbSaveAndEmail()
    {
        $this->dbSave();

        if (!$this->hook->hasErrors()) {
            // exclude fields from email send
            $this->excludeFields();

            $newData = array('formName' => $this->config->senderName);

            // Save Fields
            foreach ($this->config->data as $field => $value) {
                if (is_array($value)) {
                    switch ($this->formArray[$field]['type']) {
                        case 'select':
                        case 'checkbox':
                        case 'radio':
                            $value = implode(', ', $value);
                        break;
                    }
                }

                $newData['message'] .= $this->formArray[$field]['label'] . ' ' . $value . '<br>';
                $newData[$this->formArray[$field]['id']] = $value;
            }
            
            $emailToAddresses = explode(',', $this->config->emailTo);
            $message = $this->fmz->getChunk($this->config->emailTpl, $newData);

            $this->modx->getService('mail', 'mail.modPHPMailer');
            $this->modx->mail->set(modMail::MAIL_BODY, $message);
            $this->modx->mail->set(modMail::MAIL_FROM, $this->config->emailFrom);
            $this->modx->mail->set(modMail::MAIL_FROM_NAME, $this->config->senderName);
            $this->modx->mail->set(modMail::MAIL_SUBJECT, $this->config->subject);
            foreach($emailToAddresses as $address) {
              $this->modx->mail->address('to', trim($address));
            }
            $this->modx->mail->address('reply-to', $this->config->emailFrom);
            $this->modx->mail->setHTML(true);
            if (!$this->modx->mail->send()) {
                $this->modx->log(modX::LOG_LEVEL_ERROR, 'An error occurred while trying to email the Admin: ' . $this->modx->mail->mailer->ErrorInfo);
            }
            $this->modx->mail->reset();
        }

        return true;
    }

    private function excludeFields()
    {
        if (!empty($this->config->excludedFields)) {
            $fieldsArr = explode(',', $this->config->excludedFields);
            foreach ($fieldsArr as $field) {
                unset($this->config->data[strtolower($field)]);
            }
        }
        return $this->config->data;
    }
}
