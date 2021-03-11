<?php
  
namespace App\Traits;
  
use Illuminate\Http\Request;
  
trait dashbordTrait {
  
    /**
     * @param Request $request
     * @return $this|false|string
     */
     public function upload($image,$directory)
     {
         $file = $image;
         $extension = $file->getClientOriginalExtension();
         $filename = time() . '.' . $extension;
         $file->move('uploads/'.$directory.'', $filename);
         return '/uploads/'.$directory.'/' . $filename;
     }
  
}   
   
  