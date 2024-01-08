<?php
    //CONNECT TO THE CLICKSEND SMS API
    $username = '[ENTER USERNAME HERE]';
    $password = '[ENTER PASSWORD HERE]';

    $config = \ClickSend\Configuration::getDefaultConfiguration()  
        ->setUsername($username)
        ->setPassword($password);

    //SEND SMS CODE 
    $apiInstance = new \ClickSend\Api\SMSApi(new \GuzzleHttp\Client(),$config);

    $body = "This is a testing sms";
    $sendTo = '[ENTER MOBILE HERE]';

    $msg = new \ClickSend\Model\SmsMessage();
    $msg->setBody($body); 
    $msg->setTo($sendTo);
    $msg->setSource("sdk");

    $sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
    $sms_messages->setMessages([$msg]);

    try {

        $result = $apiInstance->smsSendPost($sms_messages);
        $result = json_decode($result);

        return $result->response_code;

    } catch (Exception $e) {

        echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
    }
?>