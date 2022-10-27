<style>
    <?php
    $styles=[
        'mailStyle'=>'text-align: center;
        border: solid 3px #0e084f;
        background-color: #757dc3;
        width: 50%;
        margin: 0px;',
        'center'=>'display: flex;
        justify-content: center;'
]
    ?>

</style>
<div style="{{$styles['center']}}">
    <div class="h-100" style="{{$styles['mailStyle']}}">
        سلام {{$name}}
        <br />
        {{$date}}
        <br>
            <img src="{{$message->embed(storage_path('\app\6.jpg'))}}" height="85%" width="90%">
{{--        <img src="{{asset('6.jpg')}}" height="85%" width="90%">--}}
    </div>
</div>
