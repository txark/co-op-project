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
                //Create a new company record
                Company::create([
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
