<?php
namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Admins\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['AdminAuth']);
    }

    public function showProfile()
    {
        /** @var Admin $admin */
        $admin = Auth::guard('dashboard')->user();

        return view('Dashboard.profile', compact('admin'));
    }

    public function profile(Request $request)
    {
        /** @var Admin $admin */
        $admin = Auth::guard('dashboard')->user();

        $data = $request->validate([
            'name'  => 'required|regex:/[a-zA-Z][0-9a-zA-Z_]*/',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
        ]);

        if ($request['new_password']) {
            /** @var string $oldPassword */
            
            $hasher = app('hash');
            if (!$hasher->check($request['old_password'], $admin->password)) {
                return redirect()->back()
                    ->with('warning', 'Old password is incorrect!');
            }

            if ($request['confirm_new_password'] !== $request['new_password']) {
                return redirect()->back()
                    ->with('warning', 'please confirm your password');
            }
            $data['password'] = $request['new_password'];
        }

        $admin->update($data);

        return redirect()->back()
            ->with('success', 'Admin is updated!');
    }
}
