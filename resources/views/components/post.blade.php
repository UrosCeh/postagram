@props(['post' => $post])

<div class="mb-4">
    <a href="" class="font-bold">{{ $post->user->username }}</a>
    {{-- <span class="text-gray-600 text-sm">{{ $post->created_at->format('d-m-Y H:i') }}</span> --}}
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    @auth
        @if($post->ownedBy(auth()->user()))
            <form action="{{ route('posts.destroy', $post) }}" method="post" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-300">Delete</button>
            </form>
        @endif
    @endauth

    <p class="mb-2">{{ $post->body }}</p>

    <div class="flex items-center">
        @auth
            @if (!$post->isLikedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth
        <span class="text-gray-300 ml-2">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>