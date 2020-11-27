<div id="table" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
                <i class="fas fa-list"></i>
               Troncales guardadas
               <button class="btn btn-primary" style="float: right;"data-toggle="modal"  data-target="#troncalModal">Agregar troncal</button>    
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="tableTroncales" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre de la troncal</th>
                            <th>Color</th>
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
                Editar Troncal
            </div>
            
            <div class="card-body">
                <form id="formEditTroncal">                                                    
                    <div class="form-group">
                        <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Nombre de la troncal</label>
                                <input type="text" id="NOMBRE_TRONCAL_ED" class="form-control" placeholder="Escriba el tipo de estación aquí" required="required" autofocus="autofocus">                            
                            </div>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Color de la troncal</label>
                                <input type="text" id="COLOR_TRONCAL_ED" class="form-control" placeholder="Escriba el tipo de estación aquí" required="required" autofocus="autofocus">                            
                            </div>
                        </div> 
                    </div>                            
                    
                    <button class="btn btn-success btn-block" id="bntSave" type="submit" href="#"><i class="fas fa-save"></i> Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div> 
</div>




