      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="<?php echo base_url()?>">Revolta Evi</a>.</strong> All rights reserved.
      </footer>
      
      <!-- Control Sidebar -->      
      <aside class="control-sidebar control-sidebar-dark">                
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
              <a href="<?php echo base_url()?>" target="_blank"><h3 class="control-sidebar-heading">Visit Site</h3></a>
              <a href="<?php echo base_url()?>adminpanel"><h3 class="control-sidebar-heading">Admin Panel</h3></a>
<!-- /.control-sidebar-menu -->         

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">            
              <form action="<?PHP echo site_url()?>setting/update" method="post" id="myform" >
              <h3 class="control-sidebar-heading">General Settings</h3>
              <?PHP foreach($setting as $value){ echo'
                            <p>title:</p>
                                <input type="text" name="title"  class="  form-control" value="'.$value->title.'" />
                                <p>keywords:</p>
                                <input type="text" name="keywords"  class="  form-control" value="'.$value->keywords.'" />
                                <p>description:</p>
                                <input name="description"  class="  form-control" value="'.$value->description.'" />
                                <p>slogan:</p>
                                <input type="text" name="slogan"  class="  form-control" value="'.$value->slogan.'" />
                                
                                <p>site_status:</p>
                                <select name="site_status" id="select">';
                                if($value->site_status == 1){
                                    echo '
                                            <option value="1">open</option>
                                            <option value="0">close</option>
                                          ';
                                }else{
                                    echo '
                                            <option value="0">close</option>
                                            <option value="1">open</option>

                                          ';
                                }
                            echo'

                                </select>
                                <p>message close site:</p>
                                <textarea name="site_status_msg" id="textareas">
                                    '.$value->site_status_msg.'
                                </textarea>
                                <p>footer msg:</p>
                                <input type="text" name="footer_msg"  class="  form-control" value="'.$value->footer_msg.'" />
                                <input type="submit"  class="btn-default"  name="UpdateSetting" class="btn-default" value="update setting" />
              ';}?>
              </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script src="<?php echo base_url();?>template/js/plugin_adminpanel.js" type="text/javascript" charset="utf-8"></script>
       <script src="<?php echo base_url();?>template/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>
       <script src="<?php echo base_url();?>template/js/additional-methods.min.js" type="text/javascript" charset="utf-8"></script>
       <script src="<?php echo base_url();?>template/js/validate_.js" type="text/javascript" charset="utf-8"></script>
     
       <script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
       <script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>
       <script type="text/javascript" src="<?php echo base_url();?>ckeditor-slideshow/ckeditor.js"></script>
              <script type="text/javascript">
                window.onload = function()
                {
                        CKEDITOR.replace( 'editor1',
                    {
                        filebrowserBrowseUrl : '<?php echo base_url() ?>ckfinder/_samples/php/standalone.php',
                        filebrowserUploadUrl : '<?php echo base_url() ?>ckeditor5/plugins/imgupload/imgupload.php'
                    });
                };
       </script>

    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url();?>template/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
 <!--   <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 -->   <script src="<?php echo base_url();?>template/dist/js/raphael-min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url();?>template/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url();?>template/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
 <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
  -->  <script src="<?php echo base_url();?>template/dist/js/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url();?>template/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url();?>template/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url();?>template/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url();?>template/dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    
    <script src="<?php echo base_url();?>template/dist/js/demo.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/js/dobPicker.min.js" type="text/javascript" charset="utf-8"></script>


  </body>
</html>