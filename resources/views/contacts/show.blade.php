<!-- resources/views/contacts/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg"> {{-- Card เงาหนาขึ้น, ไม่มีเส้นขอบ, ขอบมน --}}
                <div class="card-header bg-transparent border-bottom-0 pt-4 pb-3"> {{-- Header โปร่งใส, ไม่มีเส้นขอบล่าง, ปรับ padding --}}
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-vcard-fill text-primary me-2" style="font-size: 1.5rem;"></i> {{-- Icon นำหน้า title --}}
                        <h1 class="card-title mb-0" style="font-size: 1.75rem;">รายละเอียดผู้ติดต่อ</h1> {{-- ปรับขนาด title --}}
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row"> {{-- ใช้ Definition List สำหรับจัดระเบียบข้อมูล --}}
                        <dt class="col-sm-3 fw-bold text-muted text-end mb-2">ชื่อ:</dt> {{-- Label ด้านซ้าย, ตัวหนา, สีเทา --}}
                        <dd class="col-sm-9 mb-2">{{ $contact->name }}</dd> {{-- ข้อมูลด้านขวา --}}

                        <dt class="col-sm-3 fw-bold text-muted text-end mb-2">เบอร์โทรศัพท์:</dt>
                        <dd class="col-sm-9 mb-2">{{ $contact->phone_number }}</dd>

                        <dt class="col-sm-3 fw-bold text-muted text-end mb-2">อีเมล:</dt>
                        <dd class="col-sm-9 mb-2">{{ $contact->email ?? '-' }}</dd>

                        <dt class="col-sm-3 fw-bold text-muted text-end mb-2">ที่อยู่:</dt>
                        <dd class="col-sm-9 mb-2">{{ $contact->address ?? '-' }}</dd>
                    </dl>
                </div>
                <div class="card-footer bg-light border-top-0 d-flex justify-content-between align-items-center py-3"> {{-- Footer สีเทาอ่อน, ไม่มีเส้นขอบบน, ปรับ padding --}}
                    <div class="btn-group">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning rounded-pill shadow-sm"> {{-- ปุ่ม แก้ไข แบบ pills, เงา --}}
                            <i class="bi bi-pencil-square me-1"></i> แก้ไข
                        </a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill shadow-sm" onclick="return confirm('คุณต้องการลบผู้ติดต่อนี้หรือไม่?')"> {{-- ปุ่ม ลบ แบบ pills, เงา --}}
                                <i class="bi bi-trash-fill me-1"></i> ลบ
                            </button>
                        </form>
                    </div>
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary rounded-pill shadow-sm"> {{-- ปุ่ม กลับไปรายชื่อ แบบ pills, เงา --}}
                        <i class="bi bi-arrow-left-circle-fill me-1"></i> กลับไปรายชื่อ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection