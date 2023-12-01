		<div class="about-section text-white">
			<h3>Courses</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -></a> Courses</p>
		</div>
	</header>

	<!-- corses Section --->
	<section class="c-section spad">
		<a href="<?= base_url() ?>Add_Course" class="h-add">Add</a>
		<h3 class="h-title">Main Courses</h3>
		
		
			<div class="crow row">
				<?php foreach($cname as $row): ?>
				<div class="col-lg-4 col-md-6 c-row feature-item">
					<span class="ed"><a href="<?= base_url() ?>Edit_Course/getCourseCode/<?php echo $row['ccode']?>" class="h-edit">Edit</a></span>
					<span class="ed1"><a href="<?= base_url() ?>Delete_Course/getCourseCode/<?php echo $row['ccode']?>" class="h-delete">Delete</a></span>
					<div></div>
					<div class="ft-icon">
						<i class="fas <?php echo $row['cicon'] ?>"></i>
					</div>
					<h4><?php echo $row['cname'] ?></h4>
					<p><?php echo $row['cdesc'] ?></p>
					<?php echo "<li><a href='".base_url()."ComS_Admin/getcourseID/".$row['ccode']."' class='site-btn'>Read More</a></li>" ?>
				</div>
				<?php endforeach; ?>
			</div>
	</section>

<style>
	.c-section .c-row {
	    padding: 2rem 1rem;
	}

	.c-section{
		margin-bottom: 100px;
	}

	.h-add{
		font-size: 1rem; 
		margin-right: 30px;
		float: right;
		text-transform: uppercase;
		color: #fff;
		background-color: #eb2b63;
		border-radius: 0.875rem;
		padding: 8px 15px;
		opacity: 1;
	}

	.h-add:hover{
		text-decoration: none;
		background-color: #f4511e;
		color: white;
		opacity: 0.6;
		font-size: 1.2rem; 
		transform: scale(1);
	}

	.h-title{
		margin-left: 120px;
	}

	.h-edit{
		font-size: 1rem; 
		margin-left: 10px;
		margin-bottom: 150px;
		float: left;
		text-transform: uppercase;
		color: #fff;
		background-color: #eb2b63;
		border-radius: 0.875rem;
		padding: 8px 15px;
		opacity: 1;
	}

	.h-edit:hover{
		text-decoration: none;
		background-color: #f4511e;
		color: white;
		opacity: 0.6;
		font-size: 1.2rem; 
		transform: scale(1);
	}

	.h-delete{
		font-size: 1rem; 
		margin-right: 10px;
		margin-bottom: 100px;
		float: right;
		text-transform: uppercase;
		color: #fff;
		background-color: #eb2b63;
		border-radius: 0.875rem;
		padding: 8px 15px;
		opacity: 1;
	}

	.h-delete:hover{
		text-decoration: none;
		background-color: #f4511e;
		color: white;
		opacity: 0.6;
		font-size: 1.2rem; 
		transform: scale(1);
	}

	.feature-item p{
		margin-right: 100px;
	}

	.feature-item .site-btn{
		margin-right: 20px;
	}

	li {
		list-style-type: none;
	}
</style>