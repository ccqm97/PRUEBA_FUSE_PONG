<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="fas fa-plus-circle"></i>
                Agregar Estación
                <button class="btn btn-primary" style="float: right;"data-toggle="modal"  data-target="#tipoModal">Agregar tipo de estación</button>    
            </div>
            
            <div class="card-body">
                <form id="formAddEstacion">                                                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Nombre de la estación</label>
                                    <input type="text" id="NOMBRE_ESTACION" class="form-control" placeholder="Escriba el nombre de la estación" required="required" autofocus="autofocus">                            
                                </div>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Tipo de estación</label>   
                                    <select  class="form-control" name="tipo_est" id="tipo_est" placeholder="First name"  required="required">
                                        <option value="">Escoja un tipo de estación</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estación Vecina 1</label>
                                    <select  class="form-control" name="est_ini" id="est_ini"  required="required">
                                        <option value="">Elija la estación vecina</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estación Vecina 2</label>
                                    <select  class="form-control" name="est_fin" id="est_fin"  required="required">
                                        <option value="">Elija la estación vecina</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>                            
                    
                    <button class="btn btn-success btn-block" id="bntSave" type="submit" href="#"><i class="fas fa-save"></i> Guardar Estación</button>
                </form>
            </div>
        </div>
    </div>    
</div>

<div  class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
                <i class="fas fa-list"></i>
                Estaciones Guardadas
                <form  style="float: right;" action="<?php echo base_url(); ?>index.php/Controller/importEstaciones" method="post" name="upload_excel" enctype="multipart/form-data">
                    <input type="file" name="file" id="file" class="input-large">
                    <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading">Cargar Estaciones</button>
                </form>
    
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="TableEstaciones" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre Estación</th>
                            <th>Tipo de estación</th>                            
                            <th>Estación Vecina 1</th>
                            <th>Estación Vecina 2</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>

