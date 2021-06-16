@if (count($errors)>0)
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @foreach($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        </div>
    </div>
@endif