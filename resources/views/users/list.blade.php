@extends('layouts.main')
{{--{{dd($users)}}--}}
{{--<ul>@foreach($data[])<li>--}}
{{--        {{$data['name']}}--}}
{{--    </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <table class="table table-responsive" id="tableLink">
                <thead>
                <tr>
                    <th>id</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>نوع کاربر</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->type}}</td>
                        <td>
                            {{--                                                <a href="{{route('destroy',['id'=>$value->id])}}" class="btn btn-danger">حذف</a>--}}
                            {{--                                                @method('delete')--}}
                            <form action="{{route('deleteUser',['id'=>$value->id])}}" method="post" id="remUser">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="حذف">
                            </form>
                            <a href="{{route('editUser',['id'=>$value->id])}}" class="btn btn-info">ویرایش</a>
                        </td>

                        {{--                            @can('changeState',$value)--}}
                        {{--                                <a class="btn btn-secondary" href="{{route('changeState-link',['id'=>$value->id])}}">تغییر--}}
                        {{--                                    وضعیت</a>--}}
                        {{--                            @endcan--}}

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
