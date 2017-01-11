<?php
class FormzOutputRender extends modTemplateVarOutputRender {
	public function getLexiconTopics() {
        return array('tv_widget', 'formz:tv');
    }

    public function process($value,array $params = array()) {
        $options = array();
        foreach($params as $key => $val) {
            if (!empty($val)) {
                $options[$key] = $val;
            }
        }
        $mainOptions = array_merge(array('id' => $value), $options, (is_array($this->tv->_properties)) ? $this->tv->_properties : array());
	    return $this->modx->runSnippet('fmzForms', $mainOptions);
    }
}
return 'FormzOutputRender';
