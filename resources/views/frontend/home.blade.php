@extends('frontend.master')

@section('presentation')
<section class="h-auto lg:h-[calc(100vh-90px)] px-[30px] md:px-[61px] flex flex-col justify-center gap-y-5 relative pb-8 lg:pt-0 pt-6">
    <div class="lg:h-[100%-60px] flex flex-col justify-between items-center lg:flex-row xl:mb-0">
        <!-- Contenu principal  -->
        <div class="h-full flex flex-col justify-center w-screen lg:w-1/2 lg:px-0 px-5">
            <h3 class="flex items-center gap-x-1 lg:text-3xl lg:text-left lg:justify-start justify-center w-full sm:text-[1vw] text-nerdx-green mb-6">
                <span class="dot"></span> <span class="dot"></span>
                <span class="pl-1 font-semibold">Prochaine rentrée : 8 Avril 2024</span>
            </h3>
            <h1 class="md:text-[3vw] text-[25px] sm:text-[1.5vw] xl:text-[4vw] lg:text-left text-center font-bold w-full leading-tight text-[#192740]">
                100% ORIENTEE EMPLOI
            </h1>
            <h1 class="md:text-[3vw] text-[25px] sm:text-[1.5vw] xl:text-[4vw] lg:text-left text-center font-bold w-full leading-tight text-[#192740]">
                MENTORS DEDIES
            </h1>

            <p class="lg:text-[1.35vw] lg:text-left text-center font-light hidden flex-col my-6 md:flex poppins-light">
                <span>Des programmes de formation complets</span>
                <span>couvrant une gamme étendue de domaines</span>
            </p>
            <p class="lg:text-[1.35vw] lg:text-left text-center font-extralight flex flex-col my-6 mb-6 lg:mb-14 md:hidden poppins-light">
                <span>Des programmes de formation complets couvrant une gamme étendue
                    de domaines</span>
            </p>
            <a href="" class="btn-action w-max text-lg poppins-light hidden lg:flex attente">Liste d'attente
                <i class="fa-solid fa-arrow-right text-lg pl-4"></i></a>
        </div>

        <!-- Image -->
        <div class="flex justify-center lg:justify-end z-10 w-full lg:w-1/2">
            <img src="./assets/school-happy.png" alt="Nerdx Jeune Etudiante Contente" class="w-5/6 lg:w-[32.5vw] lg:h-[32.8vw]" />
        </div>
    </div>

    <!-- Button offre -->
    <div class="flex justify-center w-full overflow-x-auto pl-10 lg:pl-0 scrollable-content relative h-[65px] lg:mb-0 lg:mt-10 mt-0 mb-2">
        @foreach($formations as $formation)
        <a href="{{ route('formation.show',$formation->id) }}" class="btn-offre">{{$formation->name}}</a>
        @endforeach

    </div>
    <div class="lg:hidden flex justify-center mb-2 mx-auto inset-x-0 bottom-0 w-full">
        <a href="" class="btn-action w-max text-lg poppins-light attente">Liste d'attente <i class="fa-solid fa-arrow-right text-lg pl-4"></i></a>
    </div>
</section>
@endsection

@section('formations')
<section id="formations" class="h-auto flex flex-col justify-center gap-y-5 relative pb-2 lg:pt-0 pt-6">
    <div class="md:mt-28 mt-6">
        <h3 class="flex items-center gap-x-1 lg:text-3xl text-2xl text-center lg:justify-center justify-center w-full text-nerdx-green">
            <span class="pl-1 font-semibold">Explorez nos Formations</span>
        </h3>

        <p class="lg:text- xl text-center font-light md:px-0 px-4 md:flex-col md:my-6 md:flex poppins-light">
            <span>Explorez notre gamme variée de formations de qualité,
                soigneusement conçues pour répondre à vos</span>
            <span>besoins professionnels et personnels, et laissez-vous inspirer
                pour atteindre de nouveaux sommets.</span>
        </p>

        <!-- Formations -->
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 lg:px-32 md:px-20 sm:px-16 px-5 gap-7 mt-5">

            @foreach($formations as $formation)
            <div class="flex flex-col bg-white rounded-t-lg shadow-xl">
                <a href="{{ route('formation.show',$formation->id) }}">
                    <div class="img h-[310px] bg-first-formation-patern rounded-t-xl" style="
                    background-image: url('{{ asset("storage/" . $formation->image) }}');
                    background-size: cover;
                  "></div>
                    <div class="text flex flex-col px-6 my-3 justify-center">
                        <h1 class="title my-2 xl:text-left text-center text-nerdx-blue text-2xl font-extrabold">
                            {{$formation->name}}
                        </h1>
                        <div class="details flex mt-2 justify-center xl:space-x-10 md:space-x-2 space-x-2">
                            <div class="flex items-center space-x-2">
                                <i class="fa-regular fa-calendar-days text-2xl text-nerdx-green"></i>
                                <h4 class="font-medium text-sm whitespace-nowrap">
                                    {{ $formation->date }}
                                </h4>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-stopwatch text-2xl text-nerdx-green"></i>
                                <h4 class="font-semibold text-sm whitespace-nowrap">
                                    {{ $formation->time }}
                                </h4>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-user-graduate text-2xl text-nerdx-green"></i>
                                <h4 class="font-semibold text-sm whitespace-nowrap">
                                    +{{ $formation->participants }}
                                </h4>
                            </div>
                        </div>
                        <div class="button flex mt-4 justify-center">
                            <button id="inscription_button" onclick="openModal('modal','{{$formation->name}}')" class="btn-action bg-nerdx-blue px-8">
                                S'inscrire
                            </button>
                        </div>
                        <div class="flex justify-start items-center mt-2 gap-x-2">
                            <i class="fa-solid fa-certificate text-2xl text-nerdx-green"></i>
                            <h4 class="font-semibold text-sm whitespace-nowrap">
                                {{ $formation->price }} FCFA
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection