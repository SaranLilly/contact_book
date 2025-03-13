<!-- resources/views/contacts/index.blade.php -->

@extends('layouts.app')

@section('content')

    <style>
        /* Styles สำหรับหน้า index.blade.php */
        h1 {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center; /* จัดข้อความ header ให้อยู่ตรงกลาง */
            margin-bottom: 20px; /* เพิ่ม margin ด้านล่าง header */
            
        }

        .table thead tr th { /* Style สำหรับ table header cells */
            background-color: #e0e0e0; /* สีพื้นหลัง table header */
            color: #333; /* สีตัวอักษร table header */
            font-weight: bold; /* ตัวหนา table header */
            text-transform: uppercase; /* ตัวพิมพ์ใหญ่ table header */
        }
    </style>

    <h1>รายชื่อผู้ติดต่อ</h1>

    <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">เพิ่มผู้ติดต่อใหม่</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ชื่อ</th>
                <th>เบอร์โทรศัพท์</th>
                <th>อีเมล</th>
                <th>การกระทำ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td><a href="{{ route('contacts.show', $contact->id) }}">{{ $contact->name }}</a></td>
                    <td>{{ $contact->phone_number }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning">แก้ไข</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบผู้ติดต่อนี้หรือไม่?')">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection