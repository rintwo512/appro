<form action="{{ route('logout', ['id' => auth()->user()->id]) }}" method="post" id="autoLogoutHeader">
      @csrf
    <a href="javascript:void(0)" class="py-8 px-7 d-flex align-items-center" id="btnLogHeader">
      <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
        <img src="{{ asset('assets/images/svgs/logout.svg')}}" alt="modernize-img" width="24" height="24" />
      </span>
      <div class="w-100 ps-3">
        <h6 class="mb-1 fs-3 fw-semibold lh-base">{{ $slot }}</h6>
      </div>
    </a>
    </form>