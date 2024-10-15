<x-app-layout>
    <div class="max-w-4xl">
        <div class="card bg-gray-700 rounded-none">
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <textarea name="content" class="textarea textarea-bordered w-full bg-gray-800 text-gray-100" placeholder="What is happening?" rows="2"></textarea>
                    <input type="submit" value="Share" class="btn btn-ghost font-bold bg-yellow-600 hover:bg-[#b38e2b] text-white px-6">
                </form>
            </div>
        </div>
        {{-- <hr class="max-w-4xl border-gray-200"> --}}
        
        @foreach ($posts as $post)
            <div class="card bg-gray-700 rounded-none">
                <hr class="max-w-4xl border-gray-200">
                <div class="card-body py">
                    <h2 class="text-xl font-bold text-gray-100">{{ $post->user->name }}</h2>
                    <p class="text-gray-200">{{ $post->content }}</p>
                    <div class="text-end">
                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post->id) }}" class="link link-hover text-blue-500">
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

            <div class="card bg-gray-600 rounded-none">
                <div class="card-body">
                    <div class="text-gray-200 card-title">Comment</div>
                    <form action="{{ route('comments.store', $post) }}" class="form-control" method="post">
                        @csrf
                        <textarea class="textarea textarea-bordered w-full bg-gray-800 text-gray-100" name="message" placeholder="Your Comment"></textarea>
                        <div class="card-actions">
                            <input type="submit" value="Comment" class="btn btn-secondary font-bold bg-yellow-600 hover:bg-[#b38e2b] text-white px-4">
                        </div>
                    </form>
                </div>
                </div>
                @foreach ($post->comments as $comment)
                    <div class=" bg-gray-600">
                        <div class="card-body rounded-none">
                            <h3 class="font-semibold text-gray-100">{{ $comment->user->name }}</h3>
                            <p class="text-gray-200">{{ $comment->message }}</p>
                            <div class="text-end">
                                    @can('delete', $post)
                                        <form action="{{ route('comments.destroy', [$post, $comment]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-error btn-sm">Delete</button>
                                        </form>
                                    @endcan

                                <span class="text-gray-500 text-sm">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>        
        @endforeach
    </div>
</x-app-layout>
