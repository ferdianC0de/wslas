@extends('admin.component.main')

@section('content')
<div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700 mt-4">
    <div class="grid grid-cols-4 gap-4 mb-4">

        <div class="flex items-center justify-center h-68 rounded">
            <img class="w-full h-full" src="{{ asset('images/galeri/'.$project->gallery) }}" alt="{{ $project->gallery }}">
        </div>

        <div class="flex col-span-3 flex-col item-center">
            <p class="text-2xl text-black dark:text-white">
                {{ $project->name }}
            </p>
            <br>
            <hr class="w-full">
            <p class="text-xl text-black dark:text-white">
                {{ $project->customer }}
            </p>
            <p class="text-xl text-black dark:text-white">
                {{ $project->no_tlp }}
            </p>
            <p class="text-xl text-black dark:text-white">
                {{ $project->location }}
            </p>
        </div>

    </div>
</div>

@endsection
