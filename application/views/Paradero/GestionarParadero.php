<div id="add" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="fas fa-plus-circle"></i>
                Agregar Paradero
            </div>
            <div class="card-body">
                <form id="formAddParadero">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Seleccione la estación</label>   
                                <select  class="form-control" name="c_estacion" id="c_estacion" placeholder="First name"  required="required">
                                    <option value="">Escoja la estación</option>
                                </select>                                    
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Seleccione el vagón de la estación</label>   
                                <select  class="form-control" name="c_vagon" id="c_vagon" placeholder="First name"  required="required">
                                    <option value="">Escoja una vagón </option>
                                </select>                                    
                            </div>
                        </div>   
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Seleccione la ruta</label>   
                                <select  class="form-control" name="c_ruta" id="c_ruta" placeholder="First name"  required="required">
                                    <option value="">Escoja una ruta </option>
                                </select>                                    
                            </div>
                        </div>                    
                    </div>                                       
                    <button class="btn btn-success btn-block" type="submit"><i class="fas fa-save"type=></i> Guardar Paradero</button>
                </form>
            </div>
        </div>
    </div>    
</div>

<div id="edit" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="far fa-edit"></i>
                Editar Vagón
            </div>
            <div class="card-body">
                <form id="formEditParadero">
                    <div class="form-row">
                    <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Seleccione la estación</label>   
                                <select  class="form-control" name="c_estacion_e" id="c_estacion_e" placeholder="First name"  required="required">
                                    <option value="">Escoja la estación</option>
                                </select>                                    
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Seleccione el vagón de la estación</label>   
                                <select  class="form-control" name="c_vagon_e" id="c_vagon_e" placeholder="First name"  required="required">
                                    <option value="">Escoja una vagón </option>
                                </select>                                    
                            </div>
                        </div>   
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Seleccione la ruta</label>   
                                <select  class="form-control" name="c_ruta_e" id="c_ruta_e" placeholder="First name"  required="required">
                                    <option value="">Escoja una ruta </option>
                                </select>                                    
                            </div>
                        </div>                        
                    </div>                                       
                    <button class="btn btn-success btn-block" href="#" type="submit"><i class="fas fa-save"></i> Guardar Cambios</button>
                </form>
                <button class="btn btn-dark btn-block" id="cancelEdit" href="#"><i class="fas fa-times-circle"></i> Cancelar</button>
            </div>
        </div>
    </div>    
</div>

<div  class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
                <i class="fas fa-list"></i>
                Vagones guardados
            </div>
            <div class="card-body">

                <table id="tableParadero" class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Estación</th>
                            <th>Número de vagón</th>  
                            <th>Ruta</th>                            
                            <th>Acción</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>

