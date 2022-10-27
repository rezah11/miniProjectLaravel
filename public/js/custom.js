$(function (){
    // alert('a');
    // console.log('a');
    var $link=$('#tableLink');
    var $link1=$('#deleteForm');
    var $link2=$('#remUser');
    if(($link.length) && ($link1.length)){
        // console.log('yes');
        $('#deleteForm').bind('submit',function (e){
           var $yes=confirm('آیا از حذف این رکورد مطمئنید؟');
           if (!$yes){
               e.preventDefault();
           }
        });
    }else if (($link.length) && ($link2.length)){
        $('#remUser').bind('submit',function (e){
            // console.log('yeah');

            var $yes=confirm('آیا از حذف این رکورد مطمئنید؟');
            if (!$yes){
                e.preventDefault();
            }
        });
    }
})
