

 $('.camposExtras').hide() && $('.teste').hide();
 $('input[name="inlineRadio"]').change(function () {
 if ($('input[name="inlineRadio"]:checked').val() === "Sim") {
     $('.camposExtras').show();
 } else {
     $('.camposExtras').hide();
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