@include('components.header')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">📚 Overzicht van alle studenten</h1>

    <div class="relative w-full max-w-md mx-auto mb-6">
        <input type="text" id="searchInput" placeholder="🔍 Zoek op naam of e-mail..."
            class="w-full px-5 py-3 text-gray-700 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="w-full border-collapse rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(0)">ID ⬍</th>
                    <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(1)">Voornaam ⬍</th>
                    <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(2)">Achternaam ⬍</th>
                    <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(3)">Leeftijd ⬍</th>
                    <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable(4)">E-mail ⬍</th>
                </tr>
            </thead>
            <tbody id="studentTable" class="text-gray-700 text-sm">
                @foreach ($studenten as $student)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-4 px-6">{{ $student->id }}</td>
                        <td class="py-4 px-6">{{ $student->firstname }}</td>
                        <td class="py-4 px-6">{{ $student->surname }}</td>
                        <td class="py-4 px-6">{{ $student->age }}</td>
                        <td class="py-4 px-6">{{ $student->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('components.footer')

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#studentTable tr');

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });

    function sortTable(colIndex) {
        let table = document.getElementById('studentTable');
        let rows = Array.from(table.rows);
        let sortedRows = rows.sort((a, b) => {
            let aText = a.cells[colIndex].textContent.trim();
            let bText = b.cells[colIndex].textContent.trim();

            return isNaN(aText) ? aText.localeCompare(bText) : aText - bText;
        });

        table.innerHTML = '';
        sortedRows.forEach(row => table.appendChild(row));
    }
</script>
