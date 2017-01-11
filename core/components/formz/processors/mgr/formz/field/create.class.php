<?php
class FormzFieldCreateProcessor extends modObjectCreateProcessor {
    /* Class in model directory */
    public $classKey = 'fmzFormsFields';

    /* Language package to load */
    public $languageTopics = array('formz:default');

    /* Used to load the correct language error message */
    public $objectType = 'formz.field';
    
    public $beforeSaveEvent = 'OnFormzFormsFieldsBeforeSave';

    /* Set the default validation type to false for no validation on field type */
    private $validationType = false;

    public function beforeSave() {
    	$formId = $this->getProperty('form_id');
        $label = $this->getProperty('label');
        $helpText = $this->getProperty('help_text');
        $type = $this->getProperty('type');
        $default = $this->getProperty('default');

    	if (empty($label)) {
    		$this->addFieldError('label', $this->modx->lexicon('formz.field_err_ns'));
    	} else if ($this->doesAlreadyExist(array('label' => $label, 'form_id' => $formId))) {
    		$this->addFieldError('label', $this->modx->lexicon('formz.field_err_ae'));
    	}

        switch ($type) {
            case 'select':
            case 'checkbox':
            case 'radio':
                $values = $this->getProperty('values');
                $this->validationType = false;
                break;
            default:
                // textbox
                $values = '';
                $this->validationType = true;
        }

        $settings = array(
            'label' => $label
        );

        if (!empty($helpText))
            $settings['help_text'] = $helpText;

        if (!empty($default))
            $settings['default'] = $default;

        if (!empty($values))
            $settings['values'] = $values;

        $this->object->set('settings', $this->modx->toJSON($settings));

        return parent::beforeSave();
    }

    public function afterSave() {
        $this->saveRequired();
        if ($this->validationType) {
            $this->saveValidation();
        }
        return parent::afterSave();
    }

    private function saveValidation() {
        $validation = $this->getProperty('validation');
        $fieldId = $this->object->get('id');

        if ($validation) {
            $msg = $this->getProperty('val_error_message');
            $fieldValidation = $this->modx->newObject('fmzFormsValidation');
            $fieldValidation->fromArray(array(
                'field_id' => $fieldId,
                'type' => $validation,
                'error_message' => $msg
            ));
            $fieldValidation->save();
        }
    }

    private function saveRequired() {
        $required = $this->setCheckbox('required');
        $fieldId = $this->object->get('id');

        if ($required) {
            $msg = $this->getProperty('error_message', $this->modx->lexicon('formz.field.validation.required'));
            $fieldValidation = $this->modx->newObject('fmzFormsValidation');
            $fieldValidation->fromArray(array(
                'field_id' => $fieldId,
                'type' => 'required',
                'error_message' => $msg
            ));
            $fieldValidation->save();
        }
    }
}

return 'FormzFieldCreateProcessor';
