<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Edit') }}
        </h2>
    </x-slot>
    
    <div class="max-w-4xl">
        <div class="card bg-white rounded-none">
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('put')
                    <textarea name="content" class="textarea textarea-bordered w-full bg-gray-100 text-gray-800" placeholder="What is happening?" rows="2">{{ $post->content }}</textarea>
                    <input type="submit" value="Edit" class="btn btn-ghost font-bold bg-[#0088CC] hover:bg-[#007BB5] text-white px-6">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>