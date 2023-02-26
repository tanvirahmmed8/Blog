
</div>
                    <!-- // END drawer-layout__content -->

                  <?php 
                    require_once 'menu.php';
                  ?>
                </div>
                <!-- // END drawer-layout -->

            </div>
            <!-- // END header-layout__content -->

        </div>
        <!-- // END header-layout -->

        <!-- App Settings FAB -->
        <div id="app-settings">
            <app-settings layout-active="default"
                          :layout-location="{
      'default': 'index.php',
      'fixed': 'fixed-dashboard.html',
      'fluid': 'fluid-dashboard.html',
      'mini': 'mini-dashboard.html'
    }"></app-settings>
        </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>
    
    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>
    
    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>
    
    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>
    
    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>
    
    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>
    <script src="assets/summernote/summernote.min.js"></script>


        
        <script>
         $(document).ready(function() {
          $('#summernote').summernote({
            placeholder: 'Blog Decsription',
            tabsize: 2,
            height: 300
          });
        });

      function LoadContactMsgs(id){
        var user_id = $('#ur').val();
        // console.log(blog_id);
        $.ajax({
          url:"admin_logic/contact_msg_load.php",
          type:"POST",
          data:{user_id:user_id,id:id},
          success: function(data){
              $('.contact-msg-load').html(data);
              // console.log(data);
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
        
        setTimeout(function() {
          $('.refresmsgbtn').attr("style","cursor: progress;");
          $('.refresmsg').html('loop');
        }, 00);
        LoadContactMsgs();
        setTimeout(function() {
          $('.refresmsg').html("refresh");
          $('.refresmsgbtn').attr("style","");
        }, 3000);
        
        
      }
      

        </script>
<style>
  .modal-backdrop {
  position: inherit;
 
}
</style>
    </body>

</html>