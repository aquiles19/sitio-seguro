######
###### GET USER": "SSI/GetUsuarios
PARAMETERS": { "idUsuario": 1 } 

######
###### Alta Usuario (el 'idUsuario' en el request no se agrega)
### SSI/GestUsuario

{"PARAMETERS": {"Nombre": "Nombre","Paterno": "Paterno","Materno": "Materno","Email": "email@email.com","Usuario": "usuario3","idPerfil": "1"}}

 #####  Respuestas:
 ## Cuando ya existe el usuario" 
    { "Code": 0, "Msj": "Nombre de usuario no disponible" },
    "Alta correcta",
    {
        "Code": 1,
        "Msj": "Alta correcta"
    },
    {
        "********************************************************************************************************************************
        Editar Usuario
        SSI / GestUsuario "}, {
            "PARAMETERS": {
                "idUsuario": 1,
                "Nombre": "Nombre",
                "Paterno": "Paterno",
                "Materno": "Materno",
                "Email": "email@email.com",
                "idPerfil": "1"
            }
        },
        "Respuestas:
        Cuando se ejecuta la edición sin cambiar ningun dato ", {
            "Code": 0,
            "Msj": "Sin modificacion"
        },
        "Cuando se actualiza, al menos un dato",
        {
            "Code": 1,
            "Msj": "Actualizacion correcta"
        },
        "********************************************************************************************************************************
        Acciones de Usuario
        SSI / GestUsuario ", {
            "PARAMETERS": {
                "idUsuario": 1,
                "Accion": 1
            }
        }
        Respuestas: Accion = 1 {
            "Code": 1,
            "Msj": "Baja correcta"
        }
        Accion = 2 {
            "Code": 1,
            "Msj": "Activacion correcta"
        }
        Accion = 3 {
            "Code": 1,
            "Msj": "Bloqueo correcto"
        }
        Accion = 4 {
            "Code": 1,
            "Msj": "Reset exitoso"
        }



        //////// 
        SSI / GetPermisosUsuario { "PARAMETERS": { "idUsuario": 2 } }
        //////// 
        SSI / GestExtArchivos { "PARAMETERS": { "idUsuario": 1, "ExtArchivos": "1, 2, 3, 4, 5, 6, 7, 8, 9" } }

        [{ "Code": 1 }]
        //////// 
        SSI / GestPermisosCarpetas {
            "PARAMETERS": {
                "idUsuario": 1,
                "Carpetas": [{
                    "idCarpeta": 1,
                    "Subir": 1,
                    "Descargar": 1,
                    "Eliminar": 1
                }, {
                    "idCarpeta": 12,
                    "Subir": 1,
                    "Descargar": 1,
                    "Eliminar": 1
                }, {
                    "idCarpeta": 24,
                    "Subir": 0,
                    "Descargar": 0,
                    "Eliminar": 1
                }]
            }
        }

        Response[{ "Code": 1 }]

        /*
        var etiquetas = [];
        $.each($("input[name='carpetaName\[\]']"), function(){
            etiquetas.push($(this).val());
            console.log($(this).val())
        });
        var listFilesName=etiquetas.join(", ");
        console.log(listFilesName)
        */

        FU_Follow_Up

        { "result": "OK", "response": [{ "Code": 0, "Msj": "Usuario\/Password no valido" }] } { "result": "OK", "response": [{ "Code": 1 }] }


        { "Code": 1, "Msj": "Actualizacion correcta" }





        <
        div class = "form-check" > < input class = "form-check-input"
        type = "checkbox"
        value = ""
        id = "defaultCheck1" > < label class = "form-check-label"
        for = "defaultCheck1" > Nombre < /label></div >



        GestCarpetas { "result": "OK", "response": [{ "Code": 1, "Msj": "Alta correcta" }] }