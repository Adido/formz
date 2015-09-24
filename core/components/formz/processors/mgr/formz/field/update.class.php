<?php
class FormzFieldUpdateProcessor extends modObjectUpdateProcessor {
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
        $label = $this->getProperty('label');
        $type = $this->getProperty('type');
        $default = $this->getProperty('default');

        switch ($type) {
            case 'select':
            case 'checkbox':
            case 'radio':
                $values = $this->getProperty('values');
                break;
            default:
                // textbox
                $values = '';
                $this->validationType = true;
        }

        $settings = array(
            'label' => $label
        );

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

        if (!empty($validation)) {
            $msg = $this->getProperty('val_error_message');
            $fieldValidation = $this->modx->getObject('fmzFormsValidation', array(
                'field_id' => $fieldId,
                'type' => $validation,
            ));

            if (empty($fieldValidation)) {
                $fieldValidation = $this->modx->getObject('fmzFormsValidation', array(
                    'field_id' => $fieldId,
                    'type:!=' => 'required',
                ));
                if ($fieldValidation && $fieldValidation instanceof fmzFormsValidation) {
                    $fieldValidation->remove();
                }

                $fieldValidation = $this->modx->newObject('fmzFormsValidation');
            }

            $fieldValidation->fromArray(array(
                'field_id' => $fieldId,
                'type' => $validation,
                'error_message' => $msg
            ));
            $fieldValidation->save();
        } else {
            // Delete all Validation except required rule
            $fieldValidation = $this->modx->getObject('fmzFormsValidation', array(
                'field_id' => $fieldId,
                'type:!=' => 'required',
            ));
            if ($fieldValidation && $fieldValidation instanceof fmzFormsValidation) {
                $fieldValidation->remove();
            }
        }
    }

    private function saveRequired() {
        $required = $this->setCheckbox('required');
        $fieldId = $this->object->get('id');

        if ($required) {
            $msg = $this->getProperty('error_message');
            $fieldValidation = $this->modx->getObject('fmzFormsValidation', array(
                'field_id' => $fieldId,
                'type' => 'required',
            ));

            if (empty($fieldValidation)) {
                $fieldValidation = $this->modx->newObject('fmzFormsValidation');
            }

            $fieldValidation->fromArray(array(
                'field_id' => $fieldId,
                'type' => 'required',
                'error_message' => $msg
            ));
            $fieldValidation->save();
        } else {
            $fieldValidation = $this->modx->getObject('fmzFormsValidation', array(
                'field_id' => $fieldId,
                'type' => 'required',
            ));
            if ($fieldValidation && $fieldValidation instanceof fmzFormsValidation) {
                $fieldValidation->remove();
            }
        }
    }
}

return 'FormzFieldUpdateProcessor';
