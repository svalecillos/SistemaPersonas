$(document).ready(function () {
    $("#formDatosPersona").validate({ 
        rules: {
            nombre: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            telefono: {
                required: true,
                minlength: 11,
                maxlength: 11,
                number: true
            },
        },
        messages: {
            nombre: "Requere un nombre",
            email: {
                required: "Requiere un correo",
                email: "Introduzca un correo electronico valido",
            },
            telefono: {
                required: "Requiere un numero de telefono",
                number: "Solo es requerido Numeros",
                minlength: "El minimo de caracter es de 11",
                maxlength: "el maximo de caracter es de 11",
            },
            curl: "Enter your website",
        },
        errorElement: 'em',
        errorPlacement: function (error, element) {
            error.addClass( "help-block" );
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    });
});