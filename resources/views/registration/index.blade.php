@include('components.header')

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">

        <div class="flex items-center mb-8" id="stepIndicator">
            <div class="flex items-center">
                <div id="circleStep1" 
                     class="rounded-full h-8 w-8 flex items-center justify-center 
                            border-2 border-blue-500 bg-blue-500 text-white font-bold">
                    1
                </div>
                <div id="labelStep1" class="ml-2 text-blue-500 font-semibold">
                    Persoonsgegevens
                </div>
            </div>

            <div class="flex-auto border-t-2 border-gray-300 mx-3"></div>

            <div class="flex items-center">
                <div id="circleStep2" 
                     class="rounded-full h-8 w-8 flex items-center justify-center 
                            border-2 border-gray-300 bg-gray-200 text-gray-500 font-bold">
                    2
                </div>
                <div id="labelStep2" class="ml-2 text-gray-500 font-semibold">
                    Inloggegevens
                </div>
            </div>
        </div>

        <h1 class="text-2xl font-bold text-center mb-6">Registratie</h1>

        <form action="{{ route('registration.store') }}" method="POST" class="space-y-5" id="registrationForm">
            @csrf

            <div id="step1" class="space-y-5">
                <div>
                    <label for="firstname" class="block mb-1 font-medium text-gray-700">Voornaam:</label>
                    <input
                        type="text"
                        name="firstname"
                        id="firstname"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none 
                               focus:ring-2 focus:ring-blue-400"
                        value="{{ old('firstname') }}"
                    >
                    @error('firstname')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="surname" class="block mb-1 font-medium text-gray-700">Achternaam:</label>
                    <input
                        type="text"
                        name="surname"
                        id="surname"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none 
                               focus:ring-2 focus:ring-blue-400"
                        value="{{ old('surname') }}"
                    >
                    @error('surname')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="age" class="block mb-1 font-medium text-gray-700">Leeftijd:</label>
                    <input
                        type="number"
                        name="age"
                        id="age"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none 
                               focus:ring-2 focus:ring-blue-400"
                        value="{{ old('age') }}"
                    >
                    @error('age')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Student of Leraar:</label>
                    <div class="flex items-center space-x-6">
                        <label class="inline-flex items-center cursor-pointer">
                            <input
                                type="radio"
                                name="role"
                                value="student"
                                class="h-4 w-4 text-blue-500 border-gray-300 focus:ring-blue-400"
                                {{ old('role') === 'student' ? 'checked' : '' }}
                            >
                            <span class="ml-2 text-gray-700">Student</span>
                        </label>

                        <label class="inline-flex items-center cursor-pointer">
                            <input
                                type="radio"
                                name="role"
                                value="leraar"
                                class="h-4 w-4 text-blue-500 border-gray-300 focus:ring-blue-400"
                                {{ old('role') === 'leraar' ? 'checked' : '' }}
                            >
                            <span class="ml-2 text-gray-700">Leraar</span>
                        </label>
                    </div>
                    @error('role')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button
                        type="button"
                        class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md 
                               hover:bg-blue-600 transition-colors"
                        id="goToStep2"
                    >
                        Volgende
                    </button>
                </div>
            </div>

            <div id="step2" class="space-y-5 hidden">
                <div>
                    <label for="email" class="block mb-1 font-medium text-gray-700">E-mailadres:</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none 
                               focus:ring-2 focus:ring-blue-400"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-1 font-medium text-gray-700">Wachtwoord:</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none 
                               focus:ring-2 focus:ring-blue-400"
                    >
                    @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between pt-4">
                    <button
                        type="button"
                        class="bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded-md 
                               hover:bg-gray-300 transition-colors"
                        id="goBackToStep1"
                    >
                        Vorige
                    </button>
                    <button
                        type="submit"
                        class="bg-green-500 text-white font-semibold py-2 px-6 rounded-md 
                               hover:bg-green-600 transition-colors"
                    >
                        Registreren
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('components.footer')

<script>
    const step1Div         = document.getElementById('step1');
    const step2Div         = document.getElementById('step2');

    const goToStep2Btn     = document.getElementById('goToStep2');
    const goBackToStep1Btn = document.getElementById('goBackToStep1');

    const circleStep1 = document.getElementById('circleStep1');
    const circleStep2 = document.getElementById('circleStep2');
    const labelStep1  = document.getElementById('labelStep1');
    const labelStep2  = document.getElementById('labelStep2');

    setStepActive(1);

    goToStep2Btn.addEventListener('click', () => {
      step1Div.classList.add('hidden');
      step2Div.classList.remove('hidden');

      setStepActive(2);
    });

    goBackToStep1Btn.addEventListener('click', () => {
      step2Div.classList.add('hidden');
      step1Div.classList.remove('hidden');

      setStepActive(1);
    });

    function setStepActive(stepNumber) {
      if (stepNumber === 1) {
        circleStep1.classList.add('border-blue-500', 'bg-blue-500', 'text-white');
        circleStep1.classList.remove('border-gray-300', 'bg-gray-200', 'text-gray-500');

        labelStep1.classList.add('text-blue-500');
        labelStep1.classList.remove('text-gray-500');

        circleStep2.classList.add('border-gray-300', 'bg-gray-200', 'text-gray-500');
        circleStep2.classList.remove('border-blue-500', 'bg-blue-500', 'text-white');

        labelStep2.classList.add('text-gray-500');
        labelStep2.classList.remove('text-blue-500');

      } else if (stepNumber === 2) {
        circleStep1.classList.add('border-blue-500', 'bg-blue-500', 'text-white');
        circleStep1.classList.remove('border-gray-300', 'bg-gray-200', 'text-gray-500');

        labelStep1.classList.add('text-blue-500');
        labelStep1.classList.remove('text-gray-500');

        circleStep2.classList.add('border-blue-500', 'bg-blue-500', 'text-white');
        circleStep2.classList.remove('border-gray-300', 'bg-gray-200', 'text-gray-500');

        labelStep2.classList.add('text-blue-500');
        labelStep2.classList.remove('text-gray-500');
      }
    }
</script>
