<!--

=========================================================
* Argon Dashboard 2 Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/logo-dkt-1.jpg')}}" />
    <link rel="icon" type="image/png" href="{{asset('assets/img/logo-dkt-1.jpg')}}" />
    <title>Sistem Retensi</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
  </head>

  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <!-- Navbar -->

    <main class="mt-0 transition-all duration-200 ease-in-out">
      <section class="min-h-screen">
        <div class="bg-top relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-cover min-h-50-screen rounded-xl bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg')]">
          <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 opacity-60"></span>
          <div class="container z-10">
            <div class="flex flex-wrap justify-center -mx-3">
              <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 ">
                <h1 class="mt-12 mb-2 text-white">Selamat Datang</h1>
                <p class="text-white">SISTEM RETENSI RUMAH SAKIT TINGKAT III BALADHIKA HUSADA JEMBER.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
            <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
              <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                  <h5>Login Sistem Retensi</h5>
                </div>
                <div class="flex justify-center">
                    <img class="w-1/2 object-contain" src="{{ asset('assets/img/logo-dkt-1.jpg') }}" alt="DKT" />
                </div>
                <div class="flex-auto p-6">
                  <form role="form text-left" action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                      <input type="email" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" name="email" aria-describedby="email-addon" />
                    </div>
                    <div class="mb-4">
                      <input type="password" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" name="password" aria-describedby="password-addon" />
                    </div>

                    <div class="text-center">
                        <button type="submit" class="inline-block w-full px-5 py-2.5 mt-6 mb-2 font-bold text-center text-white align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
      <footer class="py-12">
        <div class="container">
          <div class="flex flex-wrap -mx-3">
            <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
              <p class="mb-0 text-slate-400">
                Sistem Retensi Rekam Medis
                <script>
                  document.write(new Date().getFullYear());
                </script>
                <br>
                <b>RUMAH SAKIT DKT JEMBER </b>
              </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </main>
  </body>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</html>
