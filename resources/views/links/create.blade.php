
@extends('layouts.main')
@section('content')
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <form action="{{route('store-link')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="link">link</label>
                    <input class="form-control" id="link" placeholder="آدرس اینترنتی خود را وارد کنید" name="link" required>
                </div>
                <div>
                    <label for="linkFile">attach link</label>
                    <input class="form-control" id="linkFile" name="linkFile" type="file">
                </div>
                <br>
                <button type="submit" class="btn btn-primary w-100">ثبت</button>

            </form>
        </div>
    </div>
@endsection
