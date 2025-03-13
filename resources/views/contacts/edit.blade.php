<!-- resources/views/contacts/edit.blade.php -->

@extends('layouts.app') 

@section('content')
    <h1>แก้ไขผู้ติดต่อ</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- ใช้ method PUT สำหรับ update --}}

        <div class="mb-3">
            <label for="name" class="form-label">ชื่อ *</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">เบอร์โทรศัพท์ *</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $contact->phone_number) }}" required>
            @error('phone_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">อีเมล</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $contact->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">ที่อยู่</label>
            <textarea class="form-control" id="address" name="address">{{ old('address', $contact->address) }}</textarea>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </form>
@endsection