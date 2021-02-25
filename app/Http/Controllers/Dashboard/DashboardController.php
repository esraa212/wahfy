<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminAuth');
    }

    public function index()
    {
     
        
        return view('Dashboard.index');
    }
}
