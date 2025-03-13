<!-- resources/views/contacts/show.blade.php -->

@extends('layouts.app') 

@section('content')
    <h1>รายละเอียดผู้ติดต่อ</h1>

    <div>
        <p><strong>ชื่อ:</strong> {{ $contact->name }}</p>
        <p><strong>เบอร์โทรศัพท์:</strong> {{ $contact->phone_number }}</p>
        <p><strong>อีเมล:</strong> {{ $contact->email ?? '-' }}</p> {{-- ใช้ ?? เพื่อแสดง '-' ถ้า email เป็น null --}}
        <p><strong>ที่อยู่:</strong> {{ $contact->address ?? '-' }}</p>
    </div>

    <div class="mt-3">
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">แก้ไข</a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('คุณต้องการลบผู้ติดต่อนี้หรือไม่?')">ลบ</button>
        </form>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">กลับไปรายชื่อผู้ติดต่อ</a>
    </div>
@endsection