function reportSubmit(id){
    $.post('/reports/'+id,{_token:$('input[type=hidden]').val()},(data)=>{
        $('#report'+id).toggleClass('text-success');
        if(data.attached.length){
            $('#repcount'+id).html(eval($('#repcount'+id).html()+1));
        }else {
            $('#repcount'+id).html(eval($('#repcount'+id).html()-1));
        }
    });
}