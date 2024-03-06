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
                class="relative h-[500px] p-4 flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl flex justify-between border-b-transparent">
                    <h6 class="text-zinc-700 font-bold text-xl">Rekam Medis Simpan</h6>
                    <a href="{{ route('arsipRekamMedis') }}"
                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer header-green leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Kembali
                        <i class="fas fa-arrow-left ms-2"></i>
                    </a>
                </div>
                <form action="{{ route('updateDataArsip', $arsip->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-5 sm:w-full w-1/2">
                        <div class="mb-4 flex items-center">
                            <input type="hidden" name="path_arsip" value="{{ $arsip->path_arsip }}">
                            <label for="" class="w-1/4 mr-2 text-sm font-medium text-slate">No RM</label>
                            <input type="text" name="no_rm" id="no_rm" value="{{ $arsip->no_rm }}"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('no_rm')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                            @error('no_rm.*')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4 flex items-center">
                            <label for="lampiran" class="w-1/4 mr-2 text-sm font-medium text-slate">Upload File</label>
                            <input type="file" name="lampiran" id="lampiran" value="({{ $arsip->filename }})"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('lampiran')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                            @error('lampiran.*')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                        </div>

                        @if ($arsip->path_arsip != null)
                            <div class="mb-4 items-center">
                                <label for="lampiran" class="w-1/4 mr-2 text-sm font-medium text-slate">Old File</label>
                                <div class="items-center">
                                    <li
                                        class="block mr-2 items-center p-1 sm:w-1/3 h-24">
                                        <a href="{{ asset($arsip->path_arsip) }}" class="" target="_blank">
                                            <article tabindex="0"
                                                class="group h-full rounded-md focus:outline-none focus:shadow-outline relative bg-gray-100 cursor-pointer relative shadow-sm">
                                                <img alt="upload preview"
                                                    class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                                                <section
                                                    class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 bottom-0 py-2 px-3">
                                                    <p class="flex-1 group-hover:text-blue-800">{{ $arsip->filename }}</p>
                                                    <div class="flex">
                                                        <span class=" text-blue-800">
                                                            <i>
                                                                <svg class="fill-current w-4 h-4 ml-auto "
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                                                </svg>
                                                            </i>
                                                        </span>
                                                        {{-- <p class="p-1 size text-xs text-gray-700"></p> --}}
                                                        <a href="{{ url('/lampiran/arsip-rm/delete', $arsip->id) }}"
                                                            class="ml-auto focus:outline-none hover:bg-gray-300 mb-1 rounded-md text-gray-800">
                                                            <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <path class="pointer-events-none"
                                                                    d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </section>
                                            </article>
                                        </a>
                                    </li>

                                </div>

                            </div>
                        @else
                            <div class="mb-4 items-center">
                                <label for="lampiran" class="w-1/4 mr-2 text-sm font-medium text-red-500">File arsip belum
                                    diupload</label>
                            </div>
                        @endif

                        <div>
                            <button type="submit"
                                class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer header-green leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Upload
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
