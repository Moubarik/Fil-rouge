

	<section>
		<div class="container-fluid">
			<div class="top-footer">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="foot-logo">
							<img src="{{asset('frontend/assets/img/demofooter.png')}}" style="height: 50px;" />
						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						 <div class="social">
                            <ul>
                                <li><a href="https://www.facebook.com/" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com/" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.android.com/" target="_blank" class="android"> <i class="fa fa-android"></i></a></li>
                                <li><a href="https://www.linkedin.com/" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.youtube.com/" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="apps-img">
							<ul>
								<li><a href="#"><img src="{{asset('frontend/assets/img/apps-01.png')}}" alt="" /></a></li>
								<li><a href="#"><img src="{{asset('frontend/assets/img/apps-02.png')}}" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
@php
$websitesitting = DB::table('websitesetting')->first(); 
@endphp




		
	<section class="middle-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="editor-one">

Company Address:
<br>
@if(session()->get('lang')== 'english')
{!! $websitesitting->address_en !!}
@else
{!! $websitesitting->address_fr !!}
@endif



					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-two">
						Company Phone:
						<br>
						@if(session()->get('lang')== 'english')
						{!! $websitesitting->phone_en !!}
						@else
						{!! $websitesitting->phone_fr !!}
						@endif
											</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-three">
						Company Email:
						<br>
						@if(session()->get('lang')== 'english')
						{!! $websitesitting->email !!}
						@else
						{!! $websitesitting->email !!}
						@endif					</div>
				</div>
			</div>
		</div>
	</section>
		
	<section class="bottom-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="copyright">						
						All rights reserved © 2021 AbdelMoubarik
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="btm-foot-menu">
						<ul>
							<li><a href="#">About US</a></li>
							<li><a href="#">Contact US</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	