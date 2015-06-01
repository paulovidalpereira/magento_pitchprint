<?php
class Recurse_Pitchprint_Model_Observer 
{
    public function addOptions(Varien_Event_Observer $observer)
    {
        $action = Mage::app()->getFrontController()->getAction();

        if( $action->getFullActionName() == 'checkout_cart_add' )
        {
            $product = $observer->getProduct();

            $additionalOptions = array();

            $pitchprint_data = Mage::getSingleton('core/session')->getPitchProductDesign();
            Mage::getSingleton('core/session')->unsPitchProductDesign();

            foreach( $pitchprint_data as $key => $value )
            {
                $additionalOptions[] = array(
                    'label' => $key,
                    'value' => $value
                );    
            }
            
            $observer->getProduct()->addCustomOption('pitchprint_options', serialize($additionalOptions));
        }

    }

    public function salesConvertQuoteItemToOrderItem(Varien_Event_Observer $observer)
    {
        $quoteItem = $observer->getItem();

        if($additionalOptions = $quoteItem->getOptionByCode('pitchprint_options'))
        {
            $orderItem = $observer->getOrderItem();
            $options = $orderItem->getProductOptions();
            $options['pitchprint_options'] = unserialize($additionalOptions->getValue());
            $orderItem->setProductOptions($options);
        }

    }

}