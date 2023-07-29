@extends('admin.component.main')

@section('content')
<div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700 mt-4">
    <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="flex items-center justify-center h-24 rounded bg-indigo-400 dark:bg-indigo-600">
            <span class="inline-flex items-center justify-center w-6 h-6 p-4 mr-2 mt-1 text-lg font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                {{ count($products) }}
            </span>
            <p class="text-2xl text-black ">
                Produk
            </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded bg-indigo-400 dark:bg-indigo-600">
            <span class="inline-flex items-center justify-center w-6 h-6 p-4 mr-2 mt-1 text-lg font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                {{ count($projects) }}
            </span>
            <p class="text-2xl text-black">
               Proyek
            </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded bg-indigo-400 dark:bg-indigo-600">
            <span class="inline-flex items-center justify-center w-6 h-6 p-4 mr-2 mt-1 text-lg font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                {{ $users }}
            </span>
            <p class="text-2xl text-black">
                Admin
            </p>
        </div>
    </div>


    <div class="flex items-center justify-center h-2 mb-4 rounded bg-gray-50 dark:bg-gray-700">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
        </p>
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <a href="{{ route('slider.index') }}" class="dbtn cursor-pointer animate__animated flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-700">
            <p class="text-2xl text-black dark:text-white">
                <svg class="h-8 w-8 text-indigo-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />  <circle cx="8.5" cy="8.5" r="1.5" />  <polyline points="21 15 16 10 5 21" /></svg>
            </p>
        </a>
        <a href="{{ route('product.index') }}" class="dbtn cursor-pointer animate__animated flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-700">
            <p class="text-2xl text-black dark:text-white">
                <svg class="h-8 w-8 text-indigo-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />  <polyline points="3.27 6.96 12 12.01 20.73 6.96" />  <line x1="12" y1="22.08" x2="12" y2="12" /></svg>

            </p>
        </a>
        <a href="{{ route('project.index') }}" class="dbtn cursor-pointer animate__animated flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-700">
            <p class="text-2xl text-black dark:text-white">
                <svg class="h-8 w-8 text-indigo-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="3" />  <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" /></svg>

            </p>
        </a>
        <a href="{{ route('user.index') }}" class="dbtn cursor-pointer animate__animated flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-700">
            <p class="text-2xl text-black dark:text-white">
                <svg class="h-8 w-8 text-indigo-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />  <circle cx="9" cy="7" r="4" />  <path d="M23 21v-2a4 4 0 0 0-3-3.87" />  <path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
            </p>
        </a>
    </div>
    <div class="flex items-center justify-center h-2 mb-4 rounded bg-gray-50 dark:bg-gray-700">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
        </p>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(() => {
        $('.dbtn').hover((e) => {
            $(e.target).addClass( "animate__pulse animate__infinite infinite");
            $(e.target).addClass("bg-indigo-400 dark:bg-indigo-600");
            $(e.target).removeClass("bg-gray-50 h-28 dark:bg-gray-700");
        }, (e) => {
            $(e.target).removeClass( "animate__pulse animate__infinite infinite" );
            $(e.target).removeClass("bg-indigo-400 dark:bg-indigo-600");
            $(e.target).addClass("bg-gray-50 h-28 dark:bg-gray-700");
        })
    });
</script>
@endpush
