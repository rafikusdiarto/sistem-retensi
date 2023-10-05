@extends('layouts.app')

@section('content')
    <div class="relative flex flex-col min-w-0 h-[850px] break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border"
        style="margin-top: 30px">
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
        <div class="shadow-xl shadow-dark-xl rounded-2xl bg-clip-border {{$pasienRetensi > 0 ? 'bg-notif' : 'hidden'}}" style="margin:20px 20px 20px 20px;">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div class="flex items-center">
                            <h3 class="font-bold text-red-600">{{$pasienRetensi}}</h3>
                            <h3 class="text-lg text-white ml-2">
                                Rekam medis siap diretensi
                            </h3>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <a href="{{route('dataRekamMedis')}}"
                            class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-[50px]" style="padding-bottom: 80px">
            <div class=" -mx-3 ">
                <h2 class="mb-2 font-bold text-2xl ">SELAMAT DATANG DI SISTEM RETENSI <br> RUMAH SAKIT
                    TINGKAT III BALADHIKA HUSADA JEMBER</h2>
                <div class="bg-menu  mx-auto rounded" style="width: 1000px;border-radius:20px">
                    <img class="mx-auto" style="padding: 25px;width:900px;border-radius:40px"
                        src="{{ asset('assets/img/rs dkt.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
