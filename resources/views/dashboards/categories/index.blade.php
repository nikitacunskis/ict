<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('categories.create'   ) }}"> Add + </a>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">Name</div>
                        <div class="col-sm-3">Action</div>
                    </div>
                    @foreach($categories as $category)
                        <div class="row">
                            <div class="col-sm-9">{{ $category->name }} </div>
                            <div class="col-sm-3">
                                <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
