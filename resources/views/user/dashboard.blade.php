<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-600 rounded-lg shadow-md p-6 flex justify-between items-center mb-8 dark:bg-slate-800">
                <h1 class="text-2xl font-bold text-white">Laporan Saya</h1>
                <a href="{{route('pengaduan.create')}}"
                    class="bg-white dark:bg-red-600 text-red-600 dark:text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-gray-100 dark:hover:bg-red-800">
                    Buat Laporan Baru
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white dark:bg-slate-800 dark:text-white p-6 rounded-lg shadow-md">
                    <h3 class="text-gray-600">Laporan Saya</h3>
                    <p class="text-3xl font-bold mt-2">{{$pengaduan_saya}}</p>
                </div>

                <div class="bg-white dark:bg-slate-800 dark:text-white p-6 rounded-lg shadow-md">
                    <h3 class="text-gray-600">Diproses</h3>
                    <p class="text-3xl font-bold mt-2">{{$diproses}}</p>
                </div>

                <div class="bg-white dark:bg-slate-800 dark:text-white p-6 rounded-lg shadow-md">
                    <h3 class="text-gray-600">Selesai</h3>
                    <p class="text-3xl font-bold mt-2">{{$selesai}}</p>
                </div>

                <div class="bg-white dark:bg-slate-800 dark:text-white p-6 rounded-lg shadow-md">
                    <h3 class="text-gray-600">Ditolak</h3>
                    <p class="text-3xl font-bold mt-2">{{$ditolak}}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-md sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-slate-200">Laporan Anda</h2>

                <div class="hidden md:grid grid-cols-12 gap-4 text-sm text-gray-500 font-semibold mb-2 px-4">
                    <div class="col-span-4">Judul Laporan</div>
                    <div class="col-span-4 text-center">Tanggal Pengaduan</div>
                    <div class="col-span-2 text-center">Status</div>
                </div>

                <div class="space-y-4">
                    @forelse ($data as $item)
                        <a href=""
                            class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center bg-gray-50 dark:bg-slate-700 hover:bg-gray-100 dark:hover:bg-slate-600 p-4 rounded-lg">
                            <div class="col-span-1 md:col-span-4 flex items-center">
                                <span
                                    class="font-semibold text-gray-900 dark:text-gray-100">{{ $item->judul_pengaduan }}</span>
                            </div>
                            <div class="col-span-1 md:col-span-4 text-center text-gray-700 dark:text-gray-100">
                                {{ $item->created_at->diffForHumans() }}
                            </div>

                            <div class="col-span-1 md:col-span-2 flex justify-center -space-x-2">
                                <div class="col-span-1 md:col-span-2 text-center">
                                    @if ($item->status === 'pending')
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-semibold px-3 py-1 rounded-full">pending</span>
                                    @elseif($item->status === 'diproses')
                                        <span
                                            class="bg-blue-300 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">diproses</span>
                                    @elseif($item->status === 'selesai')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">selesai</span>
                                    @else
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">ditolak</span>
                                    @endif

                                </div>
                            </div>

                        </a>
                    @empty
                        <div class="min-w-full p-4 bg-yellow-200 mt-4 rounded-md">
                            <span>Anda belum melakukan laporan</span>
                        </div>
                    @endforelse



                </div>
            </div>

        </div>
    </div>
</x-app-layout>
