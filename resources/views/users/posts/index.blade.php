@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 ">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">
                    {{ $user->name }}
                    <h3 class="text-gray-500">
                        {{ $user->posts->count() }} {{ Str::plural('post', $user->posts->count()) }}
                    </h3>
                </h1>
            </div>
            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
    
                {{ $posts->links() }}
                @else
                    <p>{{ $user->username }} has no posts</p>
                @endif
            </div>
        </div>
    </div>
    
@endsection