<?php

require_once('gateway.php');

Class GenerateBill extends Gateway {

    public function checkout() {
        $packet = array(
            'bill_no' => 'O_' . uniqid(),
            'amount' => 1,
            'currency' => 'CHF'
        );

        $accessTokenDetail = $this->getAccessToken();
        if (isset($accessTokenDetail['error_message'])) {
            $this->showError($accessTokenDetail['error_message']);
        }
        $checkoutOutput = $this->createCheckout($packet);
        if (isset($checkoutOutput['error_code']) && !empty($checkoutOutput['error_code'])) {
            $this->showError($checkoutOutput['message']);
        }
        return $checkoutOutput;
    }

    public function showError($message) {
        echo $message;
        exit();
    }

}

?>