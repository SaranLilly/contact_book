<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(); // ดึงข้อมูลผู้ติดต่อทั้งหมด
        return view('contacts.index', compact('contacts')); // ส่งข้อมูลไปยัง view 'contacts.index'
    }

    public function create()
    {
        return view('contacts.create'); // แสดง view สำหรับสร้างผู้ติดต่อใหม่
    }

    public function store(Request $request)
    {
        // Validate ข้อมูล (ตรวจสอบความถูกต้อง)
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'nullable|email', // อีเมลเป็น optional และต้องเป็น format email
        ]);

        // สร้างผู้ติดต่อใหม่
        Contact::create($request->all());

        // Redirect ไปยังหน้า index พร้อมข้อความสำเร็จ
        return redirect()->route('contacts.index')->with('success', 'เพิ่มผู้ติดต่อสำเร็จ!');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact')); // แสดง view สำหรับรายละเอียดผู้ติดต่อ
    }
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact')); // แสดง view สำหรับแก้ไขผู้ติดต่อ
    }

    public function update(Request $request, Contact $contact)
    {
        // Validate ข้อมูล (ตรวจสอบความถูกต้อง)
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'nullable|email',
        ]);

        // อัปเดตข้อมูลผู้ติดต่อ
        $contact->update($request->all());

        // Redirect ไปยังหน้า index พร้อมข้อความสำเร็จ
        return redirect()->route('contacts.index')->with('success', 'แก้ไขผู้ติดต่อสำเร็จ!');
    }
    public function destroy(Contact $contact)
    {
        $contact->delete(); // ลบผู้ติดต่อ

        // Redirect ไปยังหน้า index พร้อมข้อความสำเร็จ
        return redirect()->route('contacts.index')->with('success', 'ลบผู้ติดต่อสำเร็จ!');
    }
}
