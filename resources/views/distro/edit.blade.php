<div class="modal fade" id="edit-distro-modal" tabindex="-1" role="dialog" aria-labelledby="edit-distro-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-distro-modal-label">Agregar Distro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger edit-error" role="alert" style="display: none;">
                    <ul id="edit-errrors">
                    </ul>
                </div>
                <form id="formedit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="edit-name">Nombre:</label>
                        <input class="form-control" type="text" id="edit-name" placeholder="Escribe el nombre de la distro">
                    </div>
                    <div class="form-group">
                        <label for="edit-image">Imagen</label>
                        <img src="" alt="Imagen actual" id="edit-current-img" class="img-thumbnail">
                        <input type="file" class="form-control-file" id="edit-image">
                    </div>
                    <input type="hidden" id="edit-id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-edit">Agregar</button>
            </div>
        </div>
    </div>
</div>