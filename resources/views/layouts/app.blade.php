<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logo-dkt-1.jpg') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-dkt-1.jpg') }}" />
    <title>Sistem Retensi</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>



    <link href="{{ asset('DataTables/datatables.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('./assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('./assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- APEX CHART --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Main Styling -->
    <link href="{{ asset('./assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
    <style>
        .popup-active{
            background-color: rgba(0, 0, 0, 0.5)
        }
    </style>
</head>

<body id="body" class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full header-green min-h-75 top-0"></div>
    <!-- sidenav  -->
    @include('components.sidebar')

    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        @include('layouts.navigation')
        <div class="w-full px-6 py-6 mx-auto">
            @yield('content')
            @include('components.footer')
        </div>
    </main>
</body>
<!-- plugin for charts  -->
<script src="{{ asset('./assets/js/plugins/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('./assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('./assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>

<script>
    const modal = document.getElementById('modal');
    const showModalButton = document.getElementById('showModalButton');
    const closeModalButton = document.getElementById('closeModalButton');
    const edit = document.getElementsByClassName('edit');
    const hapus = document.getElementsByClassName('hapus');
    const body = document.getElementById('body')

    // Function to open the modal
    function openModal() {
        modal.style.display = 'block';
        edit.disabled = true
        hapus.disabled = true
        body.classList.add('popup-active')
    }

    // Function to close the modal
    function closeModal() {
        modal.style.display = 'none';
        edit.disabled = false
        hapus.disabled = false
        body.classList.remove('popup-active')
    }

    // Event listeners to open and close the modal
    showModalButton.addEventListener('click', openModal);
    closeModalButton.addEventListener('click', closeModal);

    // Close the modal if the user clicks outside of it
    window.addEventListener('click', (event) => {
    if (event.target === modal) {
        closeModal();
    }
    });

    function handleEdit(id){
        const modalEdit = document.getElementById(`modalEdit${id}`)
        modalEdit.style.display = 'block'
        body.classList.add('popup-active')
    }

    function closedModalEdit(id){
        const modalEdit = document.getElementById(`modalEdit${id}`)
        modalEdit.style.display = 'none'
        body.classList.remove('popup-active')
    }

</script>

@yield('extraJS')
</html>
