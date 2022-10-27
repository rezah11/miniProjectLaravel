@if($errors->any())
    <div class="row justify-content-sm-center">
        <div class="col-md-8">
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
