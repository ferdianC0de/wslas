@extends('admin.component.main')

@section('content')
<div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700 mt-4">
    <div class="grid grid-cols-4 gap-4 mb-4">

        <div class="flex items-center justify-center h-68 rounded">
            <img class="w-full h-full" src="{{ asset('images/'.$slider->image) }}" alt="{{ $slider->image }}">
        </div>

        <div class="flex flex-col col-span-3 item-center">
            <p class="text-2xl text-black dark:text-white">
               {{ $slider->name }}
            </p>
            <br>
            <hr class="w-full">
        </div>

    </div>
</div>

@endsection
