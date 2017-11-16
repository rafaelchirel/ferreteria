function sorteo(z) {
    var a = document.getElementById("descripcion").value;
    if (z == 1) {
        if (!isNaN(a) || a == null || a.length == 0) {
            document.getElementById("error").className = "oculto";
            document.getElementById("error3").className = "visible";
            var b = document.getElementById("inputError2").value = a;
            document.getElementById("error2").className = "error1";
            return false;
        }
    } else if (z == 2) {
        document.getElementById("error").className = "visible";
        document.getElementById("error3").className = "oculto";
        document.getElementById("error2").className = "oculto";
        document.getElementById("descripcion").value = "";
    }
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [08, 7, 39, 46, 13, 32];
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for (i = 0; i < tam; i++) {
        if (!isNaN(val[i]))
            document.getElementById("miInput").value = '';
    }
}

function solonum() {
    if (event.keyCode < 48 || event.keyCode > 57 || event.keyCode == 13)
        event.returnValue = false;
}

var formatNumber = {
    separador: ".", // separador para los miles
    sepDecimal: ',', // separador para los decimales
    formatear: function (num) {
        num += '';
        var splitStr = num.split('.');
        var splitLeft = splitStr[0];
        var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
        var regx = /(\d+)(\d{3})/;
        while (regx.test(splitLeft)) {
            splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
        }
        return this.simbol + splitLeft + splitRight;
    },
    new : function (num, simbol) {
        this.simbol = simbol || '';
        return this.formatear(num);
    }
}

function separador(z) {
    if (z == 1) {
        var a = document.getElementById("precioproducto").value;
        var a1 = document.getElementById("descproducto").value;
        var a2 = document.getElementById("cantproducto").value;

        if (a == null || a.length == 0 || a == "" || a1 == null || a1.length == 0 || a1 == "" || a2 == null || a2.length == 0 || a2 == "") {
            document.getElementById("precioproducto").value = "";
        } else {
            document.getElementById("precioproducto").value = formatNumber.new(a, "BsF ");
        }
    }
}
function admin() {
    alert("Rafael Chirel - Paradigma.");
}
