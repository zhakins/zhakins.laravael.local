$(function(){
    var taskDelete=$('.delete');

    taskDelete.submit(function () {
        var task=$(this).find('input').attr('value');
        var self=$(this);

        $.ajax({
            url:'/newTask/'+task,
            type:'delete',
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            success:function (data) {

                self.parents('tr').fadeOut(600);
            },
            error:function (err) {
                console.log(err.responseText);
            }
            
        });
        ///console.log(task);
        return false;
    })
});