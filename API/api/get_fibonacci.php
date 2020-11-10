<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../models/fibonacci.php';

    $item = new Fibonacci();

    $number = isset($_GET['id']) ? $_GET['id'] : die();

    $sequenceNumber = $item->getFibonacciIterative($number);
    

    if($sequenceNumber != null){
        // create array
        $emp_arr = array(
            "Fibonacci_sequence" =>  $sequenceNumber,
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    } else{
        http_response_code(404);
        echo json_encode("Error in fibonacci function");
    }
?>