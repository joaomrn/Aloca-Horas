/*CRONOMETRO*/

var centesimas = 0;
var segundos = 0;
var minutos = 0;
var horas = 0;
function inicio() {
    control = setInterval(cronometro, 10);
    document.getElementById("inicio").disabled = true;
    document.getElementById("parar").disabled = false;
    document.getElementById("continuar").disabled = true;
}
function parar() {
    clearInterval(control);
    document.getElementById("parar").disabled = true;
    document.getElementById("continuar").disabled = false;
    AbrirModal();
}
function cronometro() {
    if (centesimas < 99) {
        centesimas++;
        if (centesimas < 10) {
            centesimas = "0" + centesimas
        }
        Centesimas.innerHTML = ":" + centesimas;
    }
    if (centesimas == 99) {
        centesimas = -1;
    }
    if (centesimas == 0) {
        segundos++;
        if (segundos < 10) { segundos = "0" + segundos }
        Segundos.innerHTML = ":" + segundos;
    }
    if (segundos == 59) {
        segundos = -1;
    }
    if ((centesimas == 0) && (segundos == 0)) {
        minutos++;
        if (minutos < 10) { minutos = "0" + minutos }
        Minutos.innerHTML = ":" + minutos;
    }
    if (minutos == 59) {
        minutos = -1;
    }
    if ((centesimas == 0) && (segundos == 0) && (minutos == 0)) {
        horas++;
        if (horas < 10) { horas = "0" + horas }
        Horas.innerHTML = horas;
    }
}

(function($){

   AbrirModal = function () {
       $('#novaPausaTarefa').modal('show');
    };
})(jQuery);

(function($) {
    salvarPausa = function() {

        $('#novaPausaTarefa').modal('hide');
        var tipoPausa = $('#slTipoPausa').val();
        var descricaoPausa = $('#ipDescricao').val();

        var Horas = document.getElementById("Horas").innerHTML
        var Minutos = document.getElementById("Minutos").innerHTML
        var Segundos = document.getElementById("Segundos").innerHTML
        var Centesimas = document.getElementById("Centesimas").innerHTML

        var data = new Date();


        //console.log(nomeRobo);
        var newRow = $("<tr>");
        var cols = "";

        var dataFormatada = data.getDay() + '/' + data.getMonth() + '/' + data.getFullYear()
        cols += '<td>' + tipoPausa + '</td>' + '<td>' + descricaoPausa + '</td>' + '<td>' + Horas + '' + Minutos + '' + Segundos + '' + Centesimas + '</td>';

        newRow.append(cols);
        $("#table_tarefa").append(newRow);
        
        FecharModal();
        
        return false;
    };
})(jQuery);

(function($){

    FecharModal = function () {
        $('#novaPausaTarefa').modal('hide');
        jQuery('#slTipoPausa').prop('selectedIndex',0);
        $('#ipDescricao').val('');
     };
 })(jQuery);