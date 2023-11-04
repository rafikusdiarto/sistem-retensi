@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
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
        <div class="flex-none w-full max-w-full px-3">
            <div class="container relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 flex justify-between pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-zinc-700 font-bold text-xl">Edit Data</h6>
                    <a href="{{route('beritaAcara')}}"
                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer header-green leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Kembali
                    <i class="fas fa-arrow-left ms-2"></i>
                    </a>
                </div>

                <form action="{{ route('updateBeritaAcara', $data->id) }}" method="post" enctype="multipart/form-data" class="p-[30px]">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-slate text-slate">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $data->user->name }}" readonly
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('name')
                            <span class="pl-1 text-xs text-red-600 text-bold">
                                {{$message}}
                            </span>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-slate text-slate">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ $data->user->getRoleNames()[0] }}" readonly
                            class="focus:shadow-primary-outline uppercase text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                    </div>
                    <div class="mb-4">
                        <label for="caraPemusnahan" class="block mb-2 text-sm font-medium text-slate text-slate">Cara Pemusnahan</label>
                        <input type="text" name="cara_pemusnahan" id="caraPemusnahan" value="{{ $data->cara_pemusnahan }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('cara_pemusnahan')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tanggalPemusnahan" class="block mb-2 text-sm font-medium text-slate text-slate">Tanggal Pemusnahan</label>
                        <input type="date" name="tanggal_pemusnahan" id="tanggalPemusnahan" value="{{ $data->tanggal_pemusnahan }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('tanggal_pemusnahan')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="waktuPemusnahan" class="block mb-2 text-sm font-medium text-slate text-slate">Waktu Pemusnahan</label>
                        <input type="time" name="waktu_pemusnahan" id="waktuPemusnahan" value="{{ $data->waktu_pemusnahan }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('waktu_pemusnahan')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="lokasiPemusnahan" class="block mb-2 text-sm font-medium text-slate text-slate">Lokasi Pemusnahan</label>
                        <input type="text" name="lokasi_pemusnahan" id="lokasiPemusnahan" value="{{ $data->lokasi_pemusnahan }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('lokasi_pemusnahan')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="ketuaRekamMedis" class="block mb-2 text-sm font-medium text-slate text-slate">Ketua Rekam Medis</label>
                        <input type="text" name="ketua_rm" id="ketuaRekamMedis" value="{{ $data->ketua_rm }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @error('ketua_rekam_medis')
                                <small class="text-rose-600">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="Upload Lampiran" class="block mb-2 text-sm font-medium text-slate text-slate">
                            Upload Lampiran</label>
                        <main class="container mx-auto max-w-screen-lg h-full">
                            <!-- file upload modal -->
                            <article aria-label="File Upload Modal"
                                class="relative h-full flex flex-col bg-white shadow-xl rounded-md"
                                ondrop="dropHandler(event);" ondragover="dragOverHandler(event);"
                                ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                                <!-- overlay -->
                                <div id="overlay"
                                    class="w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md">
                                    <i>
                                        <svg class="fill-current w-12 h-12 mb-3 text-blue-700"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                                        </svg>
                                    </i>
                                    <p class="text-lg text-blue-700">Drop files to upload</p>
                                </div>

                                <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">
                                    <header
                                        class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                                        <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                                            <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
                                        </p>
                                            <input id="hidden-input"  name="lampiran[]" type="file" multiple class="hidden" />
                                        <span id="button"
                                            class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                            Upload a file
                                        </span>
                                    </header>

                                    <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                        To Upload
                                    </h1>


                                        <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                            <li id="empty"
                                                class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                                <img class="mx-auto w-32"
                                                    src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                                    alt="no data" />
                                                <span class="text-small text-gray-500">No files selected</span>
                                            </li>
                                        </ul>

                                        <div class="flex">
                                            @foreach($data->lampirans as $item)
                                            <li class="block mr-2 items-center p-1 w-[50px] sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                                <a href="{{ asset($item->path_file) }}" class="" target="_blank">
                                                    <article tabindex="0"
                                                        class="group h-full rounded-md focus:outline-none focus:shadow-outline relative bg-gray-100 cursor-pointer relative shadow-sm">
                                                        <img alt="upload preview"
                                                            class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                                                        <section
                                                            class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 bottom-0 py-2 px-3">
                                                            <p class="flex-1 group-hover:text-blue-800">{{$item->nama_file}}</p>
                                                            <div class="flex">
                                                                <span class="p-1 text-blue-800">
                                                                    <i>
                                                                        <svg class="fill-current w-4 h-4 ml-auto pt-1"
                                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                            viewBox="0 0 24 24">
                                                                            <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                                                        </svg>
                                                                    </i>
                                                                </span>
                                                                <p class="p-1 size text-xs text-gray-700"></p>
                                                                    <a href="{{url('/lampiran-berita-acara/delete', $item->id)}}"
                                                                        class="ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                            viewBox="0 0 24 24">
                                                                            <path class="pointer-events-none"
                                                                                d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                                                        </svg>
                                                                    </a>
                                                            </div>
                                                        </section>
                                                    </article>
                                                </a>
                                            </li>
                                            @endforeach

                                        </div>
                                </section>
                            </article>

                        </main>

                        <template id="file-template">
                            <li class="block p-1 w-[50px] sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                <article tabindex="0"
                                    class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline relative bg-gray-100 cursor-pointer relative shadow-sm">
                                    <img alt="upload preview"
                                        class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                                    <section
                                        class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                        <p class="flex-1 group-hover:text-blue-800"></p>
                                        <div class="flex">
                                            <span class="p-1 text-blue-800">
                                                <i>
                                                    <svg class="fill-current w-4 h-4 ml-auto pt-1"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24">
                                                        <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                                    </svg>
                                                </i>
                                            </span>
                                            <p class="p-1 size text-xs text-gray-700"></p>
                                            <button
                                                class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path class="pointer-events-none"
                                                        d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </section>
                                </article>
                            </li>
                        </template>
                        @error('lampiran')
                            <small class="text-rose-600">{{ $message }}</small>
                        @enderror
                        @error('lampiran.*')
                            <small class="text-rose-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer header-green leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px hover:shadow-md">Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
@section('extraJS')
    <script>
        const fileTempl = document.getElementById("file-template"),
            imageTempl = document.getElementById("image-template"),
            empty = document.getElementById("empty");

        // use to store pre selected files
        let FILES = {};

        // check if file is of type image and prepend the initialied
        // template to the target element
        function addFile(target, file) {
            const isImage = file.type.match("image.*"),
                objectURL = URL.createObjectURL(file);

            const clone = isImage ?
                imageTempl.content.cloneNode(true) :
                fileTempl.content.cloneNode(true);

            clone.querySelector("p").textContent = file.name;
            clone.querySelector("li").id = objectURL;
            clone.querySelector(".delete").dataset.target = objectURL;
            clone.querySelector(".size").textContent =
                file.size > 1024 ?
                file.size > 1048576 ?
                Math.round(file.size / 1048576) + "mb" :
                Math.round(file.size / 1024) + "kb" :
                file.size + "b";

            isImage &&
                Object.assign(clone.querySelector("img"), {
                    src: objectURL,
                    alt: file.name
                });

            empty.classList.add("hidden");
            target.prepend(clone);

            FILES[objectURL] = file;
        }

        const gallery = document.getElementById("gallery"),
            overlay = document.getElementById("overlay");

        // click the hidden input of type file if the visible button is clicked
        // and capture the selected files
        const hidden = document.getElementById("hidden-input");
        document.getElementById("button").onclick = () => hidden.click();
        hidden.onchange = (e) => {
            for (const file of e.target.files) {
                addFile(gallery, file);
            }
        };

        // use to check if a file is being dragged
        const hasFiles = ({
                dataTransfer: {
                    types = []
                }
            }) =>
            types.indexOf("Files") > -1;

        // use to drag dragenter and dragleave events.
        // this is to know if the outermost parent is dragged over
        // without issues due to drag events on its children
        let counter = 0;

        // reset counter and append file to gallery when file is dropped
        function dropHandler(ev) {
            ev.preventDefault();
            for (const file of ev.dataTransfer.files) {
                addFile(gallery, file);
                overlay.classList.remove("draggedover");
                counter = 0;
            }
        }

        // only react to actual files being dragged
        function dragEnterHandler(e) {
            e.preventDefault();
            if (!hasFiles(e)) {
                return;
            }
            ++counter && overlay.classList.add("draggedover");
        }

        function dragLeaveHandler(e) {
            1 > --counter && overlay.classList.remove("draggedover");
        }

        function dragOverHandler(e) {
            if (hasFiles(e)) {
                e.preventDefault();
            }
        }

        // event delegation to caputre delete events
        // fron the waste buckets in the file preview cards
        gallery.onclick = ({
            target
        }) => {
            if (target.classList.contains("delete")) {
                const ou = target.dataset.target;
                document.getElementById(ou).remove(ou);
                gallery.children.length === 1 && empty.classList.remove("hidden");
                delete FILES[ou];
            }
        };

        // print all selected files
        document.getElementById("submit").onclick = () => {
            alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
            console.log(FILES);
        };

        // clear entire selection
        document.getElementById("cancel").onclick = () => {
            while (gallery.children.length > 0) {
                gallery.lastChild.remove();
            }
            FILES = {};
            empty.classList.remove("hidden");
            gallery.append(empty);
        };
    </script>
@endsection
