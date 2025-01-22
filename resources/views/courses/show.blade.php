@include('components.header')

<div class="container mx-auto px-4 mt-10">
    <h2 class="text-center text-3xl font-bold mb-6 text-gray-800">📖 {{ $course->name }}</h2>

    <div class="bg-white shadow-md rounded-lg p-6">
        <p class="text-lg text-gray-700"><strong>Instrument:</strong> {{ $course->type }}</p>
        <p class="text-lg text-gray-700"><strong>Startdatum:</strong> {{ $course->startday ?? 'N.v.t.' }}</p>
        <p class="text-lg text-gray-700"><strong>Einddatum:</strong> {{ $course->endday ?? 'N.v.t.' }}</p>
        <p class="text-lg text-gray-700"><strong>Beschrijving:</strong> {{ $course->description ?? 'Geen beschrijving' }}</p>
    </div>

    @if (auth()->id() == $course->user_id)
        <h3 class="text-2xl font-bold text-gray-800 mt-8">📋 Beheer Studenten</h3>

        <form id="studentForm" action="{{ route('courses.updateStudents', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4 bg-white shadow-md rounded-lg p-6">
                <ul class="list-none text-gray-700">
                    @foreach ($students as $student)
                        <li class="flex items-center py-2">
                            <input type="checkbox" name="studentIDs[]" value="{{ $student->id }}" 
                                class="mr-3 w-5 h-5" 
                                {{ $course->students->contains($student->id) ? 'checked' : '' }}>
                            <span>{{ $student->name }} - {{ $student->email }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600 transition">
                    Studenten bijwerken
                </button>
            </div>
        </form>
    @else
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
    @endif

    <div class="mt-6">
        <a href="{{ route('ldashboard') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-600 transition">
            Terug naar overzicht
        </a>
    </div>
</div>

@include('components.footer')
