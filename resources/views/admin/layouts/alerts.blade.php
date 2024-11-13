<div class="row my-3">
    <div class="col-md-6 mx-auto">
        @session('success')
            <div class="alert alert-success">
                {{ session()->get('success')}}
            </div>
        @endsession
    </div>
</div>