<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/flowbite.min.css') }}" rel="stylesheet" />
    <link
    rel="stylesheet"
    href="{{ asset('css/animate.min.css') }}"
    />
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        // if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        //     document.documentElement.classList.add('dark');
        // } else {
        //     document.documentElement.classList.remove('dark')
        // }
    </script>
    <style>
        .sidebar-active{
            background-color: #5552ff !important;
        }

        .sidebar-active:hover{
            background-color: #5552ff !important;
        }
    </style>

    <title>{{ env('app_name', 'Laravel') }}</title>
</head>
<body class="bg-gray-300 dark:bg-gray-800">
    @include('admin.component.sidebar')

    <div id="content" class="p-4 sm:ml-64">
        @include('admin.component.breadcrump')
        @yield('content')
    </div>


    <script src="{{ asset('js/flowbite.min.js') }}"></script>
    <script
    src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script>
        function closeNotif(){
            $('#alert').addClass('animate__fadeOutRight');
        }
        $( document ).ready(function() {
        });
    </script>
    @stack('scripts')
</body>
</html>
