
/*Validacion client-side del formulario para las acciones de agregar y editar expediente 
    para mejorar el funcionamiento para el usuario y evitar recargar la pagina copleta
    Estas valudaciones son complementarias a las del server-side*/ 
    function validateform() {
        $('#buscadorform').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function() {
            return true; 
        });
    }

    //function validatebuscadorform() {
    //    var x = document.forms["buscadorform"]["search"].value;
    //    if (x == "") {
    //      alert("Name must be filled out");
    //      return false;
    //    }
    //  }  
    //this.form.submit()
