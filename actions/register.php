<?php
include('connect.php');
$con=mysqli_connect("localhost","root","","votingsystem");
$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$std=$_POST['std'];

if($password!=$cpassword){
    echo'<script> 
    alert("The passwords do not match");
    window.location="../partials/registration.php";
    </script>';
}
else{
    move_uploaded_file($tmp_name,"../uploads/$image");
    $sql="insert into userdata (username,mobile,password,photo,standard,status,votes) values('$username','$mobile','$password','$image','$std',0,0)";
    echo $sql;
    $result=mysqli_query($con,$sql);

    if($result){
        echo'<script> 
        alert("Registration Successful");
        window.location="../partials/registration.php";
        </script>';
    }else{
        die(mysqli_error($con));
    }
}
?>




