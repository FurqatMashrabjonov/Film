<?php

namespace App\Observers;

use App\Models\Film;
use Illuminate\Support\Str;

class FilmObserver
{
    public function creating(Film $film)
    {
        $film->slug = Str::slug($film->title);
    }
}
