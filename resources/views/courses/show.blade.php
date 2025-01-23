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
                    <li class="py-2"><strong>{{ $student->firstname }} {{ $student->surname }}</strong> - {{ $student->email }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <button id="toggle-student-list"
        class="mt-6 bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition">
        👥 Beheer Studenten
    </button>

    <div id="student-list" class="mt-4 bg-white shadow-md rounded-lg p-6 hidden">
        <h3 class="text-xl font-bold text-gray-800 mb-4">📝 Voeg studenten toe of verwijder ze</h3>

        <form action="{{ route('courses.updateStudents', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="max-h-60 overflow-y-auto">
                @foreach ($students as $student)
                    <div class="flex items-center py-2">
                        <input type="checkbox" name="student_ids[]" value="{{ $student->id }}"
                            class="mr-2 rounded border-gray-300"
                            @if($course->students->contains($student->id)) checked @endif>
                        <span>{{ $student->firstname }} {{ $student->surname }} - {{ $student->email }}</span>
                    </div>
                @endforeach
            </div>

            <button type="submit"
                class="mt-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600 transition">
                ✅ Opslaan
            </button>
        </form>
    </div>

    <div class="mt-6">
        <a href="{{ route('ldashboard') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-600 transition">
            Terug naar overzicht
        </a>
    </div>
</div>

@include('components.footer')

<!-- ✅ JavaScript voor het tonen/verbergen van de studentenlijst -->
<script>
    document.getElementById('toggle-student-list').addEventListener('click', function () {
        let studentList = document.getElementById('student-list');
        studentList.classList.toggle('hidden');
    });
</script>
