<?php
/**
 * Handles plugin events for Formz Custom TV
 *
 * @package formz
 */
$corePath = $modx->getOption('formz.core_path', null, $modx->getOption('core_path') . 'components/formz/');
$modx->lexicon->load('formz:tv');

switch ($modx->event->name) {
    case 'OnManagerPageBeforeRender':
        $modx->controller->addLexiconTopic('formz:tv');
        break;
    case 'OnTVInputRenderList':
        $modx->event->output($corePath.'processors/mgr/tv/input/');
        break;
    case 'OnTVOutputRenderList':
        $modx->event->output($corePath.'processors/mgr/tv/output/');
        break;
    case 'OnTVOutputRenderPropertiesList':
        $modx->event->output($corePath.'processors/mgr/tv/output/options/');
        break;
}
return;
