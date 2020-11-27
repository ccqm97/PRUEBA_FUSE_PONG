      </div>
      <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
            <span>Copyright © TransmiApp 2020</span>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>  

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url();?>assets/js/demo/chart-area-demo.js"></script>

  <!-- DataTable-->    
  <script src="<?php echo base_url();?>assets/DataTable/datatables.min.js"></script>
 
  <!-- PNotify -->
  <script src="<?php echo base_url();?>assets/pnotify/dist/pnotify.js"></script>
  <script src="<?php echo base_url();?>assets/pnotify/dist/pnotify.buttons.js"></script>
  <script src="<?php echo base_url();?>assets/pnotify/dist/pnotify.nonblock.js"></script>
  <script type="text/javascript">
    var baseUrl = "<?php echo base_url();?>";
    $(document).ready(function (){
        $('.ui-pnotify').remove();
    });
  </script>

  <!--Script propios-->
  <?php if($this->uri->segment(2)=='home') { ?>
  <script src="<?= base_url();?>js/jsTicket/jsTicket.js"></script>
  <?php }?>
</body>

</html>