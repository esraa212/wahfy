<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Area;
use App\Models\City;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Advertisment\CreateRequest;
use App\Http\Requests\Admin\Advertisment\UpdateRequest;

class AdvertismentsCroller extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $advertisments = Advertisment::latest()->get();
         return view('Dashboard.advertisments.index', compact('advertisments'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $cities =City::all();
     

         return view('Dashboard.advertisments.create', compact('cities'));
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(CreateRequest $request)
     {
         $cities='';
         foreach($request->input('city_id') as $city){
             $cities .=$city;
         }
//          $d=json_encode($cities);
//          $x=json_decode($cities);
// $a=implode('',$cities);
//         dd($request->input('city_id'),$d,$x,$a);
         $advertisment = new Advertisment;
         $advertisment->title = $request->input('title');
         $advertisment->city_id = json_encode($request->input('city_id'));
         $advertisment->area_id = json_encode($request->input('area_id'));
         $advertisment->description = $request->input('description');
         $advertisment->from = $request->input('from');
         $advertisment->to = $request->input('to');
         $advertisment->image = $this->upload($request->file('image'));
         $advertisment->save();
         return redirect(route('admin.advertisments.index'));
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         
        $advertisment = Advertisment::findOrFail($id);
         $cities =City::all();
         $areas =Area::all();


        return view('Dashboard.advertisments.show', compact('advertisment', 'cities','areas'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         
         $advertisment = Advertisment::findOrFail($id);
         
        //  $selected = json_decode($advertisment->city_id,true);
        //  dd($selected);
         $cities =City::all();
         $areas =Area::all();
         return view('Dashboard.advertisments.edit', compact('advertisment', 'cities','areas'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(UpdateRequest $request, $id)
     {
        $advertisment=Advertisment::findOrFail($id);
        $advertisment->title = $request->input('title');
        if($rwquest->input('city_id')){
            $advertisment->city_id = json_encode($request->input('city_id'));
        }
      if($request->input('area_id')){
        $advertisment->area_id = json_encode($request->input('area_id'));
      }
        $advertisment->description = $request->input('description');
        $advertisment->from = $request->input('from');
        $advertisment->to = $request->input('to');
        $advertisment->save();
        if($request->file('image')){
    
            $advertisment->image = $this->upload($request->file('image'));
        }
        $advertisment->save();
        return redirect(route('admin.advertisments.index'));
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
        $advertisment=Advertisment::findOrFail($id);
         $advertisment->delete();
         return back();
     }

     public function upload($image)
     {
         $file = $image;
         $extension = $file->getClientOriginalExtension();
         $filename = time() . '.' . $extension;
         $file->move('uploads/advertisments', $filename);
         return '/uploads/advertisments/' . $filename;
     }
 
}
