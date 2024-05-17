<x-main title="{{ $title }}">
    <div class="container-fluid">
        <h3>{{ $user->name }}</h3>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <h4 class="card-title mb-3">Fitur AC</h4>
                <div class="card">
                    <div class="card-body">
                        <form id="updateFiturForm" action="{{ route('akses.fitur.update', ['id' => $user->id]) }}"
                            method="POST">
                            @csrf
                            @foreach ($allFitur as $fiturAc)
                                <div class="form-check form-switch fs-5 d-flex justify-content-between">
                                    <input class="form-check-input pr-5 fitur-checkbox" type="checkbox"
                                        id="fitur-{{ $fiturAc->id }}" name="fiturs[]" value="{{ $fiturAc->id }}"
                                        {{ $user->features1->contains('id', $fiturAc->id) ? 'checked' : '' }}>
                                    <label class="form-check-label pl-5"
                                        for="fitur-{{ $fiturAc->id }}">{{ $fiturAc->name }}
                                        &nbsp;<i class="{{ $fiturAc->icon }} text-primary"></i></label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h4 class="card-title mb-3">Fitur Logbook</h4>
                <div class="card">
                    <div class="card-body">
                        <form id="updateFiturLogbookForm"
                            action="{{ route('akses.fitur.logbook.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @foreach ($allFiturLogbook as $fiturLogbook)
                                <div class="form-check form-switch fs-5 d-flex justify-content-between">
                                    <input class="form-check-input pr-5 fitur-logbook-checkbox" type="checkbox"
                                        id="fitur-{{ $fiturLogbook->id }}" name="fiturs_logbook[]"
                                        value="{{ $fiturLogbook->id }}"
                                        {{ $user->featuresLogbook->contains('id', $fiturLogbook->id) ? 'checked' : '' }}>
                                    <label class="form-check-label pl-5"
                                        for="fitur-{{ $fiturLogbook->id }}">{{ $fiturLogbook->name }}
                                        &nbsp;<i class="{{ $fiturLogbook->icon }} text-primary"></i></label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxesFiturAc = document.querySelectorAll('.fitur-checkbox');

        checkboxesFiturAc.forEach(checkboxac => {
            checkboxac.addEventListener('change', function() {
                document.getElementById('updateFiturForm').submit();
            });
        });

        // LINE SCRIPT

        const checkboxesLogbook = document.querySelectorAll('.fitur-logbook-checkbox');

        checkboxesLogbook.forEach(checkboxlog => {
            checkboxlog.addEventListener('change', function() {
                document.getElementById('updateFiturLogbookForm').submit();
            });
        });


    });
</script>
