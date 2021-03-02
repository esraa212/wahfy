<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\CreateRequest;
use App\Http\Requests\Admin\Banner\UpdateRequest;



class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::latest()->get();
        return view('Dashboard.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banners=Banner::get();
        $order=count($banners)+1;
        return view('Dashboard.banners.create',compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {

        $data=$request->all();
        $data['image'] = $this->upload($request->file('image'));
        $banner=Banner::create($data);
        return redirect(route('admin.banners.index'))->with('success','Banner Has Been Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner=Banner::find($id);
        if(!$banner){
            return redirect(route('admin.banners.index'))->with('error','Banner Not Found');
        }
        return view('Dashboard.banners.show',compact('banner'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner=Banner::find($id);
        if(!$banner){
            return redirect(route('admin.banners.index'))->with('error','Banner Not Found');
        }
        return view('Dashboard.banners.edit',compact('banner'));
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
        $banner=Banner::find($id);
        if(!$banner){
            return redirect(route('admin.banners.index'))->with('error','Banner Not Found');
        }
        $banner->title=$request->input('title');
        $banner->description=$request->input('description');
        $banner->active=$request->input('active');
        $banner->order=$request->input('order');


        if($request->file('image')){
    
            $banner->image = $this->upload($request->file('image'));
        }

        $banner->save();
        return redirect()->back()->with('success','Banner Has Been Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner=Banner::find($id);
        if(!$banner){
            return redirect(route('admin.banners.index'))->with('error','Banner Not Found');
        }
        $banner->delete();
        return back();
    }
    public function upload($image)
    {
        $file = $image;
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/banners', $filename);
        return '/uploads/banners/' . $filename;
    }
}
