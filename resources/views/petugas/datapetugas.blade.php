@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-slate-400 font-bold text-xl">Data Petugas</h6>
                    <button type="button"
                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Tambah
                    <i class="fas fa-plus ms-2"></i>
                </button>

                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="text-left px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap text-white-400 opacity-70">
                                        No</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap text-white-400 opacity-70">
                                        Nama Petugas</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap text-white-400 opacity-70">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap text-white-400 opacity-70">
                                        Username</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap text-white-400 opacity-70">
                                        Password</th>
                                    <th
                                        class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none  tracking-none whitespace-nowrap text-white-400 opacity-70">
                                        Edit</th>
                                    <th
                                        class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none  tracking-none whitespace-nowrap text-white-400 opacity-70">
                                        Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td
                                        class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">1
                                    </td>
                                    <td
                                        class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">Anna
                                    </td>
                                    <td
                                        class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">anna@mail.com
                                    </td>
                                    <td
                                        class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">Annaaa123
                                    </td>
                                    <td
                                        class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400" readonly>password123
                                    </td>
                                    <td
                                        class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                        <button type="button"
                                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Edit
                                        <i class="fas fa-pen ms-2"></i>
                                    </button>

                                    </td>
                                    <td
                                        class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                        <button type="button"
                                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Tambah
                                        <i class="fas fa-trash ms-2"></i>
                                    </button>

                                    </td>


                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
