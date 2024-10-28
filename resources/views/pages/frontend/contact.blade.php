<x-frontend-layout :title="'Contact'">
    <!--==================================================-->
	<!-----Start Appoinment Section ----->
	<!--===================================================-->
	<div class="contact-us pt-90 pb-90">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 pl-0 pr-0">
					<div class="contact_from_box">
						<div class="contact_title pb-4">
							<h3>Get In Touch</h3>
						</div>
						<form action="{{route('contact-us.store')}}" method="post" enctype="multipart/form-data" class="form"> 
							@csrf
							<div class="row">
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" @guest value="{{ old('name')}}" @endguest @auth value="{{Auth::user()->name}}" @endauth  placeholder="Your Name">
										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" @guest value="{{old('email')}}" @endguest @auth value="{{Auth::user()->email}}" @endauth placeholder="Your Email">
										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Phone">
										@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" class="form-control @error('last_qualification') is-invalid @enderror" name="last_qualification" value="{{old('last_qualification')}}" placeholder="Last Qualification">
										@error('last_qualification')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								
								<div class="col-lg-12">
									<div class="form_box mb-30">
										<textarea class="form-control py-3 @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" cols="30" rows="10" placeholder="Message"></textarea>
										@error('description')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="quote_btn">
										<button class="btn" type="submit">Send Message</button>
									</div>
								</div>
							</div>
						</form>
						<div id="status"></div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 pl-0 pr-0">
					<div class="cda-content-area">
						<div class="cda-single-content d-flex">
							<div class="cda-icon">
								<i class="flaticon-time"></i>
							</div>
							<div class="cda-content-inner">
							    <h4>H & I Council</h4>
							    <h4>Dhaka Office</h4>
								<p>Landmark Tower, 5th Floor, 129 Kalabagan, Mirpur Road, Dhaka 1205</p>
							</div>
						</div>
						<div class="cda-single-content hr d-flex">
							<div class="cda-icon">
								<i class="flaticon-call"></i>
							</div>
							<div class="cda-content-inner">
								<h4>Telephone Number</h4>
							<p>+880 1715 564 383</p>
							</div>
						</div>
						<div class="cda-single-content hr d-flex">
							<div class="cda-icon">
								<i class="flaticon-next-1"></i>
							</div>
							<div class="cda-content-inner">
								<h4>Our Email Address</h4>
							<p>hic_bd@yahoo.com</p>
							</div>
						</div>
						<div class="cda-single-content d-flex">
							<div class="cda-icon">
								<i class="flaticon-time"></i>
							</div>
							<div class="cda-content-inner">
							    <h4>H & I Council</h4>
								<h4>Chattogram Office</h4>
								<p>Kashem Villa (1st Floor) (Beside Daily Purbukun office)1320 East Nasirabad, CDA Avenue Chittagong- 4000.</p>
							</div>
						</div>
							<div class="cda-single-content hr d-flex">
							<div class="cda-icon">
								<i class="flaticon-call"></i>
							</div>
							<div class="cda-content-inner">
								<h4>Telephone Number</h4>
							<p>+880 1711 781 451</p>
							</div>
						</div>
						<div class="cda-single-content hr d-flex">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-----Start Contact Location Section ----->
	<!--===================================================-->	
	<div class="map-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 p-0">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2705.683540278336!2d90.37735057373052!3d23.74882338883987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a49288bcb1%3A0xbba9d301816fa506!2sH%20%26%20I%20Council!5e1!3m2!1sen!2sbd!4v1727030234571!5m2!1sen!2sbd" width="1920" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	@if (session()->has('success'))
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Success!',
				text: '{{ session('success') }}',
			});
		</script>
	@endif
</x-frontend-layout>