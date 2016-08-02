function showClient(btn) {
    var ruta = "/client/" + btn.value;
    $.get(ruta, function (client) {
        $("#ide").text(client.identificacion);
        $("#nombre").text(client.nombre);
        $("#direccion").text(client.direccion);
        $("#telefono").text(client.telefono);
        $("#email").text(client.email);
    });
}