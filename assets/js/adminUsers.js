$(document).ready(function() {
    let user = localStorage.getItem("usuario")
    _getusuarios(user);
    console.log("Inicio")
});

function _getusuarios(idUser) {
    $.post('core/API/getUser.php', { idUser }, function(data) {
        var perfil = '';
        $.each(data.response[0].CatUsuarios[0].Perfiles, function(indice, valor) {
            perfil += '<option value=' + valor.idPerfil + '>' + valor.Nombre + '</option>';
        });
        $("#perfilEdit").html(perfil);
        $("#perfilNuevo").html(perfil);
        console.error("Hola")
        var carpetas = '<option value="">Selecciona una caroeta</option>';
        $.each(data.response[0].CatUsuarios[0].Carpetas, function(indice, valor) {
            carpetas += '<option value=' + valor.idCarpeta + '>' + valor.Nombre + '</option>';
        });
        console.log(carpetas);
        $("#filesNuevo").html(carpetas);

        var CatStatus = '<option value="">Selecciona una opción</option>';
        $.each(data.response[0].CatUsuarios[0].StatusUsuario, function(indice, valor) {
            CatStatus += '<option value=' + valor.idStatus + ' >' + valor.Nombre + '</option>';
        });
        $("#CatStatusEdit").html(CatStatus);
        $("#CatStatusNuevo").html(CatStatus);

        var Acciones = '<option value="0">Selecciona una opción</option>';
        $.each(data.response[0].CatUsuarios[0].Acciones, function(indice, valor) {
            Acciones += '<option value=' + valor.id + ' >' + valor.Nombre + '</option>';
        });
        $("#AccionesEdit").html(Acciones);

        // console.log(data);
        var table = '<table id="Subtabla" class="table table-hover"><thead><tr><th>Nombre</th><th>Paterno</th><th>Materno</th><th>Email</th><th>Usuario</th><th>Estatus</th><th>Perfil</th><th>Editar</th></tr></thead><tbody>';

        $.each(data.response[0].CatUsuarios[0].Usuarios, function(indice, valor) {
            table += '<tr>';
            table += '<td>' + valor.Nombre + '</td>';
            table += '<td>' + valor.Paterno + '</td>';
            table += '<td>' + valor.Materno + '</td>';
            table += '<td>' + valor.Email + '</td>';
            table += '<td>' + valor.Usuario + '</td>';

            var UsersStatus = valor.Status;
            if (UsersStatus != 0) {
                $.each(data.response[0].CatUsuarios[0].StatusUsuario, function(index, valor) {
                    if (valor.idStatus == UsersStatus) {
                        table += '<td>' + valor.Nombre + '</td>';
                    }
                });
            } else {
                table += '<td>Disponible</td>';
            }

            var dPerfil = valor.idPerfil;
            $.each(data.response[0].CatUsuarios[0].Perfiles, function(index, valor) {
                if (valor.idPerfil == dPerfil) {
                    table += '<td>' + valor.Nombre + '</td>';
                }
            });

            table += '<td><button data-user="' + valor.Usuario + '" data-Nombre="' + valor.Nombre + '" data-Paterno="' + valor.Paterno + '" data-Materno="' + valor.Materno + '" data-Email="' + valor.Email + '" data-idUser="' + valor.idUsuario + '" data-idPerfil="' + valor.idPerfil + '" data-idOrganizacion="' + valor.idOrganizacion + '" data-idTipoUsuario="' + valor.idTipoUsuario + '" data-Status="' + valor.Status + '" class="btn btn-warning btnEditar" data-toggle="modal" data-target="#modal-editar">Editar</button></td>';
            table += '</tr>';
        });
        table += '</tbody></table>';
        $("#tabla_usuarios_content").html(table);
        $('#Subtabla').DataTable({
            "language": {
                "url": "js/Spanish.json"
            }
        });
    }, 'json');
}