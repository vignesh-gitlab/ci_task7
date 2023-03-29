<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>jquery/jquery.min.js"></script>
</head>
<body>

<div id="container">
	
    <div class="col-sm-2">
    
    </div>
    <div class="col-sm-8">
    <h1 align="center">Welcome to Our Site!</h1>
        <div class="form-group">
            User Name:
            <input type="text" name="user_name" id="user_name" value="" class="form-control">
            Password:
            <input type="password" name="password" id="password" value="" class="form-control"><br/>
            <input type="button" name="login_submit" id="login_submit" value="Submit" class="btn btn-success form-control">
        </div>
    </div>
    <p>&nbsp;&nbsp;Click here to <a href="<?php echo base_url();?>welcome/register">Register</a> new user</p>

</div>

<script>

$(document).ready(function(){

    var url='<?php echo base_url();?>';

    $('#login_submit').click(function(){
        var user_name=$('#user_name').val();
        var password=$('#password').val();
        if(user_name!='' && password!=''){
        $.ajax({
            url:url+'welcome/login',
            method:"post",
            data:{user_name:user_name,password:password},
            success:function(response){
                if(response=="flag1"){
                    window.location.href=url+'welcome/admin';
                }else if(response=="flag2"){
                    window.location.href=url+'welcome/user';
                }else{
                    alert("username and password not found!");
                    $('#user_name').val("");
                    $('#password').val("");
                }
            }
        });
    }else if(password=='' && user_name==''){
        alert("Enter User Name and Password to Continue!!");
    }else if(user_name==''){
        alert("Enter User Name to Continue!");
    }else{
        alert("Enter Password to Continue!");
    }

    });


});

</script>

</body>
</html>
