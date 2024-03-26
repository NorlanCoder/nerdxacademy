<header class="lg:h-[90px] px-[24px] md:px-[61px] bg-white flex items-center justify-between shadow-md">
    <div id="logo">
        <a href="/accueil">
            <img src="./assets/logo1.png" alt="Nerdx Academy Logo" class="h-[65px]" />
        </a>
    </div>
    <nav class="items-center gap-x-16 hidden lg:flex">
        @auth
        <a href="{{route('index')}}" class="text-lg poppins-light">Admin</a>
        @endauth
        <a href="/accueil#formations" class="text-lg poppins-light">Nos Formations</a>
        <a href="" class="text-lg poppins-light">A propos</a>
        <a href="" class="text-lg poppins-light">Communauté</a>
        <a href="" onclick="openModal('modal1')" class="btn-action text-lg rounded poppins-light signup" id="signup1">S'inscrire</a>
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
            <a href="/accueil">
                <img src="./assets/logo1.png" alt="Nerdx Academy Logo" class="h-[65px]" />
            </a>
        </div>
        <div class="flex flex-col gap-y-4 mt-10">
            <a href="#" onclick="scrollToSection('formations')" class="text-lg poppins-light hover:bg-slate-200 p-3 rounded-lg">Nos Formations</a>
            <a href="" class="text-lg poppins-light hover:bg-slate-200 p-3 rounded-lg">A propos</a>
            <a href="" class="text-lg poppins-light hover:bg-slate-200 p-3 rounded-lg">Communauté</a>
            <a href="" class="btn-action text-lg poppins-light signup" id="signup2">S'inscrire</a>
        </div>
    </div>
    <div class="lg:hidden" id="menu-bar">
        <i class="fa-solid fa-bars text-4xl cursor-pointer text-nerdx-green"></i>
    </div>
</header>