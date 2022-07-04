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
                <form class="form-inline" method="POST" action="{{ route('posts.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div> <br />
                    <div class="form-group">
                    <label for="category_id">Category:</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div> <br />
                    <div class="form-group">
                        <label for="content">Comment:</label>
                        <textarea class="form-control" rows="10" id="content" name="content"></textarea>
                    </div> <br />
                    <button type="submit" class="btn btn-default">Submit</button>
                </form> 
            </div>
        </div>
    </div>
</x-app-layout>
