<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class PostList extends Component
{
    #[Url]
    public string $query = '';

    public function render()
    {
        $posts = collect();

        if ($this->query) {
            $posts = collect(get_posts([
                'post_type' => 'post',
                'post_status' => 'publish',
                's' => $this->query,
                'posts_per_page' => 10, // optional, limit results
            ]));
        }

        return view('livewire.post-list', compact('posts'));
    }
}