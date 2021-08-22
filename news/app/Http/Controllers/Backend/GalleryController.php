<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;




class GalleryController extends Controller
{
  public function __construct(){
		$this->middleware('auth');
	}

  
  
  
  
  public function PhotoGallery()
    {
        $photo = DB::table('photos')->orderBy('id', 'desc')->paginate(5);
        return view('backend.gallery.photos', compact('photo'));

    }

    public function AddPhoto()
    {
        $photo = DB::table('photos')->orderBy('id', 'desc')->paginate(5);
        return view('backend.gallery.createphoto',);

    }

 public function StorePhoto(request $request){

     
$data = array();
$data['title'] = $request->title;
$data['type'] = $request->type;
 

$image = $request->photo;
if ($image) {
$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
Image::make($image)->resize(500,300)->save('image/photogallery/'.$image_one);
$data['photo'] = 'image/photogallery/'.$image_one;
//  image/photogallery/343434.png
DB::table('photos')->insert($data);

$notification = array(
'message' => 'Photo Inserted Successfully',
'alert-type' => 'success'
);

return Redirect()->route('photo.gallery')->with($notification);

}else{
return Redirect()->back();
} 
 


 }
//    end method


// public function EditPhoto($id){

//     $photos = DB::table('photos')->where('id',$id)->first();
//     return view('backend.gallery.edit',compact('photos'));
  
//   }
  
//   public function UpdatePhoto(Request $request, $id){
       
        
// $data = array();
// $data['title'] = $request->title;
// $data['type'] = $request->type;
  
  
//     $$oldimage = $request->oldimage;
//     $image = $request->image;
//       if ($image) {
//         $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
//         Image::make($image)->save('image/photogallery/'.$image_one);
//         $data['image'] = 'image/photogallery/'.$image_one;
//         // image/postimg/343434.png
//         DB::table('photos')->where('id',$id)->update($data);
//         unlink($oldimage);
  
//         $notification = array(
//         'message' => 'Photo Updated Successfully',
//         'alert-type' => 'success'
//       );
  
//       return Redirect()->route('photo.gallery')->with($notification);
      
//       }else{
//         $data['image'] = $oldimage;
//         DB::table('photos')->where('id',$id)->update($data);
         
//         $notification = array(
//         'message' => 'Photo Updated Successfully',
//         'alert-type' => 'success'
//       );
//         return Redirect()->route('photo.gallery')->with($notification);
//       } // End Condition
//   }  // End Method
  
  
  
  public function DeletePhoto($id){
    $image = DB::table('photos')->where('id',$id)->first();
    unlink($image->photo);
  
    DB::table('photos')->where('id',$id)->delete();
  
    $notification = array(
          'message' => 'Photo Deleted Successfully',
          'alert-type' => 'error'
        );
  
        return Redirect()->route('photo.gallery')->with($notification);
  }
  
  

  public function VideoGallery()
  {
      $video = DB::table('videos')->orderBy('id', 'desc')->paginate(5);
      return view('backend.gallery.video', compact('video'));

  }


  
  public function AddVideo()
  {
 return view('backend.gallery.videocreate');
  }
  

  public function StoreVideo(Request $request)
  {

     $data = array();
    $data['title'] = $request->title;
    $data['embed_code'] = $request->type;
    $data['type'] = $request->type;
DB::table('videos')->insert($data);
    $notification = array(
        'message' => 'Video Inserted Successfully',
        'alert-type' => 'info'
      );

      return Redirect()->route('video.gallery')->with($notification);
   }
  
   public function DeleteVideo($id){
    $video = DB::table('videos')->where('id',$id)->first();
  
    DB::table('videos')->where('id',$id)->delete();
  
    $notification = array(
          'message' => 'Video Deleted Successfully',
          'alert-type' => 'error'
        );
  
        return Redirect()->route('video.gallery')->with($notification);
  }

 }

 
