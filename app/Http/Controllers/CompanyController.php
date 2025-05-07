<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function regisForm()
    {
        return view('comp_regis');
    }
    public function registerList(Request $request)
    {
        //  Validata ข้อมูลที่ส่งมา
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:100|unique:users',
            'password'=>'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect('/comp_regis')
                    ->withErrors($validator)
                    ->withInput();
        }

        //สร้าง User ใหม่และบันทึกลงdatabase
        $user = Company::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        //Redirect ไปยังหน้าอื่น
        return redirect()->route('comp.login')->with('success', 'Registration successful!');
    }
}
