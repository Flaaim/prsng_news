$(".news-delete").on('click', function(e){
   e.preventDefault();
   let id = $(this).data('id');
   if(confirm("Вы уверены, что хотите удалить данную запись?")){
      $.ajax({
         url: "/parce/delete",
         type: "GET",
         data: {id:id},
         success: function(res){
            window.location = window.location.href;
         },error:function(){
            alert('Что-то пошло не так!');
         }
      })
   }
});