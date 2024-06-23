<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kota;

class Base extends Component
{
    public $kota;
    public $selectedKota;
    public $isEditing = false;
    public $isPrinting = false;

    public $namaKota;
    public $namaPemimpin;
    public $tglBerdiri;
    public $jmlPenduduk;
    public $luasWilayah;
    public $jenisKota;
    public $keunggulan;

    public function mount()
    {
        $this->kota = Kota::all();
    }

    public function edit($idKota)
    {
        $this->selectedKota = Kota::find($idKota);

        $this->namaKota = $this->selectedKota->namaKota;
        $this->namaPemimpin = $this->selectedKota->namaPemimpin;
        $this->tglBerdiri = $this->selectedKota->tglBerdiri;
        $this->jmlPenduduk = $this->selectedKota->jmlPenduduk;
        $this->luasWilayah = $this->selectedKota->luasWilayah;
        $this->jenisKota = $this->selectedKota->jenisKota;
        $this->keunggulan = $this->selectedKota->keunggulan;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'namaKota' => 'required|string|max:15',
            'namaPemimpin' => 'required|string|max:20',
            'tglBerdiri' => 'required|date',
            'jmlPenduduk' => 'required|integer',
            'luasWilayah' => 'required|numeric',
            'jenisKota' => 'required|in:Istimewa,Otonom,Percontohan',
            'keunggulan' => 'required|string',
        ]);

        $this->selectedKota->update([
            'namaKota' => $this->namaKota,
            'namaPemimpin' => $this->namaPemimpin,
            'tglBerdiri' => $this->tglBerdiri,
            'jmlPenduduk' => $this->jmlPenduduk,
            'luasWilayah' => $this->luasWilayah,
            'jenisKota' => $this->jenisKota,
            'keunggulan' => $this->keunggulan,
        ]);

        $this->resetForm();
        $this->kota = Kota::all();
    }

    public function create()
    {
        $this->validate([
            'namaKota' => 'required|string|max:15',
            'namaPemimpin' => 'required|string|max:20',
            'tglBerdiri' => 'required|date',
            'jmlPenduduk' => 'required|integer',
            'luasWilayah' => 'required|numeric',
            'jenisKota' => 'required|in:Istimewa,Otonom,Percontohan',
            'keunggulan' => 'required|string',
        ]);

        Kota::create([
            'namaKota' => $this->namaKota,
            'namaPemimpin' => $this->namaPemimpin,
            'tglBerdiri' => $this->tglBerdiri,
            'jmlPenduduk' => $this->jmlPenduduk,
            'luasWilayah' => $this->luasWilayah,
            'jenisKota' => $this->jenisKota,
            'keunggulan' => $this->keunggulan,
        ]);

        $this->resetForm();
        $this->kota = Kota::all();
    }

    public function delete($idKota)
    {
        $kota = Kota::find($idKota);
        if ($kota) {
            $kota->delete();
            $this->kota = Kota::all(); // Refresh the list of kota
        }
    }

    private function resetForm()
    {
        $this->selectedKota = null;
        $this->isEditing = false;
        $this->namaKota = '';
        $this->namaPemimpin = '';
        $this->tglBerdiri = '';
        $this->jmlPenduduk = '';
        $this->luasWilayah = '';
        $this->jenisKota = '';
        $this->keunggulan = '';
    }

    public function print($idKota)
    {
        $this->selectedKota = Kota::find($idKota);
        $this->isPrinting = true;
        $this->dispatch('print');
    }

    public function stopPrinting()
    {
        $this->isPrinting = false;
    }

    public function render()
    {
        return view('livewire.base');
    }
}
