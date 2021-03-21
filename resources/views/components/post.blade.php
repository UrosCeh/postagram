@props(['post' => $post])

<div class="mb-4">
    <a href="" class="font-bold">{{ $post->user->username }}</a>
    {{-- <span class="text-gray-600 text-sm">{{ $post->created_at->format('d-m-Y H:i') }}</span> --}}
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    @if($post->ownedBy(auth()->user()))
        <form action="{{ route('posts.destroy', $post) }}" method="post" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-300">Delete</button>
        </form>
    @endif

    <p class="mb-2">{{ $post->body }}</p>
</div>