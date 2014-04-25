<?php
class Devils_Collections_Block_Adminhtml_Collections_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    protected function _construct() {
        parent::_construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'devils_collections';
        $this->_controller = 'adminhtml_collections';
    }
}