<?php
class FormzFieldGetListProcessor extends modObjectGetListProcessor {
    /* Class in model directory */
    public $classKey = 'fmzFormsFields';

    /* Language package to load */
    public $languageTopics = array('formz:default');

    /* Field t sort by and direction */
    public $defaultSortField = 'order';
    public $defaultSortDirection = 'ASC';

    /* Used to load the correct language error message */
    public $objectType = 'formz.field';

    /* Search database from backend module */
    public function prepareQueryBeforeCount(xPDOQuery $c) {
    	$form = $this->getProperty('form_id');
    	if (!empty($form)) {
    		$c->where(array(
	    		'form_id' => $form,
	    	));
    	}
    	return $c;
    }

    public function afterIteration(array $list) {
        $currentIndex = 0;
        $lists = array();
        foreach ($list as $item) {
            $fieldSettings = $this->modx->fromJSON($item['settings'], false);

            $lists[] = $item;
            $validation = $this->modx->getCollection('fmzFormsValidation', array('field_id' => $item['id']));

            $lists[$currentIndex]['label'] = $fieldSettings->label;

            if (!empty($fieldSettings->help_text))
                $lists[$currentIndex]['help_text'] = $fieldSettings->help_text;

            if (!empty($fieldSettings->default))
                $lists[$currentIndex]['default'] = $fieldSettings->default;

            if (!empty($fieldSettings->values))
                $lists[$currentIndex]['values'] = $fieldSettings->values;

            // Defaults
            $lists[$currentIndex]['required'] = 0;
            $lists[$currentIndex]['error_message'] = null;

            $lists[$currentIndex]['validation'] = null;
            $lists[$currentIndex]['val_error_message'] = null;

            foreach ($validation as $val) {
                if (!empty($val) && $val->type !== 'required') {
                    $lists[$currentIndex]['validation'] = $val->type;
                    $lists[$currentIndex]['val_error_message'] = $val->error_message;
                }

                if (!empty($val) && $val->type === 'required') {
                    $lists[$currentIndex]['required'] = 1;
                    $lists[$currentIndex]['error_message'] = $val->error_message;
                }
            }
            $currentIndex++;
        }
        return !empty($lists) ? $lists : $list;
    }
}

return 'FormzFieldGetListProcessor';
