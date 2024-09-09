<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $permohonan = Permohonan::when((Auth::user()->role == 'user'), function ($query) use ($request) {
            $query->where('user_id', Auth::user()->id);
        })->whereIn('status', ['Ceking', 'Verifikasi'])->get();
        return view('permohonan.index', compact('permohonan'));
    }

    public function selesai(Request $request): View
    {
        $permohonan = Permohonan::when((Auth::user()->role == 'user'), function ($query) use ($request) {
            $query->where('user_id', Auth::user()->id);
        })->whereIn('status', ['Siap Diambil', '⁠Berkas tidak tersimpan'])->get();
        return view('permohonan.index', compact('permohonan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('permohonan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'no_imb' => 'required|string',
            'nama_pemohon' => 'required|string',
            'nama_imb' => 'required|string',
            'alamat_pemohon' => 'required|string',
            'telp_pemohon' => 'required|string',
            'alamat_imb' => 'required|string',
            'tahun' => 'required|string',
            'tujuan' => 'required|string',
            'sk_imb' => 'sometimes|file|mimes:pdf|max:2048',
            'sertifikat' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'foto_rumah' => 'required|file|mimes:pdf|max:2048',
            'surat_kuasa' => 'sometimes|file|mimes:pdf|max:2048',
            'surat_kehilangan' => 'sometimes|file|mimes:pdf|max:2048',
            'nomor_sertifikat' => 'required|string',
            'status_tanah' => 'required|string',
        ]);
        $data['user_id'] = Auth::user()->id;
        try {
            DB::beginTransaction();
            if ($request->file('sk_imb')) {
                $data['sk_imb'] = $request->sk_imb->store('sk_imb');
            }
            $data['sertifikat'] = $request->sertifikat->store('sertifikat');
            $data['ktp'] = $request->ktp->store('ktp');
            $data['foto_rumah'] = $request->foto_rumah->store('foto_rumah');
            if ($request->file('surat_kuasa')) {
                $data['surat_kuasa'] = $request->surat_kuasa->store('surat_kuasa');
            }
            if ($request->file('surat_kehilangan')) {
                $data['surat_kehilangan'] = $request->surat_kehilangan->store('surat_kehilangan');
            }
            Permohonan::create($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('message', 'Data Gagal di buat');
            return redirect()->back();
        }
        session()->flash('message', 'Data Berhasil di buat');
        DB::commit();
        return redirect()->route('permohonan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permohonan $permohonan): View
    {
        return view('permohonan.show', compact('permohonan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permohonan $permohonan): View
    {
        return view('permohonan.edit', compact('permohonan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permohonan $permohonan)
    {
        $data = $this->validate($request, [
            'no_imb' => 'required|string',
            'nama_pemohon' => 'required|string',
            'nama_imb' => 'required|string',
            'alamat_imb' => 'required|string',
            'telp_pemohon' => 'required|string',
            'status' => 'required|string',
            'tahun' => 'required|string',
            'tujuan' => 'required|string',
            'sk_imb' => 'sometimes|file|mimes:pdf|max:2048',
            'sertifikat' => 'sometimes|file|mimes:pdf|max:2048',
            'ktp' => 'sometimes|file|mimes:pdf|max:2048',
            'foto_rumah' => 'sometimes|file|mimes:pdf|max:2048',
            'surat_kuasa' => 'sometimes|file|mimes:pdf|max:2048',
            'surat_kehilangan' => 'sometimes|file|mimes:pdf|max:2048',
            'nomor_sertifikat' => 'required|string',
            'status_tanah' => 'required|string',
        ]);
        try {
            DB::beginTransaction();
            if ($request->file('sk_imb')) {
                if (Storage::exists($permohonan->sk_imb)) {
                    Storage::delete($permohonan->sk_imb);
                }
                $data['sk_imb'] = $request->sk_imb->store('sk_imb');
            }
            if ($request->file('sertifikat')) {
                if (Storage::exists($permohonan->sertifikat)) {
                    Storage::delete($permohonan->sertifikat);
                }
                $data['sertifikat'] = $request->sertifikat->store('sertifikat');
            }
            if ($request->file('ktp')) {
                if (Storage::exists($permohonan->ktp)) {
                    Storage::delete($permohonan->ktp);
                }
                $data['ktp'] = $request->ktp->store('ktp');
            }
            if ($request->file('foto_rumah')) {
                if (Storage::exists($permohonan->foto_rumah)) {
                    Storage::delete($permohonan->foto_rumah);
                }
                $data['foto_rumah'] = $request->foto_rumah->store('foto_rumah');
            }
            if ($request->file('surat_kuasa')) {
                if ($permohonan->surat_kuasa && Storage::exists($permohonan->surat_kuasa)) {
                    Storage::delete($permohonan->surat_kuasa);
                }
                $data['surat_kuasa'] = $request->surat_kuasa->store('surat_kuasa');
            }
            if ($request->file('surat_kehilangan')) {
                if ($permohonan->surat_kehilangan && Storage::exists($permohonan->surat_kehilangan)) {
                    Storage::delete($permohonan->surat_kehilangan);
                }
                $data['surat_kehilangan'] = $request->surat_kehilangan->store('surat_kehilangan');
            }
            $permohonan->update($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('message', 'Data Gagal di buat');
            return redirect()->back();
        }
        session()->flash('message', 'Data Berhasil di buat');
        DB::commit();
        return redirect()->route('permohonan.index');
    }

    public function status(Request $request, Permohonan $permohonan)
    {
        $data = $this->validate($request, [
            'status' => 'required|string',
        ]);
        try {
            $permohonan->update($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('message', 'Data Gagal di buat');
            return redirect()->back();
        }
        session()->flash('message', 'Data Berhasil di buat');
        DB::commit();
        return redirect()->route('permohonan.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permohonan $permohonan): RedirectResponse
    {
        if ($permohonan->sk_imb) {
            if (Storage::exists($permohonan->sk_imb)) {
                Storage::delete($permohonan->sk_imb);
            }
        }
        if ($permohonan->sertifikat) {
            if (Storage::exists($permohonan->sertifikat)) {
                Storage::delete($permohonan->sertifikat);
            }
        }
        if ($permohonan->ktp) {
            if (Storage::exists($permohonan->ktp)) {
                Storage::delete($permohonan->ktp);
            }
        }
        if ($permohonan->foto_rumah) {
            if (Storage::exists($permohonan->foto_rumah)) {
                Storage::delete($permohonan->foto_rumah);
            }
        }
        if ($permohonan->surat_kuasa) {
            if (Storage::exists($permohonan->surat_kuasa)) {
                Storage::delete($permohonan->surat_kuasa);
            }
        }
        if ($permohonan->surat_kehilangan) {
            if (Storage::exists($permohonan->surat_kehilangan)) {
                Storage::delete($permohonan->surat_kehilangan);
            }
        }
        $permohonan->delete();
        session()->flash('message', 'Data Berhasil di hapus');
        return redirect()->back();
    }
}
