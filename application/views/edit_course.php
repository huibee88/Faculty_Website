		<div class="about-section text-white">
			<h3>Courses</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -></a> <a href="<?= base_url() ?>Courses_AdminView">Courses -></a> Edit Course</p>
		</div>
	</header>
<form id="formEditCourse" action="<?=base_url()?>Edit_Course/updateCourse" method="post" style="border: 1px solid #ccc" enctype = "multipart/form-data">
	<div class="container">
		<h1>Edit Course Details</h1>
		<p>Please fill in this form to edit course details.</p>
		<p><?php echo $this -> session -> flashdata('status'); ?></p>
		<?php $string = validation_errors(); if(!empty($string)): ?>
		<?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>' ?>
		<?php endif; ?>
		<hr>

		<label for="icon"><b>Icon</b></label>
			<select name="cicon" id="sIcon">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
					<option value="fa-laptop" <?php if ($uIcon == "fa-laptop") echo 'selected ="selected"' ?>>Laptop</option>
					<option value="fa-vial" <?php if ($uIcon == "fa-vial") echo 'selected ="selected"' ?>>Vial</option>
					<option value="fa-chalkboard-teacher" <?php if ($uIcon == "fa-chalkboard-teacher") echo 'selected ="selected"' ?>>Teacher</option>
					<option value="fa-calculator" <?php if ($uIcon == "fa-calculator") echo 'selected ="selected"' ?>>Calculator</option>
					<option value="fa-clinic-medical" <?php if ($uIcon == "fa-clinic-medical") echo 'selected ="selected"' ?>>Clinic</option>
					<option value="fa-mail-bulk" <?php if ($uIcon == "fa-mail-bulk") echo 'selected ="selected"' ?>>Mail</option>
					<option value="fa-file-alt" <?php if ($uIcon == "fa-file-alt") echo 'selected ="selected"' ?>>Code</option>
					<option value="fa-palette" <?php if ($uIcon == "fa-palette") echo 'selected ="selected"' ?>>Design</option>
					<option value="fa-hamburger" <?php if ($uIcon == "fa-hamburger") echo 'selected ="selected"' ?>>Food</option>
					<option value="fa-chess" <?php if ($uIcon == "fa-chess") echo 'selected ="selected"' ?>>Chess</option>
					<option value="fa-hotel" <?php if ($uIcon == "fa-hotel") echo 'selected ="selected"' ?>>Hotel</option>
					<option value="fa-camera-retro" <?php if ($uIcon == "fa-camera-retro") echo 'selected ="selected"' ?>>Photo</option>
			</select>

		<label for="code"><b>Course Code</b></label>
		<input type="text" placeholder="Enter Course Code" name="ccode" value="<?php echo $uCode ?>" readonly>

		<label for="name"><b>Course Name</b></label>
		<input type="text" placeholder="Enter Course Name" name="cname" value="<?php echo $uName ?>" required>

		<label for="credithour"><b>Credit Hour</b></label>
			<select name="cch" id="sch">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
					<option value="1" <?php if ($uHour == 1) echo 'selected ="selected"' ?>>1</option>
					<option value="2" <?php if ($uHour == 2) echo 'selected ="selected"' ?>>2</option>
					<option value="3" <?php if ($uHour == 3) echo 'selected ="selected"' ?>>3</option>
					<option value="4" <?php if ($uHour == 4) echo 'selected ="selected"' ?>>4</option>
					<option value="5" <?php if ($uHour == 5) echo 'selected ="selected"' ?>>5</option>
			</select>

		<label for="year"><b>Course Year</b></label>
			<select name="cyear" id="syear">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
					<option value="year 1 sem 1" <?php if ($uYear == "year 1 sem 1") echo 'selected ="selected"' ?>>year 1 sem 1</option>
					<option value="year 1 sem 2" <?php if ($uYear == "year 1 sem 2") echo 'selected ="selected"' ?>>year 1 sem 2</option>
					<option value="year 2 sem 1" <?php if ($uYear == "year 2 sem 1") echo 'selected ="selected"' ?>>year 2 sem 1</option>
					<option value="year 2 sem 2" <?php if ($uYear == "year 2 sem 2") echo 'selected ="selected"' ?>>year 2 sem 2</option>
					<option value="year 3 sem 1" <?php if ($uYear == "year 3 sem 1") echo 'selected ="selected"' ?>>year 3 sem 1</option>
					<option value="year 3 sem 2" <?php if ($uYear == "year 3 sem 2") echo 'selected ="selected"' ?>>year 3 sem 2</option>
					<option value="year 4 sem 1" <?php if ($uYear == "year 4 sem 1") echo 'selected ="selected"' ?>>year 4 sem 1</option>
					<option value="year 4 sem 2" <?php if ($uYear == "year 4 sem 2") echo 'selected ="selected"' ?>>year 4 sem 2</option>
			</select>

		<label for="faculty"><b>Faculty ID</b></label>
			<select name="cfID" id="sfID">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
					<option value="fki001" <?php if ($uFacultyID == "fki001") echo 'selected ="selected"' ?>>fki001</option>
					<option value="fpsk001" <?php if ($uFacultyID == "fpsk001") echo 'selected ="selected"' ?>>fpsk001</option>
					<option value="t001" <?php if ($uFacultyID == "t001") echo 'selected ="selected"' ?>>t001</option>
					<option value="mt007" <?php if ($uFacultyID == "mt007") echo 'selected ="selected"' ?>>mt007</option>
					<option value="fpsk002" <?php if ($uFacultyID == "fpsk002") echo 'selected ="selected"' ?>>fpsk002</option>
					<option value="mt001" <?php if ($uFacultyID == "mt001") echo 'selected ="selected"' ?>>mt001</option>
			</select>

		<label for="description"><b>Course Description</b></label>
		<textarea class="inputfield" placeholder="Type the Course Description here..." name="cdesc" required><?php echo $uDescription ?></textarea>

		<label for="image"><b>Choose Course Image here</b></label>
		<input type="file" name="cimg" required ><br><?php echo '<img src=" data:image;base64,' .base64_encode($uImage). '" alt="pics">'?>

		<div class="clearfix">
			<button type="button" class="cancelbtn" onClick="document.location.href='http://localhost/Faculty_Website/Courses_AdminView/';">Cancel</button>
			<button type="submit" class="signupbtn">Update</button>
		</div>
	</div>
</form>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
*{box-sizing: border-box;}

/* Full-width input fields */

input[type=text], input[type=textarea], select {
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	display: inline-block;
	border: none;
	background: #f1f1f1;
}

input[type=text]:focus, input[type=textarea]:focus, select:focus {
	background-color: #ddd;
	outline: none;
}

img{
	width: 400px;
}

.container textarea{
	width: 100%;
	vertical-align:top; 
	text-align:left;
	margin-bottom: 25px;
	justify-content: fixed;
	resize: none;
	display: block;
	border: 1px solid #ccc;
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

/* Adding padding to container elements */
.container{
	padding: 16px;
	width: 80%;
}

.clearfix{
	margin: 25px 0;
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

.inputfield{
	padding: 0 20px;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px){
	.cancelbtn, .signupbtn{
		width: 20%;
	}
}
</style>