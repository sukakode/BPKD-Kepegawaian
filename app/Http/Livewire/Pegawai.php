<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pegawai extends Component
{
    public $data = [];

    public function render()
    {
        return view('livewire.pegawai');
    }

    public function showData($id)
    {
        try {
            $data = Pegawai::findOrFail($id);
            $this->data = $data;

        } catch (\Exception $e) {
            $this->emit('error', 'Terjadi Kesalahan ! Segera Hubungi Admin !');
        }
    }
}
