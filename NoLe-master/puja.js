$(document).ready(function(){

  $('.popupCloseButton').click(function(){
      $('.popupPuja').hide();
      $('.popupImagen').hide();
  });
  $(".puja").click(function(){
     	$('.popupPuja').show();
  });
  $(".thumbnail").click(function(){
      $('.popupImagen').show();
  });
  $("#opt").change(function(){
  	var selected_value = $("input[name='puja']:checked").val();
  	if (selected_value == 'dinero') {
     		$('.popupPujaDin').show();
     		$('.popupPujaProd').hide();
     		$('.popupPujaDinProd').hide();
  	}
  	else if(selected_value == 'producto'){
    		$('.popupPujaDin').hide();
       	$('.popupPujaProd').show();
       	$('.popupPujaDinProd').hide();
  	}
  	else{
      	$('.popupPujaDin').hide();
        $('.popupPujaProd').hide();
        $('.popupPujaDinProd').show();
  	}
  });
});