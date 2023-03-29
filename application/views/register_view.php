<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>jquery/jquery.min.js"></script>
</head>
<body>

<div id="container">
	
<div class="col-sm-2">
</div>
<div class="col-sm-8">
<h1 align="center">Registration!</h1>
    <div class="form-group">
        Name:
        <input type="text" name="name" id="name" value="" class="form-control">
        User name:
        <input type="text" name="user_name" id="user_name" value="" class="form-control">
        Password
        <input type="text" name="password" id="password" value="" class="form-control">
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
        <br/>
        <input type="button" name="register_submit" id="register_submit" value="Submit" class="btn btn-success form-control">
    </div>
</div>
&nbsp;&nbsp;<a href="<?php echo base_url();?>">Home</a>
</div>

<script>



window.onload=function(){
    fetch("https://ipapi.co/json/")
    .then((response)=>response.json())
    .then((data)=>{
        var latitudeinput=document.getElementById("latitude");
        latitudeinput.value=data.latitude;
        var longitudeinput=document.getElementById("longitude");
        longitudeinput.value=data.longitude;
        }
    );
};

$(document).ready(function(){
    $('#register_submit').click(function(){
        var url='<?php echo base_url();?>';
        var name=$('#name').val();
        var user_name=$('#user_name').val();
        var password=$('#password').val();
        var latitude=$('#latitude').val();
        var longitude=$('#longitude').val();
        $.ajax({
            url:url+'welcome/register_data',
            method:"post",
            data:{name:name,user_name:user_name,password:password,latitude:latitude,longitude:longitude},
            success:function(response){
                if(response=="true"){
                    alert("Record Inserted Successfully");
                }else{
                    alert("Record Not Inserted");
                }
                $('#name').val("");
                $('#user_name').val("");
                $('#password').val("");
            }
        });


    });


});

</script>

</body>
</html>
