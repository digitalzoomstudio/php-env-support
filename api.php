<?php

error_reporting(E_ERROR);
ini_set('display_startup_errors', 1);
//ini_set('display_errors', 1);


$app_id = 'c9-test-1wvq8n7g';
$id_product = '157782';
$app_redirect = 'https://php-env-support.herokuapp.com/api.php';
$app_token = "16NE5cs5MFUx09VcdglIvqN6cECHfKBZ";
$personal_api_key = '0d47jgbwur8wulhynwwbatb0giz9i66j';



if(isset($_GET['id_product'])){
    $id_product = $_GET['id_product'];
}


if(function_exists('print_rr')==false){
    function print_rr($arg){
        $fout = '';
        $fout.='<pre>';
        $fout.=print_r($arg,true);
        $fout.='</pre>';
        echo $fout;

    }
}

session_start();

function saveAccessToken( $token ) {
    $_SESSION['envato_token'] = $token;
}


include 'vendor/autoload.php';
// include 'config.php';

$envato = new \Smafe\Envato( array(
    'api_id' => $app_id
, 'api_secret' => $app_token
, 'api_redirect' => $app_redirect
) );



// echo $file_cont;

if(  (isset($_GET['fake']) && $_GET['fake']=='on') && isset($_GET['code'])==false  ) {

  $cont = file_get_contents($id_product.'.txt',true);

  echo $cont;

  die();
}else{
}

$token = '';
if( isset( $_SESSION['envato_token'] ) ){
  $token = $_SESSION['envato_token'];
    $envato->setAccessToken( $_SESSION['envato_token'] );


    $myfile = fopen("lasttoken.txt", "w") or die("Unable to open file!");
    $txt = $_SESSION['envato_token'];
    fwrite($myfile, $txt);
    fclose($myfile);


}else{

    $file_cont = file_get_contents('lasttoken.txt');
  $token = $file_cont;
    $envato->setAccessToken($file_cont );
}

// -- log out

if( isset( $_GET['exit'] ) ) {
    session_destroy();
    $_SESSION['envato_token'] = NULL;
    header( 'Location: index.php', 0 );
    exit();
}


if( isset( $_GET['code'] ) ) {

    try {

        $code = $envato->getAccessToken( $_GET['code'] );
        // print_r( $code );

    } catch( \ErrorException $e ) {

        // echo $e->getMessage();

    }

}




try {

    $logged = $envato->validToken();
    // print_r( $logged );

} catch( \ErrorException $e ) {

    echo 'User is not logged in. Failed with error: ' . $e->getMessage();
    // Don't need to echo error here. If $logged is defined, i means the access is granted.

}

if( isset( $logged ) ){

    // echo 'logged';

}


if( !isset( $logged ) ){
    // echo ' not logged' ;
}


if( !isset( $logged ) ){
}




//echo 'ceeva';





try {
    $comments = $envato->request( 'v1/discovery/search/search/comment?item_id='.$id_product.'&page_size=2&sort_by=newest' );

    // echo '<pre>';

    if(isset($comments->Message)){
    $message = $comments->Message;
    }

    if(isset($comments->Message) && strpos($message,'User is not authorized')!==false){

    echo '<a href="' . $envato->getAuthUrl() . '" class="btn btn-danger">Login to your Env account</a>';
    }else{

        // -- return comments


        foreach ($comments->matches->conversation as $lab=>$val){
        }
        $comments->matches->subtickets = $comments->matches->conversation;

        $comments->tickets = $comments->matches;


      echo json_encode( $comments );
    }
    // print_rr($comments->Message);
    // print_rr( $comments );
    // echo '</pre>';

} catch( \ErrorException $e ) {
    echo $e->getMessage();
}

