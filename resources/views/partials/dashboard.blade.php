
<a class="btn btn-primary w-25" href="{{route('links')}}">نمایش لینک ها</a>
@can('create',\App\Models\Link::class)
    <a class="btn btn-primary w-25" href="{{route('create-link')}}">ایجاد لینک</a>
@endcan
@can('viewAny',\App\Models\User::class)
    <a class="btn btn-primary w-25" href="{{route('allUsers')}}">نمایش کاربران</a>
@endcan
@can('create',\App\Models\User::class)
    <a class="btn btn-primary w-25" href="{{route('createUser')}}">اضافه کردن کاربر</a>
@endcan
@can('changeIndexStatus',\App\Models\Link::class)
    <br>
    <br>
    <a class="btn btn-primary w-25" href="{{route('status-show')}}">عملیات index</a>
@endcan

