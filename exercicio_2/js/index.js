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


function calcularIMC(){

    let altura = parseFloat(document.form.altura.value)
    let peso = parseFloat(document.form.peso.value)
    if (validar(peso, "alerta1") && validar(altura, "alerta2")){
        let imc = parseFloat(peso/Math.pow(altura, 2));
        let descricao = ""


        if(imc < 18.5){
            descricao = "Subnutrição";
        }
        else if (imc >= 18.5 && imc <= 24.9){
            descricao = "Peso Saudável";
        }
        else if (imc >= 25 && imc <= 29.9){
            descricao = "Sobrepeso";
        }
        else if (imc >= 30 && imc <= 34.9){
            descricao = "Obesidade grau 1";
        }
        else if (imc >= 35 && imc <= 39.9){
            descricao = "Obesidade grau 2";
        }
        else if (imc >= 40){
            descricao = "Obesidade grau 3";
        }

        console.log(imc)
        console.log(descricao)

        let peso_minimo_ideal = 18.5 * Math.pow(altura, 2);
        let peso_maximo_ideal = 24.9 * Math.pow(altura, 2);
        document.resultado.imc.value = Math.round(imc);
        document.resultado.classificacao.value = descricao;
        document.resultado.peso_ideal.value = Math.round(peso_minimo_ideal, 2) + "kg até " + Math.round(peso_maximo_ideal, 2) +"kg";
    }
}
