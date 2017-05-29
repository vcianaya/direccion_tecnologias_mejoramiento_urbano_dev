<style>
    .rcorners1 {
        //  border-radius: 25px;
        border-color: #000000;
        padding: 20px; 
        border:1px solid black;
        height: 390px;

    }
</style>
<div class="container-fluid">
    <div class="row" >
        <div class="col-md-6 rcorners1" >
            <div style="color:black; font-family: verdana, arial; font-size:30px; padding:15px;" id ="displayReloj" >   </div>
            <?php echo '<h2> Numero de operativos registrados en la gestion 2017: <strong style="color:red; font-family: verdana, arial; font-size:30px; padding:15px;" > ' . $tipTotal = $this->intendencia_model->mumero_casos_registrados_intendencia() . '</strong>  Operativos</h2>'; ?>
            <?php
            foreach ($fecha as $f):

            endforeach;
            ?> 
            <h3><strong>FECHA DEL ULTIMO VACIADO DE OPERATIVOS AL SISTEMA:</strong> <span class="rojo"><?php echo $f->fecha_ultimo; ?></span></p>
                <?php
                foreach ($fecha_decomisos as $fe):

                endforeach;
                ?>
                <h3><strong>FECHA DEL ULTIMO VACIADO DE DECOMISOS AL SISTEMA: </strong><span class="rojo"><?php echo $fe->fecha_ultimo; ?></span></p>


                    </div>
                    <div class="col-md-6 rcorners1">
                        <div class="row">
                            <div class="col-md-3">
                                <table width="195" border="1" align="center">
                                    <tr>
                                        <td colspan="2" bgcolor="#CCCCCC"><strong>OPERATIVOS POR MES</strong></td>
                                    </tr>

                                    <tr>
                                        <td width="100" bgcolor="#CCCCCC"><strong>MES</strong></td>
                                        <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                                    </tr>
                                    <tr>
                                        <td>ENERO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(1); ?></td>
                                    </tr>
                                    <tr>
                                        <td>FEBRERO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>MARZO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(3); ?></td>
                                    </tr>
                                    <tr>
                                        <td>ABRIL </td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(4); ?></td>
                                    </tr>
                                    <tr>
                                        <td>MAYO </td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(5); ?></td>
                                    </tr>
                                    <tr>
                                        <td>JUNIO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(6); ?></td>
                                    </tr>
                                    <tr>
                                        <td>JULIO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(7); ?></td>
                                    </tr>
                                    <tr>
                                        <td>AGOSTO</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(8); ?></td>
                                    </tr>
                                    <tr>
                                        <td>SEPTIEMBRE</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(9); ?></td>
                                    </tr>
                                    <tr>
                                        <td>OCTUBRE</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(10); ?></td>
                                    </tr>
                                    <tr>
                                        <td>NOVIEMBRE</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(11); ?></td>
                                    </tr>
                                    <tr>
                                        <td>DICIEMBRE</td>
                                        <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_mes(12); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-3">
                                GRAFICO
                            </div>                
                        </div>
                    </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 rcorners1">
                            <div class="row">
                                <div class="col-md-3">
                                    <table border="1">
                                        <tr>
                                            <td colspan="2" bgcolor="#CCCCCC"><strong>OPERATIVOS POR DISTRITOS</strong></td>
                                        </tr>
                                        <tr>
                                            <td width="152" bgcolor="#CCCCCC"><strong>DISTRITOS  </strong></td>
                                            <td width="139" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                                        </tr>
                                        <tr>
                                            <td>D1</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(1); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D2</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(2); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D3</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(3); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D4</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(4); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D5</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(5); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D6</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(6); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D7</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(7); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D8</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(8); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D9</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(9); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D10</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(10); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D11</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(11); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D12</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(12); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D13</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(13); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>D14</td>
                                            <td><span class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_distrito(14); ?></span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-3">
                                    GRAFICO
                                </div>                
                            </div>
                        </div>
                        <div class="col-md-6 rcorners1">
                            <div class="row">
                                <div class="col-md-6">
                                    <table  border="1" align="center">
                                        <tr>
                                            <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>TIPO DE OPERATIVOS</strong></td>
                                        </tr>
                                        <tr>
                                            <td width="278" bgcolor="#CCCCCC"><strong>NOMBRE DEL TIPO DE OPERATIVO</strong></td>
                                            <td width="79" bgcolor="#CCCCCC"><strong>CANTIDAD</strong></td>
                                        </tr>
                                        <tr>
                                            <td>BARES, DISCOTECAS Y CANTINAS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>EXPENDIO Y VENTA DE ALIMENTOS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(6); ?></td>
                                        </tr>
                                        <tr>
                                            <td>GRANJAS, CRIADEROS Y FABRICAS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(5); ?></td>
                                        </tr>
                                        <tr>
                                            <td>HOTELES, MOTELES Y ALOJAMIENTOS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(8); ?></td>
                                        </tr>
                                        <tr>
                                            <td>MATADEROS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(9); ?></td>
                                        </tr>
                                        <tr>
                                            <td>HORNO PANIFICADORA</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(10); ?></td>
                                        </tr>
                                        <tr>
                                            <td>ASENTAMIENTOS EN VIAS PUBLICAS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(11); ?></td>
                                        </tr>
                                        <tr>
                                            <td>LENOCINIO</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(12); ?></td>
                                        </tr>
                                        <tr>
                                            <td>PUESTOS DE VENTA</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(13); ?></td>
                                        </tr>
                                        <tr>
                                            <td>INTERNET</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(14); ?></td>
                                        </tr>
                                        <tr>
                                            <td>OTROS</td>
                                            <td class="rojo"><?php echo $this->intendencia_model->mumero_casos_registrados_operativos(15); ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    GRAFICO
                                </div>                
                            </div>
                        </div>

                    </div>
                    </div>