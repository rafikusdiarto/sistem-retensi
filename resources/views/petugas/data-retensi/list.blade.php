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
                    {{ session('error') }}</div>
            @endif
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-zinc-700 font-bold text-xl">Data Retensi</h6>
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
                                                <form action="{{ route('searchDataRetensi') }}" method="GET">
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
                                            <a href="{{ route('dataRetensi') }}"
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
                        <form action="{{ route('printDataRetensi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="items-center w-[96.5%] my-5 mb-0 align-top border-collapse" datatable
                                id="myTable">
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
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap "
                                            style="width: 10em">
                                            Nama</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                            Jenis Kelamin</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap "
                                            style="width: 15em">
                                            Dokter</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap "style="width: 8em">
                                            MRS</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap "
                                            style="width: 8em">
                                            KRS</th>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                            Tanggal Upload</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                            Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($pasien as $item)
                                        <?php
                                        $tgl_krs = \Carbon\Carbon::parse($item->tgl_retensi);
                                        $tgl_retensi = \Carbon\Carbon::parse($item->tgl_retensi);
                                        $tanggalKadaluwarsa = \Carbon\Carbon::now()->subYears(5)->subDays(5);
                                        ?>
                                        <tr
                                            class="{{ $tgl_retensi <= \Carbon\Carbon::now()->addDays(5) || \Carbon\Carbon::now() > $tgl_retensi || $tgl_krs <= $tanggalKadaluwarsa || $item->status == 'inactive' ? 'bg-[#FFC7B6]' : '' }}">
                                            <td class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                {{ $no++ }}
                                            </td>
                                            <td class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                {{ $item->no_rm }}
                                            </td>
                                            <td class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                {{ $item->nik }}
                                            </td>
                                            <td class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                {{ $item->nama }}
                                            </td>
                                            <td class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                {{ $item->jenis_kelamin }}
                                            </td>
                                            <td class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                {{ $item->dokter }}
                                            </td>
                                            <td class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                {{ $item->mrs }}
                                            </td>
                                            <td class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                {{ $item->krs }}
                                            </td>
                                            <td class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}
                                                </td>
                                            <td
                                                class="text-left px-6 py-3 uppercase text-xs font-semibold text-slate text-slate-400">
                                                <select id="" data-user-id="{{ $item->id }}" name="status"
                                                    class="statusSelect bg-red-500 text-white uppercase border border-gray-300 text-slate text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                    <option>{{ $item->status }}</option>
                                                    <option value="active">active</option>
                                                </select>
                                            </td>
                                            <td
                                                class="text-left text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                                <label>
                                                    <input id="checkbox-1" name="checked[]" value="{{ $item->id }}"
                                                        class="w-5 h-5 ease text-base -ml-7 rounded-1.4  checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:font-awesome after:duration-150 after:ease-in-out duration-100 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-500 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                                        type="checkbox" />
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                            </div>
                            <div
                            class="p-6 pb-0 mb-0 border-b-0 border-b-solid flex justify-between text-right rounded-t-2xl border-b-transparent">
                                <a href="{{route('dataRetensiHangus')}}">
                                    <button type="button"
                                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-yellow-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Lihat Data Hangus
                                        <i class="fa-solid fa-circle-exclamation ms-2"></i>
                                    </button>
                                </a>
                                @if (count($pasien) == 0)
                                    <button disabled
                                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-red-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Data
                                        Tidak Ada
                                        <i class="fas fa-print ms-2"></i>
                                    </button>
                                @else
                                    <button type="submit"
                                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Cetak
                                        <i class="fas fa-print ms-2"></i>
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraJS')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        var table = $('#myTable').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
        });
        $('#myInput').on('keyup', function() {
            table.search(this.value).draw();
        })
    </script>
    <script></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.statusSelect').change(function() {
                var selectElement = $(this);
                var status = selectElement.val();
                var userId = selectElement.data('user-id');

                $.ajax({
                    url: "/dataretensi/update-status/" + userId + "/" + status,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function(data) {
                        // console.log('Status berhasil diubah');
                        if (!data.error) {
                            Swal.fire({
                                title: "Sukses",
                                text: "Status berhasil diubah",
                                type: "success"
                            }).then(function() {
                                location.reload(true);
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
        });

    </script>
@endsection
