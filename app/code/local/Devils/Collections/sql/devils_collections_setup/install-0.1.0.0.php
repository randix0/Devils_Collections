<?php

$eavInstaller = Mage::getModel('eav/entity_setup','default_setup');
$eavInstaller->startSetup();

$eavInstaller->removeAttribute('catalog_product','devils_collection');
$eavInstaller->addAttribute('catalog_product','devils_collection', array(
    'type' => 'int',
    'backend' => '',
    'frontend' => '',
    'source' => '',
    'label' => 'Collection',
    'input' => 'select',
    'class' => '',
    'user_defined' => false,
    'default' => '',
    'unique' => false,
    'visible_on_front' => true,
    'option' => array(
        'values' => array(
            0 => 'Basic',
            1 => 'Season Collections',
            2 => 'Limited Editions'
        )
    )
));

$eavInstaller->endSetup();