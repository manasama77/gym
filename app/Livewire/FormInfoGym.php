<?php

namespace App\Livewire;

use App\Models\InfoGym;
use Livewire\Component;
use Livewire\Attributes\Validate;

class FormInfoGym extends Component
{
    #[Validate('required', message: 'Deskripsi Harus Diisi')]
    public $description;

    public function mount()
    {
        $this->description = InfoGym::find(1)->description;
    }

    public function render()
    {
        return view('livewire.form-info-gym');
    }

    public function save()
    {
        $validated = $this->validate();

        $info_gym = InfoGym::find(1);
        $info_gym->description = $validated['description'];
        $info_gym->save();

        session()->flash('success', 'Info Gym berhasil diperbarui');
        $this->reset(['description']);
        $this->redirect(route('info-gym'));
    }
}
