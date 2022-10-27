@extends('layouts.main')
{{--{{dd($user)}}--}}
@section('content')
    {{--        {{dd($password)}}--}}
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <form action="{{route('updateUser')}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="id">id</label>
                    <input class="form-control" type="text" id="id" value="{{$user->id}}" readonly name="id">
                    <label for="name">نام</label>
                    <input class="form-control" id="link" placeholder="نام" name="name" required
                           value="{{$user->name}}">
                    <label for="email">ایمیل</label>
                    <input class="form-control" id="link" placeholder="ایمیل" name="email" required
                           value="{{$user->email}}" readonly>
                    <label for="password">پسورد</label>
                    <input class="form-control" id="link" placeholder="پسوورد" type="password" name="password" required
                           value="{{$user->password}}" readonly>
                    <label for="repass">تکرار پسورد</label>
                    <input class="form-control" id="link" placeholder="تکرار پسوورد" type="password" name="repass"
                           required value="{{$user->password}}" readonly>
                    <label for="type">نوع کاربر</label>
                    <select class="form-control form-select" name="type" id="">
                        <option class="form-control" value="admin" {{ $user->type==='admin' ? 'selected': '' }} >admin
                        </option>
                        <option value="manager" {{ $user->type==='manager' ? 'selected': '' }} >manager</option>
                        <option value="user" {{ $user->type==='user' ? 'selected': '' }}>user</option>
                    </select>

                </div>
                <br>
                <button type="submit" class="btn btn-primary w-100">ثبت</button>

            </form>
        </div>
    </div>
@endsection

