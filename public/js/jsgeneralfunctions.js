function exibirFlashMensage(tipo, texto) {
    var classe = "";
    var preTexto = "";
    switch (tipo) {
        case 'E':
            classe = "alert alert-danger";
            preTexto = "Erro!";
            break;
        case 'S':
            classe = "alert alert-success";
            preTexto = "Sucesso!";
            break;
        case 'W':
            classe = "alert alert-warning";
            preTexto = "Atenção!";
            break;
        case 'I':
            classe = "alert alert-info";
            preTexto = "Informação!";
            break;
    }
    $("#dsAlertsMsg").html("<strong>" + preTexto + "</strong> " + texto);
    $("#alerts").removeClass();
    $("#alerts").addClass(classe);
    $("#alerts").fadeIn('slow');
    $("#alerts").fadeOut(12000);
}

function formataTextMsg(texto) {
    return "<ul><li><font color='#000000'>" + texto + "</font></li></ul>";
}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla === 8 || tecla === 0) return true;
	else  return false;
    }
}

$(document).bind("contextmenu",function(e){
    return false;
});