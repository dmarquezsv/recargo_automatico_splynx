<?php
include_once 'validate_login.php';

// library api rest
require __DIR__ . "/vendor/autoload.php";

class Queries
{

    //generate token type admin
    public static function token()
    {
        try {

            $client = new GuzzleHttp\Client();
            $response = $client->request('POST', 'https://www.site.com', [
                'form_params' => [
                    'auth_type' => 'admin',
                    'login' => 'splynx',
                    'password' => 'B3ne3t$21',
                ],
                'debug' => false,
                'verify' => false
            ]);

            //get the results from the api
            $responseToken  = json_decode($response->getBody()->getContents());
            $res = array(
                $responseToken->access_token_expiration,
                $responseToken->access_token,
                $responseToken->refresh_token
            );
            Queries::log('Token generado con éxito');
            return $res;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            Queries::log('Excepción capturada token: ',  $e->getMessage());
        }
    }

    //make the payment with the parameters obtained through the excel file
    public static function payment($token, $customer_id, $date, $amount)
    {
        try {

            $client = new GuzzleHttp\Client();
            $data = [
                'customer_id' => $customer_id,
                'payment_type' => '7',
                'receipt_number' => "",
                'date' => $date,
                'amount' => $amount,
                'comment' => 'Prueba de pago automático',
                'field_1' => "",
                'field_2' => "",
                'field_3' => "",
                'field_4' => "",
                'field_5' => ""
            ];

            $response = $client->request('POST', 'https://www.site.com', [
                'headers' => ['Content-Type' => 'application/json', 'Authorization' => 'Splynx-EA (access_token=' . $token . ')'],
                'body' => json_encode($data)
            ]);

            if (200 == $response->getStatusCode()) {
                $response = $response->getBody();
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            Queries::log('Excepción capturada payment: ',  $e->getMessage());
        }
    }

    //renew the token
    public static function renew_token($refresh_token)
    {

        try {
            $client = new GuzzleHttp\Client();
            $response = $client->request('GET', 'https://wwww.site.com' . $refresh_token, [
                'debug' => false,
                'verify' => false
            ]);

            $responseToken  = json_decode($response->getBody()->getContents());

            $res = array(
                $responseToken->access_token_expiration,
                $responseToken->access_token,
                $responseToken->refresh_token
            );

            Queries::log('Token renovado con éxito');
            return $res;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            Queries::log('Excepción capturada ronovar token: ',  $e->getMessage());
        }
    }

    //get the client's email through the id parameter
    public static function get_email_customer($token, $record)
    {

        try {

            $client = new GuzzleHttp\Client();

            $response = $client->request('GET', 'https://www.site.com' . $record, [
                'headers' => ['Content-Type' => 'application/json', 'Authorization' => 'Splynx-EA (access_token=' . $token . ')'],
                'debug' => false,
                'verify' => false
            ]);

            $responseCustomer  = json_decode($response->getBody()->getContents());
            return $responseCustomer->email;
        } catch (Exception $e) {
            echo 'Excepción capturada obtener email: ',  $e->getMessage(), "\n";
        }
    }

    //function to store errors in a log
    public static function log($message)
    {
        $logpath = "log.log";
        $logMessage = gmdate("Y-m-d\TH:i:s\Z") . " - LOG - " . $message . PHP_EOL;
        error_log($logMessage, 3, $logpath);
    }
}
