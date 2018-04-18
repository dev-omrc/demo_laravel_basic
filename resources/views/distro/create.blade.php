<div class="modal fade" id="create-distro-modal" tabindex="-1" role="dialog" aria-labelledby="create-distro-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-distro-modal-label">Agregar Distro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger create-error" role="alert" style="display: none;">
                    <ul id="create-errrors">
                    </ul>
                </div>
                <form id="formcreate" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="create-name">Nombre:</label>
                        <input class="form-control" type="text" id="create-name" placeholder="Escribe el nombre de la distro">
                    </div>
                    <div class="form-group">
                        <label for="create-image">Imagen</label>
                        <input type="file" class="form-control-file" id="create-image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-create">Agregar</button>
            </div>
        </div>
    </div>
</div>