<html><body>
<?php

include_once "./class-api.php";



$app_id = 'c9-test-1wvq8n7g';

$product_id = '157782';
$app_redirect = 'https://php-react-env-api-digitalzoomstudio-1.c9users.io/';
$app_token = "16NE5cs5MFUx09VcdglIvqN6cECHfKBZ";
$personal_api_key = '0d47jgbwur8wulhynwwbatb0giz9i66j';








// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo 'Hello world from Clou 2d 2 29!';

include_once "vendor/autoload.php";

if(isset($_GET['code'])){
  $personal_api_key = $_GET['code'];
}
$envato = new \Smafe\Envato( array(
  'api_id' => $app_id
, 'api_secret' => $app_token
, 'api_redirect' => $app_redirect
, 'api_token' => $personal_api_key
) );

echo '<br>...<br>'; 
try {

  $request = $envato->request( 'v3/market/catalog/item?id='.$product_id );
  echo '$request - '; print_r( $request );

} catch( \ErrorException $e ) {

  print_r($e->getMessage());

}


echo 'redirect <a href="https://api.envato.com/authorization?response_type=code&client_id='.$app_id.'&redirect_uri='.$app_redirect.'">here</a>';

// $envato = new Teste( array(
//     'api_id' => $app_id
// , 'api_secret' => $app_token
// , 'api_redirect' => $app_redirect
// ) );
 

// if( isset( $_SESSION['envato_token'] ) )
//     $envato->setAccessToken( $_SESSION['envato_token'] );





// try {

//     $request = $envato->request( 'v3/market/catalog/item?id=13041404' );
//     print_r( $request );

// } catch( \ErrorException $e ) {

//     echo $e->getMessage();

// }











/*
 * Envato API PHP Class
 *
 * This PHP Class was created in order to communicate with the new Envato API.
 *
 * Source: https://radiumthemes.com/?p=677
 * API Documentation: https://build.envato.com/api/
 *
 * Copyright 2017: RadiumThemes
 */
class Radium_Envato_Verify {

	private $api_url = 'https://api.envato.com/v3/market'; // base URL to envato api

	/** Constructor */
	function __construct( $api_key ) {
        $this->api_key = $api_key;
	}

	/**
	 * General purpose function to query the Envato API.
	 *
	 * @param string $url The url to access, via curl.
	 * @return object The results of the curl request.
	 */
	protected function curl( $url ) {

		if ( empty( $url) ) return false;

		$api_key		= $this->api_key;

		// Send request to envato to verify purchase
		$ch = curl_init( $url );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Envato API Wrapper PHP)' );

		$header = array();
		$header[] = 'Content-length: 0';
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: Bearer '. $api_key;

		curl_setopt( $ch, CURLOPT_HTTPHEADER, $header );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);

		$data = curl_exec( $ch );
		curl_getinfo( $ch,CURLINFO_HTTP_CODE );
		curl_close( $ch );

		$response = json_decode( $data, true );

		return $response; // string or null
	}


	public function verify_purchase( $purchase_code = '' ) {

		// Check for empty fields
		if ( empty( $purchase_code ) ) {
			return false;
		}

		// Gets author data & prepare verification vars
		$purchase_code 	= urlencode( $purchase_code );

		$url = $this->api_key . '/author/sale?code=' . $purchase_code;

	    $response = $this->curl( $url );

    	if ( isset( $response['error'] ) && $response['error'] == '404' ) {
    		return false;
    	} else {
            return true;
        }

	}
}


// $verify = new Radium_Envato_Verify( $personal_api_key );




// echo $verify->verify_purchase( '38a856d2-a0e4-46dc-976d-8e4ec367a3cb' );

?>
</body>
</html>