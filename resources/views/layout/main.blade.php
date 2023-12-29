<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>{{ $title }} | TOKO VARD</title>
    @include('layout.partial.link')
  </head>

  <body class="text-blueGray-700 antialiased">
    <div id="root">
        @include('layout.partial.header')
        <div class="relative md:ml-64 bg-blueGray-50">
            <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
              <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4 mt-2">
                <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="#">{{ $title }}</a>
              </div>
            </nav>
            <!-- Header -->

            @yield('content') 

        </div>
    </div>
    @yield('script')
  </body>
</html>
