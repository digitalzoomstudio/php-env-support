<?php

error_reporting(E_ERROR);
ini_set('display_startup_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");
ini_set('display_errors', 1);


$app_id = 'c9-test-1wvq8n7g';
$id_product = '157782';
$app_redirect = 'https://php-env-support.herokuapp.com/api.php';
$app_token = "16NE5cs5MFUx09VcdglIvqN6cECHfKBZ";
$personal_api_key = '0d47jgbwur8wulhynwwbatb0giz9i66j';



$code = '';

if(isset($_GET['id_product'])){
  $id_product = $_GET['id_product'];
}


function write_file($filename,$content){

  try{

    $myfile = @fopen($filename, "w");
    ;
    fwrite($myfile, $content);
    fclose($myfile);
  }catch(Exception $e){
    // np
  }
}
function sanitize_for_filename($arg){
  $arg = preg_replace("[^\w\s\d\.\-_~,;:\[\]\(\]]", '', $arg);

  return $arg;
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


// -- start fake
if(  (isset($_GET['fake']) && $_GET['fake']=='on') && isset($_GET['code'])==false  ) {

  $path = $id_product.'.txt';

  if(file_exists($path)){

    $cont = file_get_contents($path,true);
  }

  echo $cont;

  die();
}else{
}
// -- end fake






$code = '';

if( isset( $_GET['code'] ) ) {

  $code = $_GET['code'];
  try {

    $code = $envato->getAccessToken( $_GET['code'] );
    // print_r( $code );

  } catch( \ErrorException $e ) {

    // echo $e->getMessage();

  }


  write_file("lastcode.txt",$code);


}else{

  $path = 'lastcode.txt';

  if(file_exists($path)) {

    $code = file_get_contents($path);

  }
}



$token = '';
if( isset( $_SESSION['envato_token'] ) ){
  // -- if we have token
  $token = $_SESSION['envato_token'];
  $envato->setAccessToken( $_SESSION['envato_token'] );


  $myfile = fopen("lasttoken.txt", "w") or die("Unable to open file!");
  $txt = $_SESSION['envato_token'];
  fwrite($myfile, $txt);
  fclose($myfile);


}else{


  $path = 'lasttoken.txt';

  if(file_exists($path)) {

    $file_cont = file_get_contents($path);

  }
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




$request = 'comments';


if(isset($_GET['request']) && $_GET['request']){

  $request = $_GET['request'];
}


if(isset($_GET['action']) && $_GET['action']=='show_files'){

  $dir    = '/tmp';
  $files1 = scandir($dir);
  print_rr($files1);
}



if($request!='version'){

  try {

    $logged = $envato->validToken();
    // print_r( $logged );

  } catch( \ErrorException $e ) {


    try {

      $code = $envato->getAccessToken( $code,'REFRESH' );
      // print_r( $code );

    } catch( \ErrorException $e2 ) {

      // echo $e->getMessage();
      echo '<a href="' . $envato->getAuthUrl() . '" class="btn btn-danger">Login to your Env account</a>';

    }




    try {

      $logged = $envato->validToken();
      // print_r( $logged );

    } catch( \ErrorException $e2 ) {

      echo 'User is not logged in. Failed with error: ' . $e2->getMessage();
      echo '<a href="' . $envato->getAuthUrl() . '" class="btn btn-danger">Login to your Env account</a>';

      // Don't need to echo error here. If $logged is defined, i means the access is granted.

    }


  }
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

  switch ($request){
    case "version":

      $req = 'v3/market/catalog/item-version?id='.$id_product;
      $resp = $envato->request( $req );

      if(isset($resp->Message) && $resp->Message=='User is not authorized to access this resource with an explicit deny'){

//        echo 'User is not logged in * unauthorized. Failed with error: ' . $e->getMessage();
        echo '<a href="' . $envato->getAuthUrl() . '" class="btn btn-danger"> User is not authorized to access this resource with an explicit deny . Login to your Env account</a>';
      }else{
        echo json_encode( $resp );



        write_file($req,json_encode( $resp ));

      }

      break;
    case "comments":

      $comments = $envato->request( 'v1/discovery/search/search/comment?item_id='.$id_product.'&page_size=3&sort_by=newest' );

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

      break;

    default:
      break;
  }

  $comments = $envato->request( 'v1/discovery/search/search/comment?item_id='.$id_product.'&page_size=3&sort_by=newest' );

  if($request=='version'){

  }
  if($request=='comments'){

  }

  // echo '<pre>';



  // print_rr($comments->Message);
  // print_rr( $comments );
  // echo '</pre>';

} catch( \ErrorException $e ) {
  echo $e->getMessage();
  echo '<a href="' . $envato->getAuthUrl() . '" class="btn btn-danger">Login to your Env account</a>';
}

