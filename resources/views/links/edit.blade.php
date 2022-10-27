@extends('layouts.main')
@section('content')
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <form action="{{route('update-link')}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="id">id</label>
                    <input class="form-control" type="text" id="id" value="{{$link->id}}" readonly name="id">
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input class="form-control" type="text" id="slug" value="{{$link->slug}}" readonly name="slug">
                </div>
                <div class="form-group">
                    <label for="link">link</label>
                    <input class="form-control" id="link" value="{{$link->link}}" name="link" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary w-100">تایید</button>

            </form>
        </div>
    </div>
@endsection
