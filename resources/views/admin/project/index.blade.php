@extends('admin.component.main')

@section('content')
@if ($message = Session::get('message'))
    @php
        $type = Session::get('type');
        $color = 'gray';
        switch ($type) {
            case 'error':
                $color = 'red';
                break;
            case 'success':
                $color = 'green';
                break;
            case 'warning':
                $color = 'yellow';
                break;
            default:
                $color = 'gray';
                break;
        }
    @endphp
    <div id="alert" style="margin-top: 8vh;" class="animate__animated animate__fadeInRight absolute right-6 top-1 flex w-full max-w-xs right items-center p-4 mb-4 text-{{ $color }}-800 rounded-lg bg-{{ $color }}-50 dark:bg-gray-600 dark:text-{{ $color }}-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">{{ $type }}</span>
        <div class="ml-3 text-sm font-medium">
        {{ $message }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-{{ $color }}-50 text-{{ $color }}-500 rounded-lg focus:ring-2 focus:ring-{{ $color }}-400 p-1.5 hover:bg-{{ $color }}-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-{{ $color }}-400 dark:hover:bg-gray-700"
        {{-- data-dismiss-target="#alert" --}}
        onclick="closeNotif()"
        aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        </button>
    </div>
@endif

<div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700 mt-4">
    <div id="projectImageModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Gambar Proyek
                    </h3>
                    <button onclick="toggleModal('projectImageModal')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="projectImageModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6" id="imageModal">
                    <img width="200px" height="200px" src="{{ asset('images/galeri/1690442379.PNG') }}" alt="1690442379">
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="projectImageModal" onclick="toggleModal('projectImageModal')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
                    {{-- <button data-modal-hide="projectImageModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 mb-4">
        <div class="flex col-span-3 items-center justify-center h-24 rounded">
            <p class="text-4xl text-black-400 dark:text-gray-200">
                Proyek
            </p>
        </div>
        <a href="{{ route('project.create') }}" class="rounded bg-green-600 dark:bg-green-600 hover:bg-green-600 dark:hover:bg-green-800">
            <div class="flex items-center justify-center h-24">
                <svg class="h-8 w-8 text-black"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                    <line x1="12" y1="8" x2="12" y2="16" />
                    <line x1="8" y1="12" x2="16" y2="12" />
                </svg>
                <p class="text-2xl text-gray-400 dark:text-white">
                </p>
            </div>
        </a>
    </div>

    <div class="flex items-center justify-center mb-4">

        <div class="relative w-full shadow-md rounded sm:rounded-lg overflow-y-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Proyek
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Pelanggan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No Telepon Pelanggan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lokasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Preview Gambar Proyek
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $project->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->customer }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->no_tlp }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->location }}
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $colorStatus = 'gray';
                                if ($project->status == 'finish') {
                                    $colorStatus = 'green';
                                }else {
                                    $colorStatus = 'yellow';
                                }
                            @endphp
                            <span class="inline-flex items-center bg-{{ $colorStatus }}-100 text-{{ $colorStatus }}-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-{{ $colorStatus }}-900 dark:text-{{ $colorStatus }}-300">
                                <span class="w-2 h-2 mr-1 bg-{{ $colorStatus }}-500 rounded-full"></span>
                                {{ ucfirst($project->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <button data-modal-target="projectImageModal"  data-modal-toggle="projectImageModal" onclick="setModalImage('{{ $project->gallery }}', '{{ asset('images/galeri/') }}')">
                                @php
                                    $images = json_decode($project->gallery);
                                @endphp
                                <img width="200px" height="200px" src="{{ asset('images/galeri/'.$images[0]) }}" alt="{{ $images[0] }}">
                            </button>
                        </td>
                        <td class="px-6 py-4 flex">
                            <a href="{{ route('project.edit', $project->id) }}" class="flex justify-center items-center">
                                <svg class="h-8 w-8 text-yellow-500"  width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </a>
                            <span class="w-4"></span>
                            <form class="flex justify-center items-center" action="{{ route('project.destroy', $project->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex justify-center items-center">
                                <svg class="h-8 w-8 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                </svg>
                            </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
@push('scripts')
    <script>
        setModalImage = (param, urlAsset) => {
                console.log(JSON.parse(param), urlAsset);
                const images = JSON.parse(param);
                var html = '';

                images.map(e => {
                    var imgSrc = '<img width="200px" height="200px" src="'+urlAsset+'/'+e+'" alt="'+e+'">';
                    html += imgSrc;
                });

                $('#imageModal').html(html);
            }
    </script>
@endpush
