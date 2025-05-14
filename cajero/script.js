function realizarOperacion(operacion) {
    const monto = document.getElementById('monto').value;

    fetch('cajero.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `operacion=${operacion}&monto=${monto}`
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('respuesta').innerHTML = data;
        });
}