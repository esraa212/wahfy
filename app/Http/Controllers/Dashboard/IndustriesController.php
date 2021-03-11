<?php
namespace App\Http\Controllers\Dashboard;
use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Industry\CreateRequest;
use App\Http\Requests\Admin\Industry\UpdateRequest;
use App\Traits\dashbordTrait;
class IndustriesController extends Controller
{
       use dashbordTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        $industries = Industry::all();
        return view('Dashboard.industries.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.industries.create');
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
        $data['image'] = $this->upload($request->file('image'),'industries');
        $Industry = Industry::create($data);
        return redirect(route('admin.industries.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $industry = Industry::findOrFail($id);

        return view('Dashboard.industries.edit', compact('industry'));
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
        $industry = Industry::findOrFail($id);
        $industry->name=$request->input('name');
         if($request->file('image')){

            $industry->image = $this->upload($request->file('image'),'industries');
        }
        $industry->save();
        return redirect(route('admin.industries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industry = Industry::findOrFail($id);
        $industry->delete();
        return back();
    }

   
}
