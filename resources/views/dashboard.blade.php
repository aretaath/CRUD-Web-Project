<x-app-layout>
    <div class="max-w-4xl">
        <div class="card bg-white rounded-none">
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <textarea name="content" class="textarea textarea-bordered w-full bg-gray-100 text-gray-800" placeholder="What is happening?" rows="2"></textarea>
                    <input type="submit" value="Post" class="btn btn-ghost font-bold bg-[#0088CC] hover:bg-[#007BB5] text-white px-6">
                </form>
            </div>
        </div>
        {{-- <hr class="max-w-4xl border-gray-200"> --}}
        
        @foreach ($posts as $post)
            <div class="card bg-white rounded-none">
                <hr class="max-w-4xl border-gray-200">
                <div class="card-body">
                    <h2 class="text-xl font-bold text-gray-700">{{ $post->user->name }}</h2>
                    <p class="text-gray-900">{{ $post->content }}</p>
                    <div class="text-end">
                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post->id) }}" class="link link-hover text-blue-400">
                                Edit
                            </a>
                        @endcan
                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-sm">Delete</button>
                            </form>
                        @endcan
                        <span class="text-gray-500 text-sm">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
