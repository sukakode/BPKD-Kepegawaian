<?php

namespace App\Http\Livewire\Pegawai;

use App\Models\Pegawai;
use Livewire\Component;

class DetailPegawai extends Component
{
    public $data = [];

    protected $listeners = [
        'show-data' => 'showData'
    ];

    public function render()
    {
        return view('livewire.pegawai.detail-pegawai');
    }

    public function showData($id)
    {
        try {
            $data = Pegawai::findOrfail($id);
            $this->data = $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
