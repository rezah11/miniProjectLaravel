@extends('layouts.main')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <form action="{{route('status-link')}}" method="post">
                @csrf
                <table class="table table-responsive" id="tableLink">
                <thead>
                <tr class="">
                    <th>انتخاب</th>
                    <th>id</th>
                    <th>لینک</th>
                    <th>isIndex</th>
                </tr>
                </thead>
                <tbody>
{{--                <input type="text" value="464" name="test">--}}
                @foreach($link as $value)
                    <tr class="h-25">
                        <td><input name="{{$value->id}}" type="checkbox" value="{{$value->id}}"></td>
                        <td>{{$value->id}}</td>
                        <td>{{$value->link}}</td>
                        <td class="text-center  "
                            style="height:50%;border-radius:5px ;background-color:
                            @switch($value->status)
                            @case($value->isIndex())
                                #198754;
                            @break
                            @case($value->NoIndex())
                                #bb2d3b;
                            @break
                            @case($value->NoStatus())
                                #b0adc5;
                            @break
                            @endswitch">{{$value->status}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <input class="btn btn-success" type="submit">
            </form>
        </div>
    </div>
@endsection


