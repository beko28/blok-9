<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    @include('components.header')

    <section class="relative bg-blue-600 text-white pb-20">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between py-20 px-6" style="margin-bottom: 100px;">
        <div class="md:w-1/3" style="margin-left: 60px;">
            <h1 class="text-5xl font-extrabold leading-tight mb-6">
                Welkom bij <span class="text-blue-400">MijnWebsite</span>
            </h1>
            <p class="text-lg mb-6">
                Wij leveren creatieve oplossingen en diensten die jouw bedrijf laten groeien. Ontdek wat wij voor jou kunnen betekenen!
            </p>
            <a href="#services" class="bg-blue-400 text-blue-600 px-6 py-3 rounded-full font-bold shadow-lg hover:bg-yellow-300 transition duration-300">
                Bekijk Onze Diensten
            </a>
        </div>
        <div class="md:w-1/2 mt-10 md:mt-0">
            <img src="https://via.placeholder.com/600x400" alt="Hero Image" class="rounded-xl shadow-xl">
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full">
            <path fill="#f3f4f6" fill-opacity="1" d="M0,96L40,85.3C80,75,160,53,240,85.3C320,117,400,203,480,234.7C560,267,640,245,720,213.3C800,181,880,139,960,138.7C1040,139,1120,181,1200,176C1280,171,1360,117,1400,90.7L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
    </div>
</section>


    <section id="services" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center text-blue-600 mb-12" data-aos="fade-up">Onze Diensten</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300" data-aos="fade-up">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Webdesign</h3>
                    <p>
                        Modern en responsief ontwerp om jouw merk te laten opvallen.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Logo Ontwerp</h3>
                    <p>
                        Professionele logo's die jouw bedrijf vertegenwoordigen.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="400">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Onderhoud & Support</h3>
                    <p>
                        Altijd up-to-date en veilige oplossingen voor jouw website.
                    </p>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        AOS.init();
    </script>

</body>
</html>
