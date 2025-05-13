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
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:100|unique:company,company_email', // ตรวจสอบอีเมลซ้ำในฐานข้อมูล
            'password' => 'required|string|min:8|confirmed', // รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษรและยืนยันการป้อนรหัสผ่าน
        ], [
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว', // ข้อความเมื่ออีเมลซ้ำ
            'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน', // ข้อความเมื่อรหัสผ่านยืนยันไม่ตรงกัน
        ]);

        // หากตรวจพบข้อผิดพลาดในการ validate
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Begin database transaction
        DB::beginTransaction();

        
        
        try {
            // Create a new company record

            $companyId = str_pad(Company::count() + 1, 4, '0', STR_PAD_LEFT); // สร้าง company_id โดยใช้ฟังก์ชัน str_pad เพื่อให้มีความยาว 4 หลัก
            Company::create([
                'company_id' => $companyId, // สร้าง company_id โดยใช้ฟังก์ชัน str_pad เพื่อให้มีความยาว 4 หลัก
                'company_name' => $request->name, // บันทึกชื่อบริษัท
                'company_email' => $request->email, // บันทึกอีเมล
                'company_password' => Hash::make($request->password), // บันทึกรหัสผ่านที่เข้ารหัส
            ]);

            DB::commit(); // Commit transaction

            // Redirect to login page with success message
            return redirect('comp-login')->with('success', 'ลงทะเบียนสำเร็จ! กรุณาล็อกอิน.');
        } catch (\Exception $e) {
            // Rollback in case of an error
            DB::rollBack();

            // Log the error
            Log::error('Error during company registration: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการลงทะเบียน โปรดลองใหม่อีกครั้ง');
        }
    }
}
