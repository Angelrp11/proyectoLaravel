<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('RESERVAS') }}
        </h2>
    </x-slot>

    <div class="fotoPista">
                    
    </div>

    <div class="cartaReservas">
        
            <label class="form-label" for="dia">Dia:</label><br>
            <select class="form-select" name="dia" id="dia">
                <?php
                $hoy = date('d-m-Y');
                $mañana = date('d-m-Y', strtotime($hoy . '+ 1 days'));
                $pasado = date('d-m-Y', strtotime($mañana . '+ 1 days'));
                ?>
                <option value="{{ $hoy }}">{{ $hoy }}</option>
                <option value="{{ $mañana }}">{{ $mañana }}</option>
                <option value="{{ $pasado }}">{{ $pasado }}</option>
    
            </select><br><br>
            <label class="form-label" for="hora">Hora:</label><br>
            <select class="form-select" name="hora" id="hora">
                <?php
                $horas = ['8:00', '9:30', '11:00', '12:30', '14:00', '15:30', '17:00', '18:30', '20:00', '21:30', '23:00'];
                    foreach ($horas as $hora) {
                ?>
                <option value="{{ $hora }}">{{ $hora }}</option>
                <?php
                    }
                ?>
            </select><br><br>
            <label class="form-label" for="pista">Pista:</label><br>
            <select class="form-select" name="pista" id="pista">
                <option value="1">Pista 1</option>
                <option value="2">Pista 2</option>
                <option value="3">Pista 3</option>
                <option value="4">Pista 4</option>
    
            </select><br><br>   
            <input type="hidden" id="email" name="email" value="{{ Auth::user()->email }}">
            <button id="boton" style="margin-top: 20px;" class="botones">Reservar pista</button>
       

        <script>
            let boton = document.getElementById('boton');

            boton.addEventListener('click', mostrarAlert);
            

            function mostrarAlert() {
                let dia = document.getElementById('dia').value;
                let hora = document.getElementById('hora').value;
                let pista = document.getElementById('pista').value;
                let email = document.getElementById('email').value;

                Swal.fire({
                    title: 'Reservar Pista',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'reservaConfirmada?dia='+dia+'&pista='+pista+'&hora='+hora+'&email='+email;
                        

                    }
                })
                
            }
            if (location.href.includes('reservaConfirmada')) {
               location.href='./dashboard'; 
            }

            // if (location.href.includes('usuario')) {
            //    location.href='./public'; 
            // }else{
            //     console.log('No');
            // }
            
            function mostrarAlert2() {
                let mensajeError = document.getElementById('mensaje');

                mensajeError.innerHTML = 'Registrate o inicia sesion';
                mensajeError.style.color = "red";
               
            }
            
        </script>


    </div>

</x-app-layout>
{{-- <div class="container text-center my-5">
    <h1>RESERVAS</h1>
</div> --}}
