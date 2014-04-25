<?php

$installer = $this;
$installer->startSetup();
$table = $installer->run("
DROP TABLE IF EXISTS {$this->getTable('devils_collections_entity')};
CREATE TABLE {$this->getTable('devils_collections_entity')} (
  `entity_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `description` text NOT NULL default '',
  `active` tinyint(1) NOT NULL default 1,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
$installer->endSetup();

$eavInstaller = Mage::getModel('eav/entity_setup','default_setup');
$eavInstaller->startSetup();

$eavInstaller->removeAttribute('catalog_product','devils_collection');
$eavInstaller->addAttribute('catalog_product','devils_collection', array(
    'type' => 'int',
    'backend' => '',
    'frontend' => '',
    'source' => 'devils_collections/catalog_product_attribute_source_collections',
    'label' => 'Collection',
    'input' => 'select',
    'class' => '',
    'user_defined' => false,
    'default' => '',
    'unique' => false,
    'visible_on_front' => true,
));

$eavInstaller->endSetup();