<?php
namespace App\Blocks;

use Livewire\Component;

class Hero extends Component
{
    public $title = "Hero Title hello world from Blocks";

    public function mount()
    {
        $this->title =  "Hero Title from mount method";
    }
    public function render()
    {
        return view('blocks.hero');
    }
}