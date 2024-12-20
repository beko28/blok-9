<header class="bg-gray-900 text-white shadow-lg">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <div class="flex items-center">
            <a href="/" class="text-3xl font-extrabold text-white hover:text-blue-400 transition">
                MijnWebsite
            </a>
        </div>

        <nav class="hidden md:flex space-x-8">
            <a href="#home" class="hover:text-blue-400 transition">Home</a>
            <a href="#about" class="hover:text-blue-400 transition">Over Ons</a>
            <a href="#services" class="hover:text-blue-400 transition">Diensten</a>
            <a href="#contact" class="hover:text-blue-400 transition">Contact</a>
        </nav>

        <div class="hidden md:flex items-center space-x-4">
            <a href="#" class="hover:text-blue-400 transition">Inloggen</a>
            <a href="#" class="bg-blue-500 px-5 py-2 rounded-full text-white font-semibold hover:bg-blue-600 transition">
                Registreer
            </a>
        </div>

        <button class="md:hidden text-gray-300 hover:text-white focus:outline-none focus:ring focus:ring-blue-500" id="mobile-menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-gray-800 shadow-lg transform origin-top scale-y-0 transition-transform duration-300">
        <a href="#home" class="block px-4 py-2 text-white hover:bg-blue-500 hover:text-white transition">Home</a>
        <a href="#about" class="block px-4 py-2 text-white hover:bg-blue-500 hover:text-white transition">Over Ons</a>
        <a href="#services" class="block px-4 py-2 text-white hover:bg-blue-500 hover:text-white transition">Diensten</a>
        <a href="#contact" class="block px-4 py-2 text-white hover:bg-blue-500 hover:text-white transition">Contact</a>
    </div>

</header>

<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        if (mobileMenu.classList.contains('scale-y-0')) {
            mobileMenu.classList.remove('hidden', 'scale-y-0');
            mobileMenu.classList.add('scale-y-100');
        } else {
            mobileMenu.classList.remove('scale-y-100');
            mobileMenu.classList.add('scale-y-0');
            setTimeout(() => mobileMenu.classList.add('hidden'), 300); // Wacht tot de animatie klaar is
        }
    });
</script>
