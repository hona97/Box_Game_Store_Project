<?php


namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminLoginController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $userName = $request->input('txtName');
        $password = $request->input('txtPassword');
        $admin = DB::table('account_admin')->where('adminId', $userName)->orWhere('email', $userName)->first();
        if ($admin != null && $admin->password == $password) {
            if ($admin->role == 'boss') {
                $request->session()->push('boss', $admin->name);
            } else {
                $request->session()->push("admin", $admin->name);
            }
            if ($admin->image != null) {
                $request->session()->push("adminImg", $admin->image);
            } else {
                $request->session()->push("adminImg", 'img/admin/default.png');
            }
            return redirect()->route('home');
        } else {
            return view('admin.login')->with(['message' => 'Wrong username or password']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('admin');
    }
}