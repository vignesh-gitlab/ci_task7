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

<div class="modal" tabindex="-1" role="dialog" id="edit_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="frm">
        <div class="form-group">
            <input type="hidden" name="id" id="id" value="" class="form-control">
            Name:
            <input type="text" name="name" id="name" value="" class="form-control">
            User Name:
            <input type="text" name="user_name" id="user_name" value="" class="form-control">
            Password:
            <input type="text" name="password" id="password" value="" class="form-control"><br>
        </div>
            <input type="button" name="edit_submit" id="edit_submit" value="Update" class="btn btn-success">
        
    </form>
      </div>
      
    </div>
  </div>
</div>

<div id="container">
	<h1 align="center">Welcome to Admin HomePage</h1>
    <div class="col-sm-2">
    </div>
    <input type="button" name="admin_home" id="admin_home" value="Admin Home" class="btn btn-warning float-right">
    <div class="col-sm-8">
    <p>Hi <?php $session_name=$this->session->userdata('name');
    echo $session_name;?>, this are our users </p>
    
    </div>
    
    <input type="button" name="log_out" id="log_out" value="Log Out" class="btn btn-danger float-right">
    

    
    <div id="result">
    </div>

</div>


<script>


window.onload=function(){
    var url='<?php echo base_url();?>';
        $.ajax({
            url:url+'welcome/get_users',
            method:"post",
            dataType:"json",
            success:function(data){
                var html='';
                var i;
                html+='<table border="1" align="center" class="border"><tr><th>Name</th><th>User Name</th><th>Password</th><th>Action</th><th>Location</th></tr>';
                for(i in data){
                    html+='<tr><td>'+data[i].name+'</td><td>'+data[i].user_name+'</td><td>'+data[i].password+'</td><td><button type="button" class="btn btn-primary edit" id='+data[i].id+'>Edit&nbsp;<button type="button" class="btn btn-danger delete" id='+data[i].id+'>Delete</td><td style="width:350px;height:250px;"><iframe src="https://www.google.com/maps?q='+data[i].latitude+','+data[i].longitude+'&hl=es;z=14&output=embed" style="width:100%;height:100%;"></iframe></td></tr>';
                }
                html+='</table>';
                $('#result').html(html);
            }
        });
    }

$(document).ready(function(){

    var url='<?php echo base_url();?>';

   
    $("body").on('click','.edit',function(){
        //event.preventDefault();                        
        $('#edit_modal').show();
        var id=$(this).attr("id");
        var name=$(this).closest("tr").find("td:eq(0)").text();
        var user_name=$(this).closest("tr").find("td:eq(1)").text();
        var password=$(this).closest("tr").find("td:eq(2)").text();

        $('#id').val(id);
        $('#name').val(name);
        $('#user_name').val(user_name);
        $('#password').val(password);
    });
    
    $('#edit_submit').click(function(){
        var edit_id=$('#id').val();
        var name=$('#name').val();
        var user_name=$('#user_name').val();
        var password=$('#password').val();        
        $.ajax({
            url:url+'welcome/update_data',
            method:'post',
            data:{edit_id:edit_id,name:name,user_name:user_name,password:password},
            success:function(res){
                $('#id').val("");
                $('#name').val("");
                $('#user_name').val("");
                $('#password').val("");
                if(res){
                    alert("Record Updated Successfully"); 
                    $('#edit_modal').hide();
                    window.location.reload();
                    
               }else{
                    alert("Record Not Updated");
                }
            }
        });
    });

    $("body").on('click','.delete',function(event){
        event.preventDefault();
        var del_id=$(this).attr('id');
        var cls=$(this);
        if(confirm("Are You Sure?")){
            $.ajax({
                url:url+'welcome/delete_data',
                method:"post",
                data:{del_id:del_id},
                success:function(res){
                    if(res){
                        $(cls).closest("tr").remove();
                    }else{
                        alert("Not Deleted");
                    }
                }
            });
        }
    });

    $('.close').click(function(){
        $('#edit_modal').hide();
    });

    $('#admin_home').click(function(){
        window.location.href=url+'welcome/admin_home';
    });
    $('#log_out').click(function(){
        window.location.href=url+'welcome/log_out';
    });

});

</script>

</body>
</html>