<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NerdX Academy | Développeur Wordpress</title>
    <link rel="shortcut icon" href="{{asset('assets/fav-icon-digidop.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/main.css') }}" />
    <link rel="stylesheet" href="{{asset('dist/style.css')}}" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<link rel="stylesheet" href="{{asset('build/assets/app-CyccxUnb.css')}}">
    <script src="{{asset('build/assets/app-mqEmiGqA.js')}}"></script>
    {{--  @vite('resources/css/app.css')  --}}
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1093461298366534');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1093461298366534&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body>
    <main class="h-full text-white relative ">

        @include('frontend.partials.dark-header')

        <div class="relative overflow-x-auto mx-12 my-10 py-6 shadow-md sm:rounded-lg">
            <div class="flex justify-between">
                <div class="text-left hidden lg:flex lg:flex-col">
                    <h2 class="text-gray-700 w-auto text-4xl font-semibold">Liste des formations</h2>
                    <!-- <p class="mt-2"> Développer des concepts visuels pour des projets de communication marketing.</p> -->
                </div>
                <div class="flex gap-x-4">
                    <a href="{{route('formation.registers.index')}}" class="btn-action text-lg bg-[#192740] mr-3 hover:no-underline hover:text-white flex items-center rounded poppins-light signup">Liste des inscrits</a>
                    <a href="{{route('formation.create')}}" class="btn-action text-lg bg-[#192740] mr-3 hover:no-underline hover:text-white flex items-center rounded poppins-light signup">Ajouter une formation</a>
                </div>
            </div>
            <table class="w-full my-16 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Formation
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Durée
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Format
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lieu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($formations as $formation)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $formation->label }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $formation->duration }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $formation->format }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $formation->adress }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('formation.edit',$formation) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:no-underline  outline-none">Editer</a>
                            <a href="{{ route('formation.show',$formation) }}" class="font-medium text-green-600 dark:text-blue-500 hover:no-underline hover:text-green-700 outline-none">Afficher</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>

</body>
