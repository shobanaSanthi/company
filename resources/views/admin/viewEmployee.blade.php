@extends('layouts/dashboard')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="signin-form" name="edit_employee" id="edit_employee" method="post" action="{{url('update-employee')}}">
					  @csrf
                      @method('PUT')
                     <input type="hidden" name="id" id="id">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="name*" id="name" name="name" value="" >
		      		</div>
                      <div class="form-group">
		      			<input type="email" class="form-control" placeholder="email*" id="email" name="email" value="" >
		      		</div>
                     
                      
	            <div class="form-group">
	              <input  type="text" name="address" id="address" class="form-control" placeholder="Address*" value="">
	              
	            </div>
                <div class="form-group">
	              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone*" value="">
	             
	            </div>
                <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" style="color: #fff">Update Employee</button>
	            </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="skillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Employee Skills</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered" id="skilltable" width="100%" cellspacing="0">

<tr>
<th>Skill ID</th>
  <th>Skill Name</th>
  <th>Skill Percentage</th>
  <!-- <th>Emp Skill</th>
  <th>Skill Percentage</th>  -->
  <th>Action</th>
  
</tr>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="text-center">
    <h1>View Employee</h1>
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
@endif
    <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
 
  <th>Employee ID</th>
  <th>Emp Name</th>
  <th>Emp Email</th>
  <th>Emp Address</th>
  <th>Emp Phone</th> 
  <!-- <th>Emp Skill</th>
  <th>Skill Percentage</th>  -->
  <th>Action         </th>
  
</tr>
<?php 
if($users){
  foreach ($users as $user){
    echo "<tr><td>".$user->id."</td><td>".$user->name."</td><td>".$user->email."</td><td>".$user->address."</td><td>".$user->phone."</td><td><button type='button' value='".$user->id."' class='btn edit-btn btn-success' >Edit </button> | <a class='btn btn-danger' href='deleteEmp/".$user->id."'>Del</a> | <button type='button' value='".$user->id."' class='btn view-btn btn-info' >View Skill </button>" ;
  }
}
?>
</div>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script
    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
  $(document).ready(function(){
   
   $(document).on('click','.edit-btn',function(){
     var emp_id=$(this).val();
     $('#editModal').modal('show');
     $.ajax({
         type:"GET",
         url:"/editEmp/"+emp_id,  
         dataType:"JSON",
         success:function(response){
             console.log(response.id);
             $("#id").val(response.id);
             $("#name").val(response.name);             
             $("#email").val(response.email);
             $("#address").val(response.address);
             $("#phone").val(response.phone);

         }
     });
   });
   
   $(document).on('click','.view-btn',function(){
     var emp_id=$(this).val();
     $('#skillModal').modal('show');
     $.ajax({
         type:"GET",
         url:"/viewSkill/"+emp_id,  
         dataType:"JSON",
         success:function(response){
             console.log(response.id);
             $.each(response,function(key,value){
                 $("#skilltable").append("<tr><td>"+value.id+"</td><td>"+value.skill_name+"</td><td>"+value.skill_percentage+"</td><td><button type='button' value='"+value.id+"' class='btn edit-btn btn-success' >Edit </button> | <a class='btn btn-danger' href='deleteSkill/"+value.id+"'>Del</a> ");
             })
             $("#id").val(response.id);
             $("#name").val(response.name);             
             $("#email").val(response.email);
             $("#address").val(response.address);
             $("#phone").val(response.phone);

         }
     });
   });

//    $(document).on('click','.view-skill',function(){
//         var emp_id=$(this).val();
//         $.ajax({
//          type:"GET",
//          url:"/editEmp/"+emp_id,  
//          dataType:"JSON",
//          success:function(response){
//          }

//    });

  })
 </script>
@endsection