<x-frontend-layout :title="'News'">
   <!--==================================================-->
	<!----START BLOG  Section ----->
	<!--===================================================-->
	<div class="blog-section style-5 bg-2 pt-80 pb-80">
		<div class="container">
			<div class="row">
				@foreach ($data as $row)
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="blog-single-carousel">
						<div class="blog-thumb">
							<a href="#">
								<img src="{{asset('public') . '/'. $row->cover_photo}}" alt="Blog img">
							</a>
							<div class="blog-meta-top">
								<ul>
									{{-- <li><a href="#">Graphics</a></li>
									<li><a href="#">Technology</a></li> --}}
								</ul>
							</div>
						</div>
						<div class="blog-content">
							<div class="blog-meta">
								<span><a href="#">HIC</a></span> - <span>{{ date('j F Y', strtotime($row->publish)) }}</span>
							</div>
							<h5 class="truncate-2-lines"><a href="{{route('page.news-details', $row->id)}}">{{$row->title}}</a></h5>
							<p class="truncate-3-lines">{{$row->description}}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>

			
			<!-- Custom Pagination -->
            <div class="pagination pt-30">
                {{-- Previous Page Link --}}
                @if ($data->onFirstPage())
                    {{-- Hide Previous Button --}}
                @else
                    <a href="{{ $data->previousPageUrl() }}"><i class="fas fa-angle-double-left"></i></a>
                @endif

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $data->lastPage(); $i++)
                    @if ($data->currentPage() == $i)
                        <a href="#" class="active">{{ $i }}</a>
                    @else
                        <a href="{{ $data->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                {{-- Next Page Link --}}
                @if ($data->hasMorePages())
                    <a href="{{ $data->nextPageUrl() }}"><i class="fas fa-angle-double-right"></i></a>
                @else
                    {{-- Hide Next Button --}}
                @endif
            </div>



		</div>
	</div> 
</x-frontend-layout>