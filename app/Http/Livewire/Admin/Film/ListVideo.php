<?php

namespace App\Http\Livewire\Admin\Film;

use App\Models\Film;
use Livewire\Component;

class ListVideo extends Component
{
    public function render()
    {
        $films = Film::all();
        return view('livewire.admin.film.list-video', [
            'films' => $films
        ])
            ->layout('admin.layout.app');
    }
}
