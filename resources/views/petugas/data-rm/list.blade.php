@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            @if(session("success"))
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 border-emerald-300">{{session('success')}}</div>
            @endif
            @if(session("errors"))
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 border-emerald-300">`{{session('errors')}}`</div>
            @endif
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-slate-400 font-bold text-xl">Data Rekam Medis</h6>
                    <a href="{{route('tambahDataRekamMedis')}}"
                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Tambah
                    <i class="fas fa-plus ms-2"></i>
                    </a>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-5 overflow-x-auto">
                        <table class="items-center w-[96.5%] my-5 mb-0 align-top border-collapse display" datatable id="myTable">
                            <thead class="align-bottom">
                                <tr class="header-green rounded-full text-white">
                                    <th
                                        class="text-left px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        No</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Nama Petugas</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Jabatan</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Password</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Edit</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                {{-- @foreach ($petugas as $item) --}}
                                    <tr>
                                        <td
                                            class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                        </td>
                                        <td
                                            class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                        </td>
                                        <td
                                            class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400 uppercase">
                                        </td>
                                        <td
                                            class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                        </td>
                                        <td
                                            class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400 hidetext" style=" white-space: nowrap;
                                            overflow: hidden;
                                            max-width: 30px">
                                        </td>
                                        <td
                                            class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                            <a href=""
                                            class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Edit
                                            <i class="fas fa-pen ms-2"></i>
                                        </a>
                                        </td>
                                        <td
                                            class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Hapus
                                                <i class="fas fa-trash ms-2"></i>
                                            </button>

                                            </form>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extraJS')
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
<script>let table = new DataTable('#myTable');</script>

@endsection
