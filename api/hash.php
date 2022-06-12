<?php

define("KEY", "dev");


if (isset($_GET["server-key"])) {
    $key = $_GET["server-key"];
    if (isset($_GET["input"]) && $key === KEY) {
        $input_value = $_GET["input"];
        echo json_encode(array("hash"=>hash("sha256", $input_value)));
    }else if (isset($_GET["input"]) && $key !== KEY) {
        echo json_encode(array("response"=>"Server Key Doesn't Match!", "error"=>404));
    }

    if(isset($_GET["query-value"]) && isset($_GET["check-value"]) && $key === KEY){
        $value = $_GET["query-value"];
        $check_value = $_GET["check-value"];
        $value_hash = hash("sha256", $value);
        if($value_hash === hash("sha256", $value) && hash("sha256", $value) === $check_value){
            echo json_encode(array("result"=>"Hash Values Match!", "flag"=>"green", "status"=>200));
        }else{
            echo json_encode(array("result"=>"Hash Values Don't Match!", "flag"=>"red", "status"=>404));
        }
    }else if (isset($_GET["query-value"]) && isset($_GET["check-value"]) && $key !== KEY) {
        echo json_encode(array("response"=>"Server Key Doesn't Match!", "error"=>404));
    }
}else{
    echo json_encode(array("response"=>"No Server Key Found!", "error"=>404));
}

?>