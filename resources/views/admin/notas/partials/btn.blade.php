<a href="{{ route('user_examenes.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
<a href="{{ route('user_examenes.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
<form action="{{ route('user_examenes.destroy', $id) }}" method="POST" style="display: inline" class="formulario-eliminar">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i>
    </button>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, bórralo!',
            cancelButtonText: '¡cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
                Swal.fire(
                    '¡Eliminado!',
                    'EL registro ha sido eliminado.',
                    'success'
                )
            }
        })
    });
</script>
