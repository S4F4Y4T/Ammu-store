 <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy;  <a href="http://facebook.com/s4f4y4t">S4F4Y4T</a>.</strong> All rights reserved.
      </footer>

 <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo BASE; ?>/style/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo BASE; ?>/style/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo BASE; ?>/style/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE; ?>/style/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo BASE; ?>/style/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo BASE; ?>/style/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo BASE; ?>/style/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo BASE; ?>/style/dist/js/demo.js"></script>
    <!-- page script -->
    <script type="text/javascript">
    $(document).ready(function(){
  $("#selectall").click(function(){
      //alert("just for check");
      if(this.checked){
          $('.checkboxall').each(function(){
              this.checked = true;
          })
      }else{
          $('.checkboxall').each(function(){
              this.checked = false;
          })
      }
  });
  });
  </script>
    <script>
      $(function () {
        $("#data").DataTable();
        
      });
    </script>
  </body>
</html>
