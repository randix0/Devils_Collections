<?php
class Devils_Collections_Block_Adminhtml_Collections_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
    protected function _prepareForm() {
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save',
                    $this->getRequest()->getParam('id')),
            'method' => 'post',
            'enctype'=> 'multipart/form-data'
        ));

        $fieldset = $form->addFieldset('general_form', array(
            'legend' => $this->__('General Setup')
        ));

        $fieldset->addField('name', 'text', array(
            'label' => $this->__('Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'name'
        ));

        $fieldset->addField('description', 'text', array(
            'label' => $this->__('Description'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'description'
        ));

        $fieldset->addField('active', 'select', array(
            'label' => $this->__('Active'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'active',
            'options' => array(
                0 => $this->__('No'),
                1 => $this->__('Yes')
            )
        ));

        $collection = Mage::registry('current_collection');

        if ($collection->getId()) {
            $collectionId = (int)$collection->getId();
            $form->addField('entity_id', 'hidden', array(
                'name' => 'entity_id',
            ));
            $form->setValues($collection->getData());
            /*
            $image = $form->getElement('image')->getValue();
            $form->getElement('image')->setValue(Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'devils' . DS . 'devils_collections' . DS . 'collections' . DS . $collectionId . DS . $image);
            */
        }

        $form->setUseContainer(true);
        $form->addValues($this->_getFormData());
        $this->setForm($form);
        return parent::_prepareForm();
    }

    protected function _getFormData() {
        $data = Mage::getSingleton('adminhtml/session')->getFormData();
    }
}