	<div class="about-section text-white">
		<h3>Finance</h3>
		<p><a href="<?=base_url('homeafter')?>">Home </a>->Finance Management</p>
	</div>	
</header>

<body>
	<section class="fn-table-section spad">
	  <div class="container">
	  		<ul class="fn-nav">
				<li><b>Course Fee</b></li>
				<span class="addnew-btn" style="float:right"><a href="<?=base_url()?>InsertCourseFee"><i class="fa fa-plus"></i>Add New</a></span>
			</ul>
		<div class="fn-table">
			<table border="1" width="100%">
				<tr class="table-header">
					<th>#</th>
					<th>Course</th>
					<th>Semester</th>
					<th>Description</th>
					<th>Total Fee</th>
					<th>Action</th>
				</tr>

				<?php foreach ($coursefee_info as $row): ?>
				<tr>  
					<td><?php echo $row['course_feeID']?></td>
					<td><?php echo $row['courseName']?></td>
					<td><?php echo $row['semester']?></td>
					<td><?php echo $row['description']?></td>
					<td><?php echo $row['totalfee']?></td>
					<td>
					  <a href="<?=base_url()?>EditCourseFee/getCourseFeeID/<?php echo $row['course_feeID']?>"><i class="fa fa-edit"></i></a> 
					  
					  <a href="<?=base_url()?>deleteCourseFee/getCourseFeeID/<?php echo $row['course_feeID'] ?>"><i class="fa fa-trash"></i></a>
					</td>
				</tr>	
				 <?php endforeach; ?>
			</table>	 
		</div>

	  </div>	
	</section>
</body>


</html>

<style>
body{ font-family: 'Montserrat', sans-serif ;}
*{box-sizing:  border-box;}

#preloader{
	display: none;
}

.container{
	overflow: hidden;
	margin:  0 auto;
}

.fn-table td,th{
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

.table-header td,th{
	padding-left: 10px;
}

.addNew-btn{
	float: right;
}

</style>