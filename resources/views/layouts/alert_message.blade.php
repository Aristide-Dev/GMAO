@if(Session::get('success'))
<div class="text-white alert alert-success bg-success alert-dismissible" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="bg-black btn-close badge" data-bs-dismiss="alert" aria-label="Close">
    </button>
</div>
@endif

@if(Session::get('error'))
<div class="text-white alert alert-danger bg-danger alert-dismissible" role="alert">
    {{ Session::get('error') }}
    <button type="button" class="bg-black btn-close badge" data-bs-dismiss="alert" aria-label="Close">
    </button>
</div>
@endif