@include('components.header')
<div class="container mx-auto px-4 mt-10">
    <h2 class="text-center text-3xl font-bold mb-6 text-gray-800">Feedback Overzicht</h2>

    <div class="bg-white shadow-md rounded-lg p-6">
        @if($feedback->isEmpty())
            <p class="text-gray-500">Er is nog geen feedback beschikbaar.</p>
        @else
            <ul class="list-disc list-inside text-gray-700">
                @foreach ($feedback as $item)
                    <li class="py-2">
                        <strong>{{ $item->student->firstname }} {{ $item->student->surname }}</strong> - {{ $item->feedback }} (Rating: {{ $item->rating }})
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@include('components.footer')