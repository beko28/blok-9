@include('components.header')

<div class="position-relative" style="background: linear-gradient(45deg, #283c86, #45a247); color: #fff;">
    <div class="container py-5 text-center">
        <h1 class="fw-bold display-4 mb-3">Leraarsdashboard</h1>
        <p class="lead mb-0">Beheer hier je lessen en cursussen en koppel studenten.</p>
    </div>
</div>

<div class="container my-5">

    {{-- Statusmelding --}}
    @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

    {{-- Knop om een nieuwe cursus aan te maken --}}
    <div class="text-center mb-4">
        <a href="{{ route('courses.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-2"></i> 
            Nieuwe Les / Cursus
        </a>
    </div>

    {{-- Controleer of er cursussen zijn --}}
    @if($course->count() > 0)
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <i class="fas fa-list-ul me-2"></i>
                <span class="fw-semibold">Overzicht van bestaande cursussen</span>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">
                                <i class="fas fa-book-open me-2"></i>
                                Naam
                            </th>
                            <th scope="col">
                                <i class="fas fa-calendar-day me-2"></i>
                                Datum
                            </th>
                            <th scope="col">
                                <i class="fas fa-clock me-2"></i>
                                Tijd
                            </th>
                            <th scope="col">
                                <i class="fas fa-user-graduate me-2"></i>
                                Studenten
                            </th>
                            <th scope="col">
                                <i class="fas fa-cogs me-2"></i>
                                Acties
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course as $course)
                            <tr>
                                <td class="fw-semibold">
                                    {{ $course->name }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($course->date)->format('d-m-Y') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($course->time)->format('H:i') }}
                                </td>
                                <td>
                                    @forelse($course->users as $user)
                                        <span class="badge rounded-pill bg-secondary me-1 mb-1">
                                            {{ $user->name }}
                                        </span>
                                    @empty
                                        <em>Geen studenten gekoppeld</em>
                                    @endforelse
                                </td>
                                <td>
                                    <a href="" 
                                       class="btn btn-sm btn-outline-warning"
                                       title="Course bewerken">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- Example: Delete-knop (optioneel, afhankelijk van je logica) --}}
                                    {{-- 
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Course verwijderen">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="text-center my-5">
            <h3 class="fw-bold">Nog geen cursussen gevonden</h3>
            <p class="text-muted">Klik op de onderstaande knop om je eerste cursus aan te maken.</p>
            <a href="{{ route('courses.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-2"></i> 
                Nieuwe Les / Cursus
            </a>
        </div>
    @endif
</div>

@include('components.footer')
