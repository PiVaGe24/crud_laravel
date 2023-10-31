<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Role <span ><strong id="roleNameEdit"></strong></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/role/{{ $roles->id }}" method="POST" id="editForm">
          {{ csrf_field()}}
          {{ method_field('PUT') }}
          <div class="modal-body">
            @csrf
            <input type="hidden" name="id" id="id" value="">
            <div class="mb-3">
                <label for="" class="form-label">Role Name </label>
                <input id="role_name" name="role_name" type="text" class="form-control" tabindex="1">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">
              
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>