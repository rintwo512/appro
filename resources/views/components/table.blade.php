<div class="table-responsive">
      <table class="{{ $attributes->has('class') ? $attributes->get('class') : 'table table-bordered mb-0' }}" id="{{ $attributes->get('id', 'defaultId') }}">
            {{ $slot }}
      </table>
</div>
