@extends('layouts.app')

@section('title', 'Edit Permohonan')

@push('style')

@endpush

@section('content')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Permohonan</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Permohonan</h2>
            <p class="section-lead">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('permohonan.update', $permohonan->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nama_pemohon" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-12">
                                <input id="nama_pemohon" type="text" class="form-control @error('nama_pemohon') is-invalid @enderror" value="{{ old('nama_pemohon', $permohonan->nama_pemohon) }}" name="nama_pemohon" required autocomplete="nama_pemohon">
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
                                <input id="telp_pemohon" type="text" maxlength="13" class="form-control @error('telp_pemohon') is-invalid @enderror" value="{{ old('telp_pemohon', $permohonan->telp_pemohon) }}" name="telp_pemohon" required autocomplete="telp_pemohon">
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
                                <textarea id="alamat_pemohon" class="form-control @error('alamat_pemohon') is-invalid @enderror" style="height: 100px;" name="alamat_pemohon" required autocomplete="alamat_pemohon">{{ old('alamat_pemohon', $permohonan->alamat_pemohon) }}</textarea>
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
                                <input id="no_imb" type="text" class="form-control @error('no_imb') is-invalid @enderror" value="{{ old('no_imb', $permohonan->no_imb) }}" name="no_imb" required autocomplete="no_imb">
                                @error('no_imb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_tanah" class="col-md-4 col-form-label text-md-right">{{ __('Status Tanah') }}</label>
                            <div class="col-md-12">
                                <select name="status_tanah" id="status_tanah" class="text-dark form-control" required>
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
                                <input id="nomor_sertifikat" name="nomor_sertifikat" type="text" class="form-control" placeholder="Nomor Sertifikat" value="{{ old('nomor_sertifikat', $permohonan->nomor_sertifikat) }}" required />
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
                                <input id="nama_imb" type="text" class="form-control @error('nama_imb') is-invalid @enderror" value="{{ old('nama_imb', $permohonan->nama_imb) }}" name="nama_imb" required autocomplete="nama_imb">
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
                                <textarea id="alamat_imb" style="height: 100px;" class="form-control @error('alamat_imb') is-invalid @enderror" name="alamat_imb" required autocomplete="alamat_imb">{{ old('alamat_imb', $permohonan->alamat_imb) }}</textarea>
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
                                <input id="tahun" maxlength="4" type="text" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $permohonan->tahun) }}" name="tahun" required autocomplete="tahun">
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
                                <textarea id="tujuan" class="form-control @error('tujuan') is-invalid @enderror" style="height: 100px;" name="tujuan" required autocomplete="tujuan">{{ old('tujuan', $permohonan->tujuan) }}</textarea>
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
                                <input type="file" id="sk_imb" class="form-control @error('sk_imb') is-invalid @enderror" name="sk_imb" autocomplete="sk_imb">
                                @if($permohonan->sk_imb)
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
                                <input type="file" id="sertifikat" class="form-control @error('sertifikat') is-invalid @enderror" name="sertifikat" autocomplete="sertifikat">
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
                                <input type="file" id="ktp" class="form-control @error('ktp') is-invalid @enderror" name="ktp" autocomplete="ktp">
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
                                <input type="file" id="foto_rumah" class="form-control @error('foto_rumah') is-invalid @enderror" name="foto_rumah" autocomplete="foto_rumah">
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
                                <input type="file" id="surat_kuasa" class="form-control @error('surat_kuasa') is-invalid @enderror" name="surat_kuasa" autocomplete="surat_kuasa">
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
                                <input type="file" id="surat_kehilangan" class="form-control @error('surat_kehilangan') is-invalid @enderror" name="surat_kehilangan" autocomplete="surat_kehilangan">
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
                            <div class="col-md-6">
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-success" style="float: right;" type="submit">Submit</button>
                    </form>
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
<script>
    $("#status_tanah").change(function() {
        var val = $(this).val();
        if (val == 'HAK MILIK') {
            $('#nomor_sertifikat').val('HM.');
        } else if (val == 'HAK GUNA BANGUNAN') {
            $('#nomor_sertifikat').val('HGB.');
        } else if (val == 'HAK GUNA USAHA') {
            $('#nomor_sertifikat').val('HGU.');
        } else if (val == 'HAK PAKAI') {
            $('#nomor_sertifikat').val('HP.');
        } else if (val == 'HAK PENGELOLAAN') {
            $('#nomor_sertifikat').val('HPL.');
        } else if (val == 'HAK SATUAN RUMAH SUSUN') {
            $('#nomor_sertifikat').val('HSRS.');
        } else if (val == 'TANAH NEGARA') {
            $('#nomor_sertifikat').val('TN.');
        } else {
            $('#nomor_sertifikat').val('No.');
        }
    });
    $("#telp_pemohon, #tahun").on('keyup change', function() {
        val = $(this).val() || 0;
        if (isNaN(val)) {
            $(this).val("");
        }
    });
    $('#nama_pemohon, #nama_imb').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
</script>
<!-- Page Specific JS File -->
@endpush