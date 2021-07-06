<form action="{{ route('SuperAdmin.'. $resource . '.destroy', $id) }}" method="post" class="eraser">
  @csrf
  @method('DELETE')

  <input class="btn btn-outline-danger my-1" type="submit" value="Cancella">
</form>