<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form class="form-inline" method="POST" action="{{ route('comments.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="comment">Comment:</label>
                        <input type="text" class="form-control" id="comment" name="comment">
                    </div> <br />
                    <div class="form-group">
                        <label for="post_id">Post:</label>
                        <select class="form-control" id="post_id" name="post_id">
                            @foreach($posts as $post)
                                <option value="{{$post->id}}">{{$post->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form> 
            </div>
        </div>
    </div>
</x-app-layout>
