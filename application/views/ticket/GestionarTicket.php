<div id ="editEstacion" class="row">
    <div class="col-lg-12">
        <div class="card mb-3 ">
            <div class="card-header">
            <i class="far fa-edit"></i>
                Historias de usuario
            </div>
            
            <div class="card-body">
                <form id="formCreateTicket">                                                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" id="desc_UH" class="form-control" placeholder="Escriba el nombre de la estación" required="required" autofocus="autofocus">                            
                                </div>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Proyecto</label>   
                                    <select  class="form-control" name="c_proyecto" id="c_proyecto" placeholder="First name"  required="required">
                                        <option value="">Escoga un proyecto</option>
                                    </select>                                    
                                </div>
                            </div>                           
                        </div>
                    </div>                            
                    
                    <button class="btn btn-success btn-block" id="bntSave" type="submit" href="#"><i class="fas fa-save"></i> Guardar</button>
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

                <table class="table table-bordered" id="TableTickets" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ticket Id</th>
                            <th>Empresa</th>
                            <th>Proyecto</th>                            
                            <th>Historia de usuario</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>



