function verificarEstadoVencimiento(idGasto) {
    var tarjeta = document.getElementById('card_' + idGasto);
    if (tarjeta) {
        var fechaExpStr = tarjeta.dataset.fechaExp;
        console.log('fechaExpStr:', fechaExpStr);
        
        // Verificar si fechaExpStr es válido
        if (fechaExpStr) {
            var partes = fechaExpStr.split('-');
            var fechaExp = new Date(partes[0], partes[1] - 1, partes[2]);
            console.log(fechaExpStr, fechaExp);
            var fechaActual = new Date(new Date().setHours(0, 0, 0, 0));
            console.log('fechaActual:', fechaActual);

            if (fechaExp.getTime() < fechaActual.getTime()) {
                tarjeta.classList.add('vencido');
                tarjeta.classList.remove('pendiente');
            } else {
                tarjeta.classList.add('pendiente');
                tarjeta.classList.remove('vencido');
            }
        } else {
            console.error("Fecha de vencimiento no válida");
        }
    } else {
        console.error("Card not found");
    }
}