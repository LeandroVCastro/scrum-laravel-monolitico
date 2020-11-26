@if (session()->has('message.success'))
    <div class="alert alert-success">
        {{ session('message.success') }}
    </div>
@endif
@if (session()->has('message.error'))
    <div class="alert alert-danger">
        {{ session('message.error') }}
    </div>
@endif
