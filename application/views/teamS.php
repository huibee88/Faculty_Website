		<div class="about-section text-white">
			<h3>Team</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -></a> Team</p>
		</div>
	</header>

	<!-- Lecturer Section --->
	<section class="t-section spad">
		<h3 class="h-title">Academic Staff</h3>
		
			<div class="frow row">
				<div class="col-lg-6 f-row team-name">		
					<h3>Professor</h3>
					<ul>
						<tr>
							<?php foreach($professors as $row):?>
							<?php echo "<li><a href='" .base_url(). "TeamDisplayS/getlecturerid/". $row[0]. "'>" .$row[1]. "</a></li>"?>
							<?php endforeach;?>		
						</tr>
					</ul>
				</div>
				
				<div class="col-lg-6 f-row team-name">
						<h3>Associate Professor</h3>
						<ul>
							<?php foreach($aprofessors as $row):?>
							<?php echo "<li><a href='" .base_url(). "TeamDisplayS/getlecturerid/". $row[0]. "'>" .$row[1]. "</a></li>"?>
							<?php endforeach;?>	
						</ul>
					</div>
				
				<div class="col-lg-6 f-row team-name">
					<h3>Senior Lecturer</h3>
					<ul>
						<?php foreach($slec as $row):?>
						<?php echo "<li><a href='" .base_url(). "TeamDisplayS/getlecturerid/". $row[0]. "'>" .$row[1]. "</a></li>"?>
						<?php endforeach;?>	
					</ul>
				</div>
				
				<div class="col-lg-6 f-row team-name">
					<h3>Lecturer</h3>
					<ul>
						<?php foreach($lec as $row):?>
						<?php echo "<li><a href='" .base_url(). "TeamDisplayS/getlecturerid/". $row[0]. "'>" .$row[1]. "</a></li>"?>
						<?php endforeach;?>	
					</ul>
				</div>
			</div>
	</section>

<style>
	
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
	font-size: 16px;
}	
</style>