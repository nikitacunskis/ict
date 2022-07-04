<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('posts.create') }}"> Add + </a>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">Title</div>
                        <div class="col-sm-5">Category</div>
                        <div class="col-sm-2">Action</div>
                    </div>
                    @foreach($posts as $post)
                        <div class="row">
                            <div class="col-sm-5">{{ $post->title }} </div>
                            <div class="col-sm-5">{{ $post->category_id }}</div>
                            <div class="col-sm-2">
                                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
