@extends('layouts/welcome')
@section('employee')

<div class="text-center">
    <h1>My Profile</h1>
<form class="signin-form" name="employee" id="employee" method="post">
					  @csrf
                      <input type="hidden" name="user_id" value="{{$user->id}}">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="name" id="name" name="name" value="{{$user->name}}" disabled>
		      		</div>
                      <div class="form-group">
		      			<input type="email" class="form-control" placeholder="email" id="email" name="email" value="{{$user->email}}" disabled>
		      		</div>
                      
	            <div class="form-group">
	              <input  type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{$user->address}}" disabled>
	              
	            </div>
                <div class="form-group">
	              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{$user->phone}}" disabled >
	             
	            </div>
                <!-- <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" style="color: #fff">Add Employee</button>
	            </div>
	             -->
</form>
</div>
<!-- Page level custom scripts
<script src="assets/admin/js/demo/chart-area-demo.js"></script>
  <script src="assets/admin/js/demo/chart-pie-demo.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
$("#employee").submit(function(e){
		e.preventDefault();
	}).validate({
		rules:{
			name:{
				required:true,
				minlength:4,
				maxlength:50

			},
			email:{
				required:true,
				email:true,
				email_valid:true
			},
			
			address:{
                required:true,
                minlength:10,
                maxlength:50
            },
            phone:{
                required:true,
                minlength:5,
                maxlength:20
            }
		},
    messages:{
		name:{
			required:"Please enter your name",
			minlenght:"The name should be atleast 4 characters",
			maxlength:"The name should not exceed 50 characters"
		},
		email:{
			required:"Please enter your email",
			email:"Please enter a valid email address"
		},
		
		address:{
            required:"Please enter address",
            minlenght:"The address should be atleast 10 characters",
            maxlength:"The address should not exceed 50 characters"
        },
        phone:{
            required:"Please enter phone number",
            minlenght:"The Phone should be atleast 5 digits",
            maxlength:"The Phone should not exceed 20 digits"

        }
	},
		errorClass: "error-msg",
		onfocusout: false,
		invalidHandler: function(form, validator) {
          var errors = validator.numberOfInvalids();
          if (errors) {                   
          validator.errorList[0].element.focus();
          
          }
        },
		errorPlacement: function (error, element) {
			error.insertAfter($(element));

		},
		submitHandler: function(form,event) {  
		
		// alert("hi");
		$.ajax({
			type:"PUT",
			url:'./updateemp',
			data:new FormData(form),
			
			success:function(data){
				if(data.success==true){
                    alert(data.message);
                }
			}
		});
		
		}
	    
	}
	)
    jQuery.validator.addMethod("email_valid", function(value, element){
      if (/^(([a-zA-Z0-9]([.+_-]?[0-9a-zA-Z])+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z0-9-]+\.){1,2}[a-zA-Z]{2,63}))$/.test(value)) {
        return true;   // PASS validation otherwise
      } else {
        return false;  // FAIL validation when REGEX mismatches
      };
   }, "Please enter a valid email address"); -->

<!-- </script> -->
@endsection