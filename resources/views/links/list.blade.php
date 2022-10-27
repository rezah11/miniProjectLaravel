@extends('layouts.main')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <table class="table table-responsive" id="tableLink">
                <thead>
                <tr>
                    <th>id</th>
                    <th>لینک</th>
                    <th>لینک کوتاه</th>
                    <th>وضعیت</th>
                    <th>check</th>
                    <th>isIndex</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($link as $value)
                    <tr class="h-25">
                        <td>{{$value->id}}</td>
                        <td>{{$value->link}}</td>
                        <td>{{$value->slug}}</td>
                        <td class="text-center  "
                            style="height:50%;border-radius:5px ;background-color:{{$value->active?'#348114':'#cb0b14'}}">{{$value->state}}</td>
                        <td class="text-center  "
                            style="height:50%;border-radius:5px ;background-color:
                            @switch($value->status)
                            @case($value->isIndex())
                                #198754;
                                @break
                                @case($value->NoIndex())
                                #6a1a21;
                                @break
                                @case($value->NoStatus())
                                #b0adc5;
                                @break
                            @endswitch">{{$value->status}}
                        </td>
                        <td  style="display: flex;">
                            {{--                    <a href="{{route('destroy',['id'=>$value->id])}}" class="btn btn-danger">حذف</a>--}}
                            {{--                     @method('delete')--}}
                            <div >
                            <form action="{{route('destroy',['id'=>$value->id])}}" method="post" id="deleteForm">
                                @method('DELETE')
                                @csrf
                                @can('delete',$value)
                                    <input class="btn btn-danger" type="submit" value="حذف">
                                @endcan
                            </form>
                            </div>
                            <div>
                            @can('update' , $value)
                                <a href="{{route('edit-link',['id'=>$value->id])}}" class="btn btn-info">ویرایش</a>
                            @endcan
                            </div>
                            <div>
                            @can('changeState',$value)
                                <a class="btn btn-secondary" href="{{route('changeState-link',['id'=>$value->id])}}">تغییر
                                    وضعیت</a>
                            @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


