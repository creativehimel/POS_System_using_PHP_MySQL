<?php
include("../admin/config/function.php");
if(isset($_POST["saveAdmin"])){
    $name = validate($_POST["name"]);
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);
    $phone = validate($_POST["phone"]);
    $is_ban = isset($_POST["is_ban"]) == true ? 1 : 0;
    if($name != "" && $email != "" && $password != "" && $phone != ""){
        $emailCheck = mysqli_query($conn, "SELECT * FROM admins WHERE email = '$email'");
        if($emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                redirect("admins-create.php", "Email already exists");
            }
        }
        $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
        $data =[
            'name' => $name,
            'email' => $email,
            'password' => $bcrypt_password,
            'phone' => $phone,
            'is_ban' => $is_ban
        ];
        $result = insert("admins", $data);
        if($result){
            redirect("admins.php", "Admin added successfully");
        }else{
            redirect("admins-create.php", "Something went wrong!");
        }
    }else{
        redirect("admins-create.php", "Please fill required fields");
    }
    
}