<?php
session_start();

if (isset($_SESSION["login"])) {
    $data = json_decode($_SESSION["login"]);
    if (isset($data->response[0]->Code) && $data->response[0]->Code == 2) {


        //$response = $data['response']; 

        //print_r(json_encode($response));

?>
        <!DOCTYPE html>
        <html>

        <head>
            <!--
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="image/EFILOG.ico" />
    <script type="text/javascript" src='Utilerias/Util.js'></script>
    <link rel="icon" type="image/x-icon" href="image/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="StyleClasses/login.css">
-->
            <title>.: Cambio PWD :.</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">
            <!--<link rel="stylesheet" type="text/css" href="./assets/css/estilos.css">-->
            <link rel="stylesheet" href="./assets/css/dataTable.min.css">
            <link rel="stylesheet" href="./assets/css/dataTables.responsive.min.css">
            <link rel="stylesheet" href="./assets/css/buttons.bootstrap4.min.css">
            <link rel="stylesheet" href="./assets/css/toastr.min.css">
            <link rel="stylesheet" href="./assets/css/select2.min.css">
            <link href="./assets/image/eficasia.ico" rel="shortcut icon" />

            <style>
                body {
                    background-image: url(./assets/image/bg.png);
                    text-align: center;
                    position: relative;
                }

                .contenedor {
                    width: 663px;
                    height: auto;
                    /*400px;*/
                    background: #ffffff;
                    margin: auto;
                    margin-top: 100px;
                    border: 2px solid gray;
                    border-radius: 15px;
                    -webkit-border-radius: 15px;
                    -o-border-radius: 15px;
                    padding-bottom: 1rem;
                }

                .style1 {
                    color: #005e4d;
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                    font-weight: bold;
                }

                span {
                    text-align: center;
                }

                .msgPass {
                    color: red;
                }

                .style2 {
                    color: #005e4d;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    margin-bottom: 2rem;
                }

                p {
                    display: block;
                    margin-block-start: 1em;
                    margin-block-end: 1em;
                    margin-inline-start: 0px;
                    margin-inline-end: 0px;
                }

                .titleLogin {
                    height: auto;
                    margin: auto;
                    vertical-align: central;
                    padding-top: 40px;
                    background: #ddd;
                    color: #005e4d;
                    border-bottom: 2px solid gray;
                    border-top-left-radius: 15px;
                    border-top-right-radius: 15px;
                    -webkit-border-top-left-radius: 15px;
                    -webkit-border-top-right-radius: 15px;
                    -o-border-top-left-radius: 15px;
                    -o-border-top-right-radius: 15px;
                }

                .datos {
                    margin: auto;
                    text-align: center;
                    width: 245px;
                    padding-top: 15px;
                }

                table {
                    display: table;
                    border-collapse: separate;
                    box-sizing: border-box;
                    text-indent: initial;
                    border-spacing: 2px;
                    border-color: grey;
                }

                .Usr {
                    width: 170px;
                    border: 2px solid #005e4d;
                    color: gray;
                    text-align: center;
                    font-size: 16px;
                    border-radius: 9px;
                    -moz-border-radius: 9px;
                    -webkit-border-radius: 9px;
                    -o-border-radius: 9px;
                }

                input[type="text"i] {
                    padding: 1px 2px;
                }

                .iconUsr {
                    width: 40px;
                    height: 32px;
                    background-image: url(./assets/image/usuario.png);
                    background-repeat: no-repeat;
                }

                .iconPass {
                    width: 40px;
                    height: 32px;
                    background-image: url(./assets/image/password.png);
                    background-repeat: no-repeat;
                }

                .Pass {
                    width: 170px;
                    border: 2px solid #005e4d;
                    font-size: 16px;
                    color: gray;
                    text-align: center;
                    border-radius: 9px;
                    -moz-border-radius: 9px;
                    -webkit-border-radius: 9px;
                    -o-border-radius: 9px;
                }

                .botones {
                    border-top: 1px solid #96d1f8;
                    background: #005e4d;
                    background: -webkit-gradient(linear, left top, left bottom, from(#03967b), to(#005e4d));
                    background: -webkit-linear-gradient(top, #03967b, #005e4d);
                    background: -moz-linear-gradient(top, #03967b, #005e4d);
                    background: -ms-linear-gradient(top, #03967b, #005e4d);
                    background: -o-linear-gradient(top, #03967b, #005e4d);
                    padding: 7.5px 15px !important;
                    -webkit-border-radius: 7px;
                    -moz-border-radius: 7px;
                    border-radius: 7px;
                    -webkit-box-shadow: rgb(0 0 0) 0 1px 0;
                    -moz-box-shadow: rgba(0, 0, 0, 1) 0 1px 0;
                    box-shadow: rgb(0 0 0) 0 1px 0;
                    text-shadow: rgb(0 0 0 / 40%) 0 1px 0;
                    color: white;
                    font-size: 13px;
                    font-family: 'Lucida Grande', Helvetica, Arial, Sans-Serif;
                    text-decoration: none;
                    vertical-align: middle;
                }

                .iconPassConfirm {
                    width: 40px;
                    height: 32px;
                    background-image: url(./assets/image/passwordConfirm.png);
                    background-repeat: no-repeat;
                }
            </style>



        </head>

        <body>

            <form id="loginChange" name="login" method="post" autocomplete="off">
                <div class="contenedor">

                    <div class="titleLogin">
                        <img src="./assets/image/logo.png" />
                        <br><br>
                        <span class="style1" align="center">Plataforma de Registro de Servicios IMSS
                            C R M</span><br>
                        <span class="msgPass"></span><br>
                        <p class="style2">SU CONTRASE??A EXPIR?? - Cambio de contrase??a</p>
                    </div>
                    <div class="datos">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="iconUsr">

                                    </td>
                                    <td>
                                        <input disabled="" type="text" class="Usr" id="UsrApp" name="UsrApp" maxlength="15" value="<?= $_SESSION['user'] ?>">
                                        <input type="hidden" class="Usr" id="clUsrApp" name="clUsrApp" maxlength="15" value="<?= $data->response[0]->idUsuario ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 5px"></td>
                                </tr>
                                <tr>
                                    <td class="iconPass">

                                    </td>
                                    <td>
                                        <input type="password" placeholder="Contrase??a" required title="8 caracteres alfanumericos" class="Pass" id="Password" name="Password" minlength="8" maxlength="8" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 5px"></td>
                                </tr>
                                <tr>
                                    <td class="iconPassConfirm">

                                    </td>
                                    <td>
                                        <input type="password" placeholder="Confirmar" required title="8 caracteres alfanumericos" class="Pass" id="Confirma" name="Confirma" minlength="8" maxlength="8">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 5px"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="text-align: center">
                                        <input type="submit" id="btnGuarda" class="botones" value="Guardar">
                                        <input type="button" id="btnCancela" class="botones" value="Cancelar" onclick="RegresaPag();">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </form>
            <script src="./assets/js/jquery-3.3.1.min.js"></script>
            <script src="./assets/js/md5.pack.js"></script>
            <script type="text/javascript">
                function RegresaPag() {
                    $(location).attr('href', './');
                }
            </script>
            <script>
                $("#loginChange").submit(function(e) {
                    e.preventDefault();

                    console.log("Bien")
                    var bandera = $("#Confirma").val();
                    var pass = $("#Password").val();
                    var clUsrApp = $("#clUsrApp").val();
                    // $(".errors").css("display","none");
                    if (bandera == pass) {

                        $.post('./core/API/changePass.php', {
                            pass: md5(pass),
                            clUsrApp: clUsrApp
                        }, function(RESP) {


                            console.log(RESP);

                            if (parseInt(RESP.response[0].Code) == 1) {
                                $(location).attr('href', './index.php');
                            } else {
                                setTimeout(function() {
                                    $(".msgPass").css("display", "none");
                                }, 3000);
                                $(".msgPass").html('<span>' + RESP.response[0].Msj + '</span>');
                                $(".error").css("display", "block");
                            }
                        }, "JSON");

                    } else {
                        // Mensaje de password diferentes
                        $(".msgPass").html('<span>El password no es el mismo, favor de verificar.</span>');
                        setTimeout(function() {
                            $(".msgPass").css("display", "none");
                        }, 3000);
                    }
                });
            </script>
        </body>

        </html>
<?php
    } else {
        header('Location: ./');
    }
} else {
    header('Location: ./');
die();
}
?>