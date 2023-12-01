	<!-- Header Section -->	
		<div class="about-section text-white">
			<h3>Postgraduates</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -></a>Postgraduates</p>
		</div>
	</header>

	<!-- Postgraduates Section --->
	<section class="p-section spad">

		<h3 class="h-title">Our Programmes</h3>

			<?php foreach($programme as $row):?>
			<div class="prow row">
				<!-- 1st programme --> 
				
				<div class="col-lg-6 p-row">
					<div class="p-image">
						<img src="data:image;base64,<?php echo base64_encode($row['p_img'])?>" alt="faculty">
					</div>
				</div>				
				<div class="col-lg-6 p-row">
					<div class="p-container">						
						<h3><?php echo $row['p_name']?></h3>
						<p><?php echo $row['p_desc']?></p>
						<a href="<?= base_url() ?>ApplicationAfterLogin_con" class="site-btn">Apply Now</a>
					</div>
				</div>
			</div>
			<?php endforeach;?>
	</section>

<style>
	.p-section{
		margin-bottom: 50px;
	}

	.p-section .prow{
		margin-left: 20px;
		margin-right: 20px;
		margin-top: 50px;
		display: flex;
	}

	.p-section .prow:nth-child(even){
		flex-direction: row-reverse;
	}

	.p-row{
		margin-bottom: 80px;
	}

	.p-image img{
		margin-left: 5rem;
		width: 80%;
		height: 350px;
	}

	.p-row .p-container{
		padding: 50px 50px;
		background: #EBF2FA;
	}

	.p-row .p-container h3{
		padding-bottom: 30px;
	}

</style>