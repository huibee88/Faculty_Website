</header>
<form id="teamAdd" action="<?=base_url()?>Team_New/addnew" method="post" style="border: 1px solid #ccc" enctype="multipart/form-data">
	<div class="container">
		<h3>Add New Lecturer</h3>
		<p><?php echo $this->session->flashdata('status'); ?></p>
		<?php $string = validation_errors(); if(!empty($string)): ?>
		<?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>'; ?>
		<?php endif; ?>
		<hr>

		<label for="lid"><b>Lecturer ID</b></label>
		<input type="text" placeholder="fkixxx" name="lID" required>

		<label for="lname"><b>Lecturer Name</b></label>
		<input type="text" placeholder="Enter Lecturer Name" name="lName" required>

		<label for="lposition"><b>Lecturer Position</b></label>
		<select name="lPosition" id="lposition">
			<option value="" disabled="disabled" selected="selected">Please Select</option>
			<option value="professor">Professor</option>
			<option value="associate professor">Associate Professor</option>
			<option value="senior lecturer">Senior Lecturer</option>
			<option value="lecturer">Lecturer</option>
		</select>

		<label for="lemail"><b>Lecturer Email</b></label>
		<input type="email" placeholder="Enter Lecturer Email" name="lEmail" required>

		<label for="lphone"><b>Phone Number</b></label>
		<input type="text" placeholder="xxx-xxxxxxx" name="lPhone" required>

		<label for="leducation"><b>Lecturer Education</b></label>
		<input type="text" placeholder="Enter Lecturer Education" name="lEducation" required>

		<label for="aoe"><b>Area of Expert</b></label>
		<input type="text" placeholder="Enter Lecturer Area of Expert" name="AOE" required>

		<label for="fid"><b>Faculty ID</b></label>
		<select name="fID" id="fid">
		<option value="" disabled="disabled" selected="selected">Please Select</option>
			<option value="fk001">fk001</option>
		</select>
		
		<label for="limage"><b>Lecturer Image</b></label>
		<input type="file" name="lImage" required>

		<div class="clearfix">
			<button type="button" class="cancelbtn" onClick="document.location.href='http://localhost/Faculty_Website/Team_Logged/';">Cancel</button>
			<button type="submit" class="signupbtn">Add</button>
		</div>
	</div>
</form>

<style>
body{font-family: Arial, Helvetica, sans-serif;}
*{box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=email], select{
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	display: inline-block;
	border: none;
	background: #f1f1f1;
}

input[type=text]:focus, input[type=email]:focus, select:focus{
	background-color: #ddd;
	outline: none;
}

hr{
	border: 1px solid #f1f1f1;
	margin-bottom: 25px;
}

/* Set a style for all buttons */
button{
	background-color: #4CAF50;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 20%;
	opacity: 0.9;
}

button:hover{
	opacity: 1;
}

/* Extra styles for the cancel button */
.cancelbtn{
	padding: 14px 20px;
	background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn{
	float: left;
	width: 20%;
}

/* Add padding to container elements */
.container {
	padding: 16px;
	width: 80%;
}

/* Clear floats */
.clearfix::after{
	content: "";
	clear: both;
	display: table;
}

.alert{
	padding: 20px;
	background-color: #f44336;
	color: white;
}

.alert_green{
	padding: 20px;
	background-color: #00cc66;
	color: white;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px){
	.cancelbtn, .signupbtn{
		width: 20%;
	}
}
</style>