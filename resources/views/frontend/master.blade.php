<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NerdX Academy</title>
    <link rel="shortcut icon" href="./assets/fav-icon-digidop.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./dist/main.css" />
    <link rel="stylesheet" href="./dist/style.css" />
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
        @yield('header')

        @yield('presentation')

        @yield('formations')


        <div class="whatsapp-button fixed bottom-10 z-50 right-0 md:pr-1 rounded-s-3xl bg-green-600" class="w-12">
            <a href="https://wa.me/66633357" target="_blank">
                <img class="w-12" src="./assets/3225179_app_logo_media_popular_social_icon.png" alt="" srcset="" />
            </a>
        </div>

        @include('frontend.partials.footer')
    </main>

    <!-- Modal -->
    <div class="fixed top-0 left-0 hidden flex-row items-center justify-center h-screen bg-gray-800/30 w-screen overflow-y-auto z-50" id="modal">
        <div class="absolute right-10 top-10 m-auto cursor-pointer" onclick="closeModal('modal')">
            <span class="bg-white rounded-full w-10 h-10 flex justify-center items-center">
                <i class="fa fa-close text-3xl text-red-500"></i>
            </span>
        </div>
        <form class="w-11/12 lg:w-1/3 m-auto bg-white border px-16 py-16 border-gray-200 rounded-lg self-center" action="traitement.php" method="post">
            <div class="relative z-0 w-full mb-7 group">
                <label for="last-name" class="text-gray-800 font-semibold">Nom de famille <span class="text-red-500">*</span></label>
                <input type="text" name="last-name" id="last-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="Entrez votre nom" required />
            </div>
            <div class="relative z-0 w-full mb-7 group">
                <label for="first-name" class="text-gray-800 font-semibold">Prénom <span class="text-red-500">*</span></label>
                <input type="text" name="first-name" id="first-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="Entrez votre prénom" required />
            </div>
            <div class="relative z-0 w-full mb-7 group">
                <label for="phone-number" class="text-gray-800 font-semibold">Numéro de Télephone <span class="text-red-500">*</span></label>
                <input type="number" name="phone-number" id="phone-number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="Tapez votre numéro de télephone" required />
            </div>
            <div class="relative z-0 w-full mb-7 group">
                <label for="email" class="text-gray-800 font-semibold">E-mail <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder="Entrez votre email" required />
            </div>

            <div id="formation" class="relative z-0 w-full mb-7 group">
                <label for="formation" class="text-gray-800 font-semibold">
                    Choisissez votre formation préféré
                    <span class="text-red-500">*</span>
                </label>
                <div class="absolute inset-y-0 right-0 flex px-2 my-1 pointer-events-none">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M10 12l-6-6-1.41 1.41L10 14.83l7.41-7.42L16 6z" />
                    </svg>
                </div>
                <select name="formation" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option selected>Veuillez sélectionner</option>
                    <option value="graphisme">Graphisme</option>
                    <option value="Developpement-web">Développement web</option>
                    <option value="marketing">Marketing</option>
                </select>
            </div>

            <button type="submit" class="btn-action poppins-light p-4 px-8">
                Soumettre
            </button>
        </form>
    </div>
    <script>
        function scrollToSection(sectionId) {
            event.preventDefault();
            const section = document.getElementById(sectionId);
            if (section) {
                history.pushState(null, null, `#${sectionId}`);
                section.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        }
        window.openModal = function(modalId, formationValue) {
            if (formationValue) {
                document.getElementById("formation").classList.add("hidden");
                document.getElementById("formation").value = formationValue;
                console.log(document.getElementById("formation"));
            }

            event.preventDefault();
            document.getElementById(modalId).classList.add("animate-fadeIn");
            document.getElementById(modalId).classList.remove("hidden");
            document.getElementById(modalId).classList.add("flex");

            setTimeout(function() {
                document.getElementById(modalId).classList.remove("animate-fadeIn");
            }, 200);
        };
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

            window.closeModal = function(modalId) {
                document.getElementById(modalId).classList.remove("flex");
                document.getElementById(modalId).classList.add("hidden");
            };
        });
    </script>
</body>

</html>