
<div id="table-project" class="relative overflow-x-auto sm:rounded-lg">
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
                        <a href="{{ route('project.show', $project->id) }}">
                            <img width="200px" height="200px" src="{{ asset('images/galeri/'.$project->gallery) }}" alt="{{ $project->gallery }}">
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
