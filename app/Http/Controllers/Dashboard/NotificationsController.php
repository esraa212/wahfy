<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Area;
use App\Models\City;
use App\Models\Token;
use App\Models\Customer;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notification\CreateRequest;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications=Notification::latest()->get();
        // foreach($notifications as $notification){
        //     dd(json_decode($notification->city_id,true));
        // }
  
        return view('Dashboard.notification.index', compact('notifications'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();
        $areas=Area::all();
        return view('Dashboard.notification.create', compact('cities','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification =new  Notification;
        $notification->title=$request->input('title');
        $notification->description=$request->input('description');
        $notification->city_id=json_encode($request->input('city_id'));
        $notification->area_id=json_encode($request->input('area_id'));
        $notification->push_button=1;
        $notification->save();

        if ($notification->push_button == 1) {
            $customerId = Customer::all('id');

            if ($customerId) {
                $tokens = Token::whereIn('customer_id', $customerId)->where('token', '!=', null)->pluck('token')->toArray();
             
                $data = json_encode([]);

                if ($tokens) {
                    $title = $notification->title;
                    $body = $notification->description;

                    function notifyByFirebase($title,$tokens)
                    {
                        $registrationIDs = $tokens;
                        $fcmMsg = array(
                            'body' => $content,
                            'title' => $title,
                            'sound' => "default",
                            'color' => "#203E78"
                        );

                        $fcmFields = array(
                            'registration_ids' => $registrationIDs,
                            'priority' => 'high',
                            'notification' => $fcmMsg
                        );

                        $headers = array(
                            'Authorization: key=AAAA_9ofFXI:APA91bHLD76p_alf-XO1MPvzV6IRbh--pQwSAP-vvoGAIbuT5Y54GRDPvrSrRqh_YrNp44tPxmm8j5PL9hchnx-I5Q0GblE7evuJhddnBJnj5SuVpjwMRve2hn3OMRkcpFhbz4tmCSW2',
                            'Content-Type: application/json'
                        );

                        $ch = curl_init();
                        //curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/v1/{parent=projects/1003455820171}/messages:send');
                        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
                        $result = curl_exec($ch);
                        curl_close($ch);
                        return $result;
                    }

                    $send = notifyByFirebase($title, $body, $tokens);
                    dd($send);
                }
            }
        }
        return redirect(route('admin.notifications.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification=Notification::findOrFail($id);
        $cities=City::all();
        $areas=Area::all();
        return view('Dashboard.notification.show', compact('cities','areas','notification'));
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification=Notification::findOrFail($id);
        $notification->delete();
        return back();
        }
}
