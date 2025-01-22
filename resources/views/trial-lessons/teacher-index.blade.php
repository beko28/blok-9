@include('components.header')

<div class="container mx-auto px-4 mt-10">
    <h2 class="text-center text-3xl font-bold mb-6 text-gray-800">👨‍🏫 Proeflesverzoeken</h2>

    @if ($trialLessons->isEmpty())
        <p class="text-gray-500 text-center">Geen proeflesverzoeken.</p>
    @else
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="w-full border-collapse rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-white uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Student</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-left">Acties</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach ($trialLessons as $trialLesson)
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6">{{ $trialLesson->student->name }}</td>
                            <td class="py-4 px-6 font-semibold text-{{ $trialLesson->status == 'approved' ? 'green' : ($trialLesson->status == 'rejected' ? 'red' : 'yellow') }}-600">
                                {{ ucfirst($trialLesson->status) }}
                            </td>
                            <td class="py-4 px-6 flex space-x-2">
                                <form action="{{ route('trial-lessons.approve', $trialLesson->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">
                                        ✅ Goedkeuren
                                    </button>
                                </form>
                                <form action="{{ route('trial-lessons.reject', $trialLesson->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">
                                        ❌ Weigeren
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@include('components.footer')
