<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Testimonial;
use Illuminate\Http\Request;

class ImageController extends Controller
{
        public function storeImage(Request $request)
        {
            if ($request->hasFile('upload')) {
                $originName = $request->file('upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
                $request->file('upload')->move(public_path('media'), $fileName);
                $url = asset('media/'.$fileName);
                return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
            }
        }
       

public function saveTestimonialOrder(Request $request){
    $ids = $request->ids;
    $arr = explode(',',$ids);
    foreach($arr as $key=>$id){
        $do = $key + 1;
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->rank = $do;
        $testimonial->save();
    }
  }

  
}
