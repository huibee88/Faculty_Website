		<div class="about-section text-white">
			<h3>Courses</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -></a> <a href="<?= base_url() ?>Courses_AdminView">Courses -></a> <?php echo $cname ?></p>
		</div>
	</header>

	<!-- ComS Section --->
	<section class="au-section spad">
		<div class="au-image">
			<?php echo '<img src=" data:image;base64,' .base64_encode($cimg). '" alt="pics">'?>
		</div>
		
		<div class="au-container">
			<h2><?php echo $ccode ?> - <?php echo $cname ?></h2>
			
			<ul>
				<li>Credit Hour : <?php echo $cch ?></li>
				<li>Year : <?php echo $cyear ?></li>
				<li>Faculty ID : <?php echo $cfID ?></li>
				<li>Description : <?php echo $cdesc ?></li>
			</ul>
		</div>
	</section>

<style>
.au-container{
	background-color: #90caf9;
}

.spad{
	margin-bottom: 100px;
}

h2{
	text-transform: uppercase;
}

ul li {
	margin: 5px;
	list-style-type: none;
}
</style>