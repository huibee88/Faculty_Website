	<div class="about-section text-white">
		<h3>Finance Ledger</h3>
		<p><a href="<?= base_url('homeafter') ?>">Home -></a>Finance Ledger</p>
	</div>	
</header>

<body>
	<section class="fn-section spad">
	  <div class="container">	
		<div class="row fn-st-info">
			<?php foreach ($studentInfo as $row): ?>
			<div class="col-lg-4">
				<?php echo '<img src=" data:image;base64,' .base64_encode($row['sPicture']). '" alt="student pic">'?>
			</div>

			<div class="col-lg-4 student-info">
				<br><br><br>
				<h3><?php echo $row['sName']?></h3>
				<h5><?php echo $row['sID']?></h5>
				<h5><?php echo $row['sCourseName']?></h5>
				<h5><?php echo $row['sEmail']?></h5>
				<h5><?php echo $row['sPhoneNo']?></h5>
			</div>
			<?php endforeach ?>
		</div>
	  </div>
	</section>

	<section class="fn-table-section spad">
	  <div class="container">
	  		<ul class="fn-nav">
				<li><h3>Ledger</h3></li>
			</ul>
		<div class="fn-table">
			<table border="1" width="100%">
				<tr class="table-header">
					<th>#</th>
					<th>Semester</th>
					<th>Amount (RM)</th>
					<th>Date</th>
					<th>View History</th>
				</tr>

			   <?php foreach ($studentLedger as $row): ?>
				<tr>
					<th><?php echo $row['course_feeID'] ?></th>
					<th><?php echo $row['semester']?></th>
					<th><?php echo $row['Amount']?></th>
					<th><?php echo $row['Date']?></th>
					
					<?php if($row['Receipt'] == NUll){?>
					<th>
							 
						<a class="pay-btn text-center" href="<?=base_url()?>Payment/getPaymentDetail/<?php echo $row['course_feeID']?>"><i class="fa fa-exclamation-triangle"></i>Pay Now</a>

					</th>
					<?php } else { ?>
						<th><a class="viewReceipt"> <?php echo $row['Receipt'] ?></a>	</th>
					<?php } ?> 
				</tr>
				<?php endforeach ?>	
			</table>	 
		</div>

	  </div>	
	</section>
</body>


</html>

<style>
body{ font-family: 'Montserrat', sans-serif ;}
*{box-sizing:  border-box;}

.pay-btn {
	color: red;
	
}

.student-info{
	padding-left: :30px;
}

.student-info h5{
	margin: 10px ;
}

.container{
	overflow: hidden;
	margin:  0 auto;
}

.fn-table th,td{
	padding-left: 10px;
}
.fn-table-section{
	margin-bottom: 50px;
	margin-left: 20px;
	margin-right: 20px;
	background : white;
}

.row{
	display :flex;
}

.fn-title{
	margin-bottm: 50px;
	text-align:  left;
	text-transform: uppercase;
}

.fn-st-info{
	padding: 20px;
	border: 0.1rem solid #053C5E;
	background: #EBF2FA;
}

.fn-nav{
	display: inline;
}

.fn-nav li{
	display:  inline-block;
	margin-right: 50px;
}

.fn-nav li a{
	color:  black;
}

.fn-table{
	margin-bottom: 50px;
}

.fn-table th{
	margin-left: 50px;
	margin-right: 50px;
}

.table-header{
	background: #053C5E;
	color: floralwhite;
}

</style>