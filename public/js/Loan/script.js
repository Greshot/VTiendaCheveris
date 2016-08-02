function seleccionarPelicula(btn) {
    var ruta = "/movie/" + btn.value;
    $.get(ruta, function (data) {
        console.log(data);
        $('#PeliculasModal').modal('toggle');
        $('input[name=pelicula_id]').val(data.id);
        $('input[name=titulo]').val(data.titulo);
        $('input[name=descripcion]').val(data.descripcion);
        $('input[name=fecha]').val(data.fecha);
        $('#labelCantidad').text('Cantidad: (' + data.cantidad + ' en stock)');
        $('input[name=maxCantidad]').val(data.cantidad);
        $('input[name=cantidad]').val(1);
    });
}

$('#adicionarPelicula').on('click', function () {
    var permitido = true;
    if (parseFloat($('input[name=cantidad]').val()) > parseFloat($('input[name=maxCantidad]').val())) {
        alert("Solo quedan " + $('input[name=maxCantidad]').val() + " unidades de " + $('input[name=titulo]').val() +
            " en stock y se está intentando hacer un prestamo " +
            "de " + $('input[name=cantidad]').val() + " unidades");
        permitido = false;
    }
    if ($('input[name=pelicula_id]').val() == "") {
        alert("No ha seleccionado ninguna película para añadir al prestamo");
        permitido = false;
    } else {
        $("#peliculasPrestamo td.idP").each(function () {
            var tdContent = $(this).text();
            if ($('input[name=pelicula_id]').val() == tdContent) {
                alert("Esta Pelicula ya ha sido registrada, si quiere modificar la cantidad , por favor " +
                    "eliminela del listado de películas en el prestamo e ingresela de nuevo");
                permitido = false;
            }
        });
    }

    if (permitido == true) {
        var id = $('input[name=pelicula_id]').val();
        var titulo = $('input[name=titulo]').val();
        var cantidad = $('input[name=cantidad]').val();
        $('#peliculasPrestamo').append(
            '<tr class="text-center">' +
            '<td class="idP" style="display: none"><input name="idP[]" type="hidden" value="' + id + '">' + id + '</td>' +
            '<td>' + titulo + '</td>' +
            '<td><input name="cantidadP[]" type="hidden" value="' + cantidad + '">' + cantidad + '</td>' +
            '<td> <button class="btn btn-danger" type="button" id="eliminarPelicula">X</button></td>' +
            '</tr>'
        );
    }
});

$(document).on('click', '#eliminarPelicula', function () {
    var whichtr = $(this).closest("tr");
    whichtr.remove();
});

function MostrarPrestamo(btn) {
    var ruta = "/loan/" + btn.value;
    $.get(ruta, function (response) {
        $('#loan').html(response);
    });
}

$('#saveLoan').submit(function () {
    var productos = $("#peliculasPrestamo > tr").length
    if (productos < 1) {
        alert("No tiene ninguna pelicula registrada para el prestamo, por favor agregue al menos una");
        return false;
    }
});