{"filter":false,"title":"api.php","tooltip":"/api.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":43,"column":15},"end":{"row":43,"column":16},"action":"insert","lines":[";"],"id":98}],[{"start":{"row":43,"column":16},"end":{"row":44,"column":0},"action":"insert","lines":["",""],"id":99},{"start":{"row":44,"column":0},"end":{"row":45,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":41,"column":0},"end":{"row":42,"column":48},"action":"remove","lines":["","$file_cont = file_get_contents('lasttoken.txt');"],"id":100}],[{"start":{"row":56,"column":2},"end":{"row":57,"column":48},"action":"insert","lines":["","$file_cont = file_get_contents('lasttoken.txt');"],"id":101}],[{"start":{"row":57,"column":48},"end":{"row":58,"column":57},"action":"insert","lines":["","    $envato->setAccessToken( $_SESSION['envato_token'] );"],"id":102}],[{"start":{"row":58,"column":28},"end":{"row":58,"column":54},"action":"remove","lines":[" $_SESSION['envato_token']"],"id":103},{"start":{"row":58,"column":28},"end":{"row":58,"column":38},"action":"insert","lines":["$file_cont"]}],[{"start":{"row":42,"column":0},"end":{"row":42,"column":3},"action":"insert","lines":["// "],"id":104}],[{"start":{"row":0,"column":0},"end":{"row":131,"column":11},"action":"remove","lines":["<?php","","","","$app_id = 'c9-test-1wvq8n7g';","$id_product = '157782';","$app_redirect = 'https://php-react-env-api-digitalzoomstudio-1.c9users.io/api.php';","$app_token = \"16NE5cs5MFUx09VcdglIvqN6cECHfKBZ\";","$personal_api_key = '0d47jgbwur8wulhynwwbatb0giz9i66j';","","","","","if(function_exists('print_rr')==false){","  function print_rr($arg){","  $fout = '';","  $fout.='<pre>';","  $fout.=print_r($arg,true);","  $fout.='</pre>';","  echo $fout;","  ","  }","}","","  session_start();","","  function saveAccessToken( $token ) {","    $_SESSION['envato_token'] = $token;","  }","","","  include 'vendor/autoload.php';","  // include 'config.php';","","  $envato = new \\Smafe\\Envato( array(","    'api_id' => $app_id","  , 'api_secret' => $app_token","  , 'api_redirect' => $app_redirect","  ) );","","","","// echo $file_cont;","","","  if( isset( $_SESSION['envato_token'] ) ){","    $envato->setAccessToken( $_SESSION['envato_token'] );","    ","    ","$myfile = fopen(\"lasttoken.txt\", \"w\") or die(\"Unable to open file!\");","$txt = $_SESSION['envato_token'];","fwrite($myfile, $txt);","fclose($myfile);","","","}else{","  ","$file_cont = file_get_contents('lasttoken.txt');","    $envato->setAccessToken($file_cont );","}","","// -- log out","","  if( isset( $_GET['exit'] ) ) {","    session_destroy();","    $_SESSION['envato_token'] = NULL;","    header( 'Location: index.php', 0 );","    exit(); ","  }","","","        if( isset( $_GET['code'] ) ) {","","          try {","","            $code = $envato->getAccessToken( $_GET['code'] );","            // print_r( $code );","","          } catch( \\ErrorException $e ) {","","            // echo $e->getMessage();","","          }","","        } ","        ","      ","      ","","        try {","","          $logged = $envato->validToken();","          // print_r( $logged );","","        } catch( \\ErrorException $e ) {","","          echo 'User is not logged in. Failed with error: ' . $e->getMessage();","          // Don't need to echo error here. If $logged is defined, i means the access is granted.","","        }",""," if( isset( $logged ) ){","      ","      // echo 'logged';","      ","      }","      ","      ","      if( !isset( $logged ) ){","      // echo ' not logged' ; ","}","","","        if( !isset( $logged ) ){","          echo '<a href=\"' . $envato->getAuthUrl() . '\" class=\"btn btn-danger\">Login to your Envato account</a>';","}","","","","                  ","                   try {","             $comments = $envato->request( 'v1/discovery/search/search/comment?item_id='.$id_product.'&page_size=2&sort_by=newest' );","             ","            // echo '<pre>';","           echo json_encode( $comments );","          // print_rr( $comments );","            // echo '</pre>';","","         } catch( \\ErrorException $e ) {","            echo $e->getMessage();","           }","           "],"id":105}],[{"start":{"row":0,"column":0},"end":{"row":132,"column":0},"action":"insert","lines":["<?php","","","","$app_id = 'c9-test-1wvq8n7g';","$id_product = '157782';","$app_redirect = 'https://php-react-env-api-digitalzoomstudio-1.c9users.io/api.php';","$app_token = \"16NE5cs5MFUx09VcdglIvqN6cECHfKBZ\";","$personal_api_key = '0d47jgbwur8wulhynwwbatb0giz9i66j';","","","","","if(function_exists('print_rr')==false){","    function print_rr($arg){","        $fout = '';","        $fout.='<pre>';","        $fout.=print_r($arg,true);","        $fout.='</pre>';","        echo $fout;","","    }","}","","session_start();","","function saveAccessToken( $token ) {","    $_SESSION['envato_token'] = $token;","}","","","include 'vendor/autoload.php';","// include 'config.php';","","$envato = new \\Smafe\\Envato( array(","    'api_id' => $app_id",", 'api_secret' => $app_token",", 'api_redirect' => $app_redirect",") );","","","","// echo $file_cont;","","","if( isset( $_SESSION['envato_token'] ) ){","    $envato->setAccessToken( $_SESSION['envato_token'] );","","","    $myfile = fopen(\"lasttoken.txt\", \"w\") or die(\"Unable to open file!\");","    $txt = $_SESSION['envato_token'];","    fwrite($myfile, $txt);","    fclose($myfile);","","","}else{","","    $file_cont = file_get_contents('lasttoken.txt');","    $envato->setAccessToken($file_cont );","}","","// -- log out","","if( isset( $_GET['exit'] ) ) {","    session_destroy();","    $_SESSION['envato_token'] = NULL;","    header( 'Location: index.php', 0 );","    exit();","}","","","if( isset( $_GET['code'] ) ) {","","    try {","","        $code = $envato->getAccessToken( $_GET['code'] );","        // print_r( $code );","","    } catch( \\ErrorException $e ) {","","        // echo $e->getMessage();","","    }","","}","","","","","try {","","    $logged = $envato->validToken();","    // print_r( $logged );","","} catch( \\ErrorException $e ) {","","    echo 'User is not logged in. Failed with error: ' . $e->getMessage();","    // Don't need to echo error here. If $logged is defined, i means the access is granted.","","}","","if( isset( $logged ) ){","","    // echo 'logged';","","}","","","if( !isset( $logged ) ){","    // echo ' not logged' ;","}","","","if( !isset( $logged ) ){","    echo '<a href=\"' . $envato->getAuthUrl() . '\" class=\"btn btn-danger\">Login to your Envato account</a>';","}","","","","","try {","    $comments = $envato->request( 'v1/discovery/search/search/comment?item_id='.$id_product.'&page_size=2&sort_by=newest' );","","    // echo '<pre>';","    echo json_encode( $comments );","    // print_rr( $comments );","    // echo '</pre>';","","} catch( \\ErrorException $e ) {","    echo $e->getMessage();","}","           ",""],"id":106}],[{"start":{"row":123,"column":20},"end":{"row":124,"column":0},"action":"insert","lines":["",""],"id":107},{"start":{"row":124,"column":0},"end":{"row":124,"column":4},"action":"insert","lines":["    "]},{"start":{"row":124,"column":4},"end":{"row":124,"column":5},"action":"insert","lines":["p"]},{"start":{"row":124,"column":5},"end":{"row":124,"column":6},"action":"insert","lines":["r"]},{"start":{"row":124,"column":6},"end":{"row":124,"column":7},"action":"insert","lines":["i"]},{"start":{"row":124,"column":7},"end":{"row":124,"column":8},"action":"insert","lines":["n"]},{"start":{"row":124,"column":8},"end":{"row":124,"column":9},"action":"insert","lines":["t"]},{"start":{"row":124,"column":9},"end":{"row":124,"column":10},"action":"insert","lines":["_"]},{"start":{"row":124,"column":10},"end":{"row":124,"column":11},"action":"insert","lines":["r"]},{"start":{"row":124,"column":11},"end":{"row":124,"column":12},"action":"insert","lines":["r"]}],[{"start":{"row":124,"column":12},"end":{"row":124,"column":14},"action":"insert","lines":["()"],"id":108}],[{"start":{"row":124,"column":13},"end":{"row":124,"column":22},"action":"insert","lines":["$comments"],"id":109}],[{"start":{"row":124,"column":23},"end":{"row":124,"column":24},"action":"insert","lines":[";"],"id":110}],[{"start":{"row":124,"column":22},"end":{"row":124,"column":23},"action":"insert","lines":["-"],"id":111},{"start":{"row":124,"column":23},"end":{"row":124,"column":24},"action":"insert","lines":[">"]},{"start":{"row":124,"column":24},"end":{"row":124,"column":25},"action":"insert","lines":["M"]},{"start":{"row":124,"column":25},"end":{"row":124,"column":26},"action":"insert","lines":["e"]},{"start":{"row":124,"column":26},"end":{"row":124,"column":27},"action":"insert","lines":["s"]},{"start":{"row":124,"column":27},"end":{"row":124,"column":28},"action":"insert","lines":["s"]},{"start":{"row":124,"column":28},"end":{"row":124,"column":29},"action":"insert","lines":["a"]},{"start":{"row":124,"column":29},"end":{"row":124,"column":30},"action":"insert","lines":["g"]},{"start":{"row":124,"column":30},"end":{"row":124,"column":31},"action":"insert","lines":["e"]}],[{"start":{"row":123,"column":20},"end":{"row":124,"column":0},"action":"insert","lines":["",""],"id":112},{"start":{"row":124,"column":0},"end":{"row":124,"column":4},"action":"insert","lines":["    "]},{"start":{"row":124,"column":4},"end":{"row":125,"column":0},"action":"insert","lines":["",""]},{"start":{"row":125,"column":0},"end":{"row":125,"column":4},"action":"insert","lines":["    "]},{"start":{"row":125,"column":4},"end":{"row":125,"column":5},"action":"insert","lines":["$"]},{"start":{"row":125,"column":5},"end":{"row":125,"column":6},"action":"insert","lines":["m"]},{"start":{"row":125,"column":6},"end":{"row":125,"column":7},"action":"insert","lines":["e"]},{"start":{"row":125,"column":7},"end":{"row":125,"column":8},"action":"insert","lines":["s"]},{"start":{"row":125,"column":8},"end":{"row":125,"column":9},"action":"insert","lines":["s"]},{"start":{"row":125,"column":9},"end":{"row":125,"column":10},"action":"insert","lines":["a"]},{"start":{"row":125,"column":10},"end":{"row":125,"column":11},"action":"insert","lines":["g"]},{"start":{"row":125,"column":11},"end":{"row":125,"column":12},"action":"insert","lines":["e"]}],[{"start":{"row":125,"column":12},"end":{"row":125,"column":13},"action":"insert","lines":[" "],"id":113},{"start":{"row":125,"column":13},"end":{"row":125,"column":14},"action":"insert","lines":["="]}],[{"start":{"row":125,"column":14},"end":{"row":125,"column":15},"action":"insert","lines":[" "],"id":114},{"start":{"row":125,"column":15},"end":{"row":126,"column":0},"action":"insert","lines":["",""]},{"start":{"row":126,"column":0},"end":{"row":126,"column":4},"action":"insert","lines":["    "]},{"start":{"row":126,"column":4},"end":{"row":127,"column":0},"action":"insert","lines":["",""]},{"start":{"row":127,"column":0},"end":{"row":127,"column":4},"action":"insert","lines":["    "]},{"start":{"row":127,"column":4},"end":{"row":127,"column":5},"action":"insert","lines":["i"]},{"start":{"row":127,"column":5},"end":{"row":127,"column":6},"action":"insert","lines":["f"]}],[{"start":{"row":127,"column":6},"end":{"row":127,"column":8},"action":"insert","lines":["()"],"id":115}],[{"start":{"row":127,"column":7},"end":{"row":127,"column":8},"action":"insert","lines":["s"],"id":116},{"start":{"row":127,"column":8},"end":{"row":127,"column":9},"action":"insert","lines":["t"]},{"start":{"row":127,"column":9},"end":{"row":127,"column":10},"action":"insert","lines":["r"]},{"start":{"row":127,"column":10},"end":{"row":127,"column":11},"action":"insert","lines":["p"]},{"start":{"row":127,"column":11},"end":{"row":127,"column":12},"action":"insert","lines":["o"]},{"start":{"row":127,"column":12},"end":{"row":127,"column":13},"action":"insert","lines":["s"]}],[{"start":{"row":127,"column":13},"end":{"row":127,"column":15},"action":"insert","lines":["()"],"id":117}],[{"start":{"row":127,"column":14},"end":{"row":127,"column":15},"action":"insert","lines":["$"],"id":118},{"start":{"row":127,"column":15},"end":{"row":127,"column":16},"action":"insert","lines":["m"]},{"start":{"row":127,"column":16},"end":{"row":127,"column":17},"action":"insert","lines":["e"]},{"start":{"row":127,"column":17},"end":{"row":127,"column":18},"action":"insert","lines":["s"]}],[{"start":{"row":127,"column":14},"end":{"row":127,"column":18},"action":"remove","lines":["$mes"],"id":119},{"start":{"row":127,"column":14},"end":{"row":127,"column":22},"action":"insert","lines":["$message"]}],[{"start":{"row":127,"column":22},"end":{"row":127,"column":23},"action":"insert","lines":[","],"id":120}],[{"start":{"row":127,"column":23},"end":{"row":127,"column":25},"action":"insert","lines":["''"],"id":121}],[{"start":{"row":127,"column":24},"end":{"row":127,"column":46},"action":"insert","lines":["User is not authorized"],"id":122}],[{"start":{"row":127,"column":48},"end":{"row":127,"column":49},"action":"insert","lines":["!"],"id":123},{"start":{"row":127,"column":49},"end":{"row":127,"column":50},"action":"insert","lines":["="]},{"start":{"row":127,"column":50},"end":{"row":127,"column":51},"action":"insert","lines":["="]},{"start":{"row":127,"column":51},"end":{"row":127,"column":52},"action":"insert","lines":["f"]},{"start":{"row":127,"column":52},"end":{"row":127,"column":53},"action":"insert","lines":["a"]},{"start":{"row":127,"column":53},"end":{"row":127,"column":54},"action":"insert","lines":["l"]},{"start":{"row":127,"column":54},"end":{"row":127,"column":55},"action":"insert","lines":["s"]},{"start":{"row":127,"column":55},"end":{"row":127,"column":56},"action":"insert","lines":["e"]}],[{"start":{"row":127,"column":57},"end":{"row":127,"column":58},"action":"insert","lines":["{"],"id":124}],[{"start":{"row":127,"column":58},"end":{"row":129,"column":5},"action":"insert","lines":["","      ","    }"],"id":125}],[{"start":{"row":130,"column":4},"end":{"row":130,"column":7},"action":"insert","lines":["// "],"id":126}],[{"start":{"row":129,"column":5},"end":{"row":129,"column":6},"action":"insert","lines":["e"],"id":127},{"start":{"row":129,"column":6},"end":{"row":129,"column":7},"action":"insert","lines":["l"]},{"start":{"row":129,"column":7},"end":{"row":129,"column":8},"action":"insert","lines":["s"]},{"start":{"row":129,"column":8},"end":{"row":129,"column":9},"action":"insert","lines":["e"]},{"start":{"row":129,"column":9},"end":{"row":129,"column":10},"action":"insert","lines":["{"]}],[{"start":{"row":129,"column":10},"end":{"row":131,"column":5},"action":"insert","lines":["","      ","    }"],"id":128}],[{"start":{"row":132,"column":36},"end":{"row":133,"column":34},"action":"remove","lines":["","    echo json_encode( $comments );"],"id":129}],[{"start":{"row":130,"column":6},"end":{"row":131,"column":34},"action":"insert","lines":["","    echo json_encode( $comments );"],"id":130}],[{"start":{"row":125,"column":15},"end":{"row":125,"column":16},"action":"insert","lines":["$"],"id":131},{"start":{"row":125,"column":16},"end":{"row":125,"column":17},"action":"insert","lines":["c"]},{"start":{"row":125,"column":17},"end":{"row":125,"column":18},"action":"insert","lines":["o"]},{"start":{"row":125,"column":18},"end":{"row":125,"column":19},"action":"insert","lines":["m"]},{"start":{"row":125,"column":19},"end":{"row":125,"column":20},"action":"insert","lines":["m"]}],[{"start":{"row":125,"column":19},"end":{"row":125,"column":20},"action":"remove","lines":["m"],"id":132},{"start":{"row":125,"column":18},"end":{"row":125,"column":19},"action":"remove","lines":["m"]}],[{"start":{"row":125,"column":18},"end":{"row":125,"column":19},"action":"insert","lines":["m"],"id":133},{"start":{"row":125,"column":19},"end":{"row":125,"column":20},"action":"insert","lines":["m"]},{"start":{"row":125,"column":20},"end":{"row":125,"column":21},"action":"insert","lines":["e"]},{"start":{"row":125,"column":21},"end":{"row":125,"column":22},"action":"insert","lines":["n"]},{"start":{"row":125,"column":22},"end":{"row":125,"column":23},"action":"insert","lines":["t"]},{"start":{"row":125,"column":23},"end":{"row":125,"column":24},"action":"insert","lines":["s"]},{"start":{"row":125,"column":24},"end":{"row":125,"column":25},"action":"insert","lines":["-"]},{"start":{"row":125,"column":25},"end":{"row":125,"column":26},"action":"insert","lines":[">"]},{"start":{"row":125,"column":26},"end":{"row":125,"column":27},"action":"insert","lines":["m"]},{"start":{"row":125,"column":27},"end":{"row":125,"column":28},"action":"insert","lines":["e"]}],[{"start":{"row":125,"column":27},"end":{"row":125,"column":28},"action":"remove","lines":["e"],"id":134},{"start":{"row":125,"column":26},"end":{"row":125,"column":27},"action":"remove","lines":["m"]}],[{"start":{"row":125,"column":26},"end":{"row":125,"column":27},"action":"insert","lines":["M"],"id":135},{"start":{"row":125,"column":27},"end":{"row":125,"column":28},"action":"insert","lines":["e"]},{"start":{"row":125,"column":28},"end":{"row":125,"column":29},"action":"insert","lines":["s"]}],[{"start":{"row":125,"column":26},"end":{"row":125,"column":29},"action":"remove","lines":["Mes"],"id":136},{"start":{"row":125,"column":26},"end":{"row":125,"column":33},"action":"insert","lines":["Message"]}],[{"start":{"row":125,"column":33},"end":{"row":125,"column":34},"action":"insert","lines":[";"],"id":137}],[{"start":{"row":2,"column":0},"end":{"row":2,"column":1},"action":"insert","lines":["e"],"id":138},{"start":{"row":2,"column":1},"end":{"row":2,"column":2},"action":"insert","lines":["r"]},{"start":{"row":2,"column":2},"end":{"row":2,"column":3},"action":"insert","lines":["r"]},{"start":{"row":2,"column":3},"end":{"row":2,"column":4},"action":"insert","lines":["o"]},{"start":{"row":2,"column":4},"end":{"row":2,"column":5},"action":"insert","lines":["r"]},{"start":{"row":2,"column":5},"end":{"row":2,"column":6},"action":"insert","lines":["_"]},{"start":{"row":2,"column":6},"end":{"row":2,"column":7},"action":"insert","lines":["r"]},{"start":{"row":2,"column":7},"end":{"row":2,"column":8},"action":"insert","lines":["e"]},{"start":{"row":2,"column":8},"end":{"row":2,"column":9},"action":"insert","lines":["p"]},{"start":{"row":2,"column":9},"end":{"row":2,"column":10},"action":"insert","lines":["o"]},{"start":{"row":2,"column":10},"end":{"row":2,"column":11},"action":"insert","lines":["r"]},{"start":{"row":2,"column":11},"end":{"row":2,"column":12},"action":"insert","lines":["t"]},{"start":{"row":2,"column":12},"end":{"row":2,"column":13},"action":"insert","lines":["i"]},{"start":{"row":2,"column":13},"end":{"row":2,"column":14},"action":"insert","lines":["n"]},{"start":{"row":2,"column":14},"end":{"row":2,"column":15},"action":"insert","lines":["g"]}],[{"start":{"row":2,"column":15},"end":{"row":2,"column":17},"action":"insert","lines":["()"],"id":139}],[{"start":{"row":2,"column":16},"end":{"row":2,"column":17},"action":"insert","lines":["E"],"id":140},{"start":{"row":2,"column":17},"end":{"row":2,"column":18},"action":"insert","lines":["_"]},{"start":{"row":2,"column":18},"end":{"row":2,"column":19},"action":"insert","lines":["A"]},{"start":{"row":2,"column":19},"end":{"row":2,"column":20},"action":"insert","lines":["L"]},{"start":{"row":2,"column":20},"end":{"row":2,"column":21},"action":"insert","lines":["L"]}],[{"start":{"row":2,"column":22},"end":{"row":2,"column":23},"action":"insert","lines":[";"],"id":141}],[{"start":{"row":2,"column":23},"end":{"row":4,"column":29},"action":"insert","lines":["","ini_set('display_startup_errors', 1);","ini_set('display_errors', 1);"],"id":142}],[{"start":{"row":4,"column":29},"end":{"row":5,"column":0},"action":"insert","lines":["",""],"id":143},{"start":{"row":5,"column":0},"end":{"row":6,"column":0},"action":"insert","lines":["",""]},{"start":{"row":6,"column":0},"end":{"row":6,"column":1},"action":"insert","lines":["e"]},{"start":{"row":6,"column":1},"end":{"row":6,"column":2},"action":"insert","lines":["c"]},{"start":{"row":6,"column":2},"end":{"row":6,"column":3},"action":"insert","lines":["h"]},{"start":{"row":6,"column":3},"end":{"row":6,"column":4},"action":"insert","lines":["o"]}],[{"start":{"row":6,"column":4},"end":{"row":6,"column":5},"action":"insert","lines":[" "],"id":144}],[{"start":{"row":6,"column":5},"end":{"row":6,"column":7},"action":"insert","lines":["''"],"id":145}],[{"start":{"row":6,"column":6},"end":{"row":6,"column":7},"action":"insert","lines":["c"],"id":146},{"start":{"row":6,"column":7},"end":{"row":6,"column":8},"action":"insert","lines":["e"]},{"start":{"row":6,"column":8},"end":{"row":6,"column":9},"action":"insert","lines":["e"]},{"start":{"row":6,"column":9},"end":{"row":6,"column":10},"action":"insert","lines":["v"]},{"start":{"row":6,"column":10},"end":{"row":6,"column":11},"action":"insert","lines":["a"]}],[{"start":{"row":6,"column":12},"end":{"row":6,"column":13},"action":"insert","lines":[";"],"id":147}],[{"start":{"row":5,"column":0},"end":{"row":6,"column":13},"action":"remove","lines":["","echo 'ceeva';"],"id":148}],[{"start":{"row":63,"column":0},"end":{"row":64,"column":13},"action":"insert","lines":["","echo 'ceeva';"],"id":149}],[{"start":{"row":63,"column":0},"end":{"row":64,"column":13},"action":"remove","lines":["","echo 'ceeva';"],"id":150}],[{"start":{"row":122,"column":0},"end":{"row":123,"column":13},"action":"insert","lines":["","echo 'ceeva';"],"id":151}],[{"start":{"row":135,"column":4},"end":{"row":135,"column":6},"action":"insert","lines":["  "],"id":152}],[{"start":{"row":123,"column":0},"end":{"row":123,"column":1},"action":"insert","lines":["/"],"id":153},{"start":{"row":123,"column":1},"end":{"row":123,"column":2},"action":"insert","lines":["/"]}],[{"start":{"row":116,"column":24},"end":{"row":117,"column":107},"action":"remove","lines":["","    echo '<a href=\"' . $envato->getAuthUrl() . '\" class=\"btn btn-danger\">Login to your Envato account</a>';"],"id":154}],[{"start":{"row":131,"column":6},"end":{"row":132,"column":107},"action":"insert","lines":["","    echo '<a href=\"' . $envato->getAuthUrl() . '\" class=\"btn btn-danger\">Login to your Envato account</a>';"],"id":155}],[{"start":{"row":132,"column":87},"end":{"row":132,"column":93},"action":"remove","lines":["Envato"],"id":156},{"start":{"row":132,"column":87},"end":{"row":132,"column":88},"action":"insert","lines":["E"]},{"start":{"row":132,"column":88},"end":{"row":132,"column":89},"action":"insert","lines":["n"]},{"start":{"row":132,"column":89},"end":{"row":132,"column":90},"action":"insert","lines":["v"]}],[{"start":{"row":127,"column":4},"end":{"row":128,"column":0},"action":"insert","lines":["",""],"id":157},{"start":{"row":128,"column":0},"end":{"row":128,"column":4},"action":"insert","lines":["    "]},{"start":{"row":128,"column":4},"end":{"row":128,"column":5},"action":"insert","lines":["i"]},{"start":{"row":128,"column":5},"end":{"row":128,"column":6},"action":"insert","lines":["f"]}],[{"start":{"row":128,"column":6},"end":{"row":128,"column":8},"action":"insert","lines":["()"],"id":158}],[{"start":{"row":128,"column":7},"end":{"row":128,"column":8},"action":"insert","lines":["i"],"id":159},{"start":{"row":128,"column":8},"end":{"row":128,"column":9},"action":"insert","lines":["s"]},{"start":{"row":128,"column":9},"end":{"row":128,"column":10},"action":"insert","lines":["s"]},{"start":{"row":128,"column":10},"end":{"row":128,"column":11},"action":"insert","lines":["e"]},{"start":{"row":128,"column":11},"end":{"row":128,"column":12},"action":"insert","lines":["t"]}],[{"start":{"row":128,"column":12},"end":{"row":128,"column":14},"action":"insert","lines":["()"],"id":160}],[{"start":{"row":128,"column":13},"end":{"row":128,"column":31},"action":"insert","lines":["$comments->Message"],"id":161}],[{"start":{"row":128,"column":33},"end":{"row":128,"column":34},"action":"insert","lines":["{"],"id":162}],[{"start":{"row":128,"column":34},"end":{"row":130,"column":5},"action":"insert","lines":["","      ","    }"],"id":163}],[{"start":{"row":130,"column":5},"end":{"row":131,"column":34},"action":"remove","lines":["","    $message = $comments->Message;"],"id":164}],[{"start":{"row":129,"column":6},"end":{"row":130,"column":34},"action":"insert","lines":["","    $message = $comments->Message;"],"id":165}],[{"start":{"row":133,"column":7},"end":{"row":133,"column":32},"action":"insert","lines":["isset($comments->Message)"],"id":166}],[{"start":{"row":133,"column":32},"end":{"row":133,"column":33},"action":"insert","lines":[" "],"id":167},{"start":{"row":133,"column":33},"end":{"row":133,"column":34},"action":"insert","lines":["&"]},{"start":{"row":133,"column":34},"end":{"row":133,"column":35},"action":"insert","lines":["&"]}],[{"start":{"row":133,"column":35},"end":{"row":133,"column":36},"action":"insert","lines":[" "],"id":168}],[{"start":{"row":128,"column":34},"end":{"row":129,"column":6},"action":"remove","lines":["","      "],"id":169}],[{"start":{"row":14,"column":0},"end":{"row":15,"column":0},"action":"insert","lines":["",""],"id":170},{"start":{"row":15,"column":0},"end":{"row":16,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":15,"column":0},"end":{"row":15,"column":1},"action":"insert","lines":["i"],"id":171},{"start":{"row":15,"column":1},"end":{"row":15,"column":2},"action":"insert","lines":["f"]}],[{"start":{"row":15,"column":2},"end":{"row":15,"column":4},"action":"insert","lines":["()"],"id":172}],[{"start":{"row":15,"column":3},"end":{"row":15,"column":4},"action":"insert","lines":["$"],"id":173},{"start":{"row":15,"column":4},"end":{"row":15,"column":5},"action":"insert","lines":["_"]}],[{"start":{"row":15,"column":4},"end":{"row":15,"column":5},"action":"remove","lines":["_"],"id":174},{"start":{"row":15,"column":3},"end":{"row":15,"column":4},"action":"remove","lines":["$"]}],[{"start":{"row":15,"column":3},"end":{"row":15,"column":4},"action":"insert","lines":["i"],"id":175},{"start":{"row":15,"column":4},"end":{"row":15,"column":5},"action":"insert","lines":["s"]},{"start":{"row":15,"column":5},"end":{"row":15,"column":6},"action":"insert","lines":["s"]},{"start":{"row":15,"column":6},"end":{"row":15,"column":7},"action":"insert","lines":["e"]},{"start":{"row":15,"column":7},"end":{"row":15,"column":8},"action":"insert","lines":["t"]}],[{"start":{"row":15,"column":8},"end":{"row":15,"column":10},"action":"insert","lines":["()"],"id":176}],[{"start":{"row":15,"column":9},"end":{"row":15,"column":10},"action":"insert","lines":["$"],"id":177},{"start":{"row":15,"column":10},"end":{"row":15,"column":11},"action":"insert","lines":["_"]},{"start":{"row":15,"column":11},"end":{"row":15,"column":12},"action":"insert","lines":["G"]},{"start":{"row":15,"column":12},"end":{"row":15,"column":13},"action":"insert","lines":["E"]},{"start":{"row":15,"column":13},"end":{"row":15,"column":14},"action":"insert","lines":["T"]}],[{"start":{"row":15,"column":14},"end":{"row":15,"column":16},"action":"insert","lines":["[]"],"id":178}],[{"start":{"row":15,"column":15},"end":{"row":15,"column":17},"action":"insert","lines":["''"],"id":179}],[{"start":{"row":15,"column":16},"end":{"row":15,"column":17},"action":"insert","lines":["i"],"id":180},{"start":{"row":15,"column":17},"end":{"row":15,"column":18},"action":"insert","lines":["d"]}],[{"start":{"row":15,"column":18},"end":{"row":15,"column":19},"action":"insert","lines":["_"],"id":181},{"start":{"row":15,"column":19},"end":{"row":15,"column":20},"action":"insert","lines":["_"]}],[{"start":{"row":15,"column":19},"end":{"row":15,"column":20},"action":"remove","lines":["_"],"id":182}],[{"start":{"row":15,"column":19},"end":{"row":15,"column":20},"action":"insert","lines":["p"],"id":183},{"start":{"row":15,"column":20},"end":{"row":15,"column":21},"action":"insert","lines":["r"]},{"start":{"row":15,"column":21},"end":{"row":15,"column":22},"action":"insert","lines":["o"]},{"start":{"row":15,"column":22},"end":{"row":15,"column":23},"action":"insert","lines":["d"]},{"start":{"row":15,"column":23},"end":{"row":15,"column":24},"action":"insert","lines":["u"]},{"start":{"row":15,"column":24},"end":{"row":15,"column":25},"action":"insert","lines":["c"]},{"start":{"row":15,"column":25},"end":{"row":15,"column":26},"action":"insert","lines":["t"]}],[{"start":{"row":15,"column":27},"end":{"row":15,"column":28},"action":"insert","lines":["]"],"id":184}],[{"start":{"row":15,"column":27},"end":{"row":15,"column":28},"action":"remove","lines":["]"],"id":185}],[{"start":{"row":15,"column":30},"end":{"row":15,"column":31},"action":"insert","lines":["{"],"id":186}],[{"start":{"row":15,"column":31},"end":{"row":17,"column":1},"action":"insert","lines":["","    ","}"],"id":187}],[{"start":{"row":16,"column":4},"end":{"row":16,"column":5},"action":"insert","lines":["$"],"id":188},{"start":{"row":16,"column":5},"end":{"row":16,"column":6},"action":"insert","lines":["i"]},{"start":{"row":16,"column":6},"end":{"row":16,"column":7},"action":"insert","lines":["d"]}],[{"start":{"row":16,"column":7},"end":{"row":16,"column":8},"action":"insert","lines":[" "],"id":189},{"start":{"row":16,"column":8},"end":{"row":16,"column":9},"action":"insert","lines":["="]}],[{"start":{"row":16,"column":9},"end":{"row":16,"column":10},"action":"insert","lines":[" "],"id":190}],[{"start":{"row":16,"column":9},"end":{"row":16,"column":10},"action":"remove","lines":[" "],"id":191},{"start":{"row":16,"column":8},"end":{"row":16,"column":9},"action":"remove","lines":["="]},{"start":{"row":16,"column":7},"end":{"row":16,"column":8},"action":"remove","lines":[" "]}],[{"start":{"row":16,"column":7},"end":{"row":16,"column":8},"action":"insert","lines":["_"],"id":192}],[{"start":{"row":16,"column":4},"end":{"row":16,"column":8},"action":"remove","lines":["$id_"],"id":193},{"start":{"row":16,"column":4},"end":{"row":16,"column":15},"action":"insert","lines":["$id_product"]}],[{"start":{"row":16,"column":15},"end":{"row":16,"column":16},"action":"insert","lines":[" "],"id":194}],[{"start":{"row":16,"column":16},"end":{"row":16,"column":17},"action":"insert","lines":["="],"id":195}],[{"start":{"row":16,"column":17},"end":{"row":16,"column":18},"action":"insert","lines":[" "],"id":196}],[{"start":{"row":16,"column":18},"end":{"row":16,"column":37},"action":"insert","lines":["$_GET['id_product']"],"id":197}],[{"start":{"row":16,"column":37},"end":{"row":16,"column":38},"action":"insert","lines":[";"],"id":198}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":19,"column":0},"end":{"row":19,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":68,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1536219125096,"hash":"c671bf11cb9c4bf46afaf57f5722b54923e8dc15"}