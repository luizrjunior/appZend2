var DadosEtapas = {
    paginaAtual: null
};

function limparCamposRifas() {
    $("#idRifa").val('');
    $("#idUsuarioRifas").val(top.idUsuarioPerfil);
    $("#idUsuarioSelectRifas").val(top.idUsuarioPerfil);
    $("#nuInicio").val('1');
    $("#nuFinal").val('100');
    $("#qtPremio").val('1');
    $("#vlRifa").val('');
    $("#dtSorteio").val('');
    $("#dsInstituicao").val('');
    $("#dsPremio").val('');
    $("#dsObservacao").val('');
    $("#stPdf").val('2');
    
    $("#divSorteio").hide();
    $("#btnGerarPdfRifas").hide();
    $("#btnGerarPdfRifasTeste").hide();
    $("#btnGravarRifas").show();
    
    $("#divPremiacao").html('');
    $("#tituloRifas").html('Adicionar Rifa');
}

function carregarCamposRifas(json) {
    $("#idRifa").val(json.idRifa);
    $("#idUsuarioRifas").val(json.idUsuario);
    $("#idUsuarioSelectRifas").val(json.idUsuario);
    $("#nuInicio").val(json.nuInicio);
    $("#nuFinal").val(json.nuFinal);
    $("#qtPremio").val(json.qtPremio);
    $("#vlRifa").val(json.vlRifa);
    $("#dtSorteio").val(json.dtSorteio);
    $("#dsInstituicao").val(json.dsInstituicao);
    $("#dsPremio").val(json.dsPremio);
    $("#dsObservacao").val(json.dsObservacao);
    $("#stPdf").val(json.stPdf);
    
    if (json.stPdf === 1) {
        $("#divSorteio").show();
        $("#btnGravarRifas").hide();
        $("#btnGerarPdfRifas").hide();
        $("#btnGerarPdfRifasTeste").hide();
        carregarPremiacao();
    } else {
        $("#btnGravarRifas").show();
        $("#btnGerarPdfRifas").show();
        $("#btnGerarPdfRifasTeste").show();
    }
    
    $("#tituloRifas").html('Editar Rifa');
}

function selecionarRifas(idRifa) {
    $('#carregando').show();
    var url = top.basePath + '/rifas/index/selecionar';
    $.ajax({
        type: "POST",
        url: url,
        data: {
            idRifa: idRifa
        },
        dataType: "json",
        success: function (data) {
            limparCamposRifas();
            abrirTelaCadastroRifas();
            if (data.tipoMsg === "S") {
                carregarCamposRifas(data);
            }
            $('#carregando').hide();
        }
    });
}

function validarCamposRifas() {
    var chk = true;
    var texto = "<ul>";

    if ($("#nuInicio").val() === "") {
        texto += "<li><font color='#000000'>O campo <strong>\"Rifas de\"</strong> é de preechimento obrigatório.</font></li>";
        chk = false;
    }

    if ($("#nuFinal").val() === "") {
        texto += "<li><font color='#000000'>O campo <strong>\"até\"</strong> é de preechimento obrigatório.</font></li>";
        chk = false;
    } else {
        if ($("#nuFinal").val() < $("#nuInicio").val()) {
            texto += "<li><font color='#000000'>O campo <strong>\"até\"</strong> não pode ser menor que o campo <strong>\"Rifas de\"</strong>.</font></li>";
            chk = false;
        }
    }

    if ($("#qtPremio").val() === "") {
        texto += "<li><font color='#000000'>O campo <strong>\"Qtde. Prêmios\"</strong> é de preechimento obrigatório.</font></li>";
        chk = false;
    }

    if ($("#vlRifa").val() === "") {
        texto += "<li><font color='#000000'>O campo <strong>\"Valor da Rifa\"</strong> é de preechimento obrigatório.</font></li>";
        chk = false;
    }

    if ($("#dtSorteio").val() === "") {
        texto += "<li><font color='#000000'>O campo <strong>\"Data do Sorteio\"</strong> é de preechimento obrigatório.</font></li>";
        chk = false;
    }

    if ($("#dsPremio").val() === "") {
        texto += "<li><font color='#000000'>O campo <strong>\"Prêmios\"</strong> é de preechimento obrigatório.</font></li>";
        chk = false;
    }
    texto += "</ul>";

    if (chk === false) {
        Componentes.modalAlerta(texto, null);
        return chk;
    } else {
        return chk;
    }
}

function salvarRifas() {
    if (validarCamposRifas()) {
        $('#carregando').show();
        var postData = $('#formCadRifas').serializeArray();
        var formURL = top.basePath + '/rifas/index/salvar';
        $.ajax({
            type: "POST",
            url: formURL,
            data: postData,
            dataType: "json",
            success: function (data) {
                $('#carregando').hide();
                if (data.tipoMsg === "S") {
                    selecionarRifas(data.idRifa);
                    clicarPesquisarNovamenteRifas();
                }
                Componentes.modalAlerta(formataTextMsg(data.textoMsg), null);
            }
        });
    }
}

function abrirTelaCadastroRifasRifas() {
    $("#cadRifas").hide();
    $("#cadRifas").fadeIn("slow");
}

function abrirTelaCadastroRifas() {
    $("#cadRifas").hide();
    $("#cadRifas").fadeIn("slow");
}

function confirmarExcluirRifas(idRifa) {
    top.idRifa = idRifa;
    Componentes.modalConfirmacao(null, 'Tem certeza que deseja remover essa Rifa?', excluirRifas, null);
}

function excluirRifas() {
    var formURL = top.basePath + '/rifas/index/excluir';
    $.ajax({
        type: "POST",
        url: formURL,
        data: {idRifa: top.idRifa},
        dataType: "json",
        success: function (data) {
            $('#modalConfirmacao').modal('hide');
            clicarPesquisarNovamenteRifas();
            top.idRifa = null;
            Componentes.modalAlerta(data.textoMsg, null);
        }
    });
}

function abrirTelaPesquisaRifas() {
    $("#cadRifas").hide();
    $("#psqRifas").fadeIn("slow");
}

function abrirTelaCadastroRifas() {
    $("#psqRifas").hide();
    $("#cadRifas").fadeIn("slow");
}

function clicarPesquisarNovamenteRifas() {
    var pagina = $('#tableRifas').find('.active');
    Componentes.paginacaoGeral({
        div: 'tableRifas', //id da div onde sera reenderizada a tabela
        url: top.basePath + '/rifas/index/pesquisar-rifas', //url que sera usada para a pesquisa
        botaoBusca: 'btnPesquisarRifas',
        form: 'formPsqRifas',
        paginaAtual: pagina.attr('page'),
        executarOnReady: false
    });
}

function listarRifas() {
    Componentes.paginacaoGeral({
        div: 'tableRifas', //id da div onde sera reenderizada a tabela
        url: top.basePath + '/rifas/index/pesquisar-rifas', //url que sera usada para a pesquisa
        botaoBusca: 'btnPesquisarRifas',
        form: 'formPsqRifas',
        paginaAtual: DadosEtapas.pagina
    });
}

function carregarComboUsuarioRifas() {
    $.ajax({
        type: "POST",
        url: top.basePath + "/usuario/index/carregar-select-usuario",
        dataType: "json",
        success: function (data) {
            var optionsUsuario = "";
            $.each(data, function (key, value) {//percorro o array de etapas e confiro se o id da etapa == ao id da ultima etapa inserida e seto
                optionsUsuario += '<option ' + (top.idUsuario == key ? 'selected="selected"' : '') + ' value="' + key + '">' + value + '</option>';
            });
            $("#idUsuarioSelectPsqRifas").html(optionsUsuario);
            $("#idUsuarioSelectRifas").html(optionsUsuario);
        }
    });
}

function selecionarRifasUsuario(idUsuario) {
    top.idUsuario = idUsuario;
    $("#tituloRifasPsq").html('Pesquisar e Listar Rifas');
    $("#idUsuarioPsqRifas").val(idUsuario);
    carregarComboUsuarioRifas();
    setTimeout(listarRifas, 1000);
}

function confirmarGerarPdfRifas() {
    Componentes.modalConfirmacao(null, 'Depois de gerar o PDF, o sistema bloqueia as alterações nos dados da Rifa.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tem certeza que deseja gerar o PDF dessa Rifa?', gerarPdfRifas, null);
}

function gerarPdfRifas() {
    location.href = top.basePath + '/rifas/index/gerar-pdf-rifas/id/' + $("#idRifa").val();
    $('#modalConfirmacao').modal('hide');
    setTimeout(selecionarRifaGerarPdf, 1000);
}

function gerarPdfRifasTeste() {
    location.href = top.basePath + '/rifas/index/gerar-pdf-rifas-teste/id/' + $("#idRifa").val();
}

function selecionarRifaGerarPdf() {
    selecionarRifas($("#idRifa").val());
}

function carregarPremiacao() {
    $('#carregando').show();
    var postData = $('#formCadRifas').serializeArray();
    var formURL = top.basePath + '/rifas/index/carregar-premiacao';
    $.ajax({
        type: "POST",
        url: formURL,
        data: postData,
        dataType: "json",
        success: function (data) {
            var divPremiacao = "";
            var stFinalizado = data[0].stFinalizado;
            $.each(data, function (key, value) {
                
                if (value.stFinalizado === 2) {
                    divPremiacao += '<table cellpadding=\'0\' cellspacing=\'0\' border=\'0\' class=\'table table-bordered\' width=\'100%\'>';
                        divPremiacao += '<tbody>';
                            divPremiacao += '<tr>';
                                divPremiacao += '<td style=\'text-align:center;\'>';
                                    divPremiacao += '<h1>' + value.nuPremio + 'º Prêmio</h1>';
                                divPremiacao += '</td>';
                                divPremiacao += '<td style=\'text-align:center;\'>';
                                    divPremiacao += '<h1>Rifa nº <span id=\'nuSorteado\' class=\'label label-default\'>' + value.nuRifa + '</span></h1>';
                                divPremiacao += '</td>';
                                divPremiacao += '<td style=\'text-align:center;\'><br/>';
                                    divPremiacao += '<button type=\'button\' class=\'btn btn-default btn-sm\' id=\'btnSortearPremio\' onclick=\'sortearRifasPremio(' + value.nuPremio + ')\' ' + value.disabled + '>';
                                        divPremiacao += '<span class=\'glyphicon glyphicon-retweet\' aria-hidden=\'true\'></span> Sortear';
                                    divPremiacao += '</button>';
                                divPremiacao += '</td>';
                                divPremiacao += '<td style=\'text-align:center;\'><br/>';
                                    divPremiacao += '<button type=\'button\' class=\'btn btn-default btn-sm\' id=\'btnSortearPremio1\' onclick=\'gravarRifaPremiada(' + value.nuPremio + ')\' ' + value.disabled + '>';
                                        divPremiacao += '<span class=\'glyphicon glyphicon-floppy-disk\' aria-hidden=\'true\'></span> Gravar';
                                    divPremiacao += '</button>';
                                divPremiacao += '</td>';
                            divPremiacao += '</tr>';
                        divPremiacao += '</tbody>';
                    divPremiacao += '</table>';
                }
                    
            });
            if (stFinalizado === 1) {
                divPremiacao += '<table cellpadding=\'0\' cellspacing=\'0\' border=\'0\' class=\'table table-bordered\' width=\'100%\'>';
                        divPremiacao += '<tbody>';
                            divPremiacao += '<tr>';
                                divPremiacao += '<td style=\'text-align:center;\'>';
                                    divPremiacao += '<h1>Sorteio Finalizado</h1>';
                                divPremiacao += '</td>';
                            divPremiacao += '</tr>';
                        divPremiacao += '</tbody>';
                    divPremiacao += '</table>';
            }
            $("#divPremiacao").html(divPremiacao);
            $('#carregando').hide();
        }
    });
}

function sortearRifasPremio() {
    $('#carregando').show();
    var postData = $('#formCadRifas').serializeArray();
    var formURL = top.basePath + '/rifas/index/sortear-rifas';
    $.ajax({
        type: "POST",
        url: formURL,
        data: postData,
        dataType: "json",
        success: function (data) {
            $('#carregando').hide();
            if (data.nuSorteado !== null) {
                $('#nuSorteado').html(data.nuSorteado);
                $('#nuRifa').val(data.nuSorteado);
            } else {
                sortearRifasPremio();
            }
        }
    });
}

function validarCamposPremiado() {
    var chk = true;
    var texto = "<ul>";

    if ($("#nuRifa").val() === "") {
        texto += "<li><font color='#000000'>Sortear o número da rifa antes de gravar.</font></li>";
        chk = false;
    }

    texto += "</ul>";

    if (chk === false) {
        Componentes.modalAlerta(texto, null);
        return chk;
    } else {
        return chk;
    }
}

function gravarRifaPremiada(nuPremio) {
    if (validarCamposPremiado()) {
        $('#carregando').show();
        $('#nuPremio').val(nuPremio);
        var postData = $('#formCadRifas').serializeArray();
        var formURL = top.basePath + '/rifas/index/gravar-rifa-premiada';
        $.ajax({
            type: "POST",
            url: formURL,
            data: postData,
            dataType: "json",
            success: function (data) {
                $('#carregando').hide();
                $('#nuPremio').val('');
                $('#nuRifa').val('');
                Componentes.modalAlerta(data.textoMsg, null);
                carregarPremiacao();
            }
        });
    }
}

$(document).ready(function () {
    $('.guiMoneyMask').bind('input', function () {
        guiMoneyMask();
    });
    
    $("#cadRifas").hide();
    $("#psqRifas").fadeIn("slow");
    if (top.tpUsuarioPerfil !== '1') {
        $("#idUsuarioSelectPsqRifas").prop('disabled', true);
    }
    $("#idUsuarioSelectRifas").prop('disabled', true);

    $('#dtInicioPsq').datepicker({
       todayHighlight:true,
       autoclose:true,
       format: 'dd/mm/yyyy',
       todayHighLight:true
    });
    
    $('#dtFinalPsq').datepicker({
       todayHighlight:true,
       autoclose:true,
       format: 'dd/mm/yyyy',
       todayHighLight:true
    });
    
    $('#dtSorteio').datepicker({
       todayHighlight:true,
       autoclose:true,
       format: 'dd/mm/yyyy',
       todayHighLight:true
    });
    
    $('#nuInicio').on('keypress', function (event) {
        return SomenteNumero(event);
    });

    $('#nuFinal').on('keypress', function (event) {
        return SomenteNumero(event);
    });

    $('#qtPremio').on('keypress', function (event) {
        return SomenteNumero(event);
    });

    $('#btnNovoRifas').on('click', function () {
        limparCamposRifas();
        abrirTelaCadastroRifas();
    });

    $('#btnNovoCadRifas').on('click', function () {
        limparCamposRifas();
    });

    $('#btnGravarRifas').on('click', function () {
        salvarRifas();
    });

    $('#btnGerarPdfRifasTeste').on('click', function () {
        gerarPdfRifasTeste();
    });

    $('#btnGerarPdfRifas').on('click', function () {
        confirmarGerarPdfRifas();
    });

    $('#btnVoltarCadRifas').on('click', function () {
        abrirTelaPesquisaRifas();
    });
    selecionarRifasUsuario(top.idUsuarioPerfil);
});