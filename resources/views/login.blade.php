<!doctype html>
<html lang="en">
  <head>
  	<title>Company Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/css/style.css">

	</head>
	<style>
		label.error-msg {
    color: maroon;
    font-weight: 600;
    letter-spacing: .5px;
}
		.bg {
  /* The image used */
  background-image: url("assets/images/bg.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
		</style>

	<body class="img js-fullheight bg" style="background-image: url('assets/images/bg.jpg');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">COMPANY LOGIN</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form class="signin-form" method="post" name="login" id="login">
				  @CSRF
		      		<div class="form-group">
		      			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		      		</div>
	            <div class="form-group">
	              <input id="password" type="password" class="form-control" placeholder="Password" name="password">
	              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
                <div class="form-group">
                    <select id="role" class="form-control" style=" color: #FFF;" name="role_id" >
                        <option value="0" style="background: white; color: black;">Select Role</option>
                        <option value="1" style="background: white; color: black;">Manager</option>
                        <option value="2" style="background: white; color: black;">Employee</option>
                    </select>
                </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<!-- <div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div> -->
								<div class="w-50 text-md-right">
									<a href="/register" style="color: #fff">Don't Have an Account?</a>
								</div>
	            </div>
	          </form>	         
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script>
    //   alert("hi");

	$("#login").submit(function(e){
		e.preventDefault();
	}).validate({
		rules:{
			
			email:{
				required:true,
				email:true,
				email_valid:true
			},
			password:{
				required:true,
				minlength:5,
				maxlength:8

			},
			role_id:{
				selectrole:true
			}
			
		},
    messages:{
		
		email:{
			required:"Please enter your email",
			email:"Please enter a valid email address"
		},
		password:{
			required:"Please enter password",
			minlength:"The password should be atleast 5 characters",
			maxlength:"The password should not exceed 8 characters"
		},
		
		
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
			type:"POST",
			url:'login',
			data:new FormData(form),
			dataType:"JSON",
			processData:false,
			contentType:false,
			success:function(data){
				// console.log(data);
				var response=data;
				// alert(data.success);
				// alert({{Session::get('key')}});
				
				if(data.success==true && data.role=="Manager"){
					window.location.href="welcome";
				}else if(data.success==true && data.role=="Employee"){
					window.location.href="employee";
				}
				else{
					alert(data.message);
					$("#email").val("");
					$("#password").val("");
				}
				// if(data.success==false){
				// 	alert(data.message);
				// }else{
				// 	window.location.href="welcome";
				// }
			}
		});
		
		}
	    
	}
	)
	jQuery.validator.addMethod('selectrole', function (value) {
        return (value != '0');
    }, "Please select your Role");
    jQuery.validator.addMethod("email_valid", function(value, element){
      if (/^(([a-zA-Z0-9]([.+_-]?[0-9a-zA-Z])+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z0-9-]+\.){1,2}[a-zA-Z]{2,63}))$/.test(value)) {
        return true;   // PASS validation otherwise
      } else {
        return false;  // FAIL validation when REGEX mismatches
      };
   }, "Please enter a valid email address");
   </script>
	</body>
</html>
