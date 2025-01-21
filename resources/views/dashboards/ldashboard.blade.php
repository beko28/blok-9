@include('components.header')

<div class="container mx-auto px-4 mt-10">
    <h2 class="text-center text-3xl font-bold mb-6 text-gray-800">Mijn Lessen</h2>
    <div class="text-center mt-8">
        <a href="{{ route('courses.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition">
            <i class="fas fa-plus mr-2"></i> Nieuwe Les
        </a>
    </div>

    @if ($courses->isEmpty())
        <div class="text-center my-10 bg-white shadow-md p-8 rounded-lg">
            <h3 class="text-2xl font-semibold text-gray-700">Nog geen lessen gevonden</h3>
            <p class="text-gray-500 mt-2">Klik op de onderstaande knop om je eerste les aan te maken.</p>
            <a href="{{ route('courses.create') }}" class="mt-4 inline-block bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600 transition">
                <i class="fas fa-plus mr-2"></i> Nieuwe Les
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8" >
            @foreach ($courses as $course)
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ $course->name }}</h3>
                        <p class="text-sm text-gray-500 mt-1"><strong>Instrument:</strong> {{ $course->type }}</p>
                        <p class="text-sm text-gray-500"><strong>Start:</strong> {{ $course->startday ?? 'N.v.t.'}}</p>
                        <p class="text-sm text-gray-500"><strong>Einde:</strong> {{ $course->endday ?? 'N.v.t.' }}</p>
                    </div>

                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('courses.edit', $course->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow hover:bg-yellow-600 transition">
                            <i class="fas fa-edit"></i> Bewerken
                        </a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow hover:bg-red-600 transition"
                                    onclick="return confirm('Weet je zeker dat je deze les wilt verwijderen?')">
                                <i class="fas fa-trash"></i> Verwijderen
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>

@include('components.footer')
