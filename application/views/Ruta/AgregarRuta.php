<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="fas fa-plus-circle"></i>
                Agregar Ruta
                <button class="btn btn-primary" style="float: right;"data-toggle="modal"  data-target="#troncalModal">Agregar troncal</button>    
            </div>
            <div class="card-body">
                <form id="FormAddRuta">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>Nombre de la ruta</label>
                                    <input type="text" id="nombre_ruta" class="form-control" placeholder="Escriba el nombre de la estación" required="required" autofocus="autofocus">                            
                                </div>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Hora de inicio(HH:MM:SS)</label>   
                                    <input id="horaIni"class="form-control" type="text"></input>                                   
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Hora de finalización(HH:MM:SS)</label>   
                                    <input id="horaFin" class="form-control" type="text"></input>                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Troncal origen</label>   
                                    <select  class="form-control" name="troncal_ori" id="troncal_ori" placeholder="First name"  required="required">
                                        <option value="">Escoja una troncal</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Troncal Destino</label>   
                                    <select  class="form-control" name="troncal_fin" id="troncal_fin" placeholder="First name"  required="required">
                                        <option value="">Escoja una troncal</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Estación Origen</label>   
                                    <select  class="form-control" name="estacion_origen" id="estacion_origen" placeholder="First name"  required="required">
                                        <option value="">Escoja una estación</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Estación Destino</label>   
                                    <select  class="form-control" name="estacion_fin" id="estacion_fin" placeholder="First name"  required="required">
                                        <option value="">Escoja una estación</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-block" type="submit"><i class="fas fa-save"></i> Guardar Ruta</button>
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
                Rutas Guardadas
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="tableRutas" width="100%" cellspacing="0">
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
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>

