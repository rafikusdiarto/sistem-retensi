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
                <form action="{{url('/kepala/sop-retensi/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex grid grid-cols-2 gap-4 p-5">
                        <div>
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
                            <div class="mb-4 flex items-center">
                                <label for="" class="w-1/4 mr-2 text-sm font-medium text-slate">Keterangan</label>
                                <textarea type="textarea" name="keterangan" id="keterangan"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></textarea>
                                @error('keterangan')
                                    <small class="text-rose-600">{{ $message }}</small>
                                @enderror
                                @error('keterangan.*')
                                    <small class="text-rose-600">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <button type="submit"
                                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Submit
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-5 overflow-x-auto">
                        <table class="items-center w-[96.5%] my-5 mb-0 align-top border-collapse display">
                            <thead class="align-bottom">
                                <tr class="header-green rounded-full text-white">
                                    <th
                                        class="text-left px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        No</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Keterangan</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        File</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Lihat</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Cetak</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($sop_retensi as $item)
                                    <tr>
                                        <td
                                            class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">{{$no++}}
                                        </td>
                                        <td
                                            class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">{{$item->keterangan}}
                                        </td>
                                        <td
                                            class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">{{$item->filename}}
                                        </td>
                                        <td
                                            class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                            <a href="{{url('/kepala/sop-retensi/show',$item->id)}}"
                                            class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Lihat
                                            <i class="fas fa-eye ms-2"></i>
                                            </a>
                                        </td>
                                        <td
                                            class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                            <a href="{{url('/kepala/sop-retensi/download', $item->filename)}}"
                                            class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Cetak
                                            <i class="fas fa-print ms-2"></i>
                                            </a>
                                        </td>
                                        <td
                                            class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                            <form action="{{url('/kepala/sop-retensi/delete', $item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Hapus
                                                <i class="fas fa-trash ms-2"></i>
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
