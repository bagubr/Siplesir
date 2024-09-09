@extends('layouts.app')

@section('title', 'Tambah Permohonan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('content')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Permohonan</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Permohonan</h2>
            <p class="section-lead">
            <div class="card">
                <div class="card-header">{{ __('Tambah User') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('permohonan.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_pemohon" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-12">
                                <input id="nama_pemohon" type="text" class="form-control @error('nama_pemohon') is-invalid @enderror" name="nama_pemohon" required autocomplete="nama_pemohon">
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
                                <input id="telp_pemohon" maxlength="13" type="text" class="form-control @error('telp_pemohon') is-invalid @enderror" name="telp_pemohon" required autocomplete="telp_pemohon">
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
                                <textarea id="alamat_pemohon" class="form-control @error('alamat_pemohon') is-invalid @enderror" style="height: 100px;" name="alamat_pemohon" required autocomplete="alamat_pemohon"></textarea>
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
                                <input id="no_imb" type="text" class="form-control @error('no_imb') is-invalid @enderror" name="no_imb" required autocomplete="no_imb">
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
                                    <option value="HAK MILIK">HAK MILIK</option>
                                    <option value="HAK GUNA BANGUNAN">HAK GUNA BANGUNAN</option>
                                    <option value="HAK GUNA USAHA">HAK GUNA USAHA</option>
                                    <option value="HAK PAKAI">HAK PAKAI</option>
                                    <option value="HAK PENGELOLAAN">HAK PENGELOLAAN</option>
                                    <option value="HAK SATUAN RUMAH SUSUN">HAK SATUAN RUMAH SUSUN</option>
                                    <option value="TANAH YASAN (LETTER C/D)">TANAH YASAN (LETTER C/D)</option>
                                    <option value="TANAH NEGARA">TANAH NEGARA</option>
                                    <option value="TANAH WAKAF">TANAH WAKAF</option>
                                </select>
                                @error('status_tanah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="nomor_sertifikat" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Sertifikat') }}</label>
                                <input id="nomor_sertifikat" name="nomor_sertifikat" type="text" class="form-control" placeholder="Nomor Sertifikat" required />
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
                                <input id="nama_imb" type="text" class="form-control @error('nama_imb') is-invalid @enderror" name="nama_imb" required autocomplete="nama_imb">
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
                                <textarea id="alamat_imb" class="form-control @error('alamat_imb') is-invalid @enderror" style="height: 100px;" name="alamat_imb" required autocomplete="alamat_imb"></textarea>
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
                                <input id="tahun" maxlength="4" type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" required autocomplete="tahun">
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
                                <textarea id="tujuan" class="form-control @error('tujuan') is-invalid @enderror" style="height: 100px;" name="tujuan" required autocomplete="tujuan"></textarea>
                                @error('tujuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sk_imb" class="col-md-4 col-form-label text-md-right">{{ __('SK IMB') }} (Optional)</label>
                            <div class="col-md-12">
                                <input type="file" id="sk_imb" class="form-control @error('sk_imb') is-invalid @enderror" name="sk_imb" autocomplete="sk_imb">
                                @error('sk_imb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="sertifikat" class="col-md-4 col-form-label text-md-right">{{ __('Sertifikat Tanah') }} (Wajib)</label>
                            <div class="col-md-12">
                                <input type="file" id="sertifikat" class="form-control @error('sertifikat') is-invalid @enderror" name="sertifikat" required autocomplete="sertifikat">
                                @error('sertifikat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="ktp" class="col-md-4 col-form-label text-md-right">{{ __('KTP') }} (Wajib)</label>
                            <div class="col-md-12">
                                <input type="file" id="ktp" class="form-control @error('ktp') is-invalid @enderror" name="ktp" required autocomplete="ktp">
                                @error('ktp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="foto_rumah" class="col-md-4 col-form-label text-md-right">{{ __('Foto Rumah') }} (Wajib)</label>
                            <div class="col-md-12">
                                <input type="file" id="foto_rumah" class="form-control @error('foto_rumah') is-invalid @enderror" name="foto_rumah" required autocomplete="foto_rumah">
                                @error('foto_rumah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="surat_kuasa" class="col-md-4 col-form-label text-md-right">{{ __('Surat Kuasa') }} (Optional)</label>
                            <div class="col-md-12">
                                <input type="file" id="surat_kuasa" class="form-control @error('surat_kuasa') is-invalid @enderror" name="surat_kuasa" autocomplete="surat_kuasa">
                                @error('surat_kuasa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="surat_kehilangan" class="col-md-4 col-form-label text-md-right">{{ __('Surat Kehilangan') }} (Optional)</label>
                            <div class="col-md-12">
                                <input type="file" id="surat_kehilangan" class="form-control @error('surat_kehilangan') is-invalid @enderror" name="surat_kehilangan" autocomplete="surat_kehilangan">
                                @error('surat_kehilangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-success" style="float: right;" type="submit">Submit</button>
                    </form>
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
        console.log(val);
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