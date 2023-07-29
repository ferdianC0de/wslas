@extends('admin.component.main')

@section('content')
@include('admin.component.alert')
<div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700 mt-4">
    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input name="name" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>


        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Gambar</label>
        <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="slider_help" id="slider" type="file">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Gunakan gambar dengan ukuran ... x ...</div>

        <button type="submit" class="mt-8 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Tambahkan Slider
        </button>
    </form>
</div>

@endsection
