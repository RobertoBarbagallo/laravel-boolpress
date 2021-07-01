<form action="{{ route('admin.posts.destroy', $id) }}" method="post" class="eraser">
  @csrf
  @method('DELETE')

  <input type="submit" value="Cancella">
</form>