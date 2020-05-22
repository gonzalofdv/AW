var contador = 0;

$(document).ready(function() {

    $(".responderComent").click(function(){
        id = $(this).attr("id");
        id2 = id.substr(15, 1);
        if(contador < 1){
            contador++;
        $(this).before('<form action="javascript:void(0);" class="formRespuesta"><input type="text" id="resp'+id2+'"/><button class="enviarComent" id="'+id2+'">✔</button></form>');
        $(this).before('<button class="cerrarComent">❌</button>');
        $(this).hide();
        }
    });

    $(document).on('click', '.enviarComent', function(){
        id = $(this).attr("id");
        contador--;
        $(".cerrarComent").hide();
        $("#responderComent"+id+"").show();
        $(".formRespuesta").hide();
        var texto = $(this).parent("form").find("#resp"+id+"").val();
        var idComentario = $("#responderComent"+id+"").val();
        if(texto == ""){
            alert("¡Has dejado vacío el campo de texto! Debes rellenarlo");
        }
        else{
            $.ajax({
                type:"POST",
                url: "procesarRespuestasComentario.php",
                data: {texto:texto, idComentario:idComentario},
                success:function(r){
                    $('#respuestas'+id+'').html(r);
                }
            });
        }
    });


    $(document).on('click', '.cerrarComent', function(){
    	contador--;
        $(this).hide();
        $(".responderComent").show();
        $(".formRespuesta").hide();
    });

});