<?php

class Gateway {

    const API_CHECKOUT_URL = 'https://api.sumup.com/v0.1/checkouts';
    const PAYEE_EMAIL = 'merchant email id';
    const RETURN_URL = 'http://xyz.com/success.php';
    const REDIRECT_URL = "http://xyz.com/verify_payment.php";
    const CLIENT_ID = "Client Id";
    const CLIENT_SECRET = "Client Secret Key";
    const API_TOKEN_URL = "https://api.sumup.com/token";
    const API_AUTHORIZE_URL = 'https://api.sumup.com/authorize';

    protected $access_token = null;

    public function createCheckout($data) {

        $packet = array(
            'checkout_reference' => $data['bill_no'],
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'pay_to_email' => self::PAYEE_EMAIL,
            'return_url' => self::RETURN_URL
        );
        $headers = array(
            'Content-Type: application/json',
            sprintf('Authorization: Bearer %s', $this->access_token)
        );
        $packet_json = json_encode($packet);
        $ch = curl_init();
        $ch = curl_init(self::API_CHECKOUT_URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $packet_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        $output = json_decode($output, true);
        return $output;
    }

    public function getAccessToken() {
        $headers = array(
            'Content-Type: application/json',
        );
        $packet = array(
            'grant_type' => 'client_credentials',
            'client_id' => self::CLIENT_ID,
            'client_secret' => self::CLIENT_SECRET,
            'scope' => "payments"
        );
        $packet_json = json_encode($packet);
        $ch = curl_init();
        $ch = curl_init(self::API_TOKEN_URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $packet_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        $output = json_decode($output, true);
        if (isset($output['access_token'])) {
            $this->access_token = $output['access_token'];
        }
        return $output;
    }

    public function getAuthorizeUrl() {
        return 'payment.php';
    }

}

?>