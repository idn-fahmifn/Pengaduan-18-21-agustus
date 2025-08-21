<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Pengaduan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="post" action="" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="judul_pengaduan" :value="__('Judul Pengaduan')" />
                            <x-text-input id="judul_pengaduan" name="judul_pengaduan" type="text" class="mt-1 block w-full"
                                :value="old('judul_pengaduan')"
                                required autofocus autocomplete="judul_pengaduan" />
                            <x-input-error class="mt-2" :messages="$errors->get('judul_pengaduan')" />
                        </div>
                        <div>
                            <x-input-label for="dokumentasi" :value="__('Dokumentasi')" />
                            <x-text-input id="dokumentasi" name="dokumentasi" type="file" class="p-3 mt-1 block w-full"
                                :value="old('dokumentasi')"
                                required autofocus autocomplete="dokumentasi" />
                            <x-input-error class="mt-2" :messages="$errors->get('dokumentasi')" />
                        </div>
                        <div>
                            <x-input-label for="deskripsi_pengaduan" :value="__('Deskripsi Pengaduan')" />
                            <textarea name="deskripsi_pengaduan" class="mt-1 block w-full" id=""></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('deskripsi_pengaduan')" />
                        </div>
                        <div>


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
