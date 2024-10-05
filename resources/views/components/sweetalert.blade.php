<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); 
            Swal.fire({
                title: '¿Estas seguro de eliminar este registro?',
                text: "¡No podras revertir esta accion!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });
    });
</script>