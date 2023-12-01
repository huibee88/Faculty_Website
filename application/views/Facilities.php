		<div class="about-section text-white">
			<h3>Facilities</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -></a>Facilities</p>
			<a href="<?= base_url('facilities/manage') ?>">Manage Facilities</a>
		</div>
	</header>

	<!-- Faculty Section --->
	<section class="f-section spad">
		<h3 class="h-title">Facilities in Our Faculty</h3>
		

			<div class="frow row">
				<?php foreach($facilities as $item) : ?>
				<div class="col-lg-3 f-row">
					<div class="f-image">
						<img src="<?= base_url('images/facility/'.$item->fImageName) ?>" alt="faculty">
					</div>
					
					<div class="f-container">
						<h4><?= $item->fName ?></h4>
						<p><?= $item->fDes ?></p>
					</div>
				</div>
				<?php endforeach; ?>
				
			</div>
	</section>