@include('components.header')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Overzicht van alle studenten</h1>
    
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Voornaam</th>
                <th class="border px-4 py-2">Achternaam</th>
                <th class="border px-4 py-2">Leeftijd</th>
                <th class="border px-4 py-2">E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studenten as $student)
                <tr class="bg-white">
                    <td class="border px-4 py-2">{{ $student->id }}</td>
                    <td class="border px-4 py-2">{{ $student->firstname }}</td>
                    <td class="border px-4 py-2">{{ $student->surname }}</td>
                    <td class="border px-4 py-2">{{ $student->age }}</td>
                    <td class="border px-4 py-2">{{ $student->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('components.footer')
