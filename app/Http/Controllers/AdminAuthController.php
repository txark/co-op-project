<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('admin_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $admin = \App\Models\Admin::where('admin_username', $request->username)->first(); //ดึงข้อมูล

        //ตรวจสอบข้อมูล
        if ($admin && $admin->admin_password === $request->password) {
            \Illuminate\Support\Facades\Auth::guard('admin')->login($admin);
            return redirect()->to('/');
        }else{
            return back()->withErrors(['login' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
        }
    }
}
