<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<header class="sticky top-0 z-50 bg-gradient-to-r from-blue-900 via-indigo-900 to-purple-900 text-white shadow-xl">
  <div class="container mx-auto flex items-center justify-between px-6 py-4">
    <div class="flex items-center">
      <a href="/" class="text-3xl font-bold text-white hover:text-yellow-400 transition-colors duration-300">
        MuziekMeesters
      </a>
    </div>

    <nav class="hidden md:flex items-center space-x-6">
      <a href="/" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Home</a>
        <a href="{{ route('teachers.index') }}" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Leraren</a>
      <a href="{{ route('studenten.index') }}" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Studenten</a>
      <a href="{{ route('courses.index') }}" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Lessen</a>

      @auth
        @if(auth()->user()->role === 'student')
          <a href="{{ route('trial-lessons.index') }}" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Mijn Proeflessen</a>
        @endif

        @if(auth()->user()->role === 'leraar')
          <a href="{{ route('teacher.trial-lessons') }}" class="hover:text-yellow-400 transition-colors duration-300 font-medium relative">
            Beheer Proeflessen
            <span id="notification-badge" class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full hidden"></span>
          </a>
        @endif

        @if(auth()->user()->role === 'admin')
          <a href="{{ route('admin.dashboard') }}" class="hover:text-yellow-400 transition-colors duration-300 font-medium">Admin Dashboard</a>
        @endif
      @endauth
      </nav>

    <div class="hidden md:flex items-center space-x-4">
      @guest
        <a 
          href="{{ route('login.form') }}" 
          class="hover:text-yellow-400 transition-colors duration-300 font-medium"
        >
          Inloggen
        </a>
      @endguest
      
      @auth
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button 
            type="submit" 
            class="bg-red-500 px-5 py-2 rounded-full text-white font-semibold 
                   hover:bg-red-600 transition-colors duration-300 shadow-lg"
          >
            Uitloggen
          </button>
        </form>
      @endauth

      <a href="{{ auth()->check() 
        ? (auth()->user()->role === 'leraar' 
            ? route('ldashboard') 
            : (auth()->user()->role === 'student' 
                ? route('sdashboard') 
                : (auth()->user()->role === 'admin' 
                    ? route('adashboard') 
                    : '#')))
        : route('registration.index') }}"
      class="block bg-pink-400 text-gray-800 px-4 py-2 rounded-full text-center font-semibold hover:bg-pink-500 transition-colors duration-300">
        {{ auth()->check() 
            ? (auth()->user()->role === 'leraar' 
                ? 'Leraar Dashboard' 
                : (auth()->user()->role === 'student' 
                    ? 'Student Dashboard' 
                    : (auth()->user()->role === 'admin' 
                        ? 'Admin Dashboard' 
                        : 'Schrijf je in')))
            : 'Schrijf je in' }}
      </a>
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
      <a href="{{ auth()->check() 
        ? (auth()->user()->role === 'leraar' 
            ? route('ldashboard') 
            : (auth()->user()->role === 'student' 
                ? route('sdashboard') 
                : (auth()->user()->role === 'admin' 
                    ? route('adashboard') 
                    : '#')))
        : '#contact' }}" 
      class="block bg-pink-400 text-gray-800 px-4 py-2 rounded-full text-center font-semibold hover:bg-pink-500 transition-colors duration-300">
        {{ auth()->check() 
            ? (auth()->user()->role === 'leraar' 
                ? 'Leraar Dashboard' 
                : (auth()->user()->role === 'student' 
                    ? 'Student Dashboard' 
                    : (auth()->user()->role === 'admin' 
                        ? 'Admin Dashboard' 
                        : 'Schrijf je in')))
            : 'Schrijf je in' }}
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

  function fetchNotifications() {
    fetch("{{ route('notifications.get') }}")
      .then(response => response.json())
      .then(data => {
        if (data.count > 0) {
          document.getElementById("notification-badge").innerText = data.count;
          document.getElementById("notification-badge").classList.remove("hidden");

          document.getElementById("admin-notification-badge").innerText = data.count;
          document.getElementById("admin-notification-badge").classList.remove("hidden");
        } else {
          document.getElementById("notification-badge").classList.add("hidden");
          document.getElementById("admin-notification-badge").classList.add("hidden");
        }
      })
      .catch(error => console.error("Error fetching notifications:", error));
  }

  setInterval(fetchNotifications, 10000);
  fetchNotifications();
</script>
