function validar(form) {
    let mensaje = "";
    let correcto = true;

    if (form.elements[0].value == "") {
        mensaje += "La FECHA DE ELABORACIÓN es obligatoria.\n";
        correcto = false;
    }

    if (form.elements[1].value == "") {
        mensaje += "El NOMBRE es obligatorio.\n";
        correcto = false;
    } else {
        let texto = /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/;
        if (!texto.test(form.elements[1].value)) {
            mensaje += "El NOMBRE no es válido.\n";
            correcto = false;
        }
    }

    if (form.elements[2].value == "") {
        mensaje += "El GÉNERO es obligatorio.\n";
        correcto = false;
    }

    if (form.elements[3].value == "") {
        mensaje += "La EDAD es obligatoria.\n";
        correcto = false;
    }

    if (form.elements[4].value == "") {
        mensaje += "La FECHA DE NACIMIENTO es obligatoria.\n";
        correcto = false;
    }

    if (form.elements[5].value == "") {
        mensaje += "La OCUPACIÓN es obligatoria.\n";
        correcto = false;
    } else {
        let texto = /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/;
        if (!texto.test(form.elements[5].value)) {
            mensaje += "La OCUPACIÓN no es válida.\n";
            correcto = false;
        }
    }

    if (form.elements[6].value == "") {
        mensaje += "La LATERALIDAD es obligatoria.\n";
        correcto = false;
    }

    if (form.elements[7].value == "") {
        mensaje += "La NACIONALIDAD es obligatoria.\n";
        correcto = false;
    } else {
        let texto = /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/;
        if (!texto.test(form.elements[7].value)) {
            mensaje += "La NACIONALIDAD no es válida.\n";
            correcto = false;
        }
    }

    if (form.elements[8].value == "") {
        mensaje += "La RELIGIÓN es obligatoria.\n";
        correcto = false;
    } else {
        let texto = /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/;
        if (!texto.test(form.elements[8].value)) {
            mensaje += "La RELIGIÓN no es válida.\n";
            correcto = false;
        }
    }

    if (form.elements[9].value == "") {
        mensaje += "El TELÉFONO es obligatorio.\n";
        correcto = false;
    }

    if (form.elements[10].value == "") {
        mensaje += "El EMAIL es obligatorio.\n";
        correcto = false;
    } else {
        let patron = /^[\w]+@{1}[\w]+\.+[a-z]{2,3}$/;
        if (!patron.test(form.elements[10].value)) {
            mensaje += "El EMAIL no es válido.\n";
            correcto = false;
        }
    }

    if (form.elements[11].value == "") {
        mensaje += "El DOMICILIO es obligatorio.\n";
        correcto = false;
    }

    if (form.elements[12].value == "") {
        mensaje += "El TELÉFONO DEL CONTACTO a llamar en caso de emergencia es obligatorio.\n";
        correcto = false;
    }

    if (form.elements[13].value == "") {
        mensaje += "El NOMBRE DE LA PERSONA a llamar en caso de emergencia es obligatorio.\n";
        correcto = false;
    } else {
        let texto = /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/;
        if (!texto.test(form.elements[13].value)) {
            mensaje += "El NOMBRE DE LA PERSONA a llamar no es válido.\n";
            correcto = false;
        }
    }

    if (!correcto) {
        alert(mensaje);
    }

    return correcto;
}