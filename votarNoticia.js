$(document).ready(function(){
	$('#enviarVal').click(function(){
		var datos = $('#valorar').serialize();
		$.ajax({
			type:"POST",
			url: "procesarVotacion.php",
			data:datos,
			success:function(r){
				$('#probando').html(r);
			}
		});
	});

});