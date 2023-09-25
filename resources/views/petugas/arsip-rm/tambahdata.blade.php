@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            @if (session('success'))
                <div alert
                    class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 border-emerald-300">
                    {{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div alert
                    class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 border-emerald-300">
                    {{ session('error') }}`</div>
            @endif
            <div class="relative h-[500px] p-4 flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl flex justify-between border-b-transparent">
                    <h6 class="text-slate-400 font-bold text-xl">Rekam Medis Simpan</h6>
                    <a href="{{route('arsipRekamMedis')}}"
                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Kembali
                    <i class="fas fa-arrow-left ms-2"></i>
                    </a>

                </div>
                <form action="{{route('storeArsip')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5 sm:w-full w-1/2">
                        <div class="mb-4 flex items-center">
                            <label for="" class="w-1/4 mr-2 text-sm font-medium text-slate">No RM</label>
                            <input type="text" name="no_rm" id="no_rm"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('no_rm')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                            @error('no_rm.*')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4 flex items-center">
                            <label for="lampiran" class="w-1/4 mr-2 text-sm font-medium text-slate">Pilih File</label>
                            <input type="file" name="lampiran" id="lampiran" multiple
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('lampiran')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                            @error('lampiran.*')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Upload
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
