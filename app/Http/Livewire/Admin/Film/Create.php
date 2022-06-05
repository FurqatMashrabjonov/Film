<?php

namespace App\Http\Livewire\Admin\Film;

use App\Helpers\Imdb;
use Livewire\Component;
use App\Models\Film;

class Create extends Component
{
    public Film $film;
    public $imdb;
    public string $imdbId;
    public string $title;
    public array $films = [];

    protected $listeners = [
        'titleChanged' => 'handleTitleChanged',
    ];
    public function mount()
    {
        $this->film = new Film();
        $this->imdb = new Imdb();
    }

    public function handleTitleChanged($title)
    {
        $this->title = $title;
        $this->films = $this->imdb->getMoviesByTitle($title);
    }

    public function render()
    {
        return view('livewire.admin.film.create')
            ->layout('admin.layout.app');
    }
}
