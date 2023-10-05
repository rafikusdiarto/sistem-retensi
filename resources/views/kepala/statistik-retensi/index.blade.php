@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            @if(session("success"))
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-emerald-500 to-teal-400 border-emerald-300">{{session('success')}}</div>
            @endif
            @if(session("error"))
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-rose-500 to-rose-400 border-rose-300">`{{session('error')}}`</div>
            @endif
            @error('tahun')
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-rose-500 to-rose-400 border-rose-300">{{$message}}</div>
            @enderror
            @error('jumlah')
            <div alert class="relative w-full p-4 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-rose-500 to-rose-400 border-rose-300">{{$message}}</div>
            @enderror

            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-slate-400 font-bold text-xl">Statitstik Retensi</h6>
                    <button id="showModalButton"
                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-menu leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Tambah
                    <i class="fas fa-plus ms-2"></i>
                    </button>
                </div>

                <div id="modal" class="hidden absolute w-full h-full rounded-2xl" style="background-color:rgba(0, 0, 0, 0.5);">
                    <div class="absolute h-fit max-w-xl w-full top-10 left-1/2 -translate-x-1/2 bg-white border rounded">
                        <form action="{{ url('/kepala/statistik-retensi/store') }}" method="POST" class="p-4 ">
                            @csrf
                            <span id="closeModalButton" class="float-right cursor-pointer scale-150">&times;</span>
                        <h4 class="font-bold text-center pt-10">Tambah Data Statistik</h4>
                        <div class="mb-4">
                            <label for="tahun" class="block mb-2 text-sm font-medium text-slate text-slate">Tahun</label>
                            <input type="text" name="tahun" id="tahun"
                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-4">
                            <label for="jumlah" class="block mb-2 text-sm font-medium text-slate text-slate">Jumlah RM Inaktif</label>
                            <input type="text" name="jumlah" id="jumlah"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                        </div>
                        <button type="submit" class="inline-block mb-4 float-right px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Simpan
                        </button>
                        </form>
                    </div>
                </div>

                <div class="flex items-center px-6 justify-end gap-2">
                    <span class="text-lg">Periode</span>
                    <div class="flex gap-2 items-center">
                        <input type="text" id="tahun1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-slate dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <span> - </span>
                        <input type="text" id="tahun2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-slate dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <button id="filterButton" class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-menu leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Tampilkan</button>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-6 overflow-x-auto">
                        <span id="closeChartBtn" onclick="closeChart()" class="float-right cursor-pointer scale-150 px-3 hidden">&times;</span>
                        <div id="chart" class="mt-10"></div>
                        <table id="sr-table" class="items-center w-full my-5 mb-0 align-top border-collapse display">
                            <thead class="align-bottom">
                                <tr class="header-green rounded-full text-white">
                                    <th
                                        class="text-left px-6 py-3 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        No</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Tahun</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none  text-xxs border-b-solid tracking-none whitespace-nowrap ">
                                        Jumlah Berkas Inaktif</th>
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
                                @foreach ($data as $item)
                                    <div id="modalEdit{{ $item->id }}" class="hidden absolute top-0 left-0 w-full h-full rounded-2xl" style="background-color:rgba(0, 0, 0, 0.5);">
                                        <div class="absolute h-fit max-w-xl w-full top-10 left-1/2 -translate-x-1/2 bg-white border rounded z-10 p-4">
                                            <form action="{{ url('/kepala/statistik-retensi/update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <span onclick="closedModalEdit({{ $item->id }})" class="float-right cursor-pointer scale-150">&times;</span>
                                                <h4 class="font-bold text-center pt-10">Edit Data Statistik</h4>
                                                <div class="mb-4">
                                                    <label for="tahun" class="block mb-2 text-sm font-medium text-slate text-slate">Tahun</label>
                                                    <input type="text" name="tahun" id="tahun" value="{{ $item->tahun }}"
                                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="jumlah" class="block mb-2 text-sm font-medium text-slate text-slate">Jumlah RM Inaktif</label>
                                                    <input type="text" name="jumlah" id="jumlah" value="{{ $item->jumlah }}"
                                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                                </div>
                                                <button type="submit" class="inline-block float-right px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Simpan
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <tr>
                                        <td
                                        class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">{{$no++}}
                                        </td>
                                        <td
                                            class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400">{{$item->tahun}}
                                        </td>
                                        <td
                                            class="text-left px-6 py-3 text-xs font-semibold text-slate text-slate-400 uppercase">{{$item->jumlah}}
                                        </td>
                                        <td
                                            class="text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                            <button id="edit{{ $item->id }}" data-target="{{ $item->id }}" onclick="handleEdit({{ $item->id }})"
                                            class="inline-block edit px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg bg-menu leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Edit
                                            <i class="fas fa-pen ms-2"></i>
                                        </button>
                                        </td>
                                        <td
                                            class="text-center px-6 py-3 text-xs font-semibold text-slate text-slate-400">
                                            <form action="{{url('/kepala/statistik-retensi/delete', $item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="hapus"
                                                class="inline-block hapus px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md bg-menu" style="background-color: #CD3716;">Hapus
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

    <script>
        const data = <?= json_encode($data); ?>;
        const myChart = document.getElementById('chart')
        const table = document.getElementById('sr-table')
        const closeChartBtn = document.getElementById('closeChartBtn')

        function closeChart(){
            chart.destroy()
            myChart.classList.add('hidden')
            closeChartBtn.classList.add('hidden')
            table.classList.remove('hidden')
        }
        let chart


        function updateChart(convertedData){
            if(chart){
                chart.destroy()
            }
            var options = {
            series: [
            {
                name: 'Jumlah RM Inaktif',
                data: convertedData
            }
            ],
            chart: {
            height: 350,
            type: 'bar'
            },
            plotOptions: {
            bar: {
                columnWidth: '60%'
            }
            },
            colors: ['#CD3716'],
            dataLabels: {
            enabled: false
            },
            legend: {
            show: true,
            showForSingleSeries: true,
            customLegendItems: ['Jumlah RM Inaktif'],
            markers: {
                fillColors: ['#CD3716']
            }
            }
            };

            chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }

        document.getElementById('filterButton').addEventListener('click', function () {
            const startYear = parseInt(document.getElementById('tahun1').value);
            const endYear = parseInt(document.getElementById('tahun2').value);

            // Filter data berdasarkan rentang tahun yang dimasukkan
            const filteredData = data.filter(entry => entry.tahun >= startYear && entry.tahun <= endYear);

            filteredData.sort((a, b) => a.tahun - b.tahun);

            const convertedData = filteredData.map(item => {
                return {
                    x: item.tahun,
                    y: item.jumlah
                };
            });
            console.log(convertedData);
            if (filteredData.length > 0) {
                table.classList.add('hidden')
                myChart.classList.remove('hidden')
                closeChartBtn.classList.remove('hidden')
                updateChart(convertedData);
            } else {
                alert('Tidak ada data untuk rentang tahun yang dimasukkan.');
            }
        });
    </script>
@endsection
