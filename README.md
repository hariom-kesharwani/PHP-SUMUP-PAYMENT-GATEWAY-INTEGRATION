### PHP-SUMUP-PAYMENT-GATEWAY-INTEGRATION
Integration of Sumup Payment Gateway using PHP.

###Features

- Sumup Payment gateway integration
- Creating the Checkout authentication token
- Completing  the Checkout page
- Eaisly Configurable your credentials

###How to Intregrate Sumup Payment Gateway
- You  need to generate the sumup credentials that will be used during checkout process. Please follow  below steps to generate Sumup credentials :
    -  Login into sumup official site [Sumup Home Page](https://sumup.com/ "Sumup Home Page"). Click on the login link on Sumup home page and enter your credentials.
	- After Login go to Developer area & Generate the merchant OAuth by filling the "Consent screen" form. 
	- After submission of form , They will provide you option to download the credentials.
	- Credential file is a JSON file which contains merchant credentials. File having following informations:
		-  `{"id":"CCCPV79Q","name":"Hariom","client_id":"iXXX7JWbByXXXXopDOgqIXXXXX","client_secret":"b1f090512aaXXXXXXXXXXXXXXX3e9fb02f1685408dd5b79a1fXXXXXXXXXXXXXX","application_type":"web","redirect_uris":["http://xyz.com/verify_payment.php"],"cors_uris":["http://xyz.com"]}`
	- As you see above that credential file having following informations :
		- Client Id
		- Client Secret
		- Redirect Url
		- etc..
- Client Id, Client Secret , Redirect Url will be used further for implementing the checkout page.
- Set these credentials into "gateway.php" file 
	Change these credential from the file :
	`const CLIENT_ID = "Client Id";
        const CLIENT_SECRET = "Client Secret Key";
		const PAYEE_EMAIL = 'merchant email id';
        const RETURN_URL = 'http://xyz.com/success.php';
        const REDIRECT_URL = "http://xyz.com/verify_payment.php";
        const API_TOKEN_URL = "https://api.sumup.com/token";
        const API_AUTHORIZE_URL = 'https://api.sumup.com/authorize';
		const API_CHECKOUT_URL = 'https://api.sumup.com/v0.1/checkouts';`

- Change the bill number and amount from the generate_bill.php file.

###How to Intall 
- `By Cloning the git reporitory`
- Install by Composer
    `composer create-project hariom/sumup-gateway-integration @v1`

###End