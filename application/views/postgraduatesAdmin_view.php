		<div class="about-section text-white">
			<h3>Postgraduates Applicants</h3>
			<p><a href="<?= base_url('homeafter') ?>">Home -> </a>Postgraduates </p>
		</div>
	</header>

	<!-- Postgraduates Applicants Section --->
	<section class="p-section spad">
		<h3 class="t-title">Postgraduates Applicants</h3>
			<div class="p-content">
				<div class="frow row">
					<div class="f-row team-name">		
						<div class="applicant-icon">
							<a href="<?= base_url() ?>MasterAdmin_con"><i class='fas fa-user-graduate' style='font-size:200px'></i></a>
						</div>
						<h4>Master Applicants</h4>
					</div>
					<div class="f-row team-name">		
						<div class="applicant-icon">
							<a href="<?= base_url() ?>DrAdmin_con"><i class='fas fa-user-md' style='font-size:200px'></i></a>
						</div>
						<h4>Doctor Philosophy Applicants</h4>
					</div>
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

.p-section{
	margin: 0 0 100px 50px;
}

.p-content{
	display: flex;
  	flex-wrap: wrap;
  	align-content: center;
}	
	
.p-content .frow{
	margin-left: 130px;
	margin-top: 50px;
	display: flex;
 	align-items: center;
}

.f-row.team-name{
	margin: 50px;
	box-sizing: border-box;
	padding: 50px;
	width: 500px;
}

.f-row.team-name h4{
	padding-bottom: 20px;
	text-align: center;
}	

.f-row.team-name .applicant-icon{
	padding: 30px;
	text-align: center;
	border: 3px solid blue;
	border-radius: 20px;

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