@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            @if(session("success"))
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 border-emerald-300">{{session('success')}}</div>
            @endif
            @if(session("error"))
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-red-500 to-teal-400 border-emerald-300">`{{session('error')}}`</div>
            @endif
            <div class="relative h-[700px] p-4 flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 flex justify-between pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-zinc-700 font-bold text-xl">Tambah Data</h6>
                    <a href="{{route('dataPetugas')}}"
                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Kembali
                    <i class="fas fa-arrow-left ms-2"></i>
                    </a>
                </div>

                <form action="{{url('/storedatapetugas')}}" method="POST" enctype="multipart/form-data" class="p-[30px]">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-slate text-slate">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('nama')
                            <span class="pl-1 text-xs text-red-600 text-bold">
                                {{$message}}
                            </span>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-slate text-slate">Email</label>
                        <input type="email" name="email" id="email"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-slate text-slate">Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-slate text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-slate text-slate">Jabatan</label>
                        <select id="jabatan" name="jabatan" class="bg-gray-50 uppercase border border-gray-300 text-slate text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="petugas">Petugas</option>
                            <option value="kepala">Kepala</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
