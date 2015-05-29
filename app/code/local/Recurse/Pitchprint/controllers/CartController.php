<?php
class Recurse_Pitchprint_CartController extends Mage_Core_Controller_Front_Action
{
    public function addAction()
    {
        // the path of the file, relative to Magento base directory.
        // For example /media/image.jpg
        $image = "Koala.jpg";

        // the ID of the product
        $product_id = 1;
         
        $product = Mage::getModel('catalog/product')->load($product_id);
         
        $cart = Mage::getModel('checkout/cart');
        $cart->init();

        // $quote = Mage::getModel('sales/quote')
            // ->setStoreId(Mage::app()->getStore('default')->getId());

        // $params = array(
        //     'product' => $product_id,
        //     'qty' => 1,
        //     'options' => array(
        //         12345 => array(
        //             'quote_path' => $image,
        //             'secret_key' => substr(md5(file_get_contents(Mage::getBaseDir() . $image)), 0, 20)
        //         ),
        //     )
        // );

        // $title = 'arquivos';
        $image = DS.'media'.DS.'logos'.DS.$title;
        $path = Mage::getBaseDir().$image;

        // $imgSize = getimagesize($path);
        // $size = filesize($path);

        // $array = array(
        //     'type' => 'application/octet-stream',
        //     'title' => 'Arquivo',
        //     'size' => $size ,
        //     'width' => $imgSize[0],
        //     'height' => $imgSize[1],
        //     'quote_path'=> $path,
        //     'order_path'=> $path,
        //     'secret_key' => substr(md5(file_get_contents($path)), 0, 20)
        // );

        // $options[$key] = $array;

        $params = array(
            'product' => $product_id,
            'qty' => 1,
            'options' => array(
                'pitchprint_options' => array(
                    'type' => 'image/tiff',
                    'title' => $image,
                    'quote_path' => '/media/'.$image,
                    'order_path' => '/media/'.$image,
                    'fullpath' => Mage::getBaseDir() .'/'. $image,
                    'secret_key' => substr(md5(file_get_contents(Mage::getBaseDir() .'/'. $image)), 0, 20),
                    'size' => $size,
                    'width' => $imgSize[0],
                    'height' => $imgSize[1]
                ),
            )
        );

        $cart->addProduct($product, new Varien_Object($params));
        $cart->save();
         
        // Mage::getSingleton('checkout/session')->setCartWasUpdated(true);

        echo 'OK '.time();
    }

    public function pedidoAction()
    {
        $pedidos = Mage::getModel('sales/order')->getCollection();

        foreach( $pedidos as $pedido )
        {
            $produtos = $pedido->getAllItems();

            foreach( $produtos as $produto )
            {

                echo '<div style="background:#f1f1f1; padding:20px; margin:10px;">';
                    echo $produto->getName();
                    echo '<pre>';
                    var_dump($produto->getProductOptions());
                    echo '</pre>';
                echo '</div>';
            }

        }
        
    }

    public function savedesignAction()
    {
        $params = $this->getRequest()->getPost();

        Mage::getSingleton('core/session')->setPitchProductDesign($params);

        var_dump(Mage::getSingleton('core/session')->getPitchProductDesign());
    }

}