<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return inertia::render('CustomerList', [
            'customers' => Customer::all(),
        ]);
    }
    public function show_view_detail($id)
    {
        return inertia::render('ViewDetail', [
            'customer' => Customer::find($id),
        ]);
    }
    public function show_create_page()
    {
        return inertia::render('Create');
    }
    public function show_edit_page($id)
    {
        return inertia::render('Edit', [
            'customer' => Customer::find($id),
        ]);
    }
    public function add_customer(Request $request)
    {
        $err_message = [
            'fname' => [
                'required' => 'กรุณากรอกชื่อ',
                'max' => 'กรุณากรอกไม่เกิน 50 ตัวอักษร'
            ],
            'lname' => [
                'required' => 'กรุณากรอกนามสกุล',
                'max' => 'กรุณากรอกไม่เกิน 50 ตัวอักษร'
            ],
            'email' => [
                'required' => 'กรุณากรอกอีเมล',
                'max' => 'กรุณากรอกไม่เกิน 50 ตัวอักษร',
                'email' => 'กรุณากรอกเป็นรูปแบบอีเมล',
                'unique' => 'อีเมลนี้มีผู้ใช้แล้ว',
            ],
            'phone' => [
                'required' => 'กรุณากรอกเบอร์โทร',
            ],
        ];
        Customer::create(
            $request->validate([
                'fname' => ['required', 'max:50'],
                'lname' => ['required', 'max:50'],
                'email' => ['required', 'max:50', 'email', 'unique:customers'],
                'phone' => ['required', 'unique:customers'],
            ], $err_message)
        );
        return redirect('/');
    }
    public function update_customer(Request $request, $id)
    {
        $err_message = [
            'fname' => [
                'required' => 'กรุณากรอกชื่อ',
                'max' => 'กรุณากรอกไม่เกิน 50 ตัวอักษร'
            ],
            'lname' => [
                'required' => 'กรุณากรอกนามสกุล',
                'max' => 'กรุณากรอกไม่เกิน 50 ตัวอักษร'
            ],
            'email' => [
                'required' => 'กรุณากรอกอีเมล',
                'max' => 'กรุณากรอกไม่เกิน 50 ตัวอักษร',
                'email' => 'กรุณากรอกเป็นรูปแบบอีเมล',
                'unique' => 'อีเมลนี้มีผู้ใช้แล้ว',
            ],
            'phone' => [
                'required' => 'กรุณากรอกเบอร์โทร',
            ],
        ];
        Customer::find($id)->update(
            $request->validate([
                'fname' => ['required', 'max:50'],
                'lname' => ['required', 'max:50'],
                'email' => ['required', 'max:50', 'email', 'unique:customers'],
                'phone' => ['required', 'unique:customers'],
            ], $err_message)
        );
        return redirect('/');
    }
    public function delete_customer($id)
    {
        Customer::find($id)->delete();
        return redirect('/');
    }
}
