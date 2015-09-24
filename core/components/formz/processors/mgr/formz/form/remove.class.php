<?php
class FormzRemoveProcessor extends modObjectRemoveProcessor {
    /* Class in model directory */
    public $classKey = 'fmzForms';

    /* Language package to load */
    public $languageTopics = array('formz:default');

    /* Used to load the correct language error message */
    public $objectType = 'formz.form';
    
    public $beforeRemoveEvent = 'OnFormzFormsBeforeRemove';
}

return 'FormzRemoveProcessor';
