<?php
class FormzUpdateProcessor extends modObjectUpdateProcessor {
    /* Class in model directory */
    public $classKey = 'fmzForms';

    /* Language package to load */
    public $languageTopics = array('formz:default');

    /* Used to load the correct language error message */
    public $objectType = 'formz.form';
    
    public $beforeSaveEvent = 'OnFormzFormsBeforeSave';
    
    public function beforeSave() {
        // Setting creator and time created
        $this->object->set('editedby', $this->modx->user->get('id'));
        $this->object->set('editedon', date('Y-m-d H:i:s',time()));

        return parent::beforeSave();
    }
}

return 'FormzUpdateProcessor';
