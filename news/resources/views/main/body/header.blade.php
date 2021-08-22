 
 @php
     $category = DB::table('categories')->orderBy('id','asc')->get();
     $social = DB::table('socials')->first();    
     $websitesitting = DB::table('websitesetting')->first();    

 @endphp
 
 
 

 <section class="hdr_section">
    <div class="container-fluid">			
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-4">
                <div class="header_logo">
                    <a href=""><img src="{{asset($websitesitting->logo)}}"></a> 
                    

                </div>
            </div>              
            <div class="col-xs-6 col-md-8 col-sm-8">
                <div id="menu-area" class="menu_area">
    <div class="menu_bottom">
        <nav role="navigation" class="navbar navbar-default mainmenu">
 
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('/')}}">HOME</a></li>
@foreach ($category as $row)
    
@php
$subcategory = DB::table('subcategories')->where('category_id',$row->id)->get();    

@endphp

        <li class="dropdown">
        <a href="{{ URL::to('catpost/'.$row->id.'/'.$row->category_en) }}"  >  
            @if(session()->get('lang')== 'arabic')
            {{ $row->category_fr }} 
            @else
            {{ $row->category_en }} 
            @endif
            <b class="caret"></b></a>
   
   
   
   
        <ul class="dropdown-menu">
        @foreach ($subcategory as $row)
            
        <li><a href="{{ URL::to('subcatpost/'.$row->id.'/'.$row->subcategory_en) }}">  
             @if(session()->get('lang')== 'arabic')
            {{ $row->subcategory_fr }} 
            @else
            {{ $row->subcategory_en }} 
            @endif   
         </a></li>

        @endforeach

    </ul>
    </li>
                        
@endforeach

                         
            </div>
        </nav>											
    </div>
</div>					
</div> 
<div class="col-xs-12 col-md-2 col-sm-12">
<div class="header-icon">
    <ul>
   


@if(session()->get('lang') == 'arabic')

<li class="version"><a href="{{route('lang.english')}}"><B>English</B></a></li>&nbsp;&nbsp;&nbsp;
         
@else
<li class="version"><a href="{{route('lang.arabic')}}"><B>Arabic</B></a></li>&nbsp;&nbsp;&nbsp;

@endif    
 
  <a href="{{ URL::to('/dashboard')}}" style="color:white" > LOGIN </a> 
 
    
        <li><div class="search-large-divice">
            <div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
                <div class="modal fade bd-example-modal-lg" action=" " tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="custom-search-input">
                                            <form>
                                                <div class="input-group">
                                                    <input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                                </span> </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></li>
    
        <li>
            <div class="dropdown">
                <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                <div class="dropdown-content">
                <a href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                <a href="{{$social->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                <a href="{{$social->youtube}}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
                <a href="{{$social->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                </div>
            </div>
        </li>
    </ul>
</div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                <div class="top-add"><img src="{{asset('frontend/assets/img/')}}" alt="" /></div>
            </div>
        </div>
    </div>
</section> 


 
@php 
$headline = DB::table('posts')->where('posts.headline',1)->limit(3)->get();
@endphp 



<section>
    <div class="container-fluid">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 ">

                @if(session()->get('lang')== 'english')
                POPULAR ARTICLES:

                     @else
                     الاكثر قراءة                  
                        @endif
                 
            </div>
            <div class="col-md-10 col-sm-9 scroll_02">
                <marquee>
@foreach($headline as $row)
@if(session()->get('lang')== 'english')
 {{ $row->title_en }}
 @else
 {{ $row->title_fr }}   
  @endif
@endforeach

                </marquee>
            </div>
        </div>
    </div>
</section>     

