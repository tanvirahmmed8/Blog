function LoadContactMsgs(id){
    var user_id = $('#ur').val();
    // console.log(blog_id);
    $.ajax({
      url:"admin_logic/contact_msg_load.php",
      type:"POST",
      data:{user_id:user_id,id:id},
      success: function(data){
          $('.contact-msg-load').html(data);
          $('.refresmsg').html("refresh");
          $('.refresmsgbtn').attr("style","");
      }
    });
      }

      LoadContactMsgs();

  function LoadContactMsg(id,user){
    
      $.ajax({
        url:"admin_logic/contact_msg_get.php",
        type:"POST",
        data:{id:id,user:user},
        success: function(data){
            // console.log(data);
            LoadContactMsgs(id);
            $('.full-con-body').html(data);
        }
      });
    }
     

  function DeleteContactMsg(id){
    $('.refresmsg').html('loop');
    $('.refresmsgbtn').attr("style","cursor: progress;");
    // $('.full-con-body').html("empty!");
    $.ajax({
        url:"admin_logic/contact_msg_delete.php",
        type:"POST",
        data:{id:id},
        success: function(data){
          // $('.full-con-body').html('');
          LoadContactMsg(null,null);
         
          if (data == 1) {
            $('#delete_msg').html("<div class='alert alert-success alert-dismissible fade show' role='alert'>Massege successfully deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          }
          if (data == 0) {
            $('#delete_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Someting went wrong please try again!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
          }
          LoadContactMsgs();
            
            
        }
      });
  }

  function RefreshMsg(){ 
    $('.refresmsg').html('loop');
    $('.refresmsgbtn').attr("style","cursor: progress;");
    LoadContactMsgs();
  }


  $(document).ready(function(){
    $('#searchSample02').on('keyup', function(){
        var s = $(this).val();
        var user_id = $('#ur').val();
        $.ajax({
            url:"admin_logic/search_msg_load.php",
            type:"POST",
            data:{user_id:user_id,search:s},
            success: function(data){
                $('.contact-msg-load').html(data);
                $('.refresmsg').html("refresh");
                $('.refresmsgbtn').attr("style","");
            }
          });
    })
  })