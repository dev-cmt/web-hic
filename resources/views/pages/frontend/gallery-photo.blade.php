<x-frontend-layout :title="'Gallery Photo'">
    <!--==================================================-->
	<!----START PORTFOLIO Section ----->
	<!--===================================================-->
	<div class="portfolio-section style-2 pt-95 pb-85" style="background: #fff;">
		<div class="container">
			<div class="section-head text-center pb-55">
				<h5>Our Photo Gallery</h5>
				<h2>Photo Gallery</h2>
				<span class="section-head-bar-2"></span>
			</div>

			<div class="row">
				@if (count($data)>0)
                	@foreach ($data as $item)
					<div class="col-lg-4 col-md-6 col-sm-12 p-0 grid-item">
						<div class="single_portfolio">
							<div class="portfolio-thumb">
								<img src="{{asset('public/images/gallery')}}/{{ $item->cover}}" alt="Portfolio">
								<div class="portfolio-icon" >
									<div class="port-icon">
										<span uk-lightbox><a  href="{{asset('public/images/gallery')}}/{{ $item->cover}}" ><i class="fas fa-image"></i></a></span>
										<a href="{{route('page.gallery-photo-details', $item->id)}}"><i class="fas fa-link"></i></a>
									</div>
								</div>
								<div class="portfolio-content">
									<h5><a href="{{route('page.gallery-photo-details', $item->id)}}">{{$item->title}}</a></h5>
									<p>HIC</p>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
                @endif

			</div>
		</div>
	</div>
</x-frontend-layout>