

 $('.camposExtras').hide() &&  $('.teste').hide()
 $('input[name="EstudanteMobOut_auxilioFinanceiro"]').change(function () {
 if ($('input[name="EstudanteMobOut_auxilioFinanceiro"]:checked').val() === "Sim") {
     $('.camposExtras').show();
    
 } else {
     $('.camposExtras').hide();
     $('.teste').hide()
 }

 $('input[name="Outros"]').change(function () {

     if ($('input[name="Outros"]:checked').val() === "Outros") {
     $('.teste').show();
     
    }
  
    else{
        $('.teste').hide()
    }
   
 });

});

$('.CargoTecnico').hide();
$('.CargoProfessor').hide();
window.onload=function(){
    document.getElementById('cargo').addEventListener('change', function () {
        if (this.value == 'Tecnico') {
            $('.CargoTecnico').show();
            $('.CargoProfessor').hide();
        }else if(this.value == 'Professor'){
            var style2 = this.value == 'Professor' ? 'block' : 'none';
            $('.CargoProfessor').show();
            $('.CargoTecnico').hide();
        }
      
    });
 }
 $('.motivoMob').hide();
 window.onload=function(){
    document.getElementById('Servidor_MotivoMob').addEventListener('change', function () {
        if (this.value == 'Outros') {
            $('.motivoMob').show();
        }
        else{
            $('.motivoMob').hide();
        }
    })};


    




