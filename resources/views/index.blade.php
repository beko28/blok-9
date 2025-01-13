<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>MuziekMeesters - Muzieklessen</title>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    @include('components.header')

    <section class="relative bg-gradient-to-r from-blue-600 to-blue-800 text-white pb-20">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between py-20 px-6">
            <div class="md:w-1/2" style="margin-left: 80px; margin-bottom: 60px;">
                <h1 class="text-6xl font-extrabold leading-tight mb-6">
                    Ontdek jouw <span class="text-yellow-300">muzikale </span>talent!
                </h1>
                <p class="text-lg mb-6">
                    Begin jouw reis met <strong><span class="text-yellow-300">MuziekMeesters</span></strong>. Kies uit lessen voor piano, gitaar, zang en meer.
                </p>
                <a href="#contact" 
                   class="bg-yellow-300 text-gray-900 px-8 py-4 rounded-full font-bold shadow-lg hover:bg-yellow-400 transition duration-300">
                    Schrijf je in
                </a>
            </div>
            <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                <img src="pexels-sebastian-dziomba-762357063-30080460.jpg" class="rounded-xl shadow-xl max-w-lg">
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 translate-y-24">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full">
            <path fill="#f3f4f6" fill-opacity="1" d="M0,96L40,85.3C80,75,160,53,240,85.3C320,117,340,205,400,120.20C500,10,640,245,720,213.3C800,181,880,139,960,138.7C1040,139,1120,181,1200,176C1280,171,1360,117,1400,90.7L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
    </div>

    </section>

    <section id="services" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-center text-blue-600 mb-12" >Onze Diensten</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:-translate-y-2 hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Proeflessen</h3>
                    <p>
                        Start met een gratis proefles en ontdek jouw passie voor muziek.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:-translate-y-2 hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Instrumentlessen</h3>
                    <p>
                        Professionele lessen voor piano, gitaar, viool en meer.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:-translate-y-2 hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-600">Persoonlijke begeleiding</h3>
                    <p>
                        Onze docenten bieden begeleiding op maat, aangepast aan jouw niveau.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-20 bg-blue-600 text-white">
        <div class="container mx-auto px-6" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-center mb-12">Schrijf je nu in!</h2>
            <p class="text-center mb-8 text-lg">
                Vul het onderstaande formulier in en start jouw muzikale avontuur!
            </p>
            <form action="/signup" method="POST" class="bg-white text-gray-800 p-8 rounded-lg shadow-lg max-w-lg mx-auto">
                <div class="mb-4">
                    <label for="name" class="block text-lg font-semibold">Naam</label>
                    <input type="text" id="name" name="name" required
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-lg font-semibold">E-mail</label>
                    <input type="email" id="email" name="email" required
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="lesson_type" class="block text-lg font-semibold">Soort les</label>
                    <select id="lesson_type" name="lesson_type" required
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="piano">Piano</option>
                        <option value="gitaar">Gitaar</option>
                        <option value="viool">Viool</option>
                        <option value="zang">Zang</option>
                    </select>
                </div>
                <button type="submit"
                        class="bg-blue-500 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-600 transition duration-300">
                    Verstuur Inschrijving
                </button>
            </form>
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
