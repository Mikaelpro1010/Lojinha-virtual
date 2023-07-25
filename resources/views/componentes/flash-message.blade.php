@if(session('success'))
    <p class="alert alert-danger" role="alert">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p class="alert alert-danger" role="alert">{{session('error')}}</p>
@endif
