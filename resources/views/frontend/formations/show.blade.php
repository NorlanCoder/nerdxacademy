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
    <script src="https://cdn.kkiapay.me/k.js"></script>
    <!-- Meta Pixel Code -->
    @vite('resources/css/app.css')
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

<body class="h-auto lg:h-screen bg-nerdx-blue text-white bg-hero-pattern bg-no-repeat bg-cover">
    <main class="h-full relative ">
        @include('frontend.partials.dark-header')
        <div class="bg-white text-black mt-4 md:mt-0">
            <div class="h-auto md:py-4 py-2 inline-flex md:text-base text-xs px-[24px] md:px-[61px] md:gap-x-4 gap-x-2">
                <p><a href="{{route('home')}}" class="cursor-pointer">Formations</a></p>
                <p>></p>
                <p>Développeur WordPress</p>
            </div>
        </div>
        <section class="h-auto  px-[30px] md:px-[61px]  flex flex-col-reverse lg:flex-row justify-center items-start gap-y-5 pt-8 md:gap-x-32 pb-10">

            <div class="flex flex-col gap-y-4 lg:w-[80%]">

                <!-- volet gauche -->
                <div class="text-left hidden lg:flex lg:flex-col">
                    <h2 class="text-slate-300 w-auto text-4xl font-semibold">{{ $formation->label }}</h2>
                    <!-- <p class="mt-2"> Développer des concepts visuels pour des projets de communication marketing.</p> -->
                </div>

                <div class="text-left">
                    <h4 class="text-nerdx-green text-xl font-semibold underline underline-offset-2 decoration-2">Informations sur
                        la Formation</h2>
                        <ul class="my-3 list-disc pl-4">
                            <li class="">
                                <h4 class="text-white poppins-light"><span class="font-extrabold poppins-regular text-slate-300 underline">Intitulé</span> : {{$formation->label}}
                                </h4>
                            </li>
                            <li class="">
                                <h4 class="text-white poppins-light"><span class="font-extrabold poppins-regular text-slate-300 underline">Durée</span> : {{ $formation->duration }} </h4>

                            </li>
                            <li class="">
                                <h4 class="text-white poppins-light"><span class="font-extrabold poppins-regular text-slate-300 underline">Format</span> : {{ $formation->format }} </h4>
                            </li>
                            <li class="">
                                <h4 class="text-white poppins-light"><span class="font-extrabold poppins-regular text-slate-300 underline">Lieu</span> : {{ $formation->adress }} </h4>
                            </li>
                            <li class="">
                                <h4 class="text-white poppins-light"><span class="font-extrabold poppins-regular text-slate-300 underline">Langue</span> : {{ $formation->language }} </h4>
                            </li>
                        </ul>
                </div>

                <div class="text-left">
                    {!! $formation->content !!}
                </div>
                <div class="mt-4 md:relative md:block flex md:w-auto w-full h-15 md:bg-transparent bg-nerdx-blue">
                    <a href="" onclick="openModal('modal','{{$formation->name}}')" class="btn-action my-3">S'inscrire</a>
                </div>
            </div>
            <div class="flex flex-col lg:w-[50%] lg:justify-end justify-center text-left">
                <div class="text-left lg:hidden flex flex-col pb-4">
                    <h2 class="text-nerdx-green w-auto text-3xl">Developpeur Wordpress</h2>
                    <p class="mt-2">Apprenez des compétences en Développement Wordpress</p>
                </div>

                <!-- volet droit -->
                <div class="flex flex-col lg:justify-end justify-center w-full gap-y-4 py-8 text-sm">
                    <img src="{{ asset('storage/'.($formation->image)) }}" alt="" class=" w-full rounded-xl">
                    <p><i class="fa-solid fa-calendar-days text-nerdx-green mr-2"></i>{{$formation->date}} 2024</p>
                    <p class=""><i class="fa-solid fa-clock text-nerdx-green mr-2"></i>{{$formation->time}} (heure locale)</span></p>
                    <!-- <p><i class="fa-solid fa-tag text-nerdx-green mr-2"></i>150.000 FCFA</p> -->
                    <p><i class="fa-solid fa-location-dot text-nerdx-green mr-2"></i>{{$formation->adress}} </p>
                    <div class="inline-flex items-center text-sm gap-x-10">
                        <!-- <p class="bg-nerdx-green rounded-md py-2 px-3">4,5 <i class="fa-solid fa-star text-yellow-300 ml-2"></i></p> -->
                        <p class="items-center"><i class="fa-solid fa-user-group text-nerdx-green pr-2"></i>{{$formation->participants}} participant(e)s</p>
                    </div>

                </div>

        </section>
        <div class="whatsapp-button fixed bottom-10 z-50 right-0 md:pr-1 rounded-s-3xl bg-green-600" class="w-12">
            <a href="https://wa.me/66633357" target="_blank">
                <img class="w-12" src="./assets/3225179_app_logo_media_popular_social_icon.png" alt="" srcset="" />
            </a>
        </div>
        <!-- Modal -->
        <div class="fixed top-0 left-0 hidden flex-row items-center justify-center h-screen bg-gray-800/30 w-screen overflow-y-auto z-50" id="modal">
            <div class="absolute right-10 top-10 m-auto cursor-pointer" onclick="closeModal('modal')">
                <span class="bg-white rounded-full w-10 h-10 flex justify-center items-center">
                    <i class="fa fa-close text-3xl text-red-500"></i>
                </span>
            </div>
            <div class="w-11/12 lg:w-1/3 m-auto bg-white border px-16 py-16 border-gray-200 rounded-lg self-center">
                <div class="relative z-0 w-full mb-7 group">

                    <label for="last-name" class="text-gray-800 font-semibold">Nom de famille <span class="text-red-500">*</span></label>
                    <input id="last_name" type="text" name="last_name" id="last-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="Entrez votre nom" required onkeyup="info()" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>
                <div class="relative z-0 w-full mb-7 group">
                    <label for="first-name" class="text-gray-800 font-semibold">Prénom <span class="text-red-500">*</span></label>
                    <input id="first_name" type="text" name="first_name" id="first-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="Entrez votre prénom" required onkeyup="info()" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>
                <div class="relative z-0 w-full mb-7 group">
                    <label for="phone-number" class="text-gray-800 font-semibold">Numéro de Télephone (Whatsapp)
                        <span class="text-red-500">*</span></label>
                    <input id="phone_number" type="number" name="phone_number" id="phone-number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="Tapez votre numéro de télephone" required onkeyup="info()" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
                <div class="relative z-0 w-full mb-7 group">
                    <label for="email" class="text-gray-800 font-semibold">E-mail <span class="text-red-500">*</span></label>
                    <input id="email" type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="Entrez votre email" required onkeyup="info()" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div id="formation-field" class="relative z-0 w-full mb-7 group">
                    <label for="formation" class="text-gray-800 font-semibold">
                        Choisissez votre formation préféré
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="absolute inset-y-0 right-0 flex px-2 my-1 pointer-events-none">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 12l-6-6-1.41 1.41L10 14.83l7.41-7.42L16 6z" />
                        </svg>
                    </div>
                    <select id="formation" name="formation" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer" onchange="info()">
                        <option value="default" selected>Veuillez sélectionner</option>
                        @foreach($formations as $formation_name)
                        <option value="{{$formation_name->name}}">{{$formation_name->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('formation')" class="mt-2" />
                </div>
                <div id="kkia"></div>
            </div>
        </div>

        <!-- pied de page -->
        <footer class="bg-nerdx-blue py-6">
            <div class="text-center items-center flex flex-col justify-center gap-y-4">
                <hr class="hidden lg:flex w-[40%]">
                <p class="text-xs">Copyright 2023 NerdXAcademie</p>
            </div>
        </footer>
    </main>
    <script>
        const bar = document.querySelector("#menu-bar");
        const menunav = document.querySelector("#mobile-nav");

        bar.addEventListener("click", () => {
            if (menunav.classList.contains("anime-show")) {
                menunav.classList.remove("anime-show");
                menunav.classList.add("anime-hide");
            } else if (
                !menunav.classList.contains("anime-hide") &&
                !menunav.classList.contains("anime-show")
            ) {
                menunav.classList.add("anime-show");
            } else if (menunav.classList.contains("anime-hide")) {
                menunav.classList.remove("anime-hide");
                menunav.classList.add("anime-show");
            }
        });
    </script>

    <script>
        function info() {
            var first_name = document.getElementById('first_name').value
            console.log(first_name)

            var last_name = document.getElementById('last_name').value
            var phone_number = document.getElementById('phone_number').value
            var email = document.getElementById('email').value
            var formation = document.getElementById('formation').value
            console.log(formation)
            var data = {
                'last_name': last_name,
                'first_name': first_name,
                'phone_number': phone_number,
                'email': email,
                'formation': formation
            };

            var kkiapayScript = document.getElementById('kkiapay_id');

            document.getElementById('kkia').innerHTML = `<kkiapay-widget amount="1000" 
                key="b131b020ed0f11eea8be6fad86782a96"
                position="center"
                sandbox="true"
                name="${first_name +' '+ last_name}"
                data=${JSON.stringify(data)}
                email=${email}
                callback={{route('formation.register')}}>
            </kkiapay-widget>`



        }
        info()
    </script>


</body>

</html>