<div class="about-section text-white">
		<h3>Finance</h3>
		<p><a href="<?= base_url('homeafter') ?>">Home -></a><a href="<?=base_url()?>sFinance">Ledger</a> -> Make Payment</p>
	</div>	
</header>

<form id="paymentform" action="<?=base_url()?>Payment/uploadPayment/<?=$sCourseID?>" method="post" style="border:1px solid #ccc">
	<div class = "container">
		<h1>Payment</h1>
		<p>Fill in the payment details.</p>

		<p><?php echo $this -> session -> flashdata('status'); ?></p>
		<?php $string = validation_errors(); if(!empty($string)): ?>
		<?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>' ?>
		<?php endif; ?>
		<hr>
		
	<label for="studentID"><b>Student ID</b></label>
		<input type="text" name="sID" value="<?php echo  $sID?>" readonly>

		<label for="date"><b>Date</b></label>
		<input type="date" name="sDate" required>

		<label for="semester"><b>Semester</b></label>
		<input type="text" name="sSemester" value="<?php echo $sSemester?>" readonly>

		<label for="amount"><b>Amount</b></label>
		<input type="text" name="sAmount" value="<?php echo $sAmount?>" readonly>

		<label>Receipt</label>
		<p>Click on the "Choose File" button to upload receipt.</p>
		<input type="file" name="sReceipt" id="sreceipt" >	

		<div class="clearfix">
			<button type="button" class="cancelbtn" onClick="document.location.href='http://localhost/Faculty_Website/sFinance/';">Cancel</button>
			<button type="submit" class="submitbtn">Submit</button>
		</div>	
	</div>	
</form>	

<style>
body { font-family: Arial, Helvetica, sans-serif; }
*{ box-sizing: border-box; }

/*Full-width input fields*/	
input[type=text],input[type=date],input[type=file],select{
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	display: inline-block;
	border: none;
	background:  #f1f1f1;
}

input[type=text]:focus,input[type=date]:focus,input[type=file]:focus,select:focus{
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

</style>