<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\Welcome;
use Livewire\Component;
use Livewire\WithPagination;

class WelcomesIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $welcomes = Welcome::where('titulo', 'LIKE', '%'. $this->search .'%')
            ->orWhere('sudtitulo', 'LIKE', '%'. $this->search .'%')
            ->paginate();

        return view('livewire.admin.welcomes-index', compact('welcomes'));
    }
}
