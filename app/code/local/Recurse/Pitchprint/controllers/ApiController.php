<?php
class Recurse_Pitchprint_ApiController extends Mage_Core_Controller_Front_Action
{
    private $_helper;

    public function _construct()
    {
        $this->_helper = Mage::helper('recurse_pitchprint');
    }

    public function fetchdesignsAction()
    {
        $url = $this->_helper->getApiUrl('fetch-designs');

        $pitch_apikey = $this->_helper->getApiKey();
        $signature = $this->_helper->getSignature();

        $data_string = json_encode(array('timestamp' => time(), 'apiKey' => $pitch_apikey, 'signature' => $signature));

        $ch = curl_init($url);                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
         
        echo $result = curl_exec($ch);
    }

    public function fetchpdfAction()
    {
        $projectid = $this->getRequest()->getParam('projectid');

        $url = $this->_helper->getApiUrl('fetch-pdf');

        $data_string = array(
            'timestamp' => time(),
            'apiKey'    => $this->_helper->getApiKey(),
            'signature' => $this->_helper->getSignature(),
            'projectID' => $projectid
        );

        $query = http_build_query($data_string);

        echo $redirect = $url.'?'.$query;

        header('location '.$redirect);
        exit();

        // $data_string = json_encode(array('designid' => '481958f0c643a02739b38a07efa8840f'));
        // $ch = curl_init($url);                                                                      
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        // curl_setopt($ch, CURLOPT_TIMEOUT,30);                                                                    
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        //     'Content-Type: application/json',                                                                                
        //     'Content-Length: ' . strlen($data_string))                                                                       
        // );                                                                                                                   
         
        // echo $result = curl_exec($ch);

        // var_dump($result);
    }

}