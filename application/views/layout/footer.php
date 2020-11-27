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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>TransmiApp  <i class="fas fa-bus"></i> V1.0</strong></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
                Aplicación desarrollada por:
                <br>
                <br>
                <h2 style="font-size: 30px;"><i class="fas fa-user-tie"></i> Fredy Antonio Espitia Castillo</h2> 
                <br>
                <h2 style="font-size: 30px;"><i class="fas fa-user-tie"></i> Juan Diego Quintero Contreras</h2>
        </div>
        <div class="modal-footer">
          <div class="container my-auto">
              <div class="copyright text-center my-auto">
              <span>Copyright © TransmiApp 2020</span>
              </div>
          </div>  
        </div>
      </div>
    </div>
  </div>

  <!-- Tipo Estacion Modal-->
  <div class="modal fade" id="tipoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content" style="height: 300px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Tipo de Estación</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formAddTipoEstacion"role="form" action="">                                                    
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label>Nombre del tipo de estación</label>
                                <input type="text" id="NOMBRE_TIPO_ESTACION_M" class="form-control" placeholder="Escriba el tipo de estación aquí" required="required" autofocus="autofocus">                            
                            </div>
                        </div> 

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" href="login.html">Guardar</button>
                            <button class="btn btn-secondary btn-block" type="button" data-dismiss="modal">Cancel</button>                 
                            </div>
                        </div> 
                      </div>
                  </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Troncal Modal-->
  <div class="modal fade" id="troncalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="height: 300px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Troncal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formAddTroncal"role="form" action="">                                                    
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Nombre de la troncal</label>
                                <input type="text" id="nombre_troncal" class="form-control" placeholder="Escriba el nombre " required="required" autofocus="autofocus">                            
                            </div>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Color de la troncal</label>
                                <input type="text" id="color_troncal" class="form-control" placeholder="Escriba el color" required="required" autofocus="autofocus">                            
                            </div>
                        </div> 

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" href="login.html">Guardar</button>
                            <button class="btn btn-secondary btn-block" type="button" data-dismiss="modal">Cancel</button>                 
                            </div>
                        </div> 
                      </div>
                  </div>
          </div>
        </form>
      </div>
    </div>
  </div>

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

  <!-- TimePicker-->
  <script src="<?php echo base_url();?>assets/timepicker/js/timepicker.js"></script>
  <script type="text/javascript">
    var baseUrl = "<?php echo base_url();?>";
    $(document).ready(function (){
        $('.ui-pnotify').remove();
    });
  </script>

  <script src="<?= base_url();?>js/jsEstacion/jsAgregarTipoEstacion.js"></script>
  <script src="<?= base_url();?>js/jsRuta/jsAgregarTroncal.js"></script>

  <!--Script propios-->
  <?php if($this->uri->segment(2)=='home') { ?>
  <script src="<?= base_url();?>js/jsEstacion/jsGestionarEstacion.js"></script>
  <?php }?>
</body>

</html>