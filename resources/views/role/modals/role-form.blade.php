<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="roleForm" method="POST">
                @csrf
                @method('POST') <!-- Usar POST por defecto, cambiará a PUT cuando sea necesario -->
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="role_id" id="role_id" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Role <span ><strong id="roleNameEdit"></strong></span></label>
                        <input id="role_name" name="role_name" type="text" class="form-control" tabindex="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>