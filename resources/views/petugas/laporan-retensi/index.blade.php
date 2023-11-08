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
                    `{{ session('error') }}`</div>
            @endif
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-slate-400 font-bold text-xl">Laporan Retensi</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-5 overflow-x-auto">
                        <div class="flex items-center mb-5 space-x-10 w-full">
                            <div class="flex items-center justify-end w-full gap-10">
                                <div class="flex items-center gap-2">
                                    <label for="jenis_pelayanan" class="block text-sm font-medium text-slate text-slate">Pelayanan</label>
                                    <select id="jenis_pelayanan" name="jenis_pelayanan"
                                    class="bg-gray-50 border border-gray-300 text-slate pr-10 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="RJ">Rawat Jalan</option>
                                        <option value="RI">Rawat Inap</option>
                                    </select>
                                </div>
                                <div class="flex items-center gap-2">
                                    <label for="tahun" class="block text-sm font-medium text-slate text-slate">Tahun</label>
                                    <input type="text" name="tahun" id="tahun" placeholder="yyyy"
                                        class="focus:shadow-primary-outline text-sm  ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    @error('tahun')
                                        <span class="pl-1 text-xs text-red-600 text-bold">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="flex items-center gap-2">
                                    <label for="status" class="block text-sm font-medium text-slate text-slate">Status</label>
                                    <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-slate pr-10 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <button id="searchButton" class="inline-block px-6 py-3 mr-1 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer header-green leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Cari</button>
                            </div>

                        </div>
                        <table class="items-center w-[96.5%] my-5 mb-0 align-top border-collapse" datatable id="myTable">
                            <thead class="align-bottom">
                                <tr class="header-green rounded-full text-white">
                                    <th
                                        class="text-left px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        No</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        No RM</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        NIK</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Nama</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Jenis Kelamin</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        MRS</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        KRS</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Jenis Pelayanan</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="flex justify-between items-center bg-[#F5F5F5] rounded-lg mt-4">
                            <span class="font-bold p-2 px-4 ">TOTAL</span>
                            <span id="total" class="font-bold p-2 px-4">0</span>
                        </div>
                        <a href="{{ route('downloadLaporanRetensi') }}" class="p-6 pb-0 mb-0  border-b-0 border-b-solid text-center rounded-t-2xl border-b-transparent float-right">
                            <button type="submit"
                            class="btn-shadow font-semibold  uppercase leading-normal text-xs ease-in bg-blue-500 text-white rounded px-10 py-2 mt-2 hover:-translate-y-px hover:shadow-md">
                            <i class="fas fa-print mr-1"></i>
                            Cetak
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraJS')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        const table = $('#myTable').DataTable({
            columns: [
                {data: 'row_number'},
                {data: 'no_rm'},
                {data: 'nik'},
                {data: 'nama'},
                {data: 'jenis_kelamin'},
                {data: 'mrs'},
                {data: 'krs'},
                {data: 'jenis_pelayanan'},
                {data: 'status',
                render: function(data, type, row) {
                // Mengubah nilai menjadi huruf kapital
                if (type === 'display') {
                    return data.charAt(0).toUpperCase() + data.slice(1).toLowerCase();
                }
                return data;
            }
            },
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

        })
        $(document).ready(function() {
            $('#searchButton').click(function() {
                const jenis_pelayanan = $('#jenis_pelayanan').val();
                const tahun = $('#tahun').val();
                const status = $('#status').val();
                console.log(jenis_pelayanan, tahun, status);
                $.ajax({
                    type: 'GET',
                    url: '/laporan-retensi',
                    data: {
                        jenis_pelayanan: jenis_pelayanan,
                        tahun: tahun,
                        status: status
                    },
                    success: function(data) {
                        table.clear().draw();
                        table.rows.add(data.data_pasien).draw();

                        const totalData = data.data_pasien.length;
                        $('#total').text(totalData);
                    }
                });
            });
        });
    </script>
@endsection
