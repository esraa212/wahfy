<?php

namespace App\Http\Controllers\Dashboard;

use Mail;
use App\Models\Customer;
use App\Models\Feedback;
use App\Mail\ReplyFeedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $feedbacks=Feedback::latest()->get();
    return view('Dashboard.feedback.index',compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback=Feedback::find($id);
        if(!$feedback){
            return redirect()->back()->with('error','FeedBack Not Found');
        }
        return view('Dashboard.feedback.show',compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=array();
        try {
            $feedback=Feedback::find($id);
            if(!$feedback){
                return redirect()->back()->with('error','FeedBack Not Found');
            }
            $customer=Customer::where('id',$feedback->customer_id)->first();
             $feedback->reply = $request->input('reply');
             $feedback->status = true;
             $feedback->save();
          
             
 $data=[
     'text'=>$feedback->feedback_text,
     'reply'=>$feedback->reply,
     'customer'=>$customer->name,
 ];
//  dd($data);
             Mail::to($customer->email)->send(new ReplyFeedback(['data'=>$data]));
 
          
             
             return redirect()->back()->with('success','Reply Has Been Sent Successfully');
 
 
        } catch (Exception $ex) {
            dd($ex);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
