@extends('layouts/dashboard')
@section('content')

<div>
    <h1>Add Employee Skills</h1>
<form class="signin-form" name="add_skill" id="add_skill" method="post" action='skill_create'>
					  @csrf
                     
		      		<div class="form-group">
                      <select name="user_id" class="form-control" required>
                        <option value="0">Select Employee*</option>
                        <?php 
                        foreach ($users as $user){
                            echo "<option value=".$user->id.">".$user->name."</option>";
                        }

                      
                        ?>
                    </select>
		      		</div>
                      <div class="form-group">
                    <select name="skill_id" class="form-control" required>
                        <option value="0">Select Skill*</option>
                        <?php 
                        foreach ($skills as $skill){
                            echo "<option value=".$skill->id.">".$skill->skill_name."</option>";
                        }

                      
                        ?>
                    </select>
                </div>                     
                        
                <div class="form-group">
                    <input type="text" name="skill_percentage" id="skill_percentage" class="form-control" placeholder="Skill Percentage*" required>
                </div>
               
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" style="color: #fff">Add Skill</button>
	            </div>
</form>
</div>
<!-- <script src="assets/admin/js/demo/chart-area-demo.js"></script>
  <script src="assets/admin/js/demo/chart-pie-demo.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
  $(document).ready(function){
      alert("hi");
  }
  $("#add_skill").submit(function(e){
		e.preventDefault();
	}).validate({
		rules:{
            user_id:{
                selectcheck:true
            },
			
            skill_id:{
                selectcheck:true
            },
            skill_percentage:{
                required:true
            }
            
		},
    messages:{
		user_id:{
            selectcheck:"Please select User"
        }
        skill_id:{
            selectcheck:"Please select Skill"
        },
        skill_percentage:{
            required:"Please enter skill percentage"
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
			type:"POST",
			url:'skill_create',
			data:new FormData(form),
			processData:false,
			contentType:false,
            dataType:"JSON",
			success:function(data){
				if(data.success==true){
                    alert(data.message);
                    // $('#add_employee')[0].reset();
                    window.location.href="viewEmp";
                    
                }
			}
		});
		
		}
	    
	}
	)
    jquery.validator.addMethod("selectcheck",function(){
        if(value==0){
            return false;
        }else{
            return true;
        };
    });
    jQuery.validator.addMethod("email_valid", function(value, element){
      if (/^(([a-zA-Z0-9]([.+_-]?[0-9a-zA-Z])+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z0-9-]+\.){1,2}[a-zA-Z]{2,63}))$/.test(value)) {
        return true;   // PASS validation otherwise
      } else {
        return false;  // FAIL validation when REGEX mismatches
      };
   }, "Please enter a valid email address");
</script> -->
@endsection