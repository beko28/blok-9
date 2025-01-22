@include('components.header')

<div class="container mx-auto px-4 mt-10">
    <h2 class="text-center text-3xl font-bold mb-6 text-gray-800">📖 {{ $course->name }}</h2>

    <div class="bg-white shadow-md rounded-lg p-6">
        <p class="text-lg text-gray-700"><strong>Instrument:</strong> {{ $course->type }}</p>
        <p class="text-lg text-gray-700"><strong>Startdatum:</strong> {{ $course->startday ?? 'N.v.t.' }}</p>
        <p class="text-lg text-gray-700"><strong>Einddatum:</strong> {{ $course->endday ?? 'N.v.t.' }}</p>
        <p class="text-lg text-gray-700"><strong>Beschrijving:</strong> {{ $course->description ?? 'Geen beschrijving' }}</p>
    </div>

    <h3 class="text-2xl font-bold text-gray-800 mt-8">📋 Ingeschreven Studenten</h3>

    @if ($course->students->isEmpty())
        <p class="text-gray-500 mt-2">Er zijn nog geen studenten ingeschreven voor deze les.</p>
    @else
        <div class="mt-4 bg-white shadow-md rounded-lg p-6">
            <ul class="list-disc list-inside text-gray-700">
                @foreach ($course->students as $student)
                    <li class="py-2"><strong>{{ $student->name }}</strong> - {{ $student->email }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @auth
        {{-- Controleer of de ingelogde gebruiker is ingeschreven --}}
        @if(auth()->user()->courses->contains($course->id))
            <form action="{{ route('courses.unenroll', $course->id) }}" method="POST" class="mt-6">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 text-white px-6 py-3 rounded-lg shadow hover:bg-red-600 transition">
                    ❌ Uitschrijven
                </button>
            </form>
        @endif
    @endauth

    <div class="mt-6">
        <a href="{{ route('ldashboard') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-600 transition">
            Terug naar overzicht
        </a>
    </div>
</div>

@include('components.footer')
