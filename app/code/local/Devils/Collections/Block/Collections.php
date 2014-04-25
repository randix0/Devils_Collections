<?php
class Devils_Collections_Block_Collections extends Mage_Core_Block_Template
{
    public function getCollections()
    {
        $collection = Mage::getModel('devils_collections/collections')->getCollection();
        return $collection;
    }
}