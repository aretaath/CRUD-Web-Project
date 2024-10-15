<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Post Edit') }}
        </h2>
    </x-slot>
    
    <div class="max-w-4xl">
        <div class="card bg-gray-700 rounded-none">
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('put')
                    <textarea name="content" class="textarea textarea-bordered w-full bg-gray-800 text-gray-100" placeholder="What is happening?" rows="2">{{ $post->content }}</textarea>
                    <input type="submit" value="Edit" class="btn btn-ghost font-bold bg-yellow-600 hover:bg-[#b38e2b] text-white px-6">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>