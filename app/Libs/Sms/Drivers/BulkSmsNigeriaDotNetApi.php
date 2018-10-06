<?php

namespace App\Libs\Sms\Drivers;

class BulkSmsNigeriaDotNetApi
{
    private $to;
    private $body;

    public function boot(Array $paramArr)
    {
        $this->to = $paramArr['to'];
        $this->body = $paramArr['body'];

        $this->_initiateSMS();
    }

    private function _initiateSMS()
    {
        $resArr = $this->_byCURL();
        //$res = $this->_byGuzzle();

        return $resArr;
    }

    private function _byCURL(){
        $isError = 0;
        $errorMessage = true;

        //Preparing post parameters
        $postData = array(
            'username' => env('BULKSMS_USERNAME'),
            'password' => env('BULKSMS_PASSWORD'),
            'message' => $this->body,
            'sender' => env('BULKSMS_SENDER'),
            'mobiles' => $this->to,
            'response' => env('BULKSMS_RESPONSE_TYPE')
        );

        $url = env('BULKSMS_URL');

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);


        //Print error if any
        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);


        if($isError){
            return ['error' => true , 'message' => $errorMessage];
        }else{
            return ['error' => false ];
        }
    }

    /*public function _byGuzzle($phone_number, $message)
    {
        $client = new Client();

        $response = $client->post('http://portal.bulksmsnigeria.net/api/?', [
            'verify'    =>  false,
            'form_params' => [
                'username' => $this->SMS_USERNAME,
                'password' => $this->SMS_PASSWORD,
                'message' => $message,
                'sender' => $this->SMS_SENDER,
                'mobiles' => $phone_number,
            ],
        ]);


        $response = json_decode($response->getBody(), true);
    }*/
}