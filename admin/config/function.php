<?php
session_start();
require_once("dbcon.php");

//Input field validation
function validate($inputData){
    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}

//Redirect from one page to another with the message (status)
function redirect($url, $status){
    $_SESSION["status"] = $status;
    header("Location: ".$url);
    exit(0);
}

//Display message or status after any process
function alertMessage(){
    if(isset($_SESSION["status"])){
        
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h6>'.$_SESSION["status"].'</h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        unset($_SESSION["status"]);
    }
}

// Insert record using this function
function insert($tableName, $data){
    $table = validate($tableName);
    global $conn;
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    $query = "INSERT INTO $table ($columns) VALUES ('$values')";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Update record using this function
function update($tableName, $id ,$data){
    $table = validate($tableName);
    $id = validate($id);
    $updateDataString = "";
    foreach($data as $column => $value){
        $updateDataString .= $column. '='. "'$value',";
    }
    $finalUpdateData = substr($updateDataString, 0, -1);
    global $conn;
    $query = "UPDATE $table SET $finalUpdateData WHERE $id";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Get all records using this function
function getAll($tableName, $status= null){
    $table = validate($tableName);
    if($status == 'status'){
        $status = validate($status);
        $query = "SELECT * FROM $table WHERE status = '0'";
    }else{
        $query = "SELECT * FROM $table";
    }
    global $conn;
    $result = mysqli_query($conn, $query);
    return $result;
}

// Get single record using this function
function getById($tableName, $id){
    $table = validate($tableName);
    $id = validate($id);
    global $conn;
    $query = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if($result){
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $response = [
            'status' => 200,
            'data' => $row,
            'message' => 'Data found'
        ];
        return $response;
        }else{
            $response = [
            'status' => 404,
            'message' => 'No data found'
        ];
        return $response;
        }
    }else{
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response;
    }
}

// Delete data from database using this function
function delete($tableName, $id){
    $table = validate($tableName);
    $id = validate($id);
    global $conn;
    $query = "DELETE FROM $table WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;
}