<header class="lg:h-[90px] px-[24px] md:px-[61px] bg-nerdx-blue flex items-center justify-between shadow-md">
    <div id="logo">
        <a href="{{route('home')}}">
            <img src="{{asset('assets/logo2.webp')}}" alt="Nerdx Academy Logo" class="h-[65px]" />
        </a>
    </div>
    <nav class="items-center gap-x-10 hidden lg:flex">
        @auth
        <a href="{{route('index')}}" class="text-lg poppins-light">Admin</a>
        @endauth
        <a href="{{route('home').'#formations'}}" class="text-lg poppins-light">Formations</a>
        <a href="" class="text-lg poppins-light">A propos</a>
        <a href="" class="text-lg poppins-light">Communauté</a>
        <a href="" onclick="openModal('modal')" class="btn-action text-lg poppins-light signup" id="signup1">S'inscrire</a>
        @auth
        <form method="POST" class="h-full flex items-center pt-10" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')" class="hover:text-red-500" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                Se déconnecter
            </a>
        </form>
        @endauth
    </nav>

    <!-- Mobile nav -->
    <div class="lg:hidden flex flex-col h-screen shadow-lg fixed top-0 -left-[1000px] bg-white w-5/6 p-5 z-20" id="mobile-nav">
        <div>
            <a href="{{route('home')}}">
                <img src="{{asset('assets/logo1.png')}}" alt="Nerdx Academy Logo" class="h-[65px]" />
            </a>
        </div>
        <div class="flex flex-col gap-y-4 mt-10">
            @auth
            <a href="{{route('index')}}" class="text-lg poppins-light text-black hover:bg-slate-200 p-3 rounded-lg">Admin</a>
            @endauth
            <a href="/accueil#formations" class="text-lg poppins-light text-black hover:bg-slate-200 p-3 rounded-lg">Formations</a>
            <a href="" class="text-lg poppins-light text-black hover:bg-slate-200 p-3 rounded-lg">A propos</a>
            <a href="" class="text-lg poppins-light text-black hover:bg-slate-200 p-3 rounded-lg">Communauté</a>
            <a href="" onclick="openModal('modal')" class="btn-action text-lg text-black poppins-light signup" id="signup2">S'inscrire</a>
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

            if (modal.classList.contains("flex")) {
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
</script>