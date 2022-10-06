


jQuery(function(){

    jQuery("#MobOutEstudante").on("click", function(){
        $("#fluid").load( "./app/View/FormsMobilidadeOutEst.php" ); // carrega o formulario de mobilidade out estudante

        return false;
    });
    jQuery("#MobOutProfessor").on("click", function(){
        $("#fluid").load( "./app/View/FormsMobilidadeOutProf.php" ); // carrega o formulario de mobilidade out professores

        return false;
    });
    jQuery("#MobInEstudante").on("click", function(){
        $("#fluid").load( "./app/View/FormsMobilidadeInEst.php" ); // carrega o formulario de mobilidade in estudante

        return false;
    });
    jQuery("#MobInProfessor").on("click", function(){
        $("#fluid").load( "./app/View/FormsMobilidadeInProf.php" ); // carrega o formulario de mobilidade in professores e tecnicos

        return false;
    });
    jQuery("#AcordoInter").on("click", function(){
        $("#fluid").load( "./app/View/FormsAcordoInter.php" ); // carrega o formulario de acordo internacional

        return false;
    });
    // jQuery("#AcordoInternacional").on("click", function(){
    //     $("#fluid").load( "./app/View/AcordosInternacionais.html" ); // carrega a pagina inicial de Acorods Internacionais

    //     return false;
    // });
 
 });


