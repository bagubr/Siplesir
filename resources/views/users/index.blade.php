@extends('layouts.app')

@section('title', 'Pemohon')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pemohon</h1>
                <div class="section-header-breadcrumb">
                    <a class="btn btn-success" href="{{route('users.create')}}">
                        Tambah
                    </a>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Pemohon</h2>
                <p class="section-lead">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($users as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->email}}</td>
                                <td>
                                    <a class="badge bg-info" href="{{route('users.edit', $p->id)}}">Edit</a>
                                    <form action="{{route('users.destroy', $p->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="badge bg-danger" style="border: none;">Delete</button>
                                    </form>
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
