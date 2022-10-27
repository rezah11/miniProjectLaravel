@extends('layouts.main')
@section('content')
{{--    {{dd($password)}}--}}
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <form action="{{route('storeUser')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">نام</label>
                    <input class="form-control" id="link" placeholder="نام" name="name" required>
                    <label for="email">ایمیل</label>
                    <input class="form-control" id="link" placeholder="ایمیل" name="email" required>
                    <label for="password">پسورد</label>
                    <input class="form-control" id="link" placeholder="پسوورد" type="password" name="password" required>
                    <label for="repass">تکرار پسورد</label>
                    <input class="form-control" id="link" placeholder="تکرار پسوورد" type="password" name="repass" required>
                    <label for="type">نوع کاربر</label>
                    <select class="form-control form-select" name="type" id="">
                        <option class="form-control" value="admin">admin</option>
                        <option value="manager">manager</option>
                        <option value="user" selected>user</option>
                    </select>

                </div>
                <br>
                <button type="submit" class="btn btn-primary w-100">ثبت</button>

            </form>
        </div>
    </div>
@endsection
