$(document).ready(function(){

    $('.FormularioAjax').submit(function(e) {
        e.preventDefault();

        var form = $('form').get(0);
        var formu = $(this);

        var tipo = formu.attr('data-form');
        var accion = formu.attr('action');
        var metodo = formu.attr('method');
        var respuesta = formu.children('.RespuestaAjax');

        var msjError = "<script>new swal('Ocurrió un error inesperado', 'Por favor actualice la página', 'error');</script>";


        new swal({
            title: "Comprobando...",
            icon: "question",
            iconHtml: '<div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>',
            showConfirmButton: false,
            timer: 3000
        }).then(function() {
            $.ajax({
                url: accion,
                type: metodo,
                data: new FormData(form),
                processData: false,
                contentType: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if(evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            if(percentComplete < 100) {
                                respuesta.append('<p class="text-center">Procesando... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
                            } else {
                                respuesta.html('<p class="text-center"></p>');
                            }
                        }
                    }, false);
                    return xhr;
                },
                success: function(data) {
                    respuesta.html(data);
                },
                error: function() {
                    respuesta.html(msjError);
                }
            });
            return false;
        });
    });
});
