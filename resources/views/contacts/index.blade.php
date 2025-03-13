<!-- resources/views/contacts/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-lg"> {{-- Card container เงาหนา, ไร้ขอบ, ขอบมน --}}
                <div class="card-header bg-transparent border-bottom-0 pt-4 pb-3"> {{-- Card header โปร่งใส, ไร้ขอบล่าง, ปรับ padding --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-people-fill text-primary me-2" style="font-size: 1.5rem;"></i> {{-- Icon นำหน้า title --}}
                            <h1 class="card-title mb-0" style="font-size: 1.75rem;">รายชื่อผู้ติดต่อ</h1> {{-- ปรับขนาด title --}}
                        </div>
                        <a href="{{ route('contacts.create') }}" class="btn btn-success rounded-pill shadow-sm"> {{-- ปุ่มเพิ่มผู้ติดต่อ style pills, เงา --}}
                            <i class="bi bi-person-plus-fill me-1"></i> เพิ่มผู้ติดต่อใหม่
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered mb-0"> {{-- Table responsive, striped, hover, bordered, margin bottom 0 --}}
                            <thead>
                                <tr class="table-primary"> {{-- Table header row สีฟ้า --}}
                                    <th>#</th>
                                    <th>ชื่อ</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>อีเมล</th>
                                    <th>การกระทำ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $index => $contact)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <a href="{{ route('contacts.show', $contact->id) }}" class="text-decoration-none">
                                                {{ $contact->name }}
                                            </a>
                                        </td>
                                        <td>{{ $contact->phone_number }}</td>
                                        <td>{{ $contact->email ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-outline-warning rounded-pill shadow-sm"> {{-- ปุ่ม แก้ไข style pills, เงา --}}
                                                    <i class="bi bi-pencil-square"></i> แก้ไข
                                                </a>
                                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill shadow-sm" onclick="return confirm('คุณต้องการลบผู้ติดต่อนี้หรือไม่?')"> {{-- ปุ่ม ลบ style pills, เงา --}}
                                                        <i class="bi bi-trash-fill"></i> ลบ
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($contacts->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">ยังไม่มีข้อมูลผู้ติดต่อ</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light border-top-0 py-3"> {{-- Card footer สีเทาอ่อน, ไร้ขอบบน, ปรับ padding --}}
                    {{-- (Footer อาจเพิ่ม pagination หรือข้อมูลสรุปอื่นๆ ได้ที่นี่) --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection