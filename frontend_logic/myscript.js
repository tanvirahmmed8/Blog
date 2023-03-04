 //load comment code start
$(document).ready(function(){

    function LoadComment(){
        var blog_id = $('#blog_id').val();
        $.ajax({
            url:"frontend_logic/comment_get.php",
            type:"POST",
            data:{blog_id:blog_id},
            success: function(data){
                    $('.comments').html(data);
            }
        });
    }
    // function call for load comment start
    LoadComment();
    // function call for load comment end

    //load function out side code start
    window.LoadComment = LoadComment;
    //load function out side code end


    //comment_post code start
    $('#save_comment').on("click", function(e){
        e.preventDefault();
        var name = $('#name').val();
        var email = $('#email').val();
        var comment = $('#comment').val();
        var blog_id = $('#blog_id').val();
        var valid = false;
        // console.log(name);
        if(name == ""){
            $('#name_error').html('Name filed is Requere!');
            valid = true;
        }
        if(email == ""){
            $('#email_error').html('Email filed is Requere!');
            valid = true;
        }
        if(comment == ""){
            $('#comment_error').html('Comment filed is Requere!');
            valid = true;
        }

        if (valid) {
            $('#form_error').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Someting went wrong please try again!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        }else{
            $.ajax({
                url:"frontend_logic/comment_post.php",
                type:"POST",
                data:{name:name,email:email,comment:comment, blog_id:blog_id},
                success: function(data){
                    if (data == 1) {
                        $('#form_success').html("<div class='alert alert-success alert-dismissible fade show' role='alert'>Comment Successfuli submited!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                        $('#commentForm').trigger('reset');
                        LoadComment();
                    } else {
                        $('#form_error').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Oops! Someting went wrong please try again!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    }
                }
            });
        }
    })
    //comment_post code end
    
})
 //load comment code end


//comment reply form get code start
function reply(id,postid)
{
    $('#reply_'+ id ).hide(); 
    $('#alert').remove();   
    $.ajax({
        url:"frontend_logic/reply_form.php",
        type:"POST",
        data:{id:id, postid:postid},
        success: function(data){  
            $('#reply_area_'+ id).html(data);     
        }
    });
}
//comment reply form get code end

            
//comment reply close code start
function closeArea(id)
{
$('#ap_'+ id ).remove(); 
$('#reply_'+ id ).show();  
}
//comment reply close code end

//comment reply_post code start
function replyArea(id){
        
        $('#ap_'+id).submit( function(e){
            e.preventDefault();
            var namer = $('#namer').val();
            var emailr = $('#emailr').val();
            var commentr = $('#commentr').val();
            var blog_idr = $('#blog_id').val();
            var comment_id = $('#comment_id').val();
            var valid = false;
            if(namer == ""){
                $('#namer_error').html('Name filed is Requere!');
                valid = true;
            }
            if(emailr == ""){
                $('#emailr_error').html('Email filed is Requere!');
                valid = true;
            }
            if(commentr == ""){
                $('#commentr_error').html('Comment filed is Requere!');
                valid = true;
            }

            if (valid) {
                    $('#reply_error'+id).html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Someting went wrong please try again!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                }else{
                    $.ajax({
                        url:"frontend_logic/reply_post.php",
                        type:"POST",
                        data:{namer:namer,emailr:emailr,commentr:commentr, blog_id:blog_idr,comment_id:comment_id},
                        success: function(data){
                            if (data == 1) {
                                $('#reply_error'+id).html("<div class='alert alert-success alert-dismissible fade show' role='alert'>Comment Successfuli submited!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                                $('#ap_'+ id).trigger('reset');
                               
                                LoadComment();
                                  
                            } else {
                                $('#reply_error'+id).html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Oops! Someting went wrong please try again!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                            }
                        }
                    });
                }
        })
   
    }
//comment reply_post code end


//contact page massege code start
$(document).ready(function(){
    $('#contact_msg').on("click", function(e){
        e.preventDefault();
        var con_name = $('#name').val();
        var con_email = $('#email').val();
        var con_subject = $('#subject').val();
        var con_massege = $('#message').val();
        var con_valid = false;
        if(con_name == ""){
            $('#con_name_error').html('Name filed is Requere!');
            con_valid = true;
        }else{	
            $('#con_name_error').html('');
        }
        if(con_email == ""){
            $('#con_email_error').html('Email filed is Requere!');
            con_valid = true;
        }else{	
            $('#con_email_error').html('');
        }
        if(con_subject == ""){
            $('#con_subject_error').html('Subject filed is Requere!');
            con_valid = true;
        }else{	
            $('#con_subject_error').html('');
        }
        if(con_massege == ""){
            $('#con_massege_error').html('Massege filed is Requere!');
            con_valid = true;
        }else{	
            $('#con_massege_error').html('');
        }

        if (con_valid) {
            $('#con_form_error').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Please Fill all inputs and try again!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        }else{
            $.ajax({
                url:"frontend_logic/contact_post.php",
                type:"POST",
                data:{con_name:con_name,con_email:con_email,con_subject:con_subject, con_massege:con_massege},
                success: function(data){
                    if (data == 1) {
                        $('#con_form_error').html("<div class='alert alert-success alert-dismissible fade show' role='alert'>Your massege was successfully sent!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                        $('#contactForm').trigger('reset');
                    } else {
                        $('#con_form_error').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Oops! Someting went wrong please try again!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    }
                }
            });
        }


    })
})
//contact page massege code start

