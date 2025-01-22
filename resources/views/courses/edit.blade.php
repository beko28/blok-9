@include('components.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Course Bewerken</h1>

        <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Titel van de Course</label>
                <input 
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $course->name) }}"
                    class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-300"
                    placeholder="Voer de titel in..."
                    required
                >
            </div>

            <div>
                <label for="type" class="block text-sm font-semibold text-gray-700 mb-1">Instrument</label>
                <select
                    name="type"
                    id="type"
                    class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-300"
                    required
                >
                    <option value="Piano" {{ $course->type == 'Piano' ? 'selected' : '' }}>Piano</option>
                    <option value="Gitaar" {{ $course->type == 'Gitaar' ? 'selected' : '' }}>Gitaar</option>
                    <option value="Viool" {{ $course->type == 'Viool' ? 'selected' : '' }}>Viool</option>
                    <option value="Zang" {{ $course->type == 'Zang' ? 'selected' : '' }}>Zang</option>
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="startday" class="block text-sm font-semibold text-gray-700 mb-1">Startdatum</label>
                    <input 
                        type="text"
                        name="startday"
                        id="startday"
                        value="{{ old('startday', $course->startday) }}"
                        class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-300"
                        placeholder="Kies startdatum"
                        required
                    >
                </div>
                <div>
                    <label for="endday" class="block text-sm font-semibold text-gray-700 mb-1">Einddatum</label>
                    <input 
                        type="text"
                        name="endday"
                        id="endday"
                        value="{{ old('endday', $course->endday) }}"
                        class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-300"
                        placeholder="Kies einddatum"
                    >
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Beschrijving</label>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-300"
                    placeholder="Voeg een beschrijving toe..."
                >{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('ldashboard') }}" class="text-gray-500 hover:text-gray-700 transition">Annuleren</a>
                <button 
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                >
                    <i class="fas fa-save mr-2"></i> Bijwerken
                </button>
            </div>
        </form>
    </div>
</div>

@include('components.footer')

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#startday", {
            enableTime: false,
            dateFormat: "Y-m-d",
            locale: "nl"
        });

        flatpickr("#endday", {
            enableTime: false,
            dateFormat: "Y-m-d",
            locale: "nl"
        });
    });
</script>
