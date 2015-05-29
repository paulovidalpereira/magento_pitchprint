<?php

class Recurse_Pitchprint_Model_Observer 
{
    public function addOptions(Varien_Event_Observer $observer)
    {
        // $produto = $observer->getEvent()->getQuoteItem()->getProduct();

        // var_dump($produto->getProductOptions());
        // var_dump($data);
        
        // $event = $observer->getEvent();
        // $quote_item = $event->getQuoteItem();
        // $option = array('options'=>array(
        //     "option_id1" => 'option_value1',
        //     "option_id2" => 'option_value2'
        // ));
 
        // $produto->addProduct($produto, new Varien_Object($option));

        // $params = array(
        //     'product' => $produto->getId(),
        //     'qty' => 1,
        //     'options' => array(
        //         1 => array(
        //             'type' => 'image/tiff',
        //             'title' => $image,
        //             'quote_path' => '/media/'.$image,
        //             'order_path' => '/media/'.$image,
        //             'fullpath' => Mage::getBaseDir() .'/'. $image,
        //             'secret_key' => substr(md5(file_get_contents(Mage::getBaseDir() .'/'. $image)), 0, 20),
        //             'size' => $size,
        //             'width' => $imgSize[0],
        //             'height' => $imgSize[1]
        //         ),
        //     )
        // );

        // $produto->addProduct($produto, new Varien_Object($params));
        // $produto->save();

        // exit();

        $action = Mage::app()->getFrontController()->getAction();

        if( $action->getFullActionName() == 'checkout_cart_add' )
        {
            $product = $observer->getProduct();

            $additionalOptions = array();
            $pitchprint_data = Mage::getSingleton('core/session')->getPitchProductDesign();

            if ($additionalOption = $product->getCustomOption('additional_options'))
            {
                $additionalOptions = (array) unserialize($additionalOption->getValue());
            }

            foreach( $pitchprint_data as $key => $value )
            {
                $additionalOptions[] = array(
                    'label' => $key,
                    'value' => '<a href="'.$value.'" target="_blank">Visualizar</a>'
                );    
            }
            
            $observer->getProduct()->addCustomOption('additional_options', serialize($additionalOptions));
        }

    }

    public function salesConvertQuoteItemToOrderItem(Varien_Event_Observer $observer)
    {
        $quoteItem = $observer->getItem();

        if($additionalOptions = $quoteItem->getOptionByCode('additional_options'))
        {
            $orderItem = $observer->getOrderItem();
            $options = $orderItem->getProductOptions();
            $options['additional_options'] = unserialize($additionalOptions->getValue());
            $orderItem->setProductOptions($options);
        }

    }

}