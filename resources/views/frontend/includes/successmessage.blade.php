<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success success-alert">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger success-alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
