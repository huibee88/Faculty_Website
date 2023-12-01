		<div class="team-section text-white">
			<h3>Team</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -></a><a href="<?= base_url() ?>Team_LoggedS"> Team -></a> <?php foreach($name as $row):?>
				<?php echo $row ?>
				<?php endforeach;?></p>
		</div>
	</header>

	<!-- Lecturer Display Section --->
	<section class="ld-section spad">
		<div class="row">
		<div class="col-md-4">
			<div class="ld-image">
				<?php echo '<img src=" data:image;base64,' .base64_encode($img). '" alt="pics">'?>
			</div>
		</div>

		<div class="col-md-8">
			<h3><?php foreach($name as $row):?>
				<?php echo $row ?>
				<?php endforeach;?>	</h3>
			<h6 style="color: grey;"><?php foreach($position as $row):?>
									<?php echo $row ?>
									<?php endforeach;?></h6>
			<div class="row">		
				<div class="col-md-6">
				<ul class="ld-container">
					<li>
						<h6><i class="fa fa-address-card"></i> Contact</h6>
						<p><i class="fa fa-envelope"></i><?php foreach($email as $row):?>
														<?php echo $row ?>
														<?php endforeach;?></p>
						<p><i class="fa fa-phone"></i><?php foreach($phone as $row):?>
														<?php echo $row ?>
														<?php endforeach;?></p>
					</li>

					<li>
						<h6><i class="fa fa-graduation-cap"></i> Education</h6>
						<p><?php foreach($education as $row):?>
							<?php echo $row ?>
							<?php endforeach;?></p>
					</li>
				</ul>
			</div>

			<div class="col-md-6">
				<ul class="ld-container">
					<li>
						<h6><i class='fas fa-book-open'></i> Area Of Expertise</h6>
						<p><?php foreach($aoe as $row):?>
							<?php echo $row ?>
							<?php endforeach;?></p>
					</li>
			</div>	
			</div>
		</div>			
		</div>

	</section>

	<style>
		.team-section{
			margin-top: 20px;
			background: #053C5E;
			background-size: cover;
			background-position: center;
			text-align: center;
		}

		.aheader-section .team-section a{
			color: #eb2b63;
		}

		.aheader-section .team-section a:hover{
			color: #EBF2FA;
		}

		.ld-section{
			margin-left: 200px;
			margin-right: 30px;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center;
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			gap: 2rem;
			margin-bottom: 50px;
		}

		.ld-section h3{
			padding-bottom: 10px;
		}

		.ld-section h6{
			text-transform: uppercase;
		}

		.ld-section .ld-container{
			flex: 1 1 22rem;
		}

		.ld-section .ld-container li{
			width: 300px;
			background-color: lightblue;
			list-style-type: none;
			margin: 30px 0;
			padding: 20px;
		}

		.ld-section .ld-container li p{
			margin-bottom: 0px;
		}

		.ld-section .ld-container li i{
			padding-right: 13px;
		}

		.ld-image{
			width: 80%;
			height: auto;
		}
	</style>