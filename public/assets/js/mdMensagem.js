function mensagem(titulo, texto) {
    bootbox.dialog({
        message: texto,
        title: titulo,
        closeButton: false,
        buttons: {
            success: {
                label: "Ok!",
                className: "btn-success"
            }
        }

    });
}

function confirm(titulo, texto, callback) {
    bootbox.dialog({
        message: texto,
        title: titulo,
        buttons: {
            success: {
                label: "Sim",
                className: "btn-success",
                callback: function () {
                    callback(true);
                }
            },
            danger: {
                label: "Não",
                className: "btn-danger",
                callback: function () {
                    callback(false);
                }
            }
        }
    });
}
//function mensagem(titulo, texto) {
//    $('#mdMsgTitulo').html(titulo);
//    $('#mdMsgTexto').html(texto);
//    $('#mdMensagem').modal('show');
//}
//
//function fechaMensagem() {
//    $('#mdMensagem').modal('hide');
//}