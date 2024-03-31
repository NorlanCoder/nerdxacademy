<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NerdX Academy</title>
    <link rel="shortcut icon" href="./assets/fav-icon-digidop.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('dist/main.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/style.css')}}" />
    <script src="https://cdn.kkiapay.me/k.js"></script>
    @vite('resources/css/app.css')


    <!-- Meta Pixel Code -->
    <script>
        !(function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) :
                    n.queue.push(arguments);
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = "2.0";
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s);
        })(
            window,
            document,
            "script",
            "https://connect.facebook.net/en_US/fbevents.js"
        );
        fbq("init", "1093461298366534");
        fbq("track", "PageView");
    </script>
    <noscript><img height="1" width="1" style="display: none" src="https://www.facebook.com/tr?id=1093461298366534&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body class="h-auto lg:h-screen bg-bgnerdx-gray bg-hero-pattern bg-no-repeat bg-cover">
    <main class="h-full relative">
        <header class="lg:h-[90px] px-[24px] md:px-[61px] bg-white flex items-center justify-between shadow-md">
            <div id="logo">
                <a href="{{route('home')}}">
                    <img src="./assets/logo1.png" alt="Nerdx Academy Logo" class="h-[65px]" />
                </a>
            </div>
            <nav class="items-center gap-x-10 hidden lg:flex">
                @auth
                <a href="{{route('index')}}" class="text-lg poppins-light">Admin</a>
                @endauth
                <a href="{{route('home').'#formations'}}" class="text-lg poppins-light">Formations</a>
                <a href="" class="text-lg poppins-light">A propos</a>
                <a href="" class="text-lg poppins-light">Communauté</a>
                <a href="" class="btn-action w-max text-lg poppins-light attente">S'inscrire</a>
                @auth
                <form method="POST" class="h-full" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" class="hover:text-red-500" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        Déconnexion
                    </a>
                </form>
                @endauth
            </nav>

            <!-- Mobile nav -->
            <div class="lg:hidden flex flex-col h-screen shadow-lg fixed top-0 -left-[1000px] bg-white w-5/6 p-5 z-20" id="mobile-nav">
                <div>
                    <a href="/accueil">
                        <img src="./assets/logo1.png" alt="Nerdx Academy Logo" class="h-[65px]" />
                    </a>
                </div>
                <div class="flex flex-col gap-y-4 mt-10">
                    @auth
                    <a href="{{route('index')}}" class="text-lg poppins-light text-black hover:bg-slate-200 p-3 rounded-lg">Admin</a>
                    @endauth
                    <a href="{{route('home')}}" class="text-lg poppins-light hover:bg-slate-200 p-3 rounded-lg">Formations</a>
                    <a href="" class="text-lg poppins-light hover:bg-slate-200 p-3 rounded-lg">A propos</a>
                    <a href="" class="text-lg poppins-light hover:bg-slate-200 p-3 rounded-lg">Communauté</a>
                    <a href="" class="btn-action text-lg poppins-light signup" id="signup2">S'inscrire</a>
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="route('logout')" class="btn-action bg-slate-600 border-slate-600 text-lg text-white poppins-light signup" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            Se déconnecter
                        </a>
                    </form>
                    @endauth
                </div>
            </div>
            <div class="lg:hidden" id="menu-bar">
                <i class="fa-solid fa-bars text-4xl cursor-pointer text-nerdx-green"></i>
            </div>
        </header>
        <div class="absolute lg:top-20 top-16 z-10 flex sm:justify-start justify-center items-center sm:px-16 px-12 w-full h-12 bg-[#DDFFE5]">
            <h1 class="poppins-light sm:text-xl text-md sm:block hidden text-[#192740]"><span>Inscrivez-vous pour la journée porte ouverte<span></h1>
            <a href="https://bit.ly/3IWXpTh" target="_blank" class="btn-action flex justify-center items-center xl:mx-4 md:mx:6 sm:w-max w-auto h-9 px-6 text-lg poppins-light"><span class="sm:block hidden">Je m'inscris <i class="fa-solid fa-arrow-right text-lg pl-4"></i></span><span class="sm:hidden block">Journée porte ouverte<i class="fa-solid fa-arrow-right text-lg pl-4"></i></span></a>
        </div>
        @if(session('success'))
        <div class="p-4 mb-1 text-sm max-w-7xl mt-1 mx-auto text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif

        @yield('presentation')

        @yield('formations')

        <div class="whatsapp-button fixed bottom-10 z-50 right-0 md:pr-1 rounded-s-3xl bg-green-600" class="w-12">
            <a href="https://wa.me/+22966633357" target="_blank">
                <img class="w-12" src="./assets/3225179_app_logo_media_popular_social_icon.png" alt="" srcset="" />
            </a>
        </div>

        @include('frontend.partials.footer')
    </main>

    <!-- Modal after 5sec -->
    <div class="modal_after_sec fixed top-0 left-0 hidden items-center justify-center h-screen bg-gray-800/30 w-screen z-50" id="modal_after_sec">
        <div class="absolute right-10 top-10 cursor-pointer" onclick="closeModal('modal_after_sec')">
            <span class="bg-white rounded-full w-10 h-10 flex justify-center items-center">
                <i class="fa fa-close text-3xl text-red-500"></i>
            </span>
        </div>
        <div class="modal flex w-[352.17px] flex-col justify-center items-center bg-white border px-10 py-8 border-gray-200 rounded-xl">
            <h1 class="poppins-bold text-center text-2xl flex flex-col my-4 text-gray-800"> <span>Bienvenue à</span> NerdX Academy</h1>
            <p class="text poppins-light text-md text-center text-gray-800 mb-4">Vous êtes invité à la journée porte ouverte du <span class="poppins-bold">06 avril 2024</span> </p>
            <p class="text poppins-light text-md text-gray-800 text-center">Réservez vite et <span class="poppins-bold">GRATUITEMENT</span> votre place en choisissant un atelier</p>
            <a href="https://bit.ly/3IWXpTh" target="_blank" class="px-6 py-3 my-5 border flex items-center border-green-600 bg-[#53B36A] text-white rounded-md">
                <span class="poppins-light font-extralight">Je m'inscris</span>
            </a>
            <h3 class="text-sm my-2 text-center">NB : 15 places disponibles par atelier !</h3>
        </div>
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
            <h3 class="text-md text-[#192740] my-6 text-left"> <span class="text-red-400">*</span> Frais d'inscription: <span class="poppins-bold">20.000 FCFA</span> </h3>
            <div id="kkia"></div>
        </div>
    </div>
    <script>

    </script>
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

        const modalA = document.querySelector("#modal");
        const btnAttente = document.querySelectorAll(".attente");
        const signup = document.querySelectorAll(".signup");

        btnAttente.forEach((item, i) => {
            item.addEventListener("click", (e) => {
                e.preventDefault();

                if (modalA.classList.contains("flex")) {
                    document.getElementById(modalId).classList.add("animate-fadeIn");
                    modalA.classList.remove("flex");
                    modalA.classList.add("hidden");
                    setTimeout(function() {
                        document
                            .getElementById(modalId)
                            .classList.remove("animate-fadeIn");
                    }, 350);
                } else {
                    modalA.classList.add("flex");
                    modalA.classList.remove("hidden");
                }
            });

            window.closeModal = function(modalId) {
                document.getElementById(modalId).classList.remove("flex");
                document.getElementById(modalId).classList.add("hidden");
            };
        });

        signup.forEach((item, i) => {
            item.addEventListener("click", (e) => {
                e.preventDefault();

                if (modalA.classList.contains("flex")) {
                    modalA.classList.remove("flex");
                    modalA.classList.add("hidden");
                } else {
                    modalA.classList.add("flex");
                    modalA.classList.remove("hidden");
                }
            });

            window.openModal = function(modalId, formationValue) {
                if (formationValue) {
                    document.getElementById("formation-field").classList.add("hidden");
                    document.getElementById("formation").value = formationValue;
                    console.log(document.getElementById("formation").value);
                }

                event.preventDefault();
                document.getElementById(modalId).classList.add("animate-fadeIn");
                document.getElementById(modalId).classList.remove("hidden");
                document.getElementById(modalId).classList.add("flex");

                setTimeout(function() {
                    document.getElementById(modalId).classList.remove("animate-fadeIn");
                }, 200);
            };

            window.closeModal = function(modalId) {
                document.getElementById("formation-field").classList.remove("hidden");
                document.getElementById("formation").value = "default";
                document.getElementById(modalId).classList.remove("flex");
                document.getElementById(modalId).classList.add("hidden");
            };
        });

        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                var modal = document.getElementById('modal_after_sec');
                modal.classList.add("animate-fadeIn");
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            }, 5000);
        });
    </script>

    <script>
        function info() {
            var first_name = document.getElementById('first_name').value

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

            document.getElementById('kkia').innerHTML = `<kkiapay-widget amount="20000" 
                key="82ab6b09a76f5d6671fed8fab03fad066d7e08ca"
                position="center"
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