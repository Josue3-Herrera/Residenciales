function eliminarTarjeta(idGasto) {
    // Aquí implementa la lógica para eliminar la tarjeta con el ID proporcionado
    // Por ejemplo:
    var tarjeta = document.getElementById('card_' + idGasto);
    if (tarjeta) {
        tarjeta.remove(); // Eliminar la tarjeta del DOM
    } else {
        console.error('Tarjeta no encontrada');
    }
}