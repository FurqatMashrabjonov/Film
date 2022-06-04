<?php

namespace App\Http\Livewire\Admin\Film;

use Livewire\Component;
use App\Models\Film;
class Create extends Component
{
    public $film;

    public function mount()
    {
        $this->film = new Film();
    }
    public function render()
    {
        return view('livewire.admin.film.create')
            ->layout('admin.layout.app');
    }
}
