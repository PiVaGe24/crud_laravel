<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Role</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('employeeIndex') }}" method="POST" id="deleteForm">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <div class="modal-body">
            <input type="hidden" name="_method" value="DELETE">
            <p>¿Estas seguro de eliminarlo? <span ><strong id="roleNameInModal"></strong></span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Yes! Delete Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>