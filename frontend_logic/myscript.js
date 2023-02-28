
$(document).ready(function(){

    function LoadComment(){
        var blog_id = $('#blog_id').val();
        // console.log(blog_id);
        $.ajax({
            url:"frontend_logic/comment_get.php",
            type:"POST",
            data:{blog_id:blog_id},
            success: function(data){
                    $('.comments').html(data);
            }
        });
    }

    LoadComment();
    
    $('#save_comment').on("click", function(e){
        e.preventDefault();
        var name = $('#name').val();
        var email = $('#email').val();
        var comment = $('#comment').val();
        var blog_id = $('#blog_id').val();
        var valid = false;
        console.log(name);0
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

    
})
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function reply(id,postid)
{
$('#reply_area_'+ id ).append('<div id="reply_error'+id+'"></div><form action="frontend_logic/reply_post.php" method="post" id="ap_'+id+'" class="comment_form"><div class="row form-row"><div class="col-lg-12"><div class="form-group"><textarea id="commentr'+id+'" name="commentr" cols="30" rows="6" placeholder="Comment" class="form-control"></textarea></div><div id="commentr_error'+id+'" class="text-danger"></div></div><div class="col-lg-6"><div class="form-group"><input type="text" id="namer" name="namer" class="form-control" placeholder="Name"><input type="text" hidden id="blog_idr'+id+'" name="blog_id" value="'+postid+'"><input type="text" hidden name="comment_id" id="comment_id'+id+'" value="'+id+'"></div><div id="namer_error'+id+'" class="text-danger"></div></div><div class="col-lg-6"><div class="form-group"><input type="email" name="emailr" id="emailr'+id+'" class="form-control"  placeholder="Email"></div><div id="emailr_error'+id+'" class="text-danger"></div></div><div class="col-lg-12"><div class="form-group"><button id="r_save_reply"  type="submit" class="btn r_save_reply btn-main">Comment</button><button class="btnAddActionclose ml-5 btn btn-warning" name="submit" onClick="closeArea('+id+')">Close </button></div></div></div></form>');
$('#reply_'+ id ).hide(); 
$('#alert').remove();  

}

            


function closeArea(id)
{
$('#ap_'+ id ).remove(); 
$('#reply_'+ id ).show();   
}



// $(document).ready(function(){
//     /////////////////////////
// $('#r_save_reply').on("click", function(e){
    // e.preventDefault();
//         var namer = $('#namer').val();
//         var emailr = $('#emailr').val();
//         var commentr = $('#commentr').val();
//         var blog_idr = $('#blog_idr').val();
//         var valid = false;
//         if(namer == ""){
//             $('#namer_error').html('Name filed is Requere!');
//             valid = true;
//         }
//         if(emailr == ""){
//             $('#emailr_error').html('Email filed is Requere!');
//             valid = true;
//         }
//         if(commentr == ""){
//             $('#commentr_error').html('Comment filed is Requere!');
//             valid = true;
//         }

    // if (valid) {
    //     $('#reply_error').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Someting went wrong please try again!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    // }else{
        // $.ajax({
        //     url:"frontend_logic/comment_post.php",
        //     type:"POST",
        //     data:{name:name,email:email,comment:comment, blog_id:blog_id},
        //     success: function(data){
        //         if (data == 1) {
        //             $('#form_success').html("<div class='alert alert-success alert-dismissible fade show' role='alert'>Comment Successfuli submited!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        //             $('#commentForm').trigger('reset');
        //             LoadComment();
        //         } else {
        //             $('#form_error').html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>Oops! Someting went wrong please try again!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        //         }
        //     }
        // });
    // }
//    })
    //////////////////////////
// })


// $(document).ready(function(){
// 	$(window).load(function() {
// 	$("html, body").animate({
// 		scrollBottom: $('#com').offset().bottom
// 	}, 1000);
// 	});
// }); 

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

