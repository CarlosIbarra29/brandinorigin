$(document).ready(function () {
    $('#id_deparatamento').on('change', function () {
        if ($('#id_deparatamento').val() == "") {
            $('#producto').empty();
            $('<option value = "">Selecciona un Producto</option>').appendTo('#producto');
            $('#producto').attr('disabled', 'disabled');
        } else {
            $('#producto').removeAttr('disabled', 'disabled');
            $('#producto').load('producto_get.php?id_deparatamento=' + $('#id_deparatamento').val());
        }
    });
});

