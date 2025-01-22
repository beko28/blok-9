@include('components.header')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Overzicht van alle cursussen</h1>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Titel</th>
                <th class="border px-4 py-2">Startdate</th>
                <th class="border px-4 py-2">Duur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr class="bg-white">
                    <td class="border px-4 py-2">{{ $course->id }}</td>
                    <td class="border px-4 py-2">{{ $course->name }}</td>
                    <td class="border px-4 py-2">{{ $course->startday }}</td>
                    <td class="border px-4 py-2">{{ $course->duur }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('components.footer')
