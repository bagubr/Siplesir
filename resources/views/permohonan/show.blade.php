@extends('layouts.app')

@section('title', 'Detail Permohonan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('content')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Permohonan</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Permohonan</h2>
            <p class="section-lead">
            <div class="card">
                <div class="card-header">{{ __('Detail User') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_pemohon" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                        <div class="col-md-12">
                            <input id="nama_pemohon" type="text" class="form-control @error('nama_pemohon') is-invalid @enderror" value="{{ old('nama_pemohon', $permohonan->nama_pemohon) }}" name="nama_pemohon" disabled autocomplete="nama_pemohon">
                            @error('nama_pemohon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp_pemohon" class="col-md-4 col-form-label text-md-right">{{ __('Telp Pemohon') }}</label>
                        <div class="col-md-12">
                            <input id="telp_pemohon" type="text" class="form-control @error('telp_pemohon') is-invalid @enderror" value="{{ old('telp_pemohon', $permohonan->telp_pemohon) }}" name="telp_pemohon" disabled autocomplete="telp_pemohon">
                            @error('telp_pemohon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat_pemohon" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Pemohon') }}</label>
                        <div class="col-md-12">
                            <textarea id="alamat_pemohon" class="form-control @error('alamat_pemohon') is-invalid @enderror" style="height: 100px;" name="alamat_pemohon" disabled autocomplete="alamat_pemohon">{{ old('alamat_pemohon', $permohonan->alamat_pemohon) }}</textarea>
                            @error('alamat_pemohon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_imb" class="col-md-4 col-form-label text-md-right">{{ __('No IMB') }}</label>
                        <div class="col-md-12">
                            <input id="no_imb" type="text" class="form-control @error('no_imb') is-invalid @enderror" value="{{ old('no_imb', $permohonan->no_imb) }}" name="no_imb" disabled autocomplete="no_imb">
                            @error('no_imb')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_imb" class="col-md-4 col-form-label text-md-right">{{ __('Status Tanah') }}</label>
                        <div class="col-md-12">
                            <select name="status_tanah" id="status_tanah" class="text-dark form-control" disabled>
                                <option value="">--- Pilih Status Tanah ---</option>
                                <option value="HAK MILIK" {{($permohonan->status_tanah == 'HAK MILIK')?'selected':''}}>HAK MILIK</option>
                                <option value="HAK GUNA BANGUNAN" {{($permohonan->status_tanah == 'HAK GUNA BANGUNAN')?'selected':''}}>HAK GUNA BANGUNAN</option>
                                <option value="HAK GUNA USAHA" {{($permohonan->status_tanah == 'HAK GUNA USAHA')?'selected':''}}>HAK GUNA USAHA</option>
                                <option value="HAK PAKAI" {{($permohonan->status_tanah == 'HAK PAKAI')?'selected':''}}>HAK PAKAI</option>
                                <option value="HAK PENGELOLAAN" {{($permohonan->status_tanah == 'HAK PENGELOLAAN')?'selected':''}}>HAK PENGELOLAAN</option>
                                <option value="HAK SATUAN RUMAH SUSUN" {{($permohonan->status_tanah == 'HAK SATUAN RUMAH SUSUN')?'selected':''}}>HAK SATUAN RUMAH SUSUN</option>
                                <option value="TANAH YASAN (LETTER C/D)" {{($permohonan->status_tanah == 'TANAH YASAN (LETTER C/D)')?'selected':''}}>TANAH YASAN (LETTER C/D)</option>
                                <option value="TANAH NEGARA" {{($permohonan->status_tanah == 'TANAH NEGARA')?'selected':''}}>TANAH NEGARA</option>
                                <option value="TANAH WAKAF" {{($permohonan->status_tanah == 'TANAH WAKAF')?'selected':''}}>TANAH WAKAF</option>
                            </select>
                            @error('status_tanah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor_sertifikat" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Sertifikat') }}</label>
                        <div class="col-md-12">
                            <input id="nomor_sertifikat" name="nomor_sertifikat" type="text" class="form-control" placeholder="Nomor Sertifikat" value="{{ old('nomor_sertifikat', $permohonan->nomor_sertifikat) }}" disabled />
                            @error('nomor_sertifikat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_imb" class="col-md-4 col-form-label text-md-right">{{ __('Nama di IMB') }}</label>
                        <div class="col-md-12">
                            <input id="nama_imb" type="text" class="form-control @error('nama_imb') is-invalid @enderror" value="{{ old('nama_imb', $permohonan->nama_imb) }}" name="nama_imb" disabled autocomplete="nama_imb">
                            @error('nama_imb')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat_imb" class="col-md-4 col-form-label text-md-right">{{ __('Alamat di IMB') }}</label>
                        <div class="col-md-12">
                            <textarea id="alamat_imb" style="height: 100px;" class="form-control @error('alamat_imb') is-invalid @enderror" name="alamat_imb" disabled autocomplete="alamat_imb">{{ old('alamat_imb', $permohonan->alamat_imb) }}</textarea>
                            @error('alamat_imb')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tahun" class="col-md-4 col-form-label text-md-right">{{ __('Tahun Pembuatan') }}</label>
                        <div class="col-md-12">
                            <input id="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $permohonan->tahun) }}" name="tahun" disabled autocomplete="tahun">
                            @error('tahun')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tujuan" class="col-md-4 col-form-label text-md-right">{{ __('Tujuan Pengajuan') }}</label>
                        <div class="col-md-12">
                            <textarea id="tujuan" class="form-control @error('tujuan') is-invalid @enderror" style="height: 100px;" name="tujuan" disabled autocomplete="tujuan">{{ old('tujuan', $permohonan->tujuan) }}</textarea>
                            @error('tujuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sk_imb" class="col-md-4 col-form-label text-md-right">{{ __('SK IMB') }} (Wajib)</label>
                        <div class="col-md-12">
                            @if($permohonan->surat_kehilangan)
                            <a href="{{asset('storage/'.$permohonan->sk_imb)}}" class="btn btn-success mt-2" target="download">Download</a>
                            <a href="{{asset('storage/'.$permohonan->sk_imb)}}" class="btn btn-secondary mt-2" target="_blank">View</a>
                            @endif
                            @error('sk_imb')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="sertifikat" class="col-md-4 col-form-label text-md-right">{{ __('Sertifikat Tanah') }} (Wajib)</label>
                        <div class="col-md-12">
                            <a href="{{asset('storage/'.$permohonan->sertifikat)}}" class="btn btn-success mt-2" target="download">Download</a>
                            <a href="{{asset('storage/'.$permohonan->sertifikat)}}" class="btn btn-secondary mt-2" target="_blank">View</a>
                            @error('sertifikat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="ktp" class="col-md-4 col-form-label text-md-right">{{ __('KTP') }} (Wajib)</label>
                        <div class="col-md-12">
                            <a href="{{asset('storage/'.$permohonan->ktp)}}" class="btn btn-success mt-2" target="download">Download</a>
                            <a href="{{asset('storage/'.$permohonan->ktp)}}" class="btn btn-secondary mt-2" target="_blank">View</a>
                            @error('ktp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="foto_rumah" class="col-md-4 col-form-label text-md-right">{{ __('Foto Rumah') }} (Wajib)</label>
                        <div class="col-md-12">
                            <a href="{{asset('storage/'.$permohonan->foto_rumah)}}" class="btn btn-success mt-2" target="download">Download</a>
                            <a href="{{asset('storage/'.$permohonan->foto_rumah)}}" class="btn btn-secondary mt-2" target="_blank">View</a>
                            @error('foto_rumah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="surat_kuasa" class="col-md-4 col-form-label text-md-right">{{ __('Surat Kuasa') }} (Optional)</label>
                        <div class="col-md-12">
                            @if ($permohonan->surat_kuasa)
                            <a href="{{asset('storage/'.$permohonan->surat_kuasa)}}" class="btn btn-success mt-2" target="download">Download</a>
                            <a href="{{asset('storage/'.$permohonan->surat_kuasa)}}" class="btn btn-secondary mt-2" target="_blank">View</a>
                            @endif
                            @error('surat_kuasa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="surat_kehilangan" class="col-md-4 col-form-label text-md-right">{{ __('Surat Kehilangan') }} (Optional)</label>
                        <div class="col-md-12">
                            @if($permohonan->surat_kehilangan)
                            <a href="{{asset('storage/'.$permohonan->surat_kehilangan)}}" class="btn btn-success mt-2" target="download">Download</a>
                            <a href="{{asset('storage/'.$permohonan->surat_kehilangan)}}" class="btn btn-secondary mt-2" target="_blank">View</a>
                            @endif
                            @error('surat_kehilangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @if (Auth::user()->role == 'superadmin')
                        <form method="POST" action="{{ route('permohonan.update.status', $permohonan->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <div class="section-title">Pilih Status</div>
                                <div class="form-group">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="Verifikasi" class="selectgroup-input" {{($permohonan->status == 'Verifikasi')?'checked':''}}>
                                            <span class="selectgroup-button">Verifikasi</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="Ceking" class="selectgroup-input" {{($permohonan->status == 'Ceking')?'checked':''}}>
                                            <span class="selectgroup-button">Ceking</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="Siap Diambil" class="selectgroup-input" {{($permohonan->status == 'Siap Diambil')?'checked':''}}>
                                            <span class="selectgroup-button">Siap Diambil</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="⁠Berkas tidak tersimpan" class="selectgroup-input" {{($permohonan->status == '⁠Berkas tidak tersimpan')?'checked':''}}>
                                            <span class="selectgroup-button">⁠Berkas tidak tersimpan</span>
                                        </label>
                                    </div>
                                </div>

                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>
                    <button class="btn btn-success" style="float: right;" type="submit">Submit</button>
                    </form>
                    @endif
                    <a href="{{route('permohonan.index')}}"><button class="btn btn-secondary">Kembali</button></a>
                </div>
            </div>

            </p>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush