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
            <div
                class="container relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border h-[800px]">
                <div class="p-6 flex justify-between pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-slate-400 font-bold text-xl">Tambah Data Rekam Medis</h6>
                    <a href="{{ route('dataRekamMedis') }}"
                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Kembali
                        <i class="fas fa-arrow-left ms-2"></i>
                    </a>
                </div>


                <div class="flex p-5">
                    <button onclick="importFile()"
                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Upload</button>
                    <button onclick="inputData()"
                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Input</button>
                </div>

                <div id="importFile" style="display: none">
                    <form action="{{ route('importFile') }}" method="POST" enctype="multipart/form-data"
                        class="p-[30px]">
                        @method('POST')
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-slate" for="user_avatar">Upload file</label>
                            <input class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" id="file" name="file" type="file">
                            @error('file')
                                <span class="pl-1 text-xs text-red-600 text-bold">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block mb-2 text-sm font-medium text-slate text-slate">Keterangan</label>
                            <input type="date" name="date" id="date"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('keterangan')
                                <span class="pl-1 text-xs text-red-600 text-bold">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Submit
                            </button>
                        </div>
                    </form>
                </div>
                <div id="inputData" style="display: none">
                    <form action="{{ route('storeDataRekamMedis') }}" method="POST" enctype="multipart/form-data"
                        class="p-[30px]">
                        @method('POST')
                        @csrf
                        <div class="flex grid grid-cols-2 gap-4">
                            <div class="">
                                <div class="mb-4">
                                    <label for="no_rm" class="block mb-2 text-sm font-medium text-slate text-slate">No Rekam Medis</label>
                                    <input type="text" name="no_rm" id="no_rm"
                                        class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('no_rm')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="nik" class="block mb-2 text-sm font-medium text-slate text-slate">NIK Pasien</label>
                                    <input type="text" name="nik" id="nik"
                                        class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('nik')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="nama" class="block mb-2 text-sm font-medium text-slate text-slate">Nama Pasien</label>
                                    <input type="text" name="nama" id="nama"
                                        class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                        @error('nama')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="jenis_kelamin"
                                        class="block mb-2 text-sm font-medium text-slate text-slate">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin"
                                        class="bg-gray-50 border border-gray-300 text-slate text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="jenis_pelayanan"
                                        class="block mb-2 text-sm font-medium text-slate text-slate">Jenis Pelayanan</label>
                                    <select id="jenis_pelayanan" name="jenis_pelayanan"
                                        class="bg-gray-50 border border-gray-300 text-slate text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="RJ">Rawat Jalan</option>
                                        <option value="RI">Rawat Inap</option>
                                    </select>
                                    @error('jenis_pelayanan')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="">
                                <div class="mb-4">
                                    <label for="dokter" class="block mb-2 text-sm font-medium text-slate text-slate">Dokter</label>
                                    <input type="text" name="dokter" id="dokter"
                                        class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('dokter')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="mrs" class="block mb-2 text-sm font-medium text-slate text-slate">MRS</label>
                                    <input type="date" name="mrs" id="mrs"
                                        class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('mrs')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="krs" class="block mb-2 text-sm font-medium text-slate text-slate">KRS</label>
                                    <input type="date" name="krs" id="krs"
                                        class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                        @error('krs')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="alamat"
                                        class="block mb-2 text-sm font-medium text-slate text-slate">Alamat</label>
                                    <input type="text" name="alamat" id="alamat"
                                        class=" border border-gray-300 text-slate text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('alamat')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Submit
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('extraJS')
<script>
    function inputData() {
    var x = document.getElementById("inputData");
    var y = document.getElementById("importFile");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
    }
    }

    function importFile() {
    var x = document.getElementById("importFile");
    var y = document.getElementById("inputData");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
    }
    }
</script>

@endsection
