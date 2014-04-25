<?php
class Devils_Collections_Model_Resource_Collections extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct() {
        $this->_init('devils_collections/collections_source', 'entity_id');
    }
}