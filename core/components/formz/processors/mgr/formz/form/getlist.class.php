<?php
class FormzGetListProcessor extends modObjectGetListProcessor {
    /* Class in model directory */
    public $classKey = 'fmzForms';

    /* Language package to load */
    public $languageTopics = array('formz:default');

    /* Field t sort by and direction */
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'ASC';

    /* Used to load the correct language error message */
    public $objectType = 'formz.form';

    /* Search database from backend module */
    public function prepareQueryBeforeCount(xPDOQuery $c) {
    	$query = $this->getProperty('query');
    	if (!empty($query)) {
    		$c->where(array(
	    		'name:LIKE' => '%' . $query . '%',
	    	));
    	}

        $this->modx->invokeEvent('OnFormzFormsPrepareQueryBeforeCount',array(
            'query' => $query,
            'c' => &$c,
        ));
       
    	return $c;
    }

    public function afterIteration(array $list) {
        $currentIndex = 0;
        $lists = array();
        foreach ($list as $item) {
            $lists[] = $item;
            $c = $this->modx->newQuery('fmzFormsData');
            $c->where(array('form_id' => $item['id']));
            $total = $this->modx->getCount('fmzFormsData', $c);
            $lists[$currentIndex]['submissions'] = $total;

            if ($total)
                $lists[$currentIndex]['has_submission'] = true;

            $currentIndex++;
        }
        return !empty($lists) ? $lists : $list;
    }
}

return 'FormzGetListProcessor';
