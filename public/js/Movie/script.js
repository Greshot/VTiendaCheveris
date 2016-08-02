function MostrarPelicula(btn) {
    var ruta = "/movie/" + btn.value;
    $.get(ruta, function (movie) {
        $("#titulo").text(movie.titulo);
        $("#descripcion").text(movie.descripcion);
        $("#fecha").text(movie.fecha);
        $("#cantidad").text(movie.cantidad);
    });
}