@include('components.header')

<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            {{-- Status- of succesboodschap --}}
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-plus me-2"></i>
                        Nieuwe Les / Cursus Aanmaken
                    </h4>
                </div>
                <div class="card-body">

                    {{-- Validatiefouten --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oeps!</strong> Er ging iets mis bij het opslaan. Controleer de volgende punten:
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf

                        {{-- Naam --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                Naam les / cursus
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Bijv. Pianoles voor beginners"
                                required
                            >
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        
                        <label for="trail">Is het een proefles?</label>
                        <input type="text" name="trail" id="trail" />


                        {{-- Beschrijving --}}
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Beschrijving</label>
                            <textarea
                                name="description"
                                id="description"
                                class="form-control @error('description') is-invalid @enderror"
                                rows="4"
                                placeholder="Vertel iets meer over de inhoud van deze les/cursus..."
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Type (piano, gitaar, zang, drums, etc.) --}}
                        <div class="mb-3">
                            <label for="type" class="form-label fw-semibold">
                                Type
                            </label>
                            <input
                                type="text"
                                name="type"
                                id="type"
                                class="form-control @error('type') is-invalid @enderror"
                                value="{{ old('type') }}"
                                placeholder="Bijv. Piano, Gitaar, Zang..."
                            >
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <label for="startday">Startdag</label>
                        <input type="text" name="startday" id="startday" />

                        <label for="starttime">Starttijd</label>
                        <input type="text" name="starttime" id="starttime" />

                        <label for="endday">Einddag</label>
                        <input type="text" name="endday" id="endday" />

                        <label for="endtime">Eindtijd</label>
                        <input type="text" name="endtime" id="endtime" />

                        {{-- Studenten selecteren --}}
                        <div class="mb-4">
                            <label for="userIDs" class="form-label fw-semibold">
                                Selecteer Studenten
                            </label>
                            <select
                                name="userIDs[]"
                                id="userIDs"
                                class="form-control @error('userIDs') is-invalid @enderror"
                                multiple
                            >
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">
                                Houd <kbd>Ctrl</kbd> of <kbd>Cmd</kbd> ingedrukt om meerdere studenten te selecteren.
                            </small>
                            @error('userIDs')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Knop om het formulier te versturen --}}
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check me-1"></i>
                            Aanmaken
                        </button>
                        <a href="{{ route('ldashboard') }}" class="btn btn-link text-muted">
                            Annuleren
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
