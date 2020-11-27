<div id ="editEstacion" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="far fa-edit"></i>
                Historias de usuario
            </div>
            
            <div class="card-body">
                <form id="formEditEstacion">                                                    
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
                                    <select  class="form-control" name="tipo_est_e" id="tipo_est_e" placeholder="First name"  required="required">
                                        <option value="">Escoga un tipo de estación</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estación Vecina 1</label>
                                    <select  class="form-control" name="est_ini_e" id="est_ini_e"  required="required">
                                        <option value="">Elija la ciudad vecina</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estación Vecina 2</label>
                                    <select  class="form-control" name="est_fin" id="est_fin_e"  required="required">
                                        <option value="">Elija la ciudad vecina</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>                            
                    
                    <button class="btn btn-success btn-block" id="bntSave" type="submit" href="#"><i class="fas fa-save"></i> Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>    
</div>


<div  id="divTable" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
                <i class="fas fa-list"></i>
                Estaciones Guardadas
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
                            <th>Acción</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>



