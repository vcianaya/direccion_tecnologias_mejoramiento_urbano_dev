<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/960.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/reset.css" media="screen" />
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    </head>
    <body>
        <div class="container_12">

            <div class="row">
                <div class="span12">
                    Llene el siguiente llenado de formulario
                </div>
                <div class="span2">

                </div>
            </div>
        </div>	

        <div class="container_12">
            <div class="grid_12">
                <div class="row">
                    <div class="span2">   </div>
                    <?php echo form_open('editor/guardar_hoja'); ?>
                    <table width="200" border="1" align="center" bordercolor="#000000" style="background: #ededed">
                        <tr>
                            <td colspan="2"><div align="center" style="background: #ccccee">HOJA  DE  DELITO</div></td>
                        </tr>
                        <tr>
                            <td width="76">Nro. Folio:</td>
                            <td width="106">
                                <input name="folio" type="text" id="folio"></td>
                        </tr>
                        <tr>
                            <td> Fecha de ejecucion: </td>
                            <td><input name="fecha" type="date" id="fecha"></td>
                        </tr>
                        <tr>
                            <td>Distrito: </td>
                            <td><label>
                                    <select name="distrito" id="distrito">
                                        <option value="Disitrito 1">Disitrito 1</option>
                                        <option value="Disitrito 2">Disitrito 2</option>
                                    </select>
                                </label></td>
                        </tr>
                        <tr>
                            <td> Direccion:</td>
                            <td><input name="direccion" type="text" id="direccion"></td>
                        </tr>
                        <tr>
                            <td> Zona: </td>
                            <td><input name="zona" type="text" id="zona"></td>
                        </tr>
                        <tr>
                            <td> Razon intervencion:</td>
                            <td><input name="razon" type="text" id="razon"></td>
                        </tr>
                        <tr>
                            <td> Operativo: </td>
                            <td><select name="operativo" id="operativo">
                                    <option value="Asistencia familiar">Asistencia familiar</option>
                                    <option value="Abandono de familia">Abandono de familia</option>
                                    <option value="Asistencia de familia">Asistencia familiar</option>
                                    <option value="Abandono de familia">Abandono de familia</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td> Responsable: </td>
                            <td><input name="responsable" type="text" id="responsable"></td>
                        </tr>
                        <tr>
                            <td> Hojas: </td>
                            <td><input name="hojas" type="text" id="hojas"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><button type="submit" class="btn btn-primary">Guardar</button></td>
                        </tr>
                    </table>
                    <?php echo form_close(); ?>
                    <p>&nbsp;</p>
                    <div align="center">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>