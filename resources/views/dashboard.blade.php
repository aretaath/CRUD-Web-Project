<x-app-layout>
    <div class="max-w-4xl">
        <div class="card bg-white rounded-none">
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <textarea name="content" class="textarea textarea-bordered w-full bg-gray-100 text-gray-800" placeholder="What is happening?" rows="2"></textarea>
                    <input type="submit" value="Share" class="btn btn-ghost font-bold bg-[#0088CC] hover:bg-[#007BB5] text-white px-6">
                </form>
            </div>
        </div>
        {{-- <hr class="max-w-4xl border-gray-200"> --}}
        
        @foreach ($posts as $post)
            <div class="card bg-white rounded-none">
                <hr class="max-w-4xl border-gray-200">
                <div class="card-body py">
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

                <div class="card-body">
                    <div class="text-gray-400 card-title">Comment</div>
                    <form action="{{ route('comments.store', $post) }}" class="form-control" method="post">
                        @csrf
                        <textarea class="textare textarea-bordered" name="message" placeholder="Your Comment"></textarea>
                        <div class="card-actions">
                            <input type="submit" value="Comment" class="btn btn-secondary">
                        </div>
                    </form>
                </div>
                @foreach ($post->comments as $comment)
                    <div class=" bg-white">
                        <div class="card-body rounded-none">
                            <h3 class="font-semibold">{{ $comment->user->name }}</h3>
                            <p class="text-gray-700">{{ $comment->message }}</p>
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
