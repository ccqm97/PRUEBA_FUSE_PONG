<div  id="divTable" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
                <i class="fas fa-list"></i>
                Rutas Guardadas
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="tableRutasG" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre de la ruta</th>
                            <th>Troncal Origen</th>
                            <th>Troncal Destino</th>
                            <th>Estación Origen</th>
                            <th>Estación Destino</th>
                            <th>Hora inicio</th>
                            <th>Hora Fin</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>

<div id ="B_editRuta" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="far fa-edit"></i>
                Editar Ruta
            </div>
            
            <div class="card-body">
                <form id="formEditRuta">                                                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>Nombre de la ruta</label>
                                    <input type="text" id="nombre_ruta_e" class="form-control" placeholder="Escriba el nombre de la estación" required="required" autofocus="autofocus">                            
                                </div>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Hora de inicio(HH:MM:SS)</label>   
                                    <input id="horaIniE"class="form-control" type="text"></input>                                   
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Hora de finalización(HH:MM:SS)</label>   
                                    <input id="horaFinE" class="form-control" type="text"></input>                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Troncal origen</label>   
                                    <select  class="form-control" name="troncal_ori_e" id="troncal_ori_e" placeholder="First name"  required="required">
                                        <option value="">Escoja una troncal</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Troncal Destino</label>   
                                    <select  class="form-control" name="troncal_fin_e" id="troncal_fin_e" placeholder="First name"  required="required">
                                        <option value="">Escoja una troncal</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Estación Origen</label>   
                                    <select  class="form-control" name="estacion_origen_e" id="estacion_origen_e" placeholder="First name"  required="required">
                                        <option value="">Escoja una estación</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Estación Destino</label>   
                                    <select  class="form-control" name="estacion_fin_e" id="estacion_fin_e" placeholder="First name"  required="required">
                                        <option value="">Escoja una estación</option>
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



