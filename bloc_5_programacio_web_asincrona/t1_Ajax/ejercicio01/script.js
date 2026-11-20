
document.getElementById('cargarUsuarios').addEventListener('click', function () {
    fetch('usuarios.php')
        .then(response => {
            if (!response.ok) throw new Error('Error al cargar los datos');
            return response.text();
        })
        .then(data => {
            document.getElementById('div_usuarios').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
    });