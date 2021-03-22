@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{ route('user.password-change') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="current_password" class="sr-only">Password</label>
                <input type="password" name="current_password" id="current_password" placeholder="Enter your current password" class="bg-gray-100 border 2 w-full p-4 rounged-lg @error('current_password') border-red-500 @enderror" value="">

                @error('current_password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="new_password" class="sr-only">Password</label>
                <input type="password" name="new_password" id="new_password" placeholder="Choose your new password" class="bg-gray-100 border 2 w-full p-4 rounged-lg @error('new_password') border-red-500 @enderror" value="">

                @error('new_password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="new_password_confirmation" class="sr-only">Password again</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Repeat new password" class="bg-gray-100 border 2 w-full p-4 rounged-lg @error('new_password_confirmation') border-red-500 @enderror" value="">

                @error('new_password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Change password</button>
            </div>
        </form>
    </div>
</div>
@endsection