<!DOCTYPE html>
<html lang="en">

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
    @vite('resources/css/app.css')
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

        <form class="m-auto bg-white border px-16 py-16 border-gray-200 rounded-lg self-center" action="{{ route('formation.update',$formation)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Nom de la formation <span class="text-red-500">*</span></label>
                <input type="text" name="label" id="label" value="{{ $formation->label }}" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="exemple: Développement Wordpress" required />
                <x-input-error :messages="$errors->get('label')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Date <span class="text-red-500">*</span></label>
                <input type="text" name="date" id="date" value="{{ $formation->date }}" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="exemple: 20 Mars" required />
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="duration" class="text-gray-800 font-semibold">Durée <span class="text-red-500">*</span></label>
                <input type="text" name="duration" id="duration" value="{{ $formation->duration }}" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="exemple: 03 Mois" required />
                <x-input-error :messages="$errors->get('duration')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="duration" class="text-gray-800 font-semibold">Heure <span class="text-red-500">*</span></label>
                <input type="text" name="time" id="time" value="{{ $formation->time }}" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="exemple: 19h-22h" required />
                <x-input-error :messages="$errors->get('time')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Format <span class="text-red-500">*</span></label>
                <input type="text" name="format" id="format" value="{{ $formation->format }}" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="exemple: Présentiel" required />
                <x-input-error :messages="$errors->get('format')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Adresse <span class="text-red-500">*</span></label>
                <input type="text" name="adress" id="adress" value="{{ $formation->adress }}" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="exemple: NerdX House (Zogbadjè, von maquis BK)" required />
                <x-input-error :messages="$errors->get('adress')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Nombre de participants <span class="text-red-500">*</span></label>
                <input type="number" min='0' name="participants" value="{{ $formation->participants }}" id="participants" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="exemple: 12" required />
                <x-input-error :messages="$errors->get('participants')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Langue <span class="text-red-500">*</span></label>
                <input type="text" name="language" id="language" value="{{ $formation->language }}" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="exemple: Français" required />
                <x-input-error :messages="$errors->get('language')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Image <span class="text-red-500">*</span></label>
                <input type="file" name="image" id="image" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Prix <span class="text-red-500">*</span></label>
                <input type="number" min='0' name="price" id="price" value="{{ $formation->price }}" class="block py-2.5 px-4 w-full text-sm text-gray-900 bg-transparent border-1 rounded-md border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="exemple: 150000" required />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <div class="relative z-0 w-2/3 mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Contenu <span class="text-red-500">*</span></label>
                <textarea id="summernote" name="content">{{$formation->content}}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <button type="submit" class="btn-action bg-green-600 rounded-md poppins-light p-3 text-white px-8">
                Soumettre
            </button>
        </form>
    </main>
    <script>
        $('#summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 300
        });
    </script>
</body>

</html>