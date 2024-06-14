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
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-zinc-700 font-bold text-xl">Data Rekam Medis</h6>
                    <a href="{{ route('tambahDataRekamMedis') }}"
                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Tambah
                        <i class="fas fa-plus ms-2"></i>
                    </a>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-5 overflow-x-auto">
                        <div class="flex items-center justify-end mb-5">
                            {{-- <div class="items-center">
                                <label for="countries" class="block text-sm flex font-medium items-center mx-2 text-slate">
                                    Show
                                    <select id="show"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-slate dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        style="padding-left: 1rem;
                                                padding-right: 3rem;
                                                padding-top: .5rem;
                                                padding-bottom: .5rem;
                                ">
                                        <option selected>10</option>
                                        <option>20</option>
                                        <option>25</option>
                                        <option>50</option>
                                    </select>
                                    Entries
                                </label>
                            </div> --}}

                            <div class="items-center" style="margin-bottom: -20px">
                                <div class="p-3 ">
                                    <div class="flex items-center">
                                        <span class="mx-2 text-slate">Periode</span>
                                        <div class="relative">
                                            <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-slate" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                        <form action="{{route('searchDataRekamMedis')}}" method="GET">
                                        @csrf
                                            </div>
                                            <input type="date" id="start_date" name="start_date"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-slate dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Start year">
                                            </div>
                                            <span class="mx-2 text-slate">to</span>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-slate" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                    </svg>
                                                </div>
                                                <input type="date" id="end_date" name="end_date"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-slate dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="End year">
                                            </div>
                                            <div class="relative ml-2">
                                                <button type="submit"
                                                    class="inline-block px-6 py-3 mr-1 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer header-green leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Cari</button>
                                            </div>
                                        </form>

                                            <div class="relative ml-2">
                                                <a href="{{route('dataRekamMedis')}}"
                                                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer header-green leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Reset</a>
                                            </div>
                                    </div>
                                </div>


                                <div
                                    class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease xl:w-20">
                                    <span
                                        class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" id="myInput"
                                        class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                        placeholder="Masukkan nomor RM" aria-controls="myTable" />
                                </div>

                            </div>
                        </div>
                        <form action="{{ route('retensi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="items-center w-[96.5%] my-5 mb-0 align-top border-collapse" id="myTable" datatable>
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
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap " style="width: 20em">
                                            Nama</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                            Jenis Kelamin</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap " style="width: 15em">
                                            Dokter</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap "style="width: 8em">
                                            MRS</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap " style="width: 8em">
                                            KRS</th>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                            Tanggal Upload</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap">
                                            Edit</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                            Hapus</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                            <input type="checkbox" id="select-all" class="w-5 h-5 text-blue-600 bg-gray-200 border-gray-300 border-rounded-full rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                                            Pilih
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-xs font-semibold text-slate text-slate-400">
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                            <div
                                class="p-6 pb-0 mb-0 border-b-0 border-b-solid text-right rounded-t-2xl border-b-transparent">
                                <button type="submit"
                                    class="btn-shadow font-bold uppercase text-xs ease-in bg-red-400 text-white rounded px-10 py-2 mt-2 hover:-translate-y-px hover:shadow-md">Retensi
                                    Pilihan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraJS')


{{--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>

    <script type="text/javascript">
    $(function () {
        var table = $('#myTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('getDataRM') }}",
            "columns":[
                { "data": 'DT_RowIndex', orderable: false, searchable: false },
                { "data": "no_rm" },
                { "data": "nik" },
                { "data": "nama" },
                { "data": "jenis_kelamin" },
                { "data": "dokter" },
                { "data": "mrs" },
                { "data": "krs" },
                {
                    "data": "created_at",
                    "render": function (data, type, row) {
                        // Use moment.js or plain JavaScript to format the date
                        if (data) {
                            var date = new Date(data);
                            var day = ('0' + date.getDate()).slice(-2);
                            var month = ('0' + (date.getMonth() + 1)).slice(-2);
                            var year = date.getFullYear();
                            return year + '-' + month + '-' + day;
                        }
                        return data;
                    }
                },
                { "data": "edit", orderable:false, searchable: false},
                { "data": "delete", orderable:false, searchable: false},
                { "data":"checkbox", orderable:false, searchable:false}

                ],
                "createdRow": function (row, data_pasien, index) {
                    // console.log(data_pasien.class);
                    $(row).addClass(data_pasien.class);
                },
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

            });
            $('#myInput').on( 'keyup', function () {
            table.search( this.value ).draw();
            });
            $('#select-all').click(function() {
                $('.bg-\\[\\#FFC7B6\\] input[name="checked[]"]').prop('checked', $(this).prop('checked'));
                updateSelectedCount();
            });
            function updateSelectedCount() {
                var count = $('.bg-\\[\\#FFC7B6\\] input[name="checked[]"]:checked').length;
                console.log('Jumlah baris yang dipilih:', count);
            }

    });
    </script>
<script>
</script>
@endsection
