

 $('.camposExtras').hide() && $('.teste').hide();
 $('input[name="EstudanteMobOut_auxilioFinanceiro"]').change(function () {
 if ($('input[name="EstudanteMobOut_auxilioFinanceiro"]:checked').val() === "Sim") {
     $('.camposExtras').show();
 } else {
     $('.camposExtras').hide();
     $('.teste').hide()
 }


 
 $('select[name="inputState"]').change(function() {
 if(this.value == "Outro"){
    $('.teste').show();
 }
 else {
    $('.teste').hide()
 }
   

});
});