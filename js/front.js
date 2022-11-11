

 $('.camposExtras').hide() && $('.teste').hide();
 $('input[name="EstudanteMobOut_auxilioFinanceiro"]').change(function () {
 if ($('input[name="EstudanteMobOut_auxilioFinanceiro"]:checked').val() === "Sim") {
     $('.camposExtras').show();
 } else {
     $('.camposExtras').hide();
     $('.teste').hide()
 }


 
 $('input[name="Outros"]').change(function() {

    if ($('input[name="Outros"]:checked').val() === "Outro") {
        $('.teste').show();
    }
  
        else{
            $('.teste').hide()
        }
   

});
});