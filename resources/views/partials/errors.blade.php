@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error con alguno de los campos</h4>
    <div class="alert-body">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
</div>
@endif