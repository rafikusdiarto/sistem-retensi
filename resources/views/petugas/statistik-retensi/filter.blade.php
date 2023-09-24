@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            @if(session("success"))
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 border-emerald-300">{{session('success')}}</div>
            @endif
            @if(session("error"))
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-rose-500 to-rose-400 border-rose-300">`{{session('error')}}`</div>
            @endif
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-slate-400 font-bold text-xl">Berita Acara Pemusnahan</h6>
                    <button id="showModalButton"
                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-menu leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Tambah
                    <i class="fas fa-plus ms-2"></i>
                    </button>
                </div>
                <div class="flex items-center px-6 justify-end gap-2">
                    <span class="text-lg">Periode</span>
                    <form action="{{ route('filterStatistikRetensi') }}" method="POST" class="flex gap-2 items-center">
                        @csrf
                        <input type="text" name="tahun1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-slate dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <span> - </span>
                        <input type="text" name="tahun2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-slate dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <button class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-menu leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Tampilkan</button>
                    </form>
                </div>
 
            </div>
        </div>
    </div>
@endsection