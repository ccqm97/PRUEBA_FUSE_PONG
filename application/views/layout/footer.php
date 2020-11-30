      </div>
      <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer" style="width: calc(100% - 0px);">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
            <span>Copyright © FSP 2020</span>
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

  <!--POP UP CERRAR SESION -->
  <div class="container">
    <!-- POP UP -->
    <div class="modal fade"  tabindex="-1" id="myModal" role="dialog" aria-hidden="true">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header"style="background: linear-gradient(1deg, #e08106,#fbce50);">
          
            <h4 class="modal-title" style="color:white;"><strong>Cerrar Sesión</string></h4>
          </div>
          <div class="modal-body">
            <h3>¿Está seguro que desea cerrar sesión?</h3>
          </div>
          <div class="modal-footer">
            <a class="btn btn-block btn-primary" style="color:white;" href="<?php echo base_url()."index.php/Controller/logout"?>"> <i class="fa fa-sign-out fa-fw"></i>Confirmar</a>
          </div>
        </div>

      </div>
    </div>
    <!--FIN POP UP -->
    </div>
    <!--/POP UP CERRAR SESION -->

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