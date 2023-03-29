<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Home</title>
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>jquery/jquery.min.js"></script>
</head>
<body>

<div id="container">
	<h1 align="center">Welcome to Admin HomePage</h1>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
    <p>Hi <?php $session_name=$this->session->userdata('name');
    echo $session_name;?>, Welcome to our site</p>
    </div>

    &nbsp;&nbsp;<input type="button" name="view_users" id="view_users" value="View Users" class="btn btn-primary">

<input type="button" name="log_out" id="log_out" value="Log Out" class="btn btn-danger float-right">&nbsp;&nbsp;
</div>

<script>

$(document).ready(function(){

    var url='<?php echo base_url();?>';

    $('#view_users').click(function(){
        window.location.href=url+'welcome/view_users';
    });

    $('#log_out').click(function(){
        window.location.href=url+'welcome/log_out';
    });

});

</script>

</body>
</html>
