<?php
    $firstname = $_POST['fname'];
    $lastname  = $_POST['lname'];
    $age       = $_POST['age'];
    $height    = $_POST['height'];
    $weight    = $_POST['weight'];
    $pwd       = $_POST['pwd'];
    $conpwd    = $_POST['conpwd'];

    $conn = new mysqli('localhost','root','','test');
    if($conn -> connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }else{
        $stmt =  $conn->prepare("insert into signing up(fname,lname,age,height,weight,pwd,conpwd)
        values(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssiiiss",$fname,$lname,$age,$height,$weight,$pwd,$conpwd);
        $stmt->execute();
        echo "Signup successful...";
        $stmt->close();
        $conn->close();
    }
?>