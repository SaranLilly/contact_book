<!-- resources/views/contacts/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg"> {{-- Card container เงาหนา, ไร้ขอบ, ขอบมน --}}
                <div class="card-header bg-transparent border-bottom-0 pt-4 pb-3"> {{-- Card header โปร่งใส, ไร้ขอบล่าง, ปรับ padding --}}
                    <div class="d-flex align-items-center">
                        <i class="bi bi-pencil-square-fill text-warning me-2" style="font-size: 1.5rem;"></i> {{-- Icon แก้ไข นำหน้า title --}}
                        <h1 class="card-title mb-0" style="font-size: 1.75rem;">แก้ไขผู้ติดต่อ</h1> {{-- ปรับขนาด title --}}
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- ใช้ method PUT สำหรับ update --}}

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">ชื่อ *</label> {{-- Label ตัวหนา --}}
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name', $contact->name) }}" required> {{-- Form control ขนาดใหญ่ขึ้น --}}
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div> {{-- Error message มี margin top --}}
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label fw-bold">เบอร์โทรศัพท์ *</label> {{-- Label ตัวหนา --}}
                            <input type="text" class="form-control form-control-lg" id="phone_number" name="phone_number" value="{{ old('phone_number', $contact->phone_number) }}" required> {{-- Form control ขนาดใหญ่ขึ้น --}}
                            @error('phone_number')
                                <div class="text-danger mt-2">{{ $message }}</div> {{-- Error message มี margin top --}}
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">อีเมล</label> {{-- Label ตัวหนา --}}
                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email', $contact->email) }}"> {{-- Form control ขนาดใหญ่ขึ้น --}}
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div> {{-- Error message มี margin top --}}
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label fw-bold">ที่อยู่</label> {{-- Label ตัวหนา --}}
                            <textarea class="form-control form-control-lg" id="address" name="address">{{ old('address', $contact->address) }}</textarea> {{-- Form control ขนาดใหญ่ขึ้น --}}
                            @error('address')
                                <div class="text-danger mt-2">{{ $message }}</div> {{-- Error message มี margin top --}}
                            @enderror
                        </div>

                        <div class="mt-4 d-flex justify-content-end gap-3"> {{-- Container สำหรับ buttons จัดชิดขวา มี margin top และ gap --}}
                            <button type="submit" class="btn btn-warning rounded-pill shadow-sm btn-lg"> {{-- ปุ่ม บันทึกการแก้ไข style pills, เงา, ขนาดใหญ่ --}}
                                <i class="bi bi-check-circle-fill me-1"></i> บันทึกการแก้ไข
                            </button>
                            <a href="{{ route('contacts.index') }}" class="btn btn-secondary rounded-pill shadow-sm btn-lg"> {{-- ปุ่ม ยกเลิก style pills, เงา, ขนาดใหญ่ --}}
                                <i class="bi bi-x-circle-fill me-1"></i> ยกเลิก
                            </a>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-light border-top-0 py-3"> {{-- Card footer สีเทาอ่อน, ไร้ขอบบน, ปรับ padding --}}
                    {{-- (Footer อาจเพิ่มข้อมูลเพิ่มเติม หรือ copyright ได้ที่นี่) --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection