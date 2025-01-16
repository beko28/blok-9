@include('components.header')

<div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 bg-gray-100 min-h-screen">

    <h1 class="text-4xl font-extrabold text-center text-indigo-600 mb-10">
        Dashboard voor Leraren
    </h1>

    <div class="mb-12 bg-white shadow-md rounded-lg p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">
                Timeslots beheren
            </h2>
            <a href="" 
               class="inline-block bg-green-500 text-white px-6 py-2 mt-4 md:mt-0 rounded-full hover:bg-green-600 transition duration-200">
               Nieuw Timeslot
            </a>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 bg-gray-50 rounded-lg">
                <thead class="text-xs uppercase text-gray-600 bg-gray-200">
                    <tr>
                        <th class="px-4 py-3">Datum</th>
                        <th class="px-4 py-3">Tijd</th>
                        <th class="px-4 py-3">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeslots as $timeslot)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $timeslot->date }}</td>
                            <td class="px-4 py-3">{{ $timeslot->time }}</td>
                            <td class="px-4 py-3">
                                <a href="" class="text-blue-500 hover:underline">
                                    Aanpassen
                                </a>
                                <form action="" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline ml-2">
                                        Verwijderen
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-12 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Studenten koppelen aan geplande courses</h2>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 bg-gray-50 rounded-lg">
                <thead class="text-xs uppercase text-gray-600 bg-gray-200">
                    <tr>
                        <th class="px-4 py-3">Course</th>
                        <th class="px-4 py-3">Student</th>
                        <th class="px-4 py-3">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course as $course)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">
                                {{ $course->timeslot->date }} {{ $course->timeslot->time }}
                            </td>
                            <td class="px-4 py-3">
                                @if($course->user)
                                    {{ $course->user->name }}
                                @else
                                    <span class="text-gray-500 italic">Geen student gekoppeld</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <a href="" class="text-blue-500 hover:underline">
                                    Koppel Student
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-12 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Feedback toevoegen</h2>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 bg-gray-50 rounded-lg">
                <thead class="text-xs uppercase text-gray-600 bg-gray-200">
                    <tr>
                        <th class="px-4 py-3">Course</th>
                        <th class="px-4 py-3">Student</th>
                        <th class="px-4 py-3">Feedback</th>
                        <th class="px-4 py-3">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course as $course)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">
                                {{ $course->timeslot->date }} {{ $course->timeslot->time }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $course->user->name ?? 'Geen student' }}
                            </td>
                            <td class="px-4 py-3">
                                @if($course->feedback)
                                    {{ $course->feedback->content ?? $course->feedback }}
                                @else
                                    <span class="text-gray-500 italic">Geen feedback</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <a href="" 
                                   class="text-blue-500 hover:underline">
                                   Feedback Toevoegen
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Overzicht van geplande courses</h2>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 bg-gray-50 rounded-lg">
                <thead class="text-xs uppercase text-gray-600 bg-gray-200">
                    <tr>
                        <th class="px-4 py-3">Datum</th>
                        <th class="px-4 py-3">Tijd</th>
                        <th class="px-4 py-3">Student</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course as $course)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $course->timeslot->date }}</td>
                            <td class="px-4 py-3">{{ $course->timeslot->time }}</td>
                            <td class="px-4 py-3">{{ $course->user->name ?? 'Geen student' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('components.footer')
