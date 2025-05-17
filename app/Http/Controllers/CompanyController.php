<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    // function Company_login
    public function loginForm()
    {
        return view('comp_login');
    }
    public function loginComp(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        // dd($request->all()); // ดูข้อมูลที่ส่งมา
        $company = \App\Models\Company::where('company_email', $request->email)->first(); //ดึงข้อมูล
        // dd($company); //ดูข้อมูลบริษัทที่ดึงมา
        //ตรวสอบข้อมูล
        if($company && Hash::check($request->password, $company->company_password)) {
            // dd('Password Matched!'); // ตรวจสอบว่ารหัสผ่านตรงกันหรือไม่
            \Illuminate\Support\Facades\Auth::guard('company')->login($company);
            return redirect()->to('/'); //เปลี้ยนไปหน้าอื่น
        }else{
            // dd('Login failed'); //ตรวจสอบว่าเข้าเงื่อนไขหรือไม่
            // dd('Password Not Matched!'); // ตรวจสอบว่ารหัสผ่านไม่ตรงกันหรือไม่
            return back()->withErrors(['login'=>'อีเมลหรือรหัสผ่านไม่ถูกต้อง']);
        }
    }

    // function Company_register
    public function regisForm()
    {
        return view('comp_regis');
    }
    public function registerList(Request $request)
    {
        //  Validata ข้อมูลที่ส่งมา
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:100|unique:company,company_email',
            'password'=>'required|string|min:8|confirmed',
        ], [
            'email.unique'=>'The email address is already in use',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         //Begin a database transaction
        DB::beginTransaction();
            try {
                //สร้างCompany_id ในรูปแบบ Cxxxx
                $lastCompany = Company::orderBy('company_id', 'desc')->first();
                $newIdNum = 1;
                if ($lastCompany){
                    $lastIdNum = intval(substr($lastCompany->company_id,1));
                    $newIdNum =$lastIdNum+1;
                }
                $companyId = 'C'.str_pad($newIdNum, 4, '0', STR_PAD_LEFT);
                // ตรสจสอบความไม่ซ้ำซ้อนของ company_id (กันกรณีฉุกเฉิน)
                while (Company::where('company_id', $companyId)->exists()) {
                    $newIdNum++;
                    $companyId = 'C'.str_pad($newIdNum, 4, '0', STR_PAD_LEFT);
                }
                // Create a new company record
                Company::create([
                    'company_id'=>$companyId, //กำหนดcompany_id ตรงนี้
                    'company_name'=>$request->name,
                    'company_email'=>$request->email,
                    'company_password'=>Hash::make($request->password),
                ]);
                // dd($company);
                DB::commit(); // Commit transaction

                //redirect to other page or login page
                return redirect('comp-login')->with('success', 'Registration successful! Please log in.');
            } catch (\Exception $e) {
                //Rollback in case of an error
                DB::rollBack();

                //Log error
                Log::error('Error during company registration: '.$e->getMessage());
                //Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
            }
    }
}
