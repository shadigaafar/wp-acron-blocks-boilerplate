<div>
    <input
        wire:model.live="query"
        type="text"
        placeholder="Search posts..."
        class="border p-2 rounded w-full"
    >

    @if ($query)
        @if ($posts->isNotEmpty())
            <p>Found {{ $posts->count() }} result(s) for "{{ $query }}"</p>

            <ul>
                @foreach ($posts as $post)
                    <li>
                        <a href="{{ get_permalink($post->ID) }}">
                            {{ $post->post_title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No results found for "{{ $query }}"</p>
        @endif
    @else
        <p>Start typing to search...</p>
    @endif
</div>