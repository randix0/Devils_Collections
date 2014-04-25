<?php
class Devils_Collections_Block_Adminhtml_Collections extends Mage_Adminhtml_Block_Widget_Grid_Container {
    protected function _construct() {
        $this->_blockGroup = 'devils_collections';
        $this->_controller = 'adminhtml_collections';
        $this->_headerText = $this->__('List');
        $this->_addButtonLabel = $this->__('Add Collection');
        parent::_construct();
    }
}