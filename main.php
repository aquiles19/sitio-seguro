<?php
include_once "./core/config.php";
session_start();

if (isset($_SESSION["login"])) {

    $data = json_decode($_SESSION["login"]);
    if (isset($data->response[0]->Usuario[0]->idUsuario)) {
        $idUser = $data->response[0]->Usuario[0]->idUsuario;
        $nombre = $data->response[0]->Usuario[0]->Nombre;
        $idPerfil = $data->response[0]->Usuario[0]->idPerfil;

        //$response = $data['response']; 

        //print_r($data);
        $carpetas = $data->response[0]->Carpetas;
        $ruta = RUTA;
        #$Extensiones = 


?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Sitio Seguro IMSS</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="./assets/css/jquery-confirm.min.css">
            <!--<link rel="stylesheet" type="text/css" href="./assets/css/estilos.css">-->



            <link href="./assets/images/eficasia.ico" rel="shortcut icon" />
            <style>
                .d-flex.justify-content-around.classCarlos {
                    width: 71%;
                    left: 0;
                    right: 0;
                    margin: 0 auto 1rem;
                }

                h2.sitioSeguro {
                    color: royalblue;
                    font-weight: bold;
                    line-height: 5rem;
                }

                #secctionLoad {
                    display: none;
                }

                .navbar-inverse {
                    background-color: #005e4d;
                    border-color: #005e4d;
                }

                navbar-inverse {
                    background-image: -webkit-linear-gradient(top, #03967b 0%, #005e4d 100%);
                    background-image: -o-linear-gradient(top, #03967b 0%, #005e4d 100%);
                    background-image: -webkit-gradient(linear, left top, left bottom, from(#03967b), to(#005e4d));
                    background-image: linear-gradient(to bottom, #03967b 0%, #005e4d 100%);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#03967b', endColorstr='#005e4d', GradientType=0);
                    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
                    background-repeat: repeat-x;
                }

                body {
                    background-color: #bfbfbf;
                }

                #bodyMain {
                    background-color: #bfbfbf;
                }

                .fixed-bottom {
                    position: fixed;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    z-index: 1030;
                }

                footer {
                    background: rgb(0, 145, 119);
                    background: -moz-linear-gradient(top, rgba(0, 145, 119, 1) 0%, rgba(0, 96, 81, 1) 100%);
                    background: -webkit-linear-gradient(top, rgba(0, 145, 119, 1) 0%, rgba(0, 96, 81, 1) 100%);
                    background: linear-gradient(to bottom, rgba(0, 145, 119, 1) 0%, rgba(0, 96, 81, 1) 100%);
                    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#009177', endColorstr='#006051', GradientType=0);
                }

                #divContenido {
                    background-image: url(./assets/image/cuadricula.png);
                    font: 12px/1.4 Verdana, Arial;
                    margin-top: 25px !important;
                    padding-top: 53px;
                    margin: 0px auto;
                    position: relative;
                    width: 1100px;
                    min-width: 1000px;
                    height: 100%;
                    min-height: 700px;

                }

                section#contenido {
                    /*
            background: #FFF;
            padding-top: 53px;
            margin: 0px auto;
            position: relative;
            width: 1100px;
            min-width: 1000px;
            height: 97vh;
            min-height: 700px
            */
                    background: #FFF;
                    margin: 0px auto;
                    position: relative;
                    width: 1100px;
                    min-width: 1000px;
                    height: auto;
                    min-height: 89vh;
                    margin-top: 5.6vh;
                }

                .head {
                    background: rgb(0, 148, 122);
                    background: -moz-linear-gradient(top, rgba(0, 148, 122, 1) 0%, rgba(0, 94, 79, 1) 100%);
                    background: -webkit-linear-gradient(top, rgba(0, 148, 122, 1) 0%, rgba(0, 94, 79, 1) 100%);
                    background: linear-gradient(to bottom, rgba(0, 148, 122, 1) 0%, rgba(0, 94, 79, 1) 100%);
                    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#00947a', endColorstr='#005e4f', GradientType=0);
                    width: 100%;
                    height: auto;
                }

                .btn-nuevoHead {
                    text-shadow: 0 -1px 0 rgb(0 0 0 / 25%);
                    padding-top: 15px;
                    padding-bottom: 15px;
                    color: #FFF;
                    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                }

                .card-header.card-headerSitio {
                    background: rgb(0, 148, 122);
                    background: -moz-linear-gradient(top, rgba(0, 148, 122, 1) 0%, rgba(0, 94, 79, 1) 100%);
                    background: -webkit-linear-gradient(top, rgba(0, 148, 122, 1) 0%, rgba(0, 94, 79, 1) 100%);
                    background: linear-gradient(to bottom, rgba(0, 148, 122, 1) 0%, rgba(0, 94, 79, 1) 100%);
                    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#00947a', endColorstr='#005e4f', GradientType=0);
                    color: #FFF;
                }

                .card.cardFile {
                    margin: 0 auto;
                    left: 0;
                    right: 0;
                    width: 60%;
                }

                .sectionFiles {
                    display: none;
                }

                .deleteFile {
                    background: url("./assets/image/eliminar.png") no-repeat;
                    width: 3rem;
                    height: 3rem;
                    display: block;
                    cursor: pointer;
                    background-size: 100%;
                }

                .downloadFile {
                    background: url("./assets/image/download.png");
                    width: 2.8rem;
                    height: 2.6rem;
                    display: block;
                    cursor: pointer;
                }

                .loadFileBtn {
                    background: url("./assets/image/upload.png");
                    width: 2.8rem !important;
                    height: 2.6rem;
                    display: block;
                    cursor: pointer;
                    border: none;
                    text-align: center;
                    content: " ";
                }

                #loadFiles {
                    display: none;
                }

                button.downloadFile {
                    border: none;
                }

                .invisibleCarlos {
                    display: none;
                }

                table tr td,
                table tr th {
                    text-align: center;
                }

                th {
                    background: #3f4c6b;
                    color: #FFF;
                }

                table tr td {
                    font-weight: 700;
                    text-transform: uppercase;
                    line-height: 20px;
                }

                table tr:hover {
                    background-color: #F5D0A9;
                }

                table tr:nth-child(odd) td {
                    font-family: Verdana, Arial, Helvetica, sans-serif;
                    color: #000066;
                    text-transform: uppercase;
                    background-color: #E9EDF5;
                    line-height: 20px;
                }

                input#exampleFormControlFile1 {
                    position: absolute;
                    top: 112px;
                    left: 0px;
                    right: 0px;
                    bottom: 0px;
                    width: 68%;
                    height: 36%;
                    opacity: 0;
                    z-index: 1;
                }

                label[for="exampleFormControlFile1"] {
                    border: 1px solid grey;
                    border-radius: 5px;
                    background: beige;
                    height: 2rem;
                    width: 40%;
                }

                input.btn.btn-light {
                    border: 1px solid grey;
                }

                select#exampleFormControlSelect1 {
                    z-index: 999999;
                }

                div#rightAdmin {
                    margin-left: 38rem;
                }

                .cardFile .card-body {
                    background-color: #E9EDF5;
                }
            </style>

        </head>

        <body id="bodyMain">

            <!--

    <nav class="navbar navbar-expand-lg navbar-light bg-light head ">
        <a class="navbar-brand" href="#">IMSS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">IMSS D <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Intercambio de Archivos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Subir Archivos</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    -->

            <nav class="navbar navbar-toggleable-md navbar-light bg-faded head text-white fixed-top">
                <section class="container">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="text-white"><i class="fa fa-bars"></i></span>
                    </button>
                    <a class="navbar-brand text-white" href="#">IMSS</a>
                    <div class="dropdown collapse navbar-collapse" id="navbarSupportedContent">
                        <li class=" btn dropdown-toggle btn-nuevoHead" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Intercambio de Archivos
                        </li>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item eventCharge" type="button">Subir Archivos</button>

                        </div>
                    </div>
                    <?php 
                    if($idPerfil == 1 || $idUser == 10 || $idUser == 13){
                    ?>
                    <div class="dropdown collapse navbar-collapse" id="navbarSupportedContent">
                        <li class=" btn dropdown-toggle btn-nuevoHead" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrador
                        </li>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                            <a class="dropdown-item" href="./admin.php" type="button">Gestion de usuarios</a>

                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                    <div class="dropdown collapse navbar-collapse" id="rightAdmin">
                        <li class=" btn dropdown-toggle btn-nuevoHead" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $nombre ?>
                        </li>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item eventClose" type="button" data-id="<?= $idUser ?>">Cerrar sesion</button>

                        </div>
                    </div>
                   



                </section>
            </nav>

            <section id="contenido">
                <div id="divContenido" class="container forms">


                    <div id="secctionBienvenida">
                        <div id="divBienvenido" style="color:#000066;size:3px;font-famyli:Verdana, Arial, Helvetica, sans-serif"><strong>
                                <font color="#000066" size="3" face="Verdana, Arial, Helvetica, sans-serif">

                                    <div align="center" id="divBienvenidoTexto">
                                        <h1>
                                            <font color="#000066" size="6" face="Verdana, Arial, Helvetica, sans-serif"><strong>BIENVENIDO</strong></font>
                                        </h1>
                                        <font color="#000066" size="3" face="Verdana, Arial, Helvetica, sans-serif">
                                            <p>ADMINISTRADOR</p>

                                            <p>Ha iniciado Exitosamente una sesion dentro del Sistema</p>
                                            <p>Por razones de seguridad le suplicamos cerrar el navegador de internet en cuanto haya terminado.</p>
                                        </font>
                                    </div>


                                </font>
                            </strong></div>
                    </div>
                    <div id="secctionLoad">
                        <div class="d-flex justify-content-around classCarlos">
                            <img src="./assets/image/filesure.png" alt="">
                            <h2 class="sitioSeguro">Sitio Seguro</h2>
                            <img src="./assets/image/candado.png" alt="*">
                        </div>
                        <div class="card cardFile">
                            <div class="card-header card-headerSitio text-center">
                                GESTION DE ARCHIVOS
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">CARPETA</label>
                                        <select class="form-control form-control-sm" id="exampleFormControlSelect1">

                                            <?php
                                            if (count($carpetas) > 0) {
                                                echo "<option value=''>Seleccione una carpeta</option>";
                                                foreach ($carpetas as $key => $value) {
                                                    echo "<option value='$value->idcarpeta' data-subir='$value->Subir' data-descarga='$value->Descargar' data-eliminar='$value->Eliminar'>$value->Carpeta</option>";
                                                }
                                            } else {
                                                echo "<option value=''></option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </form>
                                <form id="loadFiles" name="carga" class="form-inline">
                                    <div class="form-group  mb-2 float-left">
                                        <input class="btn  btn-light" type="button" value="Seleccionar archivo">
                                        <label for="exampleFormControlFile1">Ningún archivo seleccionado</label>
                                        <input type="file" required name="fileToUpload" value="Ningun archivo seleccionado" class="form-control-file form-control" title="Sleecione archivo" id="exampleFormControlFile1">

                                        <input type="text" class="invisible" name="idCarpeta" id="idCarpetaValor" value="">
                                        <input type="text" class="invisible" name="carpeta" id="carpetaValor" value="">

                                    </div>
                                    <div class="form-group mb-2 float-right">
                                        <button type="submit" class="loadFileBtn form-control">&nbsp;</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="sectionFiles">
                            <div class="card">
                                <div class="card-header">
                                    &nbsp;
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover" id="tableFileslist">
                                        <thead>
                                            <tr>
                                                <th scope="col">FECHAMOV</th>
                                                <th scope="col">ARCHIVO</th>
                                                <th scope="col">USUARIO</th>
                                                <th scope="col">DESCARGAR</th>
                                                <th scope="col">ELIMINAR</th>
                                            </tr>
                                        </thead>
                                        <tbody class="loadTable">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>







                    <!-- <form method='post' name='contactform' id='contactform' action='guardarpdf.php' target='_blank' enctype= 'multipart/form-data'><input type='text' class='invisible' name='idCarpeta' value='" + value.idCarpeta + "'><input type='text' class='invisible' name='archivo' value='" + value.archivo + "'><button type='submit' class='downloadFile'>&nbsp;</button></form>-->



                </div>
            </section>



            <footer class="fixed-bottom3">
                <div class="d-flex text-white align-items-center py-2 justify-content-center">
                    <img src="./assets/image/Eficasia2.png" class="img-fluid mr-2" alt="">
                    <p>Sitio Seguro IMSS</p>
                </div>
            </footer>
            <!-- 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    -->
            <script src="./assets/js/jquery-3.3.1.min.js"></script>
           <!-- <script src="./assets/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>-->
            <script src="./assets/js/bootstrap.min.js"></script>
            <script src="./assets/js/jquery-3.5.1.js"></script>
            <script src="./assets/js/jquery.dataTables.min.js"></script>



            
            <script src="./assets/js/jquery-confirm.min.js"></script>

            <!-- cardFile -->

            <script>
                $('input[type="file"]').change(function(e) {
                    let fileName = e.target.files[0].name;
                    $("label[for='exampleFormControlFile1']").html(fileName)
                });


                // exampleFormControlFile1
                $(".eventCharge").click(function() {
                    $("#divBienvenido").hide()
                    //console.log("Solo es una preuba")
                    $("#secctionLoad").show();
                })
                $(".eventClose").click(function() {


                    var idUser = $(".eventClose").attr("data-id");
                    // $(".errors").css("display","none");
                    $.post('./core/API/logout.php', {
                        idUser: idUser
                    }, function(data) {
                        if (parseInt(data.response[0].Code) == 1) {
                            $(location).attr('href', './');
                        } else {
                            $(location).attr('href', './main.php');
                        }
                    }, "JSON");

                })
                $("#exampleFormControlSelect1").change(function() {
                    var file = $("#exampleFormControlSelect1 option:selected").val();
                    var lfile=$("#exampleFormControlSelect1 option:selected").text();
                    var subir = $("#exampleFormControlSelect1 option:selected").attr("data-subir");
                    var descarga = $("#exampleFormControlSelect1 option:selected").attr("data-descarga");
                    var eliminar = $("#exampleFormControlSelect1 option:selected").attr("data-eliminar");
                    var carpeta = $("#exampleFormControlSelect1 option:selected").text();
                    console.log(file," carlos ",carpeta);
                    //sessionStorage.setItem("carpeta",carpeta);
                    //console.log(subir, descarga, eliminar)
                    $("#idCarpetaValor").val(file);
                    $("#carpetaValor").val(carpeta);
                    
                    if (subir == 1) {
                        $("#loadFiles").show();
                    } else {
                        $("#loadFiles").hide();
                    }
                    if (file > 0) {
                        $.post('./core/API/getFiles.php', {
                            file: file
                        }, function(RESP) {


                            //console.log(RESP);

                            if (parseInt(RESP.response[0].Code) == 1) {
                                var body = "";

                                $.each(RESP.response, function(key, value) {
                                    var identificador = value.archivo.replace(".", "_");
                                    body += '<tr id="' + identificador + '">';
                                    body += '<td>' + value.Fecha + '</td>';
                                    body += '<td>' + value.archivo + '</td>';
                                    body += '<td>' + value.idUsuario + '</td>';
                                    body += (descarga == 1) ? "<td><form method='post' name='contactform' id='contactform' action='downloadFile.php' target='_blank' enctype= 'multipart/form-data'><input type='text' class='invisible invisibleCarlos' name='carpeta' value='" + carpeta + "'> <input type='text' class='invisible invisibleCarlos' name='idCarpeta' value='" + value.idCarpeta + "'><input type='text' class='invisible invisibleCarlos' name='archivo' value='" + value.archivo + "'><button type='submit' class='downloadFile'>&nbsp;</button></form></td>" : "<td>&nbsp;</td>";
                                    //body += (descarga == 1) ? "<td><a href='./core/<?= $ruta ?>"+ value.archivo+"'><span class='downloadFile' data-idCarpeta='" + value.idCarpeta + "' data-file='" + value.archivo + "'>&nbsp;</span></a></td>" : "&nbsp;";
                                    body += (eliminar == 1) ? "<td><span class='deleteFile' data-idCarpeta='" + value.idCarpeta + "' data-carpeta='"+ carpeta +"' data-file='" + value.archivo + "'>&nbsp;</span></td>" : "<td>&nbsp;</td>";
                                    body += '</tr>';
                                    //console.log(key + ": " + value.Fecha);
                                });
                                var table = $('#tableFileslist').DataTable();
                                table.destroy();
                                $(".loadTable").children().remove()
                                $(".loadTable").append(body);
                                $(".sectionFiles").show();
                                $('#tableFileslist').DataTable({
                                    "order": [
                                        [0, 'desc']
                                    ]
                                });
                            }else{
                                var table = $('#tableFileslist').DataTable();
                                table.destroy();
                                $(".loadTable").children().remove()
                                $(".sectionFiles").hide();
                            }


                        }, "JSON");
                    } else {

                        var table = $('#tableFileslist').DataTable();
                        table.destroy();
                        $(".loadTable").children().remove()
                        $(".sectionFiles").hide();
                    }
                    //alert( "Handler for .change() called."+ $(this).val() );
                });
                $(".loadTable").delegate(".downloadFile", "click", function() {

                    var file = $(this).attr("data-file");
                    //data-file="archivo_prueba_20221123163488.xlsx"
                    //console.log(file)

                })
                $("#loadFiles").submit(function(e) {
                    e.preventDefault();
                    $(".loadFileBtn").prop("disabled", true);
                    var formData = new FormData(document.getElementById("loadFiles")); //$("#loadFiles").serialize();
                    $.ajax({
                        type: "POST",
                        url: './core/API/downloadFile.php',
                        data: formData,
                        contentType: "application/json",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,

                        success: function(data) {
                            var subir = $("#exampleFormControlSelect1 option:selected").attr("data-subir");
                            var descarga = $("#exampleFormControlSelect1 option:selected").attr("data-descarga");
                            var eliminar = $("#exampleFormControlSelect1 option:selected").attr("data-eliminar");
                            var carpeta = $("#exampleFormControlSelect1 option:selected").text();
                            sessionStorage.setItem("carpeta",carpeta);
                            //console.log(data);
                            if (data.response[0].Code == 1) {
                                var archivo = data.response[0].name;
                                var identificador = archivo.replace(".", "_");
                                var body = "";
                                body += "<tr id='" + identificador + "'>";
                                body += '<td>' + data.response[0].fecha + '</td>';
                                body += '<td>' + data.response[0].name + '</td>';
                                body += '<td>' + data.response[0].nameUser + '</td>';
                                body += (descarga == 1) ? "<td><form method='post' name='contactform' id='contactform' action='downloadFile.php' target='_blank' enctype= 'multipart/form-data'><input type='text' class='invisible invisibleCarlos' name='carpeta' value='" + carpeta + "'><input type='text' class='invisible invisibleCarlos' name='idCarpeta' value='" + data.response[0].idCarpeta + "'><input type='text' class='invisible invisibleCarlos' name='archivo' value='" + data.response[0].name + "'><button type='submit' class='downloadFile'>&nbsp;</button></form></td>" : "<td>&nbsp;</td>";
                                body += (eliminar == 1) ? "<td><span class='deleteFile' data-carpeta='"+ carpeta +"' data-idCarpeta='" + data.response[0].idCarpeta + "' data-file='" + data.response[0].name + "'>&nbsp;</span></td>" : "<td>&nbsp;</td>";
                                body += '</tr>';
                                //console.log(body);
                                //$(".loadTable").prepend(body);
                                var table = $('#tableFileslist').DataTable();
                                table.row.add($(body));
                                table.destroy();
                                $('#tableFileslist').DataTable({
                                    "order": [
                                        [0, 'desc']
                                    ]
                                });

                                var textoLabel = 'Ningún archivo seleccionado';
                                $("label[for='exampleFormControlFile1']").html(textoLabel);
                                $("#exampleFormControlFile1").val("");

                                $.alert('El archivo se cargo con exito.');
                                $(".loadFileBtn").prop("disabled", false);

                            } else {
                                $.alert("No se cargo");
                                $(".loadFileBtn").prop("disabled", false);
                            }

                            //window.location = url;
                        }
                    });
                });
                $(".loadTable").delegate(".deleteFile", "click", function() {

                    var file = $(this).attr("data-file");
                    var idCarpeta = $(this).attr("data-idcarpeta");
                    var carpeta = $(this).attr("data-carpeta");
                    //data-file="archivo_prueba_20221123163488.xlsx"
                    //console.log(file, idCarpeta);
                    var identificador = file.replace(".", "_");
                    $.confirm({
                        title: 'Eliminar archivo',
                        content: 'Desea eliminar el archivo ' + file,
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            tryAgain: {
                                text: 'Confirmar',
                                btnClass: 'btn-red',
                                action: function() {

                                    $.post('./core/API/deletFiles.php', {
                                        idCarpeta: idCarpeta,
                                        carpeta:carpeta,
                                        archivo: file
                                    }, function(RESP) {


                                        //console.log(RESP);

                                        if (parseInt(RESP.response[0].Code) == 1) {

                                            var table = $('#tableFileslist').DataTable();
                                            table.destroy();
                                            $("tr#" + identificador).remove();
                                            $('#tableFileslist').DataTable({
                                                "order": [
                                                    [0, 'desc']
                                                ]
                                            });

                                            $.alert('Se elimino el archivo ' + file);
                                        } else {
                                            $.alert('No se pudo eliminar el archivo ' + file);
                                        }


                                    }, "JSON");


                                }
                            },

                            close: function() {}
                        }
                    });

                })
            </script>
        <?php
    } else {
        header('Location: ./');
    }
        ?>
        </body>

        </html>
    <?php
} else {
    header('Location: ./');
}
    ?>