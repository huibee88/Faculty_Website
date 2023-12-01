<div class="about-section text-white">
		<h3>Finance Management</h3>
		<p><a href=<?= base_url('homeafter') ?>>Home -></a>Course Fee ->Insert New Fee</p>
	</div>	
</header>

<form id="formInsertNewPayment" action="<?=base_url()?>InsertCourseFee/addNew" method="post" style="border:1px solid #ccc">
	<div class="container ">
		<h1>Insert New Fee</h1>
		<p>Please fill in the details.</p>

		<p><?php echo $this -> session -> flashdata('status'); ?></p>
		<?php $string = validation_errors(); if(!empty($string)): ?>
		<?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>' ?>
		<?php endif; ?>
		<hr>
	
		<label for="course"><b>Course</b></label>
		  <select name="iCourse" id="icourse">
		  	<option value="" disabled="disabled" selected="selected">Please Select</option>
		  	<option value="Computer Science">Computer Science</option>
		  	<option value="Chemical & Biology">Chemical & Biology</option>
		  	<option value="Teaching">Teaching</option>
		  	<option value="Mathematics">Mathematics</option>
		  	<option value="Doctor">Doctor</option>
		  	<option value="Marketing">Marketing</option>
		  </select>	

		<label for="semester"><b>Semester</b></label>
		  <select name="iSemester" id="isemester">
		  	<option value="" disabled="disabled" selected="selected">Please Select</option>
		  	<option value="1-2022/2023">1-2022/2023</option>
		  	<option value="2-2022/2023">2-2022/2023</option>
		  </select>  

		<label for="description"><b>Description</b></label>
		<input type="textbox" placeholder="Write anything here" name="iDesc"required>

		<label for="amount"><b>Amount</b></label>
		<input type="textbox" placeholder="XXXX.XX" name="iAmount" required>
		
		<div class="clearfix">
			<button type="button" class="cancelbtn" onClick="document.location.href='http://localhost/Faculty_Website/adminFinance/';">Cancel </button>
			<button type="submit" class="submitbtn">Insert</button>
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

hr{
	border: 1px solod #f1f1f1;
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
	opacity:  0.9;
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