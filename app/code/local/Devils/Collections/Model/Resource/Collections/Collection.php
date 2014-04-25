<?php
class Devils_Collections_Model_Resource_Collections_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct() {
        $this->_init('devils_collections/collections');
    }
}