


$(".like").on('click', function () {

     var like_s = $(this).attr('data-like');
     var post_id = $(this).attr('data-postid');
    alert(post_id );
    $.ajax({type:"POST", url:url , data:{like_s:like_s,post_id:post_id,_token: token},
        success: function(data){

         // alert(data.is_like);
          alert('Ok!!');

           // '*[data-toggle="lightbox"]',

        }

    });



});
