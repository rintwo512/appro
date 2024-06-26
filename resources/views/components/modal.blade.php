<div class="modal fade" id="{{ $attributes->get('id', 'defaultId') }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="scroll-long-inner-modal" aria-hidden="true">
    <div
        class="{{ $attributes->has('class') ? $attributes->get('class') : 'modal-dialog modal-dialog-scrollable modal-lg' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $attributes->get('titleId', 'defaultTitleId') }}"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="{{ $attributes->get('bodyId', 'defaultTitleId') }}">
                {{ $slot }}
            </div>
            <div class="modal-footer {{ $attributes->has('dataFooter') ? $attributes->get('dataFooter') : 'd-flex' }}">
                <button type="button" class="btn bg-danger-subtle text-danger  waves-effect text-start"
                    data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
