<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permohonan extends Model
{
    use HasFactory;
    protected $table = 'permohonan';
    protected $fillable = [
        'user_id', 'no_imb', 'nama_pemohon', 'telp_pemohon', 'alamat_pemohon', 'nama_imb', 'alamat_imb', 'tahun', 'tujuan', 'sk_imb', 'sertifikat', 'ktp', 'foto_rumah', 'surat_kuasa', 'surat_kehilangan', 'status', 'nomor_sertifikat', 'status_tanah'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
