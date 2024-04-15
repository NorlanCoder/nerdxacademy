<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NerdX Academy</title>
    <link rel="stylesheet" href="{{asset('dist/style.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1093461298366534&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Meta Pixel Code -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y8MD4DN0N1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Y8MD4DN0N1');
    </script>

</head>

<body class="flex justify-center items-center h-screen text-center">
    <div class="mx-auto max-w-lg">
        <div class="pt-16">
            <i class="fa-regular fa-circle-check text-nerdx-green text-4xl"></i>
        </div>

        <div class="py-8">
            <p class="font-bold text-4xl mb-7">Demande d'inscription envoyée avec succès</p>
            <p class="text-xl">Vous serez contacter ultérieurement pour la confirmation de votre inscription</p>
        </div>

        <div class="text-center mt-10">
            <a href="{{route('home')}}" class="btn-action w-max p-5 px-8 text-lg poppins-light "><i class="fas fa-arrow-left text-lg mr-2"></i>Page d'accueil</a>
        </div>
    </div>
</body>

</html>
