@include('components.header')

<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Course Bewerken</h1>

        <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Titel --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Titel van de Course
                </label>
                <input 
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $course->name) }}"
                    class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                    placeholder="Voer de titel in..."
                    required
                >
            </div>

            {{-- Omschrijving --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Omschrijving
                </label>
                <textarea 
                    name="description"
                    id="description"
                    rows="3"
                    class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                    placeholder="Schrijf een korte omschrijving..."
                >{{ old('description', $course->description) }}</textarea>
            </div>

            {{-- Datum & Tijd --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                        Datum
                    </label>
                    <input 
                        type="date"
                        name="date"
                        id="date"
                        value="{{ old('date', $course->date) }}"
                        class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                        required
                    >
                </div>

                <div>
                    <label for="time" class="block text-sm font-medium text-gray-700 mb-2">
                        Tijd
                    </label>
                    <input 
                        type="time"
                        name="time"
                        id="time"
                        value="{{ old('time', $course->time) }}"
                        class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                        required
                    >
                </div>
            </div>

            {{-- Gekoppelde studenten (indien aanwezig) --}}
            @if(isset($students) && $students->count() > 0)
                <div>
                    <label for="userIDs" class="block text-sm font-medium text-gray-700 mb-2">
                        Gekoppelde studenten
                    </label>
                    <select 
                        name="userIDs[]" 
                        id="userIDs" 
                        class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                        multiple
                    >
                        @foreach($students as $student)
                            <option 
                                value="{{ $student->id }}"
                                {{-- Markeer geselecteerde als "selected" --}}
                                @if(in_array($student->id, $course->users->pluck('id')->toArray()))
                                    selected
                                @endif
                            >
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-1">
                        Gebruik Ctrl/Cmd + klik om meerdere studenten te selecteren.
                    </p>
                </div>
            @endif

            {{-- Submit-knop --}}
            <div>
                <button 
                    type="submit"
                    class="inline-flex items-center px-5 py-2 bg-indigo-600 text-white rounded-md font-semibold
                           hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 
                           focus:ring-offset-2 transition-colors duration-200"
                >
                    Bijwerken
                </button>
            </div>
        </form>
    </div>
</div>

@include('components.footer')
