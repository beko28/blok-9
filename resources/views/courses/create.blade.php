@include('components.header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="bg-blue-600 py-10 text-white text-center">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold">Nieuwe Les / Cursus Aanmaken</h1>
        <p class="text-lg mt-2">Vul de onderstaande gegevens in om een nieuwe les of cursus toe te voegen.</p>
    </div>
</div>

<div class="container mx-auto px-4 mt-10">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-blue-600 text-white text-center py-3">
            <h3 class="text-lg font-semibold">Les Details</h3>
        </div>
        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-200 text-red-800 p-4 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div id="step-1">
                    <div class="mb-3">
                        <label for="name" class="block text-lg font-semibold">Naam Les</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Bijv. Pianoles voor beginners" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="block text-lg font-semibold">Beschrijving</label>
                        <input type="text" name="description" id="description" value="{{ old('description') }}" placeholder="Vertel hier iets over de les." required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-lg font-semibold">Instrument</label>
                        <select name="type" id="type" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled selected>Kies een instrument...</option>
                            <option value="Gitaar">Gitaar</option>
                            <option value="Piano">Piano</option>
                            <option value="Zang">Zang</option>
                            <option value="Drums">Drums</option>
                        </select>
                    </div>

                    <button type="button" id="next-step" class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition">
                        Volgende
                    </button>
                </div>

                <div id="step-2" class="hidden">
                    <h2 class="text-xl font-semibold mb-4">Stap 2: Kies de lesdatum en tijd</h2>

                    <div class="mb-4">
                        <label for="startday" class="block text-lg font-semibold">Startdag</label>
                        <input type="text" name="startday" id="startday" value="{{ old('startday') }}" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Selecteer startdatum">
                    </div>

                    <div class="mb-4">
                        <label for="endday" class="block text-lg font-semibold">Einddag</label>
                        <input type="text" name="endday" id="endday" value="{{ old('endday') }}" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Selecteer einddatum">
                    </div>

                    <div class="mb-4">
                        <label for="starttime" class="block text-lg font-semibold">Starttijd</label>
                        <input type="text" name="starttime" id="starttime" value="{{ old('starttime') }}" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Selecteer starttijd">
                    </div>

                    <div class="mb-4">
                        <label for="endtime" class="block text-lg font-semibold">Eindtijd</label>
                        <input type="text" name="endtime" id="endtime" value="{{ old('endtime') }}" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Selecteer eindtijd">
                    </div>

                    <div class="mb-3">
                        <label for="duur" class="block text-lg font-semibold">Duur</label>
                        <input type="text" name="duur" id="duur" value="{{ old('duur') }}" required placeholder="Bijv. 8 weken" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition">
                        Aanmaken
                    </button>
                    <button type="button" id="prev-step" class="w-full mt-2 bg-gray-300 text-gray-700 py-2 rounded-lg font-semibold hover:bg-gray-400 transition">
                        Vorige
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('components.footer')

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const nextStep = document.getElementById('next-step');
        const prevStep = document.getElementById('prev-step');

        nextStep.addEventListener('click', function () {
            step1.classList.add('hidden');
            step2.classList.remove('hidden');
        });

        prevStep.addEventListener('click', function () {
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
        });

        flatpickr("#startday, #endday", {
            enableTime: false,
            dateFormat: "Y-m-d",
            locale: "nl",
        });

        flatpickr("#starttime, #endtime", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
    });
</script>
