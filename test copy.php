<?php

if(isset($_POST["curlData"])){
    
    $_POST["curlData"]=preg_replace("/mfa_token\=(.*)\-\-(.*)\'/m", "mfa_token=$1<dashdash>$2", $_POST["curlData"]);
    //var_dump($_POST["curlData"]);
    //$curlArray["data"]=str_replace("--", "<dashdash>", $curlArray["data"])
    $curlArray = curlToPhp($_POST["curlData"]);
    //str_replace("search", replace, $curlArray["data"])
//var_dump( str_contains($curlArray["data"],'mfa_token'));

//var_dump(isset("mfa_token",$curlArray["data"]));
    
    echo sendCurl($curlArray);
}


function curlToPhp($curlCode) {
    $allCurlCommands = array();
    $buffer = str_replace(array("\r", "\n", "  ", " \\"), '', $curlCode);
    $parts = explode('--', $buffer);
    
    foreach($parts as $p) {
        $lines = preg_split('/\s/', $p, 2);
        array_push($allCurlCommands,$lines);

    }

    foreach($allCurlCommands as $acc) {

        if($acc[0]!=strtolower("location") && $acc[0]!=strtolower("data-urlencode"))
        {

            $acc[1]=str_replace(array("'", "\\", " "), '', trim($acc[1]));
            $acc[1]=explode(":",$acc[1]);
        }
    }

    $finalCurlCommands = array();
    $finalCurlCommands["headers"] = array();
    $finalCurlCommands["data"] = array();
    foreach($allCurlCommands as $acc) {
        //var_dump($acc[0]);
        $acc[0]=trim($acc[0], "'");
        $acc[1]=trim($acc[1], "'");
        switch ($acc[0]) {
            case "location":
                $finalCurlCommands["location"]=$acc[1];
                break;
            case "header":
                array_push($finalCurlCommands["headers"],$acc[1]);
                break;
            case "data-urlencode":
                $split = explode("=",$acc[1]);
                array_push($finalCurlCommands["data"],str_replace("<dashdash>","--",$acc[1]));
                break;
            case "data-raw":
                $split = explode("=",$acc[1]);
                array_push($finalCurlCommands["data"],str_replace("<dashdash>","--",$acc[1]));
                break;
            case "data":
                $split = explode("=",$acc[1]);
                array_push($finalCurlCommands["data"],str_replace("<dashdash>","--",$acc[1]));
                break;
        }

    }
    $finalCurlCommands["data"]=implode("&",$finalCurlCommands["data"]);

    return $finalCurlCommands;
}

function sendCurl($curlArray) {

    $url = $curlArray["location"];
    $url = str_replace("&amp;","&",$url);

    if(!preg_match('/\.auth0app\.com/', $url) && !preg_match('/https\:\/\/auth.kausti\.com/', $url) && !preg_match('/http\:\/\/localhost\/auth0api/', $url)) {

        echo json_encode("[PHP backend test.php] Incorrect API url ".$url);

    }

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = $curlArray["headers"];

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $requestType = "GET";
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    if(isset($_POST["requestType"])) {
        $requestType = $_POST["requestType"];
    }

    if($requestType == "POST") {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POST, true);
        $data = $curlArray["data"];
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    else if($requestType == "PUT") {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        $data = $curlArray["data"][0]; //weird? might break put?
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    else if($requestType == "PATCH") {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($curl, CURLOPT_POST, true);
        $data = $curlArray["data"]; //weird?
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
    }
    else if($requestType == "GET") {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        
    }
    else if($requestType == "DELETE") {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        
    }
    else {
        echo "Error from Kaustinen backend, bad requesttype";
        exit();
    }

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLINFO_HEADER_OUT, false);
    /*
    var_dump("URL: ".$url);
    var_dump("Request Type:: ".$requestType);
    var_dump("Headers: ");
    var_dump($headers);
    var_dump("Data: ".$data);
*/
    $resp = curl_exec($curl);

    curl_close($curl);

    /*if(curl_getinfo($curl, CURLINFO_CONTENT_TYPE)=="application/pdf") {
      $pdfPath="pdf/";
      $pdfFilename='cancellation.pdf';
      file_put_contents($pdfPath.$pdfFilename, $resp);
      $resp = array("Status" => "Downloaded","PDF path" => $_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/".$pdfPath.$pdfFilename);
      $resp = json_encode($resp);
    }*/

    return $resp;

}

function dbg_curl_data($curl, $data=null) {
  static $buffer = '';

  if ( is_null($curl) ) {
    $r = $buffer;
    $buffer = '';
    return $r;
  }
  else {
    $buffer .= $data;
    return strlen($data);
  }
}

function url_escape($string) {
    return str_replace("/","\/",$string);
}


if(isset($_GET["scanForCss"])){
    echo scanForCss();
}

function scanForCss() {

    $json_array = [];
    foreach (glob('resources/css/highlight.js-styles/*.{css}', GLOB_BRACE) as $filename) {
        array_push($json_array,$filename);
    }

    return json_encode($json_array,JSON_FORCE_OBJECT);
}


?>
