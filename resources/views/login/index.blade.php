@include('components.header')
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-blue-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 relative">

        <h1 class="text-3xl font-bold text-center mb-4 text-gray-800">Inloggen</h1>
        
        @if(session('status'))
            <div class="mb-4 text-green-600 text-center font-medium">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block mb-1 font-medium text-gray-700">E-mailadres</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 
                           focus:outline-none focus:ring-2 focus:ring-blue-400 
                           focus:border-transparent transition-colors"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="jouwnaam@example.com"
                >
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block mb-1 font-medium text-gray-700">Wachtwoord</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 
                           focus:outline-none focus:ring-2 focus:ring-blue-400 
                           focus:border-transparent transition-colors"
                    required
                    placeholder="••••••••"
                >
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md 
                           hover:bg-blue-600 transition-colors shadow-lg"
                >
                    Inloggen
                </button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Nog geen account? 
                <a 
                    href="{{ route('registration.index') }}" 
                    class="text-blue-600 hover:text-blue-800 font-semibold"
                >
                    Registreer hier
                </a>
            </p>
        </div>
    </div>
</div>

@include('components.footer')
