<?php
/**
 * Resolve creating db tables
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package formz
 * @subpackage build
 */

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modelPath = $modx->getOption('formz.core_path', null, $modx->getOption('core_path') . 'components/formz/') . 'model/';
            
            $modx->addPackage('formz', $modelPath, null);


            $manager = $modx->getManager();

            $manager->createObjectContainer('fmzForms');
            $manager->createObjectContainer('fmzFormsFields');
            $manager->createObjectContainer('fmzFormsValidation');
            $manager->createObjectContainer('fmzFormsData');
            $manager->createObjectContainer('fmzFormsDataFields');

            break;
    }
}

return true;