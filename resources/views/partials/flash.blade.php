@if(session('success'))
    <div class="container">
        <div class="alert alert-done">
            {{ session('success') }}
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container">
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    </div>
@endif