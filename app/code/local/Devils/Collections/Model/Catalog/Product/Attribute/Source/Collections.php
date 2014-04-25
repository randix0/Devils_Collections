<?php
class Devils_Collections_Model_Catalog_Product_Attribute_Source_Collections
    extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    protected $_values = null;
    protected $_data = null;

    protected function _getHelper()
    {
        return Mage::helper('devils_collections');
    }

    public function getAllOptions()
    {
        $result = array();
        foreach ($this->_getValues() as $k => $v) {
            $result[] = array(
                'value' => $k,
                'label' => $v,
            );
        }

        return $result;
    }

    public function getOptionText($value)
    {
        $options = $this->_getValues();
        if (is_array($value)) {
            $values = array();
            foreach($value as $optionId) {
                $optionId = (int)$optionId;
                if (isset($options[$optionId])) {
                    $values[] = $options[$optionId];
                }
            }
            return implode(', ', $values);
        } else {
            $optionId = (int)$value;
            if (isset($options[$optionId])) {
                return $options[$optionId];
            }
        }
        return null;
    }

    protected function _getValues()
    {
        if (is_null($this->_values)) {
            $collection = Mage::getResourceModel('devils_collections/collections_collection');

            $values = array();
            foreach($collection->getItems() as $detail) {
                $detailId = (int)$detail->getId();
                $values[$detailId] = $detail->getName();
            }
            $this->_values = $values;
        }
        return $this->_values;
    }

    protected function _getAllData()
    {
        if (is_null($this->_data)) {
            $collection = Mage::getResourceModel('devils_collections/collections_collection');

            $data = array();
            foreach($collection->getItems() as $detail) {
                $detailId = (int)$detail->getId();
                $data[$detailId] = array(
                    'id' => $detailId,
                    'name' => $detail->getName(),
                    'description' => $detail->getDescription()
                );
            }
            $this->_data = $data;
        }
        return $this->_data;
    }

    public function getOptionData($value)
    {
        $options = $this->_getAllData();
        if (is_array($value)) {
            $values = array();
            foreach($value as $optionId) {
                $optionId = (int)$optionId;
                if (isset($options[$optionId])) {
                    $values[] = $options[$optionId];
                }
            }
            return $values;
        } else {
            $optionId = (int)$value;
            if (isset($options[$optionId])) {
                return $options[$optionId];
            }
        }
        return null;
    }
}