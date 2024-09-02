@extends('layouts.app')

@section('title', 'Permohonan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('content')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Permohonan</h1>
            @if (Auth::user()->role == 'user')
            <div class="section-header-breadcrumb">
                <a class="btn btn-success" href="{{route('permohonan.create')}}">
                    Tambah
                </a>
            </div>
            @endif
        </div>

        <div class="section-body">
            <h2 class="section-title">Permohonan</h2>
            <p class="section-lead">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Nama Pemohon</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Alamat Pemohon</th>
                    <th>Status</th>
                    <th>Tgl Permohonan</th>
                    <th width="20%">Aksi</th>
                </tr>
                @foreach ($permohonan as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->nama_pemohon}}</td>
                    <td>{{$p->user->email}}</td>
                    <td>{{$p->telp_pemohon}}</td>
                    <td>{{$p->alamat_pemohon}}</td>
                    <td>{{$p->status}}</td>
                    <td>{{date('d-m-Y', strtotime($p->created_at))}}</td>
                    <td>
                        <!-- @if (Auth::user()->role == 'user') -->
                        <!-- @endif -->
                        <div class="">
                            <a class="text-white btn bg-primary" href="{{route('permohonan.show', $p->id)}}"><i class="fas fa-eye"></i></a>
                            @if (Auth::user()->role == 'superadmin')
                            <a class="text-white btn bg-info" href="{{route('permohonan.edit', $p->id)}}"><i class="fas fa-edit"></i></a>
                            <form action="{{route('permohonan.destroy', $p->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white btn bg-danger" style="border: none;"><i class="fas fa-trash"></i></button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            </p>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush