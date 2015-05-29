<?php

class Recurse_Pitchprint_Model_Attribute_Source_Designs extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{

    public function getAllOptions()
    {
        if (is_null($this->_options))
        {
            $result = file_get_contents(Mage::getUrl('pitchprint/api/fetchdesigns'));

            $result = json_decode($result,true);

            $options = array(array('value' => '', 'label' => ''));
            $_designs = $result[0]['designs'];

            foreach( $_designs as $design )
            {
                $this->_options[] = array('value' => $design['id'], 'label' => $design['title']);
            }

        }

        return $this->_options;
    }

    public function toOptionArray()
    {
        return $this->getAllOptions();
    }

}