let boton = document.getElementById('boton');

boton.addEventListener('click', mostrarAlert);


function mostrarAlert() {
    let dia = document.getElementById('dia').value;
    let hora = document.getElementById('hora').value;
    let pista = document.getElementById('pista').value;
    let email = document.getElementById('email').value;

    if (dia == 'empty' || hora == 'empty'  || pista == 'empty' ) {
        console.log('entra');
        Swal.fire(
            'Debes completar todos los campos',
            '',
            'error'
          );
    }else{
        console.log('no');
        Swal.fire({
            title: 'Reservar Pista',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'reservaConfirmada?dia=' + dia + '&pista=' + pista + '&hora=' + hora + '&email=' + email;
            }
        })
    }

    

}
if (location.href.includes('reservaConfirmada')) {
    location.href = './dashboard';
}



