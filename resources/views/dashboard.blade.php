<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('RESERVAS') }}
        </h2>
    </x-slot>

    <div class="fotoPista">
                    
    </div>

    <div id="reservas" class="cartaReservas">
            <label class="form-label" for="pista">Pista:</label><br>
            <select class="form-select" name="pista" id="pista">
                <option selected value="empty">--Seleccionar--</option>
                <option  value="Pista 1">Pista 1</option>
                <option  value="Pista 2">Pista 2</option>
                <option  value="Pista 3">Pista 3</option>
                <option  value="Pista 4">Pista 4</option>

            </select><br><br> 
        
            <label class="form-label" for="dia">Dia:</label><br>
            <select class="form-select" name="dia" id="dia">
                <?php
                $hoy = date('d-m-Y');
                $mañana = date('d-m-Y', strtotime($hoy . '+ 1 days'));
                $pasado = date('d-m-Y', strtotime($mañana . '+ 1 days'));
                ?>
                <option selected value="empty">--Seleccionar--</option>
                <option value="{{ $hoy }}">{{ $hoy }}</option>
                <option value="{{ $mañana }}">{{ $mañana }}</option>
                <option value="{{ $pasado }}">{{ $pasado }}</option>
    
            </select><br><br>

           

            <label class="form-label" for="hora">Hora:</label><br>
            <select class="form-select" name="hora" id="hora">
                <option selected value="empty">--Seleccionar--</option>
            </select><br><br>


              
            <input type="hidden" id="email" name="email" value="{{ Auth::user()->email }}">
            <button id="boton" style="margin-top: 20px;" class="botones">Reservar pista</button>
       

    


           
    </div>

    

    <script src="../resources/js/dashboard.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../resources/js/peticion1.js"></script>
   
</x-app-layout>
{{-- <div class="container text-center my-5">
    <h1>RESERVAS</h1>
</div> --}}
