$(document).ready(function(){

    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Quieres eliminar este personal?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value){
                if(result.isConfirmed) {
                    Swal.fire(
                        'Eliminado',
                        'El personal fue eliminado',
                        'success'
                    );
                }
                document.location.href = href;
            //     $.ajax({
            //         url: 'eliminarPersonal.php',
            //         type: 'POST',
            //         data: 'PersonalCodigo='+id,
            //         dataType: 'json'
            //     })
            //     .done(function(response){
            //         swal.fire('Eliminado!', response.message, response.status);
            //         fetch();
            //     })
            //     .fail(function(){
            //         swal.fire('Oops...', 'Ocurrio un error !', 'error');
            //     });
            }
        });
    });
});
