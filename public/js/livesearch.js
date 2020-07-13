$(document).ready(function(){

    fetch_answer();
    
    function fetch_answer(query = '')
    {
     $.ajax({
      url:"/live_search/action",
      method:'GET',
      data:{query:query},
      dataType:'json',
      success:function(data)
      {
          console.log(data)
        if(data.length >= 1){
            let output ='';
            data.forEach(element => {
                output += ('<div class=" d-flex justify-content-between" style="border:1px solid #ddd;padding:0.5em"><div class="truncate">'+element.question+'</div><div><a href="#answer-'+element.id+'" class="text-success">[ view details ]</a></div></div>');
            });
            $('#resultSearch').html(output);
        }else {
            $('#resultSearch').html(`<p class="pl-2">Search Result goes here...</p>`);
        }
      }
     })
    }
    
    $(document).on('input', '#searchx', function(){
     var query = $(this).val();
     
     $('#resultSearch').html("")
     fetch_answer(query);
    });
    });