$(document).ready(function(){
	$('#enviarVal').click(function(){
		$('#enviarVal').attr("disabled", true);
		$('#enviarVal').attr("class", "botGenOff");
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