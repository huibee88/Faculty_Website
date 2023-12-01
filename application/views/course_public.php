		<div class="about-section text-white">
			<h3>Courses</h3>
			<p><a href="<?= base_url() ?>Welcome">Home -></a> Courses</p>
		</div>
	</header>

	<!-- corses Section --->
	<section class="c-section spad">
		<h3 class="h-title">Main Courses</h3>
		
		<div class="crow row">
				<?php foreach($cname as $row): ?>
				<div class="col-lg-4 col-md-6 c-row feature-item">
					<div class="ft-icon">
						<i class="fas <?php echo $row['cicon'] ?>"></i>
					</div>
					<h4><?php echo $row['cname'] ?></h4>
					<p><?php echo $row['cdesc'] ?></p>
					<?php echo "<li><a href='".base_url()."ComS_Public/getcourseID/".$row['ccode']."' class='site-btn'>Read More</a></li>" ?>
				</div>
				<?php endforeach; ?>
			</div>	
	</section>

<style>
.c-section{
	margin-bottom: 100px;
}

li {
	list-style-type: none;
}
</style>