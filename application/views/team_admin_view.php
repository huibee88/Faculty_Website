		<div class="about-section text-white">
			<h3>Team</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -></a> Team</p>
		</div>
	</header>

	<!-- Lecturer Section --->
	<section class="t-section spad">
		<h3 class="t-title">Academic Staff</h3>
			<a class= "add-but" href="<?= base_url() ?>Team_New"><i class="fa fa-plus"> Add</i></a>
			<div class="frow row">
				<div class="col-lg-6 f-row team-name">		
					<h3>Professor</h3>
					<ul>
						<tr>
							<?php foreach($professors as $row):?>
							 <li>
							 	<td><a href="<?= base_url() ?>TeamDisplayEdit/getlecturerid/<?php echo $row[0]?>">
							 	<?php echo $row[1] ?> </a></td>
							 	<td><a class="but-box" href="<?= base_url()?>Team_Logged/deleteLecturer/<?php echo $row[0]?>"><i class="fa fa-trash-o"></i></a></td>
							 	<td><a class="but-box" href="<?= base_url()?>Team_Edit/getlecturerid/<?php echo $row[0]?>"><i class="fa fa-edit"></i></a></td>
							 </li>
							 <?php endforeach;?>		
						</tr>
					</ul>
				</div>
				
				<div class="col-lg-6 f-row team-name">
						<h3>Associate Professor</h3>
						<ul>
							<tr class="but-box">
								<?php foreach($aprofessors as $row):?>
								 <li>
							 		<td><a href="<?= base_url() ?>TeamDisplayEdit/getlecturerid/<?php echo $row[0]?>">
							 		<?php echo $row[1] ?> </a></td>
							 		<td><a class="but-box" href="<?= base_url()?>Team_Logged/deleteLecturer/<?php echo $row[0]?>"><i class="fa fa-trash-o"></i></a></td>
							 		<td><a class="but-box" href="<?= base_url()?>Team_Edit/getlecturerid/<?php echo $row[0]?>"><i class="fa fa-edit"></i></a></td>
							 	 </li>
								<?php endforeach;?>	
							</tr>
						</ul>
					</div>
				
				<div class="col-lg-6 f-row team-name">
					<h3>Senior Lecturer</h3>
					<ul>
						<tr class="but-box">
							<?php foreach($slec as $row):?>
							 <li>
							 	<td><a href="<?= base_url() ?>TeamDisplayEdit/getlecturerid/<?php echo $row[0]?>">
							 	<?php echo $row[1] ?> </a></td>
							 	<td><a class="but-box" href="<?= base_url()?>Team_Logged/deleteLecturer/<?php echo $row[0]?>"><i class="fa fa-trash-o"></i></a></td>
							 	<td><a class="but-box" href="<?= base_url()?>Team_Edit/getlecturerid/<?php echo $row[0]?>"><i class="fa fa-edit"></i></a></td>
							 </li>
							<?php endforeach;?>	
						</tr>
					</ul>
				</div>
				
				<div class="col-lg-6 f-row team-name">
					<h3>Lecturer</h3>
					<ul>
						<tr class="but-box">
							<?php foreach($lec as $row):?>
							 <li>
							 	<td><a href="<?= base_url() ?>TeamDisplayEdit/getlecturerid/<?php echo $row[0]?>">
							 	<?php echo $row[1] ?> </a></td>
							 	<td><a class="but-box" href="<?= base_url()?>Team_Logged/deleteLecturer/<?php echo $row[0]?>"><i class="fa fa-trash-o"></i></a></td>
							 	<td><a class="but-box" href="<?= base_url()?>Team_Edit/getlecturerid/<?php echo $row[0]?>"><i class="fa fa-edit"></i></a></td>
							 </li>
							<?php endforeach;?>	
						</tr>	
					</ul>
				</div>
			</div>
	</section>

<style>

.t-title{
	font-size: 3rem; 
	margin-bottom: 10px;
	text-align: center;
	text-transform: uppercase;
}	
	
.t-section .frow{
	margin-left: 200px;
	margin-right: 100px;
	margin-top: 50px;
}

.team-name{
	background-color: #d5e4f5;
}

.team-name h3{
	padding-bottom: 20px;
}

.team-name li{
	list-style-type: none;
	font-size: 15px;
	padding-bottom: 10px;
}	

.team-name a{
	color: black;
}	

.team-name a:hover{
	color: darkblue;
	font-size: 15.3px;
}	

.but-box{
	float: right;
	border: 1px solid #303c6c;
	border-radius: 5px;
	margin-left: 10px;
	background-color: #ffffff;
}

.but-box i{
	color: #303c6c;
	padding: 5px;
}

.add-but {
	float: right;
	border: 1px solid #303c6c;
	border-radius: 5px;
	margin-right: 100px;
	background-color: #ffffff;
	color: #303c6c;
	padding: 5px;
}

.add-but:hover{
	font-size: 15.5px;
}
</style>