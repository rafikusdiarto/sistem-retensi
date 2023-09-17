@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" style="margin-top: 30px">
        <div class="shadow-xl bg-notif shadow-dark-xl rounded-2xl bg-clip-border" style="margin:20px 20px 20px 20px;">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div class="flex items-center">
                            <h3 class="font-bold text-red-600">100</h3>
                            <h3 class="text-lg text-white ml-2">
                                Rekam medis siap diretensi
                            </h3>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <button type="button"
                            class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Lihat</button>
                    </div>
                </div>
            </div>
        </div>
            <div class="text-center" style="padding-bottom: 80px">
                <div class=" -mx-3 ">
                    <h2 class="mb-2 font-bold text-2xl ">SELAMAT DATANG DI SISTEM RETENSI <br> RUMAH SAKIT
                        TINGKAT III BALADHIKA HUSADA JEMBER</h2>
                        <div class="bg-blue-500  mx-auto rounded" style="width: 1000px;border-radius:20px">
                            <img class="mx-auto" style="padding: 25px;width:900px;border-radius:40px" src="{{ asset('assets/img/rs dkt.jpg') }}" alt="">
                        </div>
                </div>
            </div>
        </div>

        <footer class="py-12">
            <div class="container">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                        <p class="mb-0 text-slate-400">
                            Sistem Retensi Rekam Medis
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            <br>
                            <b>RUMAH SAKIT DKT JEMBER </b>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
