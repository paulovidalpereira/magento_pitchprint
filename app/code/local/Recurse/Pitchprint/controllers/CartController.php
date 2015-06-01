<?php
class Recurse_Pitchprint_CartController extends Mage_Core_Controller_Front_Action
{

    public function savedesignAction()
    {
        $params = $this->getRequest()->getPost();

        Mage::getSingleton('core/session')->unsPitchProductDesign();
        Mage::getSingleton('core/session')->setPitchProductDesign($params);
    }

}