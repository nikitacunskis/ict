<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('comments.create') }}"> Add + </a>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">Comment</div>
                        <div class="col-sm-5">Post</div>
                        <div class="col-sm-2">Action</div>
                    </div>
                    @foreach($comments as $comment)
                        <div class="row">
                            <div class="col-sm-5">{{ $comment->comment }} </div>
                            <div class="col-sm-5">{{ $comment->post_id }} </div>
                            <div class="col-sm-2">
                                <a href="{{ route('comments.edit', $comment->id) }}">Edit</a>
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="Delete">
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
