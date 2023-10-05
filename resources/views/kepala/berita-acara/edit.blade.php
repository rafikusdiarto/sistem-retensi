@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="container relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 flex justify-between pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-zinc-700 font-bold text-xl">Edit Data</h6>
                    <a href="{{url('/kepala/berita-acara')}}"
                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer header-green leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Kembali
                    <i class="fas fa-arrow-left ms-2"></i>
                    </a>
                </div>

                <form action="{{ url('/kepala/berita-acara/update', $data->id) }}" method="post" enctype="multipart/form-data" class="p-[30px]">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-slate text-slate">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $data->user->name }}" readonly
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('name')
                            <span class="pl-1 text-xs text-red-600 text-bold">
                                {{$message}}
                            </span>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-slate text-slate">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ $data->user->getRoleNames()[0] }}" readonly
                            class="focus:shadow-primary-outline uppercase text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                    </div>
                    <div class="mb-4">
                        <label for="caraPemusnahan" class="block mb-2 text-sm font-medium text-slate text-slate">Cara Pemusnahan</label>
                        <input type="text" name="cara_pemusnahan" id="caraPemusnahan" value="{{ $data->cara_pemusnahan }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('cara_pemusnahan')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tanggalPemusnahan" class="block mb-2 text-sm font-medium text-slate text-slate">Tanggal Pemusnahan</label>
                        <input type="date" name="tanggal_pemusnahan" id="tanggalPemusnahan" value="{{ $data->tanggal_pemusnahan }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('tanggal_pemusnahan')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="waktuPemusnahan" class="block mb-2 text-sm font-medium text-slate text-slate">Waktu Pemusnahan</label>
                        <input type="time" name="waktu_pemusnahan" id="waktuPemusnahan" value="{{ $data->waktu_pemusnahan }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('waktu_pemusnahan')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="lokasiPemusnahan" class="block mb-2 text-sm font-medium text-slate text-slate">Lokasi Pemusnahan</label>
                        <input type="text" name="lokasi_pemusnahan" id="lokasiPemusnahan" value="{{ $data->lokasi_pemusnahan }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('lokasi_pemusnahan')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="ketuaRekamMedis" class="block mb-2 text-sm font-medium text-slate text-slate">Ketua Rekam Medis</label>
                        <input type="text" name="ketua_rm" id="ketuaRekamMedis" value="{{ $data->ketua_rm }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('ketua_rekam_medis')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="lampiran" class="block mb-2 text-sm font-medium text-slate text-slate">Lampiran</label>
                        <input type="file" name="lampiran[]" id="lampiran" multiple
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('lampiran')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                            @error('lampiran.*')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>

                    <div>
                        <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer header-green leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
