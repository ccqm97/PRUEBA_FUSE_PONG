<div id="table" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
                <i class="fas fa-list"></i>
               Tipos de estaciones guardadas
               <button class="btn btn-primary" style="float: right;"data-toggle="modal"  data-target="#tipoModal">Agregar tipo de estación</button>    
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="TableTEstaciones" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre del Tipo de Estación</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div id="edit" class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="far fa-edit"></i>
                Editar Tipo de Estación
            </div>
            
            <div class="card-body">
                <form id="formEditEstacion">                                                    
                    <div class="form-group">
                        <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label>Nombre del tipo de estación</label>
                                <input type="text" id="NOMBRE_TIPO_ESTACION" class="form-control" placeholder="Escriba el tipo de estación aquí" required="required" autofocus="autofocus">                            
                            </div>
                        </div> 
                    </div>                            
                    
                    <button class="btn btn-success btn-block" id="bntSave" type="submit" href="#"><i class="fas fa-save"></i> Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div> 
</div>




