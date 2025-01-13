<header class="sticky top-0 z-50 bg-gradient-to-r from-blue-900 via-indigo-900 to-purple-900 text-white shadow-xl">
  <div class="container mx-auto flex items-center justify-between px-6 py-4">
    <div class="flex items-center">
      <a href="/" class="text-3xl font-bold text-white hover:text-yellow-400 transition-colors duration-300">
        MuziekMeesters
      </a>
    </div>

    <nav class="hidden md:flex items-center space-x-6">
      <a href="#home" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Home</a>
      <a href="#about" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Over Ons</a>
      <a href="#services" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Diensten</a>
      <a href="#contact" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Contact</a>
    </nav>

    <div class="hidden md:flex items-center space-x-4">
      <a href="#" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Inloggen</a>
      <a href="#" class="bg-yellow-400 px-5 py-2 rounded-full text-gray-900 font-semibold hover:bg-yellow-500 transition-colors duration-300 shadow-lg">Registreer</a>
      <a href="#contact" class="bg-pink-400 px-5 py-2 rounded-full text-gray-800 font-semibold hover:bg-pink-500 transition-colors duration-300 shadow-lg">Schrijf je in</a>
    </div>

    <!-- telefoonenu -->
    <button class="md:hidden text-gray-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-colors duration-300" id="mobile-menu-button">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        class="w-8 h-8"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16m-7 6h7"
        />
      </svg>
    </button>
  </div>

  <div id="mobile-menu" class="hidden md:hidden bg-indigo-900 shadow-lg origin-top transform scale-y-0 transition-transform duration-300 ease-in-out">
    <a href="#home" class="block px-6 py-3 text-white hover:bg-indigo-700 transition-colors duration-300">
      Home
    </a>
    <a href="#about" class="block px-6 py-3 text-white hover:bg-indigo-700 transition-colors duration-300">
      Over Ons
    </a>
    <a href="#services" class="block px-6 py-3 text-white hover:bg-indigo-700 transition-colors duration-300">
      Diensten
    </a>
    <a href="#contact" class="block px-6 py-3 text-white hover:bg-indigo-700 transition-colors duration-300">
      Contact
    </a>

    <div class="flex flex-col space-y-3 px-6 py-4 border-t border-indigo-700">
      <a href="#" class="text-white hover:text-yellow-400 transition-colors duration-300 font-medium">
        Inloggen
      </a>
      <a href="#" class="bg-yellow-400 text-center py-2 rounded-full text-gray-900 font-semibold hover:bg-yellow-500 transition-colors duration-300">
        Registreer
      </a>
      <a href="#contact" class="block bg-pink-400 text-gray-800 px-4 py-2 rounded-full text-center font-semibold hover:bg-pink-500 transition-colors duration-300">
        Schrijf je in
      </a>
    </div>
  </div>
</header>

<script>
  const mobileMenuButton = document.getElementById("mobile-menu-button");
  const mobileMenu = document.getElementById("mobile-menu");

  mobileMenuButton.addEventListener("click", () => {
    if (mobileMenu.classList.contains("scale-y-0")) {
      mobileMenu.classList.remove("hidden", "scale-y-0");
      mobileMenu.classList.add("scale-y-100");
    } else {
      mobileMenu.classList.remove("scale-y-100");
      mobileMenu.classList.add("scale-y-0");
      setTimeout(() => mobileMenu.classList.add("hidden"), 300);
    }
  });
</script>
