<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title') | SIM Konstruksi</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        :root {
            --main-color: #4f46e5;
        }

        .bg-custom {
            background-color: var(--main-color) !important;
        }

        .text-custom {
            color: var(--main-color) !important;
        }

        .border-custom {
            border-color: var(--main-color) !important;
        }

        .hover-bg-custom:hover {
            background-color: var(--main-color);
            filter: opacity(0.1);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 10px;
        }

        .dark .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #374151;
        }
    </style>

    <script>
        (function() {
            const savedColor = localStorage.getItem('theme-color') || '#4f46e5';
            const isDark = localStorage.getItem('dark-mode') === 'true';
            document.documentElement.style.setProperty('--main-color', savedColor);
            if (isDark) document.documentElement.classList.add('dark');
        })();

        function setTheme(colorCode) {
            document.documentElement.style.setProperty('--main-color', colorCode);
            localStorage.setItem('theme-color', colorCode);
        }

        function toggleDarkMode() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('dark-mode', isDark);
        }

        $(document).ready(function() {

            $(document).on('keyup', '.rupiah-display', function() {

                let display = $(this)

                let num = display.val()

                // ambil angka saja
                num = num.replace(/\D/g, '')

                // set hidden input terdekat
                display.closest('div').find('.rupiah-hidden').val(num)

                // format ribuan
                display.val(addCommas(num))
            })

        })

        function addCommas(nStr) {

            nStr += ''

            nStr = nStr.replace(/,/g, '')

            let x = nStr.split('.')

            let x1 = x[0]

            let x2 = x.length > 1 ? '.' + x[1] : ''

            let rgx = /(\d+)(\d{3})/

            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2')
            }

            return x1 + x2
        }
    </script>
    <script>
        function updateTextView(_obj) {
            var num = getNumber(_obj.value);

            if (num == 0) {
                _obj.value = '';
            } else {
                _obj.value = num.toLocaleString('id-ID');
            }
        }

        function getNumber(_str) {
            var arr = _str.toString().split('');
            var out = [];

            for (var cnt = 0; cnt < arr.length; cnt++) {
                if (isNaN(arr[cnt]) == false) {
                    out.push(arr[cnt]);
                }
            }

            return Number(out.join(''));
        }

        document.addEventListener('input', function(e) {

            if (!e.target.classList.contains('rupiah')) return;

            updateTextView(e.target);
        });

        // bersihin sebelum submit
        document.addEventListener('submit', function(e) {

            const inputs = e.target.querySelectorAll('.rupiah');

            inputs.forEach(input => {
                input.value = getNumber(input.value);
            });
        });
    </script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwind.min.css">

    <script src="https://cdn.jsdelivr.net/npm/autoNumeric@4.1.0/dist/autoNumeric.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body
    class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <div class="min-h-screen flex">
        <aside
            class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 hidden sm:block fixed h-full transition-colors duration-300">
            @include('layouts.navigation')
        </aside>

        <div class="flex-1 sm:ml-64 flex flex-col">
            <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 sm:hidden">
                @include('layouts.navigation')
            </nav>

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow-sm transition-colors duration-300">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
