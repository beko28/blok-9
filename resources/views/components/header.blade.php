<header class="bg-gray-800 text-white shadow">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <div class="flex items-center">
            <a href="/" class="text-2xl font-bold text-white hover:text-gray-300">
                MijnWebsite
            </a>
        </div>

        <nav class="hidden md:flex space-x-6">
            <a href="#home" class="hover:text-gray-300">Home</a>
            <a href="#about" class="hover:text-gray-300">Over Ons</a>
            <a href="#services" class="hover:text-gray-300">Diensten</a>
            <a href="#contact" class="hover:text-gray-300">Contact</a>
        </nav>

        <div class="flex items-center space-x-4">
            <a href="" class="hover:text-gray-300">Inloggen</a>
            <a href="" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Registreer</a>
        </div>

        <button
            class="md:hidden text-gray-300 hover:text-white focus:outline-none focus:text-white"
            id="mobile-menu-button"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-gray-700">
        <a href="#home" class="block px-4 py-2 text-white hover:bg-gray-600">Home</a>
        <a href="#about" class="block px-4 py-2 text-white hover:bg-gray-600">Over Ons</a>
        <a href="#services" class="block px-4 py-2 text-white hover:bg-gray-600">Diensten</a>
        <a href="#contact" class="block px-4 py-2 text-white hover:bg-gray-600">Contact</a>
    </div>
</header>
