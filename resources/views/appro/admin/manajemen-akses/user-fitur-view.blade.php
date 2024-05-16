<x-main title="{{ $title }}">
    <div class="container-fluid">
        <div class="col-md-4">
            <h4 class="card-title mb-3">{{ $user->name }} Fitur AC</h4>
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

    </div>


</x-main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.fitur-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                document.getElementById('updateFiturForm').submit();
            });
        });
    });
</script>
