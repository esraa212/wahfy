<?php
namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $redirectTo = '/dashboard';

    protected $redirectPath = '/dashboard/login';

    public function __construct()
    {
        if (request()->redirectTo) {
            $this->redirectTo = request()->redirectTo;
        }
        $this->middleware('guest:dashboard')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email|exists:admins',
            'password' => 'required',
        ]);

        if (Auth::guard('dashboard')->attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->remember
        )) {
            return redirect()->intended(url($this->redirectTo));
        }

        return redirect()->back()->withInput($request->only(['email', 'remember']));
    }

    public function logout(Request $request)
    {
        Auth::guard('dashboard')->logout();

        $request->session()->invalidate();

        return redirect(route('admin.dashboard'));
    }

}
