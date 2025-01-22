@include('components.header')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">👨‍🏫 Overzicht van alle leraren</h1>

    <div class="relative w-full max-w-md mx-auto mb-6">
        <input type="text" id="searchInput" placeholder="🔍 Zoek op naam"
            class="w-full px-5 py-3 text-gray-700 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($teachers as $teacher)
            <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">{{ $teacher->firstname }}</h3>
                    <h3 class="text-xl font-bold text-gray-800">{{ $teacher->surname }}</h3>
                    <p class="text-sm text-gray-500 mt-1"><strong>E-mail:</strong> {{ $teacher->email }}</p>
                </div>

                @auth
                    @if(auth()->user()->role === 'student')
                        <form action="{{ route('teachers.requestTrial', $teacher->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">
                                🎵 Vraag proefles aan
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
</div>

@include('components.footer')

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let teachers = document.querySelectorAll('.grid div');

        teachers.forEach(teacher => {
            let text = teacher.textContent.toLowerCase();
            teacher.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
