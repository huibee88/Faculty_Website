</header>

<form id="formApplication" action="<?=base_url()?>ApplicantDetails_con" method="post" style="border: 1px solid #ccc">
	<div class="container">
		<h1>Application Form</h1>
		<hr>

		<label for="programme"><b>Programme selected</b></label>
		<input type="text" name="aProg" value="<?php echo $aProg; ?>">

		<label for="DOA"><b>Date of Apply</b></label><br>
		<input type="date" name="aDate" value="<?php echo $aDate; ?>" readonly><br>	

		<label for="name"><b>Full Name</b></label>
		<input type="text" name="aName" value="<?php echo $aName; ?>" readonly>

		<label for="icPassNo"><b>IC No/Passport No</b></label>
		<input type="text" name="aICPass" value="<?php echo $aICPass; ?>" readonly>

		<label for="gender"><b>Gender</b></label><br>
		<input type="text" name="aGender" value="<?php echo $aGender; ?>" readonly>

		<label for="DOB"><b>Date of Birth</b></label><br>
		<input type="date" name="aDOB" value="<?php echo $aDOB; ?>" readonly><br>

		<label for="nationality"><b>Nationality</b></label>
		<input type="text" name="aNationality" value="<?php echo $aNationality; ?>" readonly >

		<label for="race"><b>Race</b></label>
		<input type="text" name="aRace" value="<?php echo $aRace; ?>" readonly>

		<label for="pNumber"><b>Phone Number</b></label>
		<input type="text"  name="aPhoneNo" value="<?php echo $aPhoneNo; ?>" readonly>

		<label for="add1"><b>Address Line 1</b></label>
		<input type="text"  name="aAdd1" value="<?php echo $aAdd1; ?>" readonly>

		<label for="add2"><b>Address Line 2</b></label>
		<input type="text" name="aAdd2" value="<?php echo $aAdd2; ?>" readonly>

		<label for="postal"><b>Postal Code</b></label>
		<input type="text" name="aPostCode" value="<?php echo $aPostCode; ?>" readonly>

		<label for="city"><b>City</b></label>
		<input type="text" name="aCity" value="<?php echo $aCity; ?>" readonly>

		<label for="state"><b>State</b></label>
		<input type="text" name="aState" value="<?php echo $aState; ?>" readonly>

		<label for="country"><b>Country</b></label>
		<input type="text" name="aCountry" value="<?php echo $aCountry; ?>" readonly>	

		<label for="email"><b>Email Address</b></label>
		<input type="email" name="aEmail" value="<?php echo $aEmail; ?>" readonly>

		<label for="profile"><b>Profile Picture</b></label><br>
		<img src="data:image;base64,<?php echo base64_encode($aImg)?>">

		<div class="clearfix">
			<a href="<?=base_url()?>ApplicantDetails_con/update_approvalStatus/<?php echo $aID?>/0 "><button type="button" class="cancelbtn">Not Approve</button></a>

			<a href="<?=base_url()?>ApplicantDetails_con/update_approvalStatus/<?php echo $aID?>/1 "><button type="button" class="submitbtn">Approve</button></a>
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