<div class="about-section text-white">
		<h3>Finance Management</h3>
		<p><a href="<?= base_url('homeafter') ?>>Home -></a><a href="<?=base_url()?>adminFinance">Finance Management</a>->Edit Course Fee</p>
	</div>	
</header>

<form id="formEditPayment" action="<?=base_url()?>EditCourseFee/updateCourseFee/<?=$iCourseFeeID?>" method="post" style="border:1px solid #ccc">
	<div class="container ">
		<h1>Edit Course Fee</h1>
		<p>Please fill in the details.</p>

		<p><?php echo $this -> session -> flashdata('status'); ?></p>
		<?php $string = validation_errors(); if(!empty($string)): ?>
		<?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>' ?>
		<?php endif; ?>
		<hr>

		<label for="course"><b>Course</b></label>
		  <select name="iCourse" id="icourse">
		  	<option value="" disabled="disabled" selected="selected">Please Select</option>
		  	<option value="Computer Science" <?php if ($iCourse == "Computer Science") echo 'selected ="selected"' ?>>Computer Science</option>
		  	<option value="Chemical & Biology" <?php if ($iCourse == "Chemical & Biology") echo 'selected ="selected"' ?>>Chemical & Biology</option>
		  	<option value="Teaching" <?php if ($iCourse == "Teaching") echo 'selected ="selected"' ?>>Teaching</option>
		  	<option value="Mathematics" <?php if ($iCourse == "Mathematics") echo 'selected ="selected"' ?>>Mathematics</option>
		  	<option value="Doctor" <?php if ($iCourse == "Doctor") echo 'selected ="selected"' ?>>Doctor</option>
		  	<option value="Marketing" <?php if ($iCourse == "Marketing") echo 'selected ="selected"' ?>>Marketing</option>
		  </select>	

		<label for="semester"><b>Semester</b></label>
		  <select name="iSemester" id="isemester">
		  	<option value="" disabled="disabled" selected="selected">Please Select</option>
		  	<option value="1-2022/2023" <?php if ($iSemester == "1-2022/2023") echo 'selected ="selected"' ?>>1-2022/2023</option>
		  	<option value="2-2022/2023" <?php if ($iSemester == "2-2022/2023") echo 'selected ="selected"' ?>>2-2022/2023</option>
		  </select>  

		<label for="description"><b>Description</b></label>
		<input type="textbox" placeholder="Write anything here" name="iDesc" value="<?php echo $iDesc ?>" required>

		<label for="amount"><b>Amount</b></label>
		<input type="textbox" placeholder="XXXX.XX" name="iAmount" value="<?php echo $iAmount ?>" required>
		
		<div class="clearfix">
			<button type="button" class="cancelbtn" onClick="document.location.href='http://localhost/Faculty_Website/adminFinance/';">Cancel </button>
			<button type="submit" class="submitbtn">Update</button>
		</div>	

	</div>
</form>	

<style>
body {font-family: Arial, Helvetica, sans-serif;}
*{box-sizing: border-box;}

/*Full-width input fields*/	
input[type=text],input[type=textbox],select{
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	display: inline-block;
	border: none;
	background:  #f1f1f1;
}

input[type=text]:focus,input[type=textbox]:focus,select:focus{
	background-color: #ddd;
	outline: none;
}

#preloader{
	display: none;
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

/*Add padding to container elements*/
.container{
	padding: 16px;
	width: 80%;
}

/*Clear floats*/
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

/*Change styles for cancel button and signup button on extra small screens*/
@media screen and (max-width: 300px){
	.cancelbtn, .signupbtn{
		width: 20%;
	}
}
</style>