		<div class="about-section text-white">
			<h3>Master Applicants</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -> </a><a href="<?= base_url() ?>PostgraduatesAdmin_con">Postgraduates -></a> Master Applicants List</p>
		</div>
	</header>
	<!-- Master Applicants Section --->
	<section class="t-section spad">
		<h3 class="t-title">Master Applicants List</h3>
			<div class="frow">
				<div class="f-row team-name">		
					<h3>Master Applicants</h3>
					<ul>
						<tr>
							<?php foreach($master as $row): ?>
							 <li>
							 	<td><a href="<?=base_url() ?>ApplicantDetails_con/getApplicantID/<?php echo $row[0] ?>"><?php echo $row[1]?></a></td>
							 	<td><a class="but-box" href="<?=base_url() ?>DeleteMaster_con/deleteMaster/<?php echo $row[0] ?>"><i class="fa fa-trash-o"></i></a></td>
							 </li>
							 <?php endforeach; ?>		
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
	background-color: #98b4d4;
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
	margin-right: 30px;
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