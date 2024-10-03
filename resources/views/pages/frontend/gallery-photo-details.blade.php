<x-frontend-layout :title="'Gallery Photo'">
	
	@push('style')
		<!-- Gallery -->
		<link href="{{asset('public/frontend')}}/css/light-gallery.min.css" rel="stylesheet">
    @endpush
    <!--==================================================-->
	<!----START PORTFOLIO Section ----->
	<!--===================================================-->
	<div class="portfolio-section style-2 pt-95 pb-85" style="background: #fff;">
		<div class="container">
			<div class="section-head text-center pb-55">
				<h5>Photo Gallery Details</h5>
				<h2>{{$data->title}}</h2>
				<span class="section-head-bar-2"></span>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- Gallery Slider -->
					<div id="lightgallery" class="row">
						@if (count($data->galleryImages)>0)
							@foreach ($data->galleryImages as $img)
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 my-2" data-responsive="{{asset('public/images/gallery')}}/img/{{ $img->image}}" data-src="{{asset('public/images/gallery')}}/img/{{ $img->image}}" data-sub-html="<h4>মানসম্মত শিক্ষা</h4><p></p>">
								<div class="thumbnail-classic">
									<a href="" class="thumbnail-classic-figure"> <img class="img-responsive" src="{{asset('public/images/gallery')}}/img/{{ $img->image}}"></a>
									<div class="thumbnail-classic-caption">
										<h5 class="thumbnail-classic-title text-info">HIC</h5>
										<time class="thumbnail-classic-time" datetime="{{date("j F, Y", strtotime($img->created_at))}}">{{date("j F, Y", strtotime($img->created_at))}}</time>
									</div>
								</div>
							</div>
							@endforeach
						@endif
					</div>
					<!-- End Gallery Slider -->
		
					<div class="text-center pb-3 my-5 mx-auto" style="max-width: 600px;">
						<a href="@if ($data->drive_url){{$data->drive_url}}@else{{route('dashboard-gallery.all')}}@endif" class="button">More Pictures</a>
					</div>
				</div>
			</div>

		</div>
	</div>

    @push('scripts')
		<!-- Light Gallery -->
		<script src="{{asset('public/frontend')}}/js/light-gallery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#lightgallery').lightGallery(); 
			});
		</script>
    @endpush
</x-frontend-layout>