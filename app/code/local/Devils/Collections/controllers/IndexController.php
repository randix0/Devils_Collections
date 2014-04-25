<?php

class Devils_Collections_IndexController extends Mage_Core_Controller_Front_Action
{
    protected function _initCollection()
    {
        $collectionId = (int) $this->getRequest()->getParam('id', false);
        if (!$collectionId) {
            return false;
        }
        $collection = Mage::helper('devils_collections')->initCollection($collectionId);
        return $collection;
    }

    public function indexAction() {
        $collection = Mage::getResourceModel('devils_collections/collections_collection');

        $options = array();
        foreach($collection->getItems() as $collection) {
            $options[] = array('label' => $collection->getName(), 'value' => $collection->getId());
        }

        var_dump(Mage::getBaseDir('media') . DS . 'collections');
    }

    public function viewAction()
    {

        if ($collection = $this->_initCollection()) {

        } elseif (!$this->getResponse()->isRedirect()) {
            $this->_forward('noRoute');
        }

        //$this->loadLayout();
        $update = $this->getLayout()->getUpdate();
        $update->addHandle('default');
        $this->addActionLayoutHandles();
        $update->addHandle('devils_collections_view');
        $this->loadLayoutUpdates();
        $this->generateLayoutXml();
        $this->generateLayoutBlocks();
        $this->_isLayoutLoaded = true;

        //print_r($this->getLayout()->getUpdate()->getHandles());

        $this->renderLayout();
    }
}