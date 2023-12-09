function validarForm() {
    // Verifica se o nome foi preenchido
    if (document.getElementById("nome").value == "") {
        alert("O nome deve ser preenchido.");
        return false;
    }

    // Verifica se o valor do pix foi preenchido
    if (document.getElementById("valor").value == "") {
        alert("O valor do pix deve ser preenchido.");
        return false;
    }

    // Verifica se o valor do pix é válido
    if (!isNaN(document.getElementById("valor").value)) {
        alert("O valor do pix deve ser um número.");
        return false;
    }
    }    