$(function() {
    $('#dia').on('change', cambiaSelectHoras);
    $('#pista').on('change', cambiaSelectHoras);
});


function cambiaSelectHoras() {
    let pista = $('#pista').val();
    let dia = $(this).val();
    let horas = ['08:00:00','09:30:00','11:00:00','12:30:00','14:00:00','15:30:00','17:00:00','18:30:00','20:00:00','22:30:00'];
    let selectHoras = document.getElementById('hora');
    let option ='';
    $.get('./api/dia/'+dia+'/pista/'+pista+'/horas', function(data) {
        function removeItemFromArr ( arr, item ) {
            var i = arr.indexOf(item);
            arr.splice( i, 1 );
        }
         
        
        for (let i = 0; i < data.length; i++) {
            removeItemFromArr(horas, data[i].hora );
        }
        for (let i = 0; i < horas.length; i++) {
            option += "<option value='"+horas[i]+"'>"+horas[i]+"</option>";
            
            
        }
        selectHoras.innerHTML=option;
        
    })
}

