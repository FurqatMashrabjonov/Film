<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class Dashboard extends Component
{
    use WithFileUploads;

    /**
     * @var
     */
    public $video;

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('admin.layout.app');
    }

    public function uploadVideo(){
        $this->video->store('videos');
    }
}
