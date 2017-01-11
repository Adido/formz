<?php
class FormzFieldRemoveProcessor extends modObjectRemoveProcessor {
    /* Class in model directory */
    public $classKey = 'fmzFormsFields';

    /* Language package to load */
    public $languageTopics = array('formz:default');

    /* Used to load the correct language error message */
    public $objectType = 'formz.field';
    
    public $beforeRemoveEvent = 'OnFormzFormsFieldsBeforeRemove';
}

return 'FormzFieldRemoveProcessor';
