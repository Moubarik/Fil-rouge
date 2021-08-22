	
    
    @extends('main.home_master')
    @section('content')
        
  @php
    
    $firstsectionbig = DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();
    $firstsection = DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(4)->get();


@endphp

<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">
	 <div class="service-img"><a href="{{ URL::to('view/post/'.$firstsectionbig->id) }}"><img src="{{asset($firstsectionbig->image)}}" width="800px" alt="Notebook"></a></div>
								<div class="content">
		 <h4 class="lead-heading-01"><a href="{{ URL::to('view/post/'.$firstsectionbig->id) }}">
             
            @if(session()->get('lang')== 'english')
            {{ $firstsectionbig->title_en }}
            @else
            {{ $firstsectionbig->title_fr }}
             @endif
        </a> </h4>
								</div>
							</div>
						</div>
						
					</div>
						<div class="row">
 @foreach ($firstsection as $row)
								<div class="col-md-3 col-sm-3">
									<div class="top-news">
										<a href="{{ URL::to('view/post/'.$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
										<h4 class="heading-02"><a href="{{ URL::to('view/post/'.$row->id) }}">   
                                                @if(session()->get('lang')== 'english')
                                            {{ $row->title_en }}
                                            @else
                                            {{ $row->title_fr }}
                                             @endif
                                            </a> </h4>
									</div>
								</div>
@endforeach     
							</div>
					
					{{-- <!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="add"><img src="{{ asset('frontend/assets/img/')}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->	 --}}
					
					<!-- news-start -->
					<div class="row">
@php
$firstcategory = DB::table('categories')->first();
$firstcatpostbig = DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',1)->first();
$firstcatpostsmall = DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();

@endphp




						<div class="col-md-6 col-sm-5">
							<div class="bg-one">
								<div class="cetagory-title"><a href="#">
                                    @if(session()->get('lang')== 'english')
                                           {{ $firstcategory->category_en }}
                                            @else
											{{ $firstcategory->category_fr }}

                                            @endif
                                      <span>
										@if(session()->get('lang')== 'english')
										More
										 @else
										 اكثر
										 @endif
                                          
										 <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
										 <div class="row">
								 <div class="col-md-6 col-sm-6">
									 <div class="top-news">
							  <a href="{{ URL::to('view/post/'.$firstcatpostbig->id) }}"><img src="{{ asset($firstcatpostbig ->image) }}" alt="Notebook"></a>
										 <h4 class="heading-02">
								 <a href="{{ URL::to('view/post/'.$firstcatpostbig->id) }}">
									 @if(session()->get('lang')== 'english')
									 {{ $firstcatpostbig->title_en }}
									 @else
									 {{ $firstcatpostbig->title_fr }}
									 @endif</a> </h4>
									 </div>
								 </div>
								 
									<div class="col-md-6 col-sm-6">
										@foreach($firstcatpostsmall as $row)

										<div class="image-title">
											<a href="{{ URL::to('view/post/'.$row->id) }}"><img src="{{asset($row->image)}}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="{{ URL::to('view/post/'.$row->id) }}">
												@if(session()->get('lang')== 'english')
												{{ $firstcatpostbig->title_en }}
												@else
												{{ $firstcatpostbig->title_fr }}
												@endif	
											
											
											</a> </h4>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>


@php
 $secondcategory = DB::table('categories')->skip(1)->first();
$secondcatpostbig = DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',1)->first();
$secondcatpostsmall = DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();

@endphp


<div class="col-md-6 col-sm-5">
	<div class="bg-one">
		<div class="cetagory-title"><a href="#">
@if(session()->get('lang')== 'english')
{{ $secondcategory->category_en }}
@else
{{ $secondcategory->category_fr }}
@endif
  <span>
@if(session()->get('lang')== 'english')
More
@else
اكثر
@endif <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>





		<div class="row">
			<div class="col-md-6 col-sm-6">
<div class="top-news">
	<a href="{{ URL::to('view/post/'.$secondcatpostbig->id) }}"><img src="{{ asset($secondcatpostbig->image) }}" alt="Notebook"></a>
	<h4 class="heading-02"><a href="{{ URL::to('view/post/'.$secondcatpostbig->id) }}">
@if(session()->get('lang')== 'english')
{{ $secondcatpostbig->title_en }}
@else
{{ $secondcatpostbig->title_fr }}
@endif</a> </h4>
</div>
</div>

			<div class="col-md-6 col-sm-6">
 @foreach($secondcatpostsmall as $row)
<div class="image-title">
	<a href="{{ URL::to('view/post/'.$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
	<h4 class="heading-03"><a href={{ URL::to('view/post/'.$row->id) }}">
@if(session()->get('lang')== 'english')
{{ $row->title_en }}
@else
{{ $row->title_fr }}
@endif</a> </h4>
</div>
@endforeach()
				 
			</div>
		</div>
	</div>
</div>
</div>					
</div>










@php
$latest = DB::table('posts')->orderBy('id','desc')->limit(5)->get();
$popular = DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(5)->get();
$highest = DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(5)->get();

@endphp

				<div class="col-md-3 col-sm-3">
					<div class="tab-header">
 						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
							@if(session()->get('lang')=='english')	
							Latest
							@else
							أضيف مؤخراً						
								@endif
							</a></li>
							<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
								@if(session()->get('lang')=='english')	
								Popular
								@else
							مقالات مشهورة 
								@endif	
							
							
							</a></li>
							<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
								
								@if(session()->get('lang')=='english')	
								Highest
								@else
								الاكثر مشاهدة
								@endif	
							
							
							
							
							</a></li>
						</ul>

 						<div class="tab-content ">
							<div role="tabpanel" class="tab-pane in active" id="tab21">
								<div class="news-titletab">
									@foreach($latest as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">
											
											@if(session()->get('lang')=='english')	
											{{ $row->title_en }}
											@else
											{{ $row->title_fr }}									
													@endif	
										
										</a> </h4>
									</div>
									@endforeach
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab22">
								<div class="news-titletab">
									@foreach($popular as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">
											
											@if(session()->get('lang')=='english')	
											{{ $row->title_en }}
											@else
											{{ $row->title_fr }}										
												@endif	
										
										</a> </h4>
									</div>
									@endforeach
								
								</div>                                          
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab23">	
								<div class="news-titletab">
									@foreach($highest as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">
											
											@if(session()->get('lang')=='english')	
											{{ $row->title_en }}
											@else
											{{ $row->title_fr }}									
													@endif	
										
										</a> </h4>
									</div>
									@endforeach
									
								</div>						                                          
							</div>
						</div>
					</div>
					<!-- Namaj Times -->
					{{-- <div class="cetagory-title-03">Prayer Time </div>
					Prayer Times count option here
					<!-- Namaj Times --> --}}
					{{-- <div class="cetagory-title-03">Old News  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">			
						</div>
						<div class="old-date-button">
							<input type="submit" value="search ">
						</div> --}}
				   </form>
				    
				   <br>
				   <div class="cetagory-title-04"> 
                    @if(session()->get('lang')== 'english')

                    Check our stores on

                     @else
                       تحقق من متاجرنا على
                     @endif
                </div>
				   <div     class="">
 
                    @php  
                        $websitelink = DB::table('websites')->get(); 
                    @endphp 
</a>
                @foreach($websitelink as $row)    

				   	<div class="news-title-02">
				   		<h4 class="heading-03"><a href="{{ $row->website_link }}"><i class="fa fa-check" aria-hidden="true"></i> {{ $row->website_name }} </a> </h4>
				   	</div>
				 
                       @endforeach

<div class="col-md-3 col-sm-3">
				
				</div>
			</div>
		</div>
	</section> 

 <section class="news-section">
	<div class="container-fluid">
	<div class="row">
	
	@php
	$threecategory = DB::table('categories')->first();
	$threecatpostbig = DB::table('posts')->where('category_id',$threecategory->id)->where('bigthumbnail',1)->first();
	$threecatpostsmall = DB::table('posts')->where('category_id',$threecategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
	@endphp
	
	<div class="col-md-6 col-sm-6">
		<div class="bg-one">
			<div class="cetagory-title-02"><a href="#">
		  @if(session()->get('lang')== 'english')
			{{ $threecategory->category_en }}
			@else
			{{ $threecategory->category_fr }}
			@endif 
			<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
			@if(session()->get('lang')== 'english')
			All Articals
			@else
			كل المقالات
			@endif   </span></a></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="top-news">
						<a href="{{ URL::to('view/post/'.$threecatpostbig->id) }}"><img src="{{ asset( $threecatpostbig->image) }}" alt="Notebook"></a>
						<h4 class="heading-02"><a href="{{ URL::to('view/post/'.$threecatpostbig->id) }}">
		   @if(session()->get('lang')== 'english')
			{{ $threecatpostbig->title_en }}
			@else
			{{ $threecatpostbig->title_fr }}
			@endif </a> </h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					@foreach($threecatpostsmall as $row)
					<div class="image-title">
						<a href="{{ URL::to('view/post/'.$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
						<h4 class="heading-03"><a href="{{ URL::to('view/post/'.$row->id) }}">
			@if(session()->get('lang')== 'english')
			{{ $row->title_en }}
			@else
			{{ $row->title_fr }}
			@endif</a> </h4>
					</div>
					 @endforeach
				</div>
			</div>
		</div>
	</div>
	
	
	
	@php
	$fourcategory = DB::table('categories')->skip(1)->first();
	$fourcatpostbig = DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',1)->first();
	$fourcatpostsmall = DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
	@endphp
	
	<div class="col-md-6 col-sm-6">
		<div class="bg-one">
			<div class="cetagory-title-02"><a href="#"> 
			@if(session()->get('lang')== 'english')
			{{ $fourcategory->category_en }}
			@else
			{{ $fourcategory->category_fr }}
			@endif  <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
			@if(session()->get('lang')== 'english')
			All Articals
			@else
			كل المقالات
			@endif   </span></a></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="top-news">
						<a href="{{ URL::to('view/post/'.$fourcatpostbig->id) }}"><img src="{{ asset($fourcatpostbig->image) }}" alt="Notebook"></a>
						<h4 class="heading-02"><a href="{{ URL::to('view/post/'.$fourcatpostbig->id) }}"> 
			@if(session()->get('lang')== 'english')
			{{ $fourcatpostbig->title_en }}
			@else
			{{ $fourcatpostbig->title_fr }}
			@endif</a> </h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					
				@foreach($fourcatpostsmall as $row)
					<div class="image-title">
						<a href="{{ URL::to('view/post/'.$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
						<h4 class="heading-03"><a href="{{ URL::to('view/post/'.$row->id) }}">
			@if(session()->get('lang')== 'english')
			{{ $row->title_en }}
			@else
			{{ $row->title_fr }}
			@endif</a> </h4>
					</div>
					 @endforeach
					 
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- ******* -->
	<div class="row">
	
		@php
	$fourcategory = DB::table('categories')->skip(2)->first();
	$fourcatpostbig = DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',1)->first();
	$fourcatpostsmall = DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
	@endphp
	
	<div class="col-md-6 col-sm-6">
		<div class="bg-one">
			<div class="cetagory-title-02"><a href="#">
			 @if(session()->get('lang')== 'english')
			{{ $fourcategory->category_en }}
			@else
			{{ $fourcategory->category_fr }}
			@endif  <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
			@if(session()->get('lang')== 'english')
			All Articals
			@else
			كل المقالات
			@endif  </span></a></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="top-news">
						<a href="{{ URL::to('view/post/'.$fourcatpostbig->id) }}"><img src="{{ asset($fourcatpostbig->image) }}" alt="Notebook"></a>
						<h4 class="heading-02"><a href="{{ URL::to('view/post/'.$fourcatpostbig->id) }}">
							@if(session()->get('lang')== 'english')
			{{ $fourcatpostbig->title_en }}
			@else
			{{ $fourcatpostbig->title_fr }}
			@endif</a> </h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					@foreach($fourcatpostsmall as $row)
					<div class="image-title">
						<a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
						<h4 class="heading-03"><a href="{{ URL::to('view/post/'.$row->id) }}">
			@if(session()->get('lang')== 'english')
			{{ $row->title_en }}
			@else
			{{ $row->title_fr }}
			@endif</a> </h4>
					</div>
					 @endforeach
					 
				</div>
			</div>
		</div>
	</div>
		@php
	$fourcategory = DB::table('categories')->skip(3)->first();
	$fourcatpostbig = DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',1)->first();
	$fourcatpostsmall = DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
	@endphp
	
	<div class="col-md-6 col-sm-6">
		<div class="bg-one">
			<div class="cetagory-title-02"><a href="#">
			 @if(session()->get('lang')== 'english')
			{{ $fourcategory->category_en }}
			@else
			{{ $fourcategory->category_fr }}
			@endif  <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
			@if(session()->get('lang')== 'english')
			All Articals
			@else
			كل المقالات
			@endif  </span></a></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="top-news">
						<a href="{{ URL::to('view/post/'.$fourcatpostbig->id) }}"><img src="{{ asset($fourcatpostbig->image) }}" alt="Notebook"></a>
						<h4 class="heading-02"><a href="{{ URL::to('view/post/'.$fourcatpostbig->id) }}">
							@if(session()->get('lang')== 'english')
			{{ $fourcatpostbig->title_en }}
			@else
			{{ $fourcatpostbig->title_fr }}
			@endif</a> </h4>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					@foreach($fourcatpostsmall as $row)
					<div class="image-title">
						<a href="{{ URL::to('view/post/'.$row->id) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
						<h4 class="heading-03"><a href="{{ URL::to('view/post/'.$row->id) }}">
			@if(session()->get('lang')== 'english')
			{{ $row->title_en }}
			@else
			{{ $row->title_fr }}
			@endif</a> </h4>
					</div>
					 @endforeach
					 
				</div>
			</div>
		</div>
	</div>
	</div>
	
	</div>
	</div>
	</div><!-- /.add-close -->	
	
	</div>
	</section><!-- /.2nd-news-section-close -->

	<!-- 3rd-news-section-start -->	
{{-- <section class="news-section">
		<div class="container-fluid ">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
					
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="top-news">
								<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="image-title">
								<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						
						</div>
					</div>
					<!-- ******* -->
					<br />
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
						
							</div>
						</div>
					</div>
			</section> --}}
			<section>		
 <br><br>


@php
$dis = DB::table('districts')->get();
@endphp
 <div class="col-md-8 col-sm-9 ">
<div classe="row">
<div class="cetagory-title-02"><a href="#">Search By District<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> </span></a></div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<form action="{{ route('searchby.districts') }}" method="get">
@csrf
<div class="row">
<div class="col-lg-4">
	<select class="form-control" id="exampleSelectGender" name="district_id">
        <option disabled="" selected="">--Select District--</option>
                     @foreach($dis as $row)
       <option value="{{ $row->id }}">{{ $row->district_en  }} </option>
                     @endforeach
                             </select>
</div>
<div class="col-lg-4">
	<select class="form-control" id="subdistrict_id" name="subdistrict_id">
        <option disabled="" selected="">--Select SubDistrict--</option>
                            </select>
</div>
<div class="col-lg-4">
<button class="btn btn-success btn-block"> Search</button>
</div>

</div>


</form>
</div>
 
<br><br><br><br>
{{-- <div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="sidebar-add">
							<img src="{{asset('frontend/assets/A/')}}" alt="" />
						</div>
					</div>
				</div><!-- /.add-close -->	
</div>		 --}}
</div>



				</div>
			</div>
		</div>
	</div>
	</section>
	


	


	
	<br><br>

	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title"> 
					@if(session()->get('lang')=='english')	
					Photo Gallery
					@else
						البوم صور
					@endif
					</div>
@php
$photobig = DB::table('photos')->where('type',1)->orderBy('id','desc')->first();
$photosmall = DB::table('photos')->where('type',0)->orderBy('id','desc')->limit(5)->get();


@endphp

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{asset($photobig->photo)}}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
	                      
								
								@foreach ($photosmall as $row)
									
								
	                            <div class="photo_img photo_border active">
	                                <img src="{{asset($row->photo)}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
										{{  $row->title   }}	                              
  </div>
	                            </div>

								@endforeach

	                        </div>
	                    </div>
	                </div>

	           
                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

  
				<script>
					var slideIndex = 1;
					showDivs(slideIndex);
					function plusDivs(n) {
					  showDivs(slideIndex += n);
					}
					function currentDiv(n) {
					  showDivs(slideIndex = n);
					}
					function showDivs(n) {
					  var i;
					  var x = document.getElementsByClassName("myPhotos");
					  var dots = document.getElementsByClassName("demo");
					  if (n > x.length) {slideIndex = 1}
					  if (n < 1) {slideIndex = x.length}
					  for (i = 0; i < x.length; i++) {
						 x[i].style.display = "none";
					  }
					  for (i = 0; i < dots.length; i++) {
						 dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
					  }
					  x[slideIndex-1].style.display = "block";
					  dots[slideIndex-1].className += " w3-opacity-off";
					}
				</script>



</div>
<div class="col-md-4 col-sm-5">
<div class="gallery_cetagory-title">
@if(session()->get('lang')== 'english')
Video Gallery
@else
البوم فديوهات
@endif    
</div>

@php
$videobig = DB::table('videos')->where('type',1)->orderBy('id','desc')->first();
$videosamll = DB::table('videos')->where('type',0)->orderBy('id','desc')->limit(4)->get();
@endphp


	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="video_screen">
				<div class="myVideos" style="width:100%">
<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
<iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $videobig->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		
			<div class="gallery_sec owl-carousel">
@foreach($videosamll as $row)
<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
<iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $row->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
@endforeach
			   

			</div>
		</div>
	</div>


	<script>
		var slideIndex = 1;
		showDivss(slideIndex);
		function plusDivs(n) {
		  showDivss(slideIndex += n);
		}
		function currentDivs(n) {
		  showDivss(slideIndex = n);
		}
		function showDivss(n) {
		  var i;
		  var x = document.getElementsByClassName("myVideos");
		  var dots = document.getElementsByClassName("demo");
		  if (n > x.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
			 x[i].style.display = "none";
		  }
		  for (i = 0; i < dots.length; i++) {
			 dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
		  }
		  x[slideIndex-1].style.display = "block";
		  dots[slideIndex-1].className += " w3-opacity-off";
		}
	</script>

</div>
</div>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
          $('select[name="district_id"]').on('change', function(){
              var district_id = $(this).val();
              if(district_id) {
                  $.ajax({
                      url: "{{  url('/get/subdistrict/frontend') }}/"+district_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subdistrict_id").empty();
                           $.each(data,function(key,value){
                               $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                               });
                      },
                     
                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>
    @endsection