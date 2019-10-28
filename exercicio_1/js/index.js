function inserirLinha(){

    let largada = parseInt(document.form.largada.value);
    let competidor = document.form.competidor.value;
    let tempo = parseFloat(document.form.tempo.value);
    
    if (validarNome(competidor, "alerta1","label1" ) && validar(largada, "alerta2", "label2") && validar(tempo, "alerta3","label3" ) && validarTamanhoTabela()){
            let tabela = document.getElementById("tabela");
            let linha = tabela.insertRow(1);
            let celula1 = linha.insertCell(0);
            let celula2 = linha.insertCell(1);
            let celula3 = linha.insertCell(2);
            let celula4 = linha.insertCell(3);
            celula1.innerHTML = "1";
            celula2.innerHTML = largada;
            celula3.innerHTML = competidor;
            celula4.innerHTML = tempo;
            sortTable();
    }
}


function sortTable() {
    var tabela, linhas, trocar, i, x, y, deveTrocar;
    tabela = document.getElementById("tabela");
    trocar = true;
    while (trocar) {
      trocar = false;
      linhas = tabela.rows;
      for (i = 1; i < (linhas.length - 1); i++) {
        deveTrocar = false;
        x = linhas[i].getElementsByTagName("TD")[3];
        y = linhas[i + 1].getElementsByTagName("TD")[3];
        if (Number(x.innerHTML) > Number(y.innerHTML)) {
          deveTrocar = true;
          break;
        }
      }
      if (deveTrocar) {
        linhas[i].parentNode.insertBefore(linhas[i + 1], linhas[i]);
        trocar = true;
      }
    }
  }

  
function validar(campo, alerta, label) {

    
    if (campo.length == 0 || isNaN(campo)) {

        document.getElementById(alerta).style.display = "block";

        document.getElementById(label).classList.add("text-danger");

        campo.value = "";
        campo.focus();
        return false;

    }

    document.getElementById(alerta).style.display = "none";

    return true;

}


function validarNome(campo, alerta, label) {

    
    if (campo.length == 0 ) {

        document.getElementById(alerta).style.display = "block";

        document.getElementById(label).classList.add("text-danger");

        campo.value = "";
        campo.focus();
        return false;

    }

    document.getElementById(alerta).style.display = "none";

    return true;

}

function validarTamanhoTabela(){
    let tamanhoTabela = document.getElementById("tabela").rows.length;
    console.log(tamanhoTabela)
    if (tamanhoTabela > 6) {
        console.log("oi")
        document.getElementById("alerta4").style.display = "block";

        document.getElementById("label4").classList.add("text-danger");

        campo.value = "";
        campo.focus();
        return false;

    }

    document.getElementById("alerta4").style.display = "none";

    return true;
}
