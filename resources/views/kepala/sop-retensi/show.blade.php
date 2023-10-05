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
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-zinc-700 font-bold text-xl">SOP Retensi dan Pemusnahan</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-5 overflow-x-auto">
                        <iframe src="{{asset($sop_retensi->path_sop)}}" class="w-full aspect-video sm:aspect-square" frameborder="0">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
