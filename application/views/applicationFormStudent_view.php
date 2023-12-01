</header>

<form id="formApplication" action="<?=base_url()?>ApplicationAfterLogin_con/addnew" method="post" style="border: 1px solid #ccc" enctype="multipart/form-data">
	<div class="container">
		<h1>Application Form</h1>
		<p>Please fill in this form to apply for doctor philosophy/master programme.</p>
		<p><?php echo $this->session->flashdata('status'); ?></p>
		<?php $string = validation_errors(); if(!empty($string)): ?>
		<?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>'; ?>
		<?php endif; ?>
		<hr>

		<label for="programme"><b>Programme selected</b></label>
			<select name="aProg" id="programme">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
				<option value="PD15001"> Doctor of Philosophy Computer Science</option>
				<option value="PD15002"> Doctor of Philosophy Software Engineering</option>
				<option value="PD15003"> Doctor of Philosophy Informatic Engineering</option>
				<option value="PM15004"> Master of Philosophy Software Engineering</option>
				<option value="PM15005"> Master of Philosophy Computer Science</option>
				<option value="PM15006"> Master of Cyber Security</option>
			</select>

		<label for="DOA"><b>Date of Apply</b></label><br>
		<input type="date" name="aDate"><br>	

		<label for="name"><b>Full Name</b></label>
		<input type="text" placeholder="Enter your Full Name" name="aName" required>

		<label for="icPassNo"><b>IC No/Passport No</b></label>
		<input type="text" placeholder="Enter your IC no. / Passport no." name="aICPass" required>

		<label for="gender"><b>Gender</b></label><br>
		<input type="radio" name="aGender" value="Male" required>
		<label for="male">Male</label>
		<input type="radio" name="aGender" value="Female" required>
		<label for="male">Female</label><br>

		<label for="DOB"><b>Date of Birth</b></label><br>
		<input type="date" name="aDOB"><br>

		<label for="nationality"><b>Nationality</b></label>
		<input type="text" placeholder="Enter Nationality" name="aNationality">

		<label for="race"><b>Race</b></label>
		<input type="text" placeholder="Enter Race" name="aRace">

		<label for="pNumber"><b>Phone Number</b></label>
		<input type="text" placeholder="Enter Contact Phone Number" name="aPhoneNo" required>

		<label for="add1"><b>Address Line 1</b></label>
		<input type="text" placeholder="Enter address line 1" name="aAdd1" required>

		<label for="add2"><b>Address Line 2</b></label>
		<input type="text" placeholder="Enter address line 2" name="aAdd2">

		<label for="postal"><b>Postal Code</b></label>
		<input type="text" placeholder="Enter Postal Code" name="aPostCode">

		<label for="city"><b>City</b></label>
		<input type="text" placeholder="Enter city" name="aCity" required>

		<label for="state"><b>State</b></label>
		<input type="text" placeholder="Enter state" name="aState">

		<label for="country"><b>Country</b></label>
			<select name="aCountry" id="scountry">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
				<option value="Malaysia"> Malaysia</option>
				<option value="Singapore"> Singapore</option>
			</select>

		<label for="email"><b>Email Address</b></label>
		<input type="email" placeholder="Enter Email" name="aEmail" required>

		<label for="profile"><b>Profile Picture</b></label>
		<input type="file" name="aImg" required><br>

		<div class="clearfix">
			<button type="button" class="cancelbtn">Cancel</button>
			<button type="submit" class="submitbtn">Submit</button>
		</div>
	</div>
</form>

<style>
body{font-family: Arial, Helvetica, sans-serif;}
*{box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email], select{
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	display: inline-block;
	border: none;
	background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, select:focus{
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

input[type=text], input[type=date]{
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px){
	.cancelbtn, .signupbtn{
		width: 20%;
	}
}
</style>