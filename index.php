<?php



$app_id = 'c9-test-1wvq8n7g';

$id_product = '157782';
$app_redirect = 'https://php-react-env-api-digitalzoomstudio-1.c9users.io/';
$app_redirect = 'https://php-env-support.herokuapp.com/api.php';
//$app_redirect = 'https://php-env-support.herokuapp.com/api.php';
$app_token = "16NE5cs5MFUx09VcdglIvqN6cECHfKBZ";
$personal_api_key = '0d47jgbwur8wulhynwwbatb0giz9i66j';




if(function_exists('print_rr')==false){
  function print_rr($arg){
  $fout = '';
  $fout.='<pre>';
  $fout.=print_r($arg,true);
  $fout.='</pre>';
  echo $fout;

  }
}

  /**
  *** Start session to store refresh token
  **/

  session_start();


  /**
  *** Function to save access token
  **/

  function saveAccessToken( $token ) {
    $_SESSION['envato_token'] = $token;
  }


  /**
  *** Initiate Envato API
  **/

  include 'vendor/autoload.php';
  // include 'config.php';

  $envato = new \Smafe\Envato( array(
    'api_id' => $app_id
  , 'api_secret' => $app_token
  , 'api_redirect' => $app_redirect
  ) );


  /**
  *** Set Access Token if it exists
  **/

  if( isset( $_SESSION['envato_token'] ) ){
    $envato->setAccessToken( $_SESSION['envato_token'] );
  }else{


    $envato->setAccessToken( $personal_api_key );
  }

  /**
  *** Logout user
  **/

  if( isset( $_GET['exit'] ) ) {
    session_destroy();
    $_SESSION['envato_token'] = NULL;
    header( 'Location: index.php', 0 );
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Envato PHP API library to easily connect and communicate with the Rest API.">
    <meta name="author" content="Smafe Web Solutions">

    <title>Smafe - Envato PHP API Library</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      body {
        font-size: 16px;
        line-height: 28px;
      }

      h3 {
        margin-top: 50px;
      }

      .container {
        max-width: 760px;
      }
    </style>
  </head>

  <body>

    <div class="container">

      <div class="page-header">
        <h1>Envato Support</h1>
        <p class="lead">Simple PHP library to connect and communicate with the Envato API.</p>
      </div>


      <?php if( isset( $_GET['code'] ) ): ?>
      <h3>User attempt to authorize account</h3>
      <p >A user is attempting to authorize his account. The result of this would be.</p>

      <pre><?php

        if( isset( $_GET['code'] ) ) {

          try {

            $code = $envato->getAccessToken( $_GET['code'] );
            print_r( $code );

          } catch( \ErrorException $e ) {

            echo $e->getMessage();

          }

        }

      ?></pre>
      <?php endif; ?>

      <h3>Is user logged in?</h3>
      <p>Check if a user is logged in or not</p>

      <pre><?php

        try {

          $logged = $envato->validToken();
          print_r( $logged );

        } catch( \ErrorException $e ) {

          echo 'User is not logged in. Failed with error: ' . $e->getMessage();
          // Don't need to echo error here. If $logged is defined, i means the access is granted.

        }

      ?></pre>

      <?php if( isset( $logged ) ): ?>
      <a href="index.php?exit=true">Logout</a>
      <?php endif; ?>

      <?php if( !isset( $logged ) ): ?>
      <h3>You are not logged in. Want to?</h3>
      <p>Login to your Envato account to view how full access looks like.</p>

      <?php

        if( !isset( $logged ) )
          echo '<a href="' . $envato->getAuthUrl() . '" class="btn btn-danger">Login to your Envato account</a>';

      ?>
      <?php endif; ?>



<?php
        // try {
        //     $purchase = $envato->request( 'v3/market/buyer/list-purchases' );
        // print_r( $purchase );

        // } catch( \ErrorException $e ) {
        //     echo $e->getMessage();
        //   }

                   try {
             $comments = $envato->request( 'v1/discovery/search/search/comment?item_id='.$id_product.'&page_size=2&sort_by=newest' );

            // echo '<pre>';
           print_rr( $comments );
            // echo '</pre>';

         } catch( \ErrorException $e ) {
            echo $e->getMessage();
           }


     ?>
      </div>

      <?php

      /*

      <h3>Single item</h3>
      <p>Print details for a single specific item</p>
      <br />

      <div>
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#single_markup" aria-controls="home" role="tab" data-toggle="tab">Markup</a></li>
          <li role="presentation"><a href="#single_result" aria-controls="profile" role="tab" data-toggle="tab">Result</a></li>
        </ul>

        <br />

        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="single_markup">
          <pre>$item = $envato->request( 'v3/market/catalog/item?id='.$id_product );
print_r( $item );
</pre>
          </div>

          <br />

          <div role="tabpanel" class="tab-pane" id="single_result">
            <pre><?php

              try {

                $item = $envato->request( 'v3/market/catalog/item?id='.$id_product );
                print_r( $item );

              } catch( \ErrorException $e ) {

                echo $e->getMessage();

              }

            ?></pre>
          </div>
        </div>
      </div>

      <div>



      */


      ?>

<!--      <h3>All users purchases</h3>-->
<!--      <p>View a complete list of all the users purchases.</p>-->
<!--      <br />-->

<!--      <div>-->
<!--        <ul class="nav nav-tabs" role="tablist">-->
<!--          <li role="presentation" class="active"><a href="#purchase_markup" aria-controls="home" role="tab" data-toggle="tab">Markup</a></li>-->
<!--          <li role="presentation"><a href="#purchase_result" aria-controls="profile" role="tab" data-toggle="tab">Result</a></li>-->
<!--        </ul>-->

<!--        <br />-->

<!--        <div class="tab-content">-->
<!--          <div role="tabpanel" class="tab-pane active" id="purchase_markup">-->
<!--          <pre>$purchase = $envato->request( 'v3/market/buyer/list-purchases' );-->
<!--print_r( $purchase );-->
<!--</pre>-->
<!--          </div>-->

<!--          <br />-->

<!--          <div role="tabpanel" class="tab-pane" id="purchase_result">-->
<!--            <pre>
     </pre>-->
<!--          </div>-->
<!--        </div>-->

<!--      </div>-->


      <br />
      <br />
      <br />



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      _paq.push(["setDomains", ["*.envato-api.demo.smafe.com"]]);
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//t.smafe.com/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 11]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="//t.smafe.com/piwik.php?idsite=11" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->

  </body>
</html>
