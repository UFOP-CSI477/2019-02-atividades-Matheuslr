function calculaRichter(){
    let amplitude = document.form.amplitude.value;
    let duracao = document.form.duracao.value;

    if(validar(amplitude, "alerta1") && validar(duracao, "alerta2")){
        let magnitude = Math.log10(amplitude) + 3*Math.log10(8*duracao) - 2.92;
        let classificacao = ""
        if(magnitude < 3.5){
            classificacao = "Geralmente não sentido, mas gravado." 
        }
        else if(magnitude >= 3.5 && magnitude < 5.5){
            classificacao = "Às vezes sentido, mas raramente causa danos."
        }
        else if(magnitude >= 5.5 && magnitude < 6){
            classificacao = "No máximo causa pequenos danos a prédios bem construídos, mas pode danificar seriamente casas mal construídas em regiões próximas."
        }
        else if(magnitude >= 6 && magnitude < 7){
            classificacao = "Pode ser destrutivo em áreas em torno de até 100 km do epicentro."
        }
        else if(magnitude >= 7 && magnitude < 8){
            classificacao = "Grande terremoto. Pode causar sérios danos numa grande faixa."
        }
        else if(magnitude > 8){
            classificacao = "Enorme terremoto. Pode causar graves danos em muitas áreas mesmo que estejam a centenas de quilômetros." 
        }

        document.resultado.magnitude.value = magnitude.toFixed(2);
        document.resultado.classificacao.value = classificacao
    }

}


function validarDelta(inicio, fim){
    if (fim < inicio){
        document.getElementById("alerta3").style.display = "block";

        campo.value = "";
        campo.focus();
        return false;

    }

    document.getElementById("alerta3").style.display = "none";
    return true
}


function validar(campo, alerta) {

    
    if (campo.length == 0 || isNaN(campo)) {

        document.getElementById(alerta).style.display = "block";

        campo.value = "";
        campo.focus();
        return false;

    }

    document.getElementById(alerta).style.display = "none";

    return true;

}