<script>
    function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>

<div id="add" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="fas fa-plus-circle"></i>
                Agregar Vagón
            </div>
            <div class="card-body">
                <form id="formAddVagon">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Seleccione la estación</label>   
                                <select  class="form-control" name="estacion" id="estacion" placeholder="First name"  required="required">
                                    <option value="">Escoga la estación</option>
                                </select>                                    
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Número del vagón (Solo números)</label>
                                <input type="text" id="numero_vagon" class="form-control" placeholder="Escriba el número del vagón" onkeypress="return valida(event)" required="required" autofocus="autofocus">                            
                            </div>
                        </div>                        
                    </div>                                       
                    <button class="btn btn-success btn-block" type="submit"><i class="fas fa-save"type=></i> Guardar Vagón</button>
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
                <form id="formEditVagon">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Seleccione la estación</label>   
                                <select  class="form-control" name="estacionEdit" id="estacionEdit" placeholder="Elija la estación"  required="required">
                                    <option value="">Elija la estación</option>
                                </select>                                    
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Número del vagón (Solo números)</label>
                                <input type="text" id="numero_vagon_e" class="form-control" placeholder="Escriba el número del vagón" onkeypress="return valida(event)" required="required" autofocus="autofocus">                            
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

                <table id="tableVagon" class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Estación</th>
                            <th>Número de vagón</th>                            
                            <th>Acción</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>

