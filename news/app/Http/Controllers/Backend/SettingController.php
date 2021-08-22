<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}


     

    
    public function SocialSetting(){
    	$social = DB::table('socials')->first();
    	return view('backend.setting.social',compact('social'));
    }

    public function SocialUpdate( Request $request, $id ) {

        $data = array();
          $data['facebook'] = $request->facebook;
          $data['twitter'] = $request->twitter;
          $data['youtube'] = $request->youtube;
          $data['linkedin'] = $request->linkedin;
          $data['instagram'] = $request->instagram;
          DB::table('socials')->where('id',$id)->update($data);
 
          $notification = array(
              'message' => 'Social Setting Updated Successfully',
              'alert-type' => 'success'
          );
 
          return Redirect()->route('social.setting')->with($notification);
    }
 
    public function SeoSetting(){
    	$seo = DB::table('seos')->first();
    	return view('backend.setting.seo',compact('seo'));
    }

    public function SeoUpdate(Request $request, $id){

        $data = array();
          $data['meta_author'] = $request->meta_author;
          $data['meta_title'] = $request->meta_title;
          $data['meta_keyword'] = $request->meta_keyword;
          $data['meta_description'] = $request->meta_description;
          $data['google_analytics'] = $request->google_analytics;
          $data['google_verification'] = $request->google_verification;
          $data['alexa_analytics'] = $request->alexa_analytics;
          DB::table('seos')->where('id',$id)->update($data);
 
          $notification = array(
              'message' => 'Seo Setting Updated Successfully',
              'alert-type' => 'success'
          );
 
          return Redirect()->route('seo.setting')->with($notification);
    }// end Methos 
 
 
    public function WebsiteSetting(){
        $website =  DB::table('websites')->orderBy('id','desc')->paginate(5);
        return view('backend.website.index',compact('website'));
    }


    public function AddWebsiteSetting(){
        return view('backend.website.create');
    }



    public function StoreWebsite(Request $request){

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        
        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'Website Link Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('all.website')->with($notification);
    }



    

    
    public function DeleteWebsite($id){
        $website = DB::table('websites')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('all.website')->with($notification);
    }
 
 

















}
