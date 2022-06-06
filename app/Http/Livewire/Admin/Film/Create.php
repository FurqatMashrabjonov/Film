<?php

namespace App\Http\Livewire\Admin\Film;

use App\Helpers\Imdb;
use Livewire\Component;
use App\Models\Film;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public Film $film;
    public string $imdbId;
    public  $imdb_title;
    public string $year;
    public $video;
    public array $imdb_films = [];
    public $level = 1;
    protected $rules = [
        'film.title' => 'required',
        'film.year' => 'required',
        'film.country' => 'required',
        'film.duration' => 'required',
        'film.description' => 'required'
    ];

    protected $listeners = [
        'titleChanged' => 'handleTitleChanged',
    ];

    public function mount()
    {
        $this->film = new Film();
//        $this->imdb = new Imdb();
    }

    public function searchImdb(Imdb $imdb)
    {
        $res = $imdb->getMoviesByTitle($this->imdb_title);
//        dd($res);
        $this->imdb_films = $res['results'];
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

    public function incrementLevel()
    {
        if ($this->level < 2) {
            $this->level++;
        }else{
            $this->level = 0;
        }
    }


    public function storeFilm(){
        $this->validate();

        $this->film->save();
        $this->incrementLevel();
    }


     public function decrementLevel(){
        if ($this->level > 0) {
            $this->level--;
        }else{
            $this->level = 2;
        }
     }

    public function uploadVideo()
    {
         $this->video->store('videos');
    }
}
