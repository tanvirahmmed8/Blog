
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
    <script src="admin_logic/ourscript.js"></script>


        
        <script>
         $(document).ready(function() {
          $('#summernote').summernote({
            placeholder: 'Blog Decsription',
            tabsize: 2,
            height: 300
          });
        });

      
      

        </script>
<!-- <style>
  .modal-backdrop {
  position: inherit;
 
}
</style> -->


    </body>

</html>