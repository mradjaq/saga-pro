@if (session('success'))
<div class="alert alert-success mb-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
    <strong>Success!</strong> {{session('success')}}.
</div>
@endif

@if (session('change'))
<div class="alert alert-success mb-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
    <strong>Success!</strong> {{session('change')}}.
</div>
@endif

@if (session('info'))
<div class="alert alert-info mb-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
    <strong>Info!</strong> {{session('info')}}.
</div>
@endif

@if (session('danger'))
<div class="alert alert-danger mb-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
    <strong>Warning!</strong> {{session('danger')}}.
</div>
@endif

@if (session('errors'))
<div class="alert alert-danger mb-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
    <strong>Warning!</strong><br>
    @foreach ($errors->all() as $error)
    <strong> * </strong>{{ $error }}. <br>
    @endforeach
</div>
@endif