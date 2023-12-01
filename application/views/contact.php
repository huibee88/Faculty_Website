		<div class="about-section text-white">
			<h3>Contact</h3>
			<p><a href="<?= base_url() ?>Welcome">Home -></a> Contact Us</p>
		</div>
	</header>

<!-- Contact Section --->
	<section class="contact-section spad">
		<div class="c-contact">
			<div class="con-row row">
				<div class="col-lg-4 col-md-6 contact-container feature-item">
					<h3>Phone</h3>
					<div class="ft-icon">
						<i class="fas fa-phone-alt"></i>
					</div>
					
					<p>(+6088) 320000 / 320474</p>
				</div>
				
				<div class="col-lg-4 col-md-6 contact-container feature-item">
					<h3> Email</h3>
					<div class="ft-icon">
						<i class="fas fa-envelope"></i>
					</div>
					
					<p>abc_official@gmail.com</p>
				</div>
				
				<div class="col-lg-4 col-md-6 contact-container feature-item">
					<h3>Address</h3>
					<div class="ft-icon">
						<i class="fas fa-map"></i>
					</div>
					
					<p>Jalan UMS, 88400 Kota Kinabalu, Sabah , Malaysia.</p>
				</div>
			</div>
		</div>
		
		<form class="c-form">
			<div class="c-row col-md-6">
				<div class="contactform">
					<label for="username"><b>Full Name</b></label>
					<input type="text" placeholder="Enter your Full Name" name="username" required>
				</div>
			</div>
			
			<div class="c-row col-md-6">
				<div class="contactform">
					<label for="email"><b>Email Address</b></label>
					<input type="email" placeholder="you@yourdomain.com" name="email" cols="80" required>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="contactform">
					<label for="subject"><b>Subject</b></label>
					<input type="text" placeholder="Subject" name="subject" required>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="contactform">
					<label for="#"><b>Message</b></label>
					<textarea placeholder="Message..." name="message" id="" cols="70" rows="10" maxlength="200" required></textarea>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="contactform cform">
					<input type="submit" value="Send Message" class="btn">
				</div>
			</div>
		</form>
	</section>
