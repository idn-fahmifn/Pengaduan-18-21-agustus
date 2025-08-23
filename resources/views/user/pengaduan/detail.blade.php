<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    {{-- Grid utama untuk 2 kolom --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">

                        <div class="flex flex-col justify-center">
                            <div>
                                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-gray-100">
                                    {{ $data->judul_pengaduan }}
                                </h1>

                                <p class="text-md text-gray-900 dark:text-gray-400 mt-2">
                                    {{ $data->created_at }}
                                </p>
                                <p class="text-md text-gray-900 dark:text-gray-400 mt-2">
                                    {{ $data->deskripsi_pengaduan }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center p-4">
                            <img src="{{ asset('storage/images/pengaduan/' . $data->dokumentasi) }}"
                                class="w-full h-auto max-h-[500px] object-contain rounded-lg">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="flex items-center">

                    @switch($data->status)
                        @case($data->status === 'pending')
                            <div class="flex flex-col items-center text-center w-32">
                                <div class="w-10 h-10 rounded-full border-2 border-blue-600 p-1">
                                    <div class="w-full h-full rounded-full bg-blue-600"></div>
                                </div>
                                <div class="mt-2">
                                    <p class="text-xs text-gray-500">PENDING</p>
                                </div>
                            </div>

                            <div class="flex-1 h-1 bg-gray-600"></div>

                            <div class="flex flex-col items-center text-center w-32">
                                <div class="w-10 h-10 rounded-full bg-blue-200"></div>
                                <div class="mt-2">
                                    <p class="text-xs text-gray-500">DIPROSES</p>
                                </div>
                            </div>

                            <div class="flex-1 h-1 bg-gradient-to-r from-gray-600 to-blue-200"></div>

                            <div class="flex flex-col items-center text-center w-32">
                                <div class="w-10 h-10 rounded-full bg-blue-200"></div>
                                <div class="mt-2">
                                    <p class="text-xs text-gray-400">SELESAI</p>
                                </div>
                            </div>
                        @break

                        @case($data->status === 'diproses')
                            <div class="flex flex-col items-center text-center w-32">
                                <div class="w-10 h-10 rounded-full bg-teal-600 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mt-2">
                                    <p class="text-xs text-gray-500">PENDING</p>
                                </div>
                            </div>

                            <div class="flex-1 h-1 bg-teal-600"></div>

                            <div class="flex flex-col items-center text-center w-32">
                                <div class="w-10 h-10 rounded-full border-2 border-blue-600 p-1">
                                    <div class="w-full h-full rounded-full bg-blue-600"></div>
                                </div>
                                <div class="mt-2">
                                    <p class="text-xs text-gray-500">DIPROSES</p>
                                </div>
                            </div>

                            <div class="flex-1 h-1 bg-gradient-to-r from-blue-600 to-blue-200"></div>

                            <div class="flex flex-col items-center text-center w-32">
                                <div class="w-10 h-10 rounded-full bg-blue-200"></div>
                                <div class="mt-2">
                                    <p class="text-xs text-gray-400">SELESAI</p>
                                </div>
                            </div>
                        @break

                        @case($data->status === 'selesai')
                            <div class="flex flex-col items-center text-center w-32">
                                <div class="w-10 h-10 rounded-full bg-teal-600 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mt-2">
                                    <p class="text-xs text-gray-500">PENDING</p>
                                </div>
                            </div>

                            <div class="flex-1 h-1 bg-teal-600"></div>

                            <div class="flex flex-col items-center text-center w-32">
                                <div class="w-10 h-10 rounded-full bg-teal-600 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mt-2">
                                    <p class="text-xs text-gray-500">DIPROSES</p>
                                </div>
                            </div>

                            <div class="flex-1 h-1 bg-teal-600"></div>

                            <div class="flex flex-col items-center text-center w-32">
                                <div class="w-10 h-10 rounded-full bg-teal-600 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mt-2">
                                    <p class="text-xs text-teal-400">SELESAI</p>
                                </div>
                            </div>
                        @break

                        @default
                            <div class="p-4 min-w-full bg-red-600 text-white text-center">
                                <span class="text-center">Penganduan Ditolak</span>
                            </div>
                    @endswitch

                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                @forelse ($respon as $item)
                    <div class="p-4 min-w-full mt-2 dark:text-white">
                        <p class="text-md">{{$item->deskripsi_tanggapan}}</p>
                        <span class="text-sm">{{$item->created_at}}</span>
                    </div>
                @empty
                    <div class="p-4 min-w-full mt-2 bg-yellow-300">
                        <span class="text-sm">Belum ada tanggapan</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
