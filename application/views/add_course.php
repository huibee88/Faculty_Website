		<div class="about-section text-white">
			<h3>Courses</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -></a> <a href="<?= base_url() ?>Courses_AdminView">Courses -></a> Add Course</p>
		</div>
	</header>

<form id="formAddCourse" action="<?=base_url()?>Add_Course/addnew" method="post" style="border: 1px solid #ccc" enctype = "multipart/form-data">
	<div class="container">
		<h1>Add New Course</h1>
		<p>Please fill in this form to create a new course.</p>
		<p><?php echo $this -> session -> flashdata('status'); ?></p>
		<?php $string = validation_errors(); if(!empty($string)): ?>
		<?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>' ?>
		<?php endif; ?>
		<hr>

		<label for="icon"><b>Icon</b></label>
			<select name="cicon" id="sIcon">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
					<option value="fa-laptop">Laptop</option>
					<option value="fa-vial">Vial</option>
					<option value="fa-chalkboard-teacher">Teacher</option>
					<option value="fa-calculator">Calculator</option>
					<option value="fa-clinic-medical">Clinic</option>
					<option value="fa-mail-bulk">Mail</option>
					<option value="fa-file-alt">Code</option>
					<option value="fa-palette">Design</option>
					<option value="fa-hamburger">Food</option>
					<option value="fa-chess">Chess</option>
					<option value="fa-hotel">Hotel</option>
					<option value="fa-camera-retro">Photo</option>
			</select>

		<label for="code"><b>Course Code</b></label>
		<input type="text" placeholder="Enter Course Code" name="ccode" required>

		<label for="name"><b>Course Name</b></label>
		<input type="text" placeholder="Enter Course Name" name="cname" required>

		<label for="credithour"><b>Credit Hour</b></label>
			<select name="cch" id="sch">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
			</select>

		<label for="year"><b>Course Year</b></label>
			<select name="cyear" id="syear">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
					<option value="year 1 sem 1">year 1 sem 1</option>
					<option value="year 1 sem 2">year 1 sem 2</option>
					<option value="year 2 sem 1">year 2 sem 1</option>
					<option value="year 2 sem 2">year 2 sem 2</option>
					<option value="year 3 sem 1">year 3 sem 1</option>
					<option value="year 3 sem 2">year 3 sem 2</option>
					<option value="year 4 sem 1">year 4 sem 1</option>
					<option value="year 4 sem 2">year 4 sem 2</option>
			</select>

		<label for="faculty"><b>Faculty ID</b></label>
			<select name="cfID" id="sfID">
				<option value="" disabled="disabled" selected="selected">Please Select</option>
					<option value="fki001">fki001</option>
					<option value="fpsk001">fpsk001</option>
					<option value="t001">t001</option>
					<option value="mt007">mt007</option>
					<option value="fpsk002">fpsk002</option>
					<option value="mt001">mt001</option>
			</select>

		<label for="description"><b>Course Description</b></label>
		<textarea class="inputfield" placeholder="Type the Course Description here..." name="cdesc" required></textarea>

		<label for="image"><b>Choose Course Image here</b></label>
		<input type="file" name="cimg" required>

		<div class="clearfix">
			<button type="button" class="cancelbtn" onClick="document.location.href='http://localhost/Faculty_Website/Courses_AdminView/';">Cancel</button>
			<button type="submit" class="signupbtn" id="insert">Add</button>
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

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px){
	.cancelbtn, .signupbtn{
		width: 20%;
	}
}
</style>