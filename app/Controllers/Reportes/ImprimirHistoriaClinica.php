<?php

namespace App\Controllers\Reportes;

use DateTime;
use FPDF;

class ImprimirHistoriaClinica extends FPDF
{

    public function imprimir($header = null, $data_paciente = null, $fecha_inicial=null, $fecha_final=null, $id_persona)
    {
        $this->AliasNbPages();
        $this->AddPage('P', 'letter');
        $this->SetFont('Arial', 'B', 15);
        $this->Image("odontograma/images/odontograma_paciente/6.png", 1, 60, 200, 200);
        $this->Image('img/cabecera.jpg', 6, 5, 202);
        $this->SetXY(6.9, 30);
        $this->Cell(200,10,utf8_decode("HISTORIA CLÍNICA ODONTOLÓGICA"), 0, 1, "C");
        $this->Image('img/cabecera_dos.jpg', 6, 39, 202);
        $this->print_header($header);
        $this->print_data_paciente($data_paciente);
        $this->print_codigo($data_paciente);

       

        // $this->cabeceraHorizontal($header, $length);
//        $this->datosHorizontal($data, $length, $cantidad);

        echo base64_encode($this->Output('S'));
    }

    public function print_codigo($data)
    {
        if(isset($data[0]->fecha_nacimiento)){
            $fecha_nacimiento = explode("-", $data[0]->fecha_nacimiento);
        }else{
            $fecha_nacimiento = ["", "", ""];
        }
        
        $nombres = (isset($data[0]->nombres)) ? strtoupper(substr($data[0]->nombres, 0 , 1)) : "";
        $paterno = (isset($data[0]->paterno)) ? strtoupper(substr($data[0]->paterno, 0, 1)): "";
        $materno = (isset($data[0]->materno)) ? strtoupper(substr($data[0]->materno, 0, 1)): "";
        $cadena = $fecha_nacimiento[2] . $fecha_nacimiento[1]. substr($fecha_nacimiento[0], 2,3).$nombres. $paterno.$materno;

        // IMPRIMIR CODIGO
        $cn = 160.5;
        for ($i=0; $i < strlen($cadena); $i++) {
            $this->SetXY($cn, 13.8);
            $this->Cell(10,5,utf8_decode($cadena[$i]), 0, 1, "L");
            $cn = $cn + 5;
        }

        // IMPRIMIR CI
        $cn = 200.5;
        $ci = strrev($data[0]->ci);
        for ($i=0; $i < strlen($ci); $i++) {
            $this->SetXY($cn, 18.4);
            $this->Cell(10,5,utf8_decode($ci[$i]), 0, 1, "L");
            $cn = $cn - 5;
        }
    }   

    public function print_header($header)
    {
        $this->SetFont('Arial', '', 11);
        $this->SetXY(48, 7.5);
        $this->Cell(80,5,utf8_decode($header['sedes']), 0, 1, "L");

        $this->SetXY(58, 13);
        $this->Cell(80,5,utf8_decode($header['red']), 0, 1, "L");

        $this->SetXY(56, 19);
        $this->Cell(80,5,utf8_decode($header['municipio']), 0, 1, "L");

        $this->SetXY(62, 24);
    
    }

    public function print_data_paciente($data)
    {
        // var_dump($data);
        //PRIMERA FILA
        $this->SetFont('Arial', '', 11);
        $this->SetXY(12,41);
        $this->Cell(55,5,utf8_decode($data[0]->paterno), 0, 1, "C");

        $this->SetXY(70,41);
        $this->Cell(52,5,utf8_decode($data[0]->materno), 0, 1, "C");

        $this->SetXY(125,41);
        $this->Cell(50,5,utf8_decode($data[0]->nombres), 0, 1, "C");
        $fecha_nacimiento = new DateTime($data[0]->fecha_nacimiento);
        $hoy = new DateTime();
        $edad = $hoy->diff($fecha_nacimiento);
        $this->SetXY(175,41);
        $this->Cell(16,5,utf8_decode($edad->y. " años"), 0, 1, "C");

        $this->SetXY(192,41);
        $this->Cell(10,5,utf8_decode($this->sexo($data[0]->sexo)), 0, 1, "C");

        //SEGUNDA FILA
        $this->SetXY(12,55);
        $this->Cell(55,5,utf8_decode($data[0]->lugar_nacimiento), 0, 1, "C");

        $this->SetXY(70,55);
        $this->Cell(52,5,utf8_decode(""), 0, 1, "C");

        $this->SetFont('Arial', '', 9);
        $this->SetXY(125,55);
        $this->Cell(50,5,utf8_decode($data[0]->domicilio), 0, 1, "C");

        $this->SetFont('Arial', '', 11);
        $this->SetXY(177,55);
        $this->Cell(25,5,utf8_decode($data[0]->telefono_celular), 0, 1, "C");

    }

    public function sexo($data)
    {
        if($data == "femenino")
        {
            return "F";
        }else{
            return "M";
        }
    }

    public function cabeceraHorizontal($cabecera, $tam)
    {
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(2, 157, 116); //Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco

        foreach ($cabecera as $key => $fila) {
            $this->CellFitSpace($tam[$key], 7, $fila, 1, 0, 'C', true);
        }
        $this->Ln();
    }

    public function datosHorizontal($datos = null, $tam = null, $cantidad=null)
    {
        if(count($datos) > 0)
        {
            $this->SetFont('Arial', '', 10);
            $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
            $this->SetTextColor(3, 3, 3); //Color del texto: Negro
            $bandera = false; //Para alternar el relleno
            $contador = 1;
            foreach ($datos as $key => $fila) {
                //Usaremos CellFitSpace en lugar de Cell
                $this->CellFitSpace($tam[0], 7, $contador++, 1, 0, 'C', $bandera);
                $this->CellFitSpace($tam[1], 7, utf8_decode($fila['nombre_paciente']), 1, 0, 'L', $bandera);
                $this->CellFitSpace($tam[2], 7, utf8_decode($fila['tipo_tratamiento']), 1, 0, 'L', $bandera);
                $this->CellFitSpace($tam[3], 7, utf8_decode($fila['fecha']), 1, 0, 'L', $bandera);
                $this->CellFitSpace($tam[4], 7, utf8_decode($fila['hora_inicio']), 1, 0, 'L', $bandera);
                $this->CellFitSpace($tam[5], 7, utf8_decode($fila['nombre_odontologo']), 1, 0, 'L', $bandera);
                $this->CellFitSpace($tam[6], 7, utf8_decode($fila['estatus']), 1, 0, 'C', $bandera);
                $this->Ln(); //Salto de línea para generar otra fila
                $bandera = !$bandera; //Alterna el valor de la bandera
            }
            $this->Ln(2);
            $this->CellFitSpace(array_sum($tam), 7, utf8_decode("Atendidos: " . $cantidad[0]),0, 0,'L', false);
            $this->Ln();
            $this->CellFitSpace(array_sum($tam), 7, utf8_decode("Cancelados: ". $cantidad[1]),0, 0, 'L', false);
            $this->Ln();
            $this->CellFitSpace(array_sum($tam), 7, utf8_decode("Pendientes: ". $cantidad[2]),0,0, 'L', false);

        }else{
            $this->SetTextColor(0, 0, 0);
            $this->CellFitSpace(array_sum($tam), 7, utf8_decode("No existe registros "), 1, 0, 'C', false);
        }

    }

    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'R');
    }

    public function mes_literal($mes)
    {
        $m = '';
        if ($mes == '01' || $mes == '1') {
            $m = "enero";
        } elseif ($mes == '02' || $mes == '2') {
            $m = "febrero";
        } elseif ($mes == '03' || $mes == '3') {
            $m = "marzo";
        } elseif ($mes == '04' || $mes == '4') {
            $m = "abril";
        } elseif ($mes == '05' || $mes == '5') {
            $m = "mayo";
        } elseif ($mes == '06' || $mes == '6') {
            $m = "junio";
        } elseif ($mes == '07' || $mes == '7') {
            $m = "julio";
        } elseif ($mes == '08' || $mes == '8') {
            $m = "agosto";
        } elseif ($mes == '09' || $mes == '9') {
            $m = "septiembre";
        } elseif ($mes == '10') {
            $m = "octubre";
        } elseif ($mes == '11') {
            $m = "noviembre";
        } else {
            $m = "diciembre";
        }
        return $m;
    }

    public function CellFit($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '', $scale = false, $force = true)
    {
        $str_width = $this->GetStringWidth($txt);
        if($str_width == 0){
            $str_width = 0.1;
        }

        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $ratio = ($w - $this->cMargin * 2) / $str_width;

        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit) {
            if ($scale) {
                $horiz_scale = $ratio * 100.0;
                $this->_out(sprintf('BT %.2F Tz ET', $horiz_scale));
            } else {
                $char_space = ($w - $this->cMargin * 2 - $str_width) / max($this->MBGetStringLength($txt) - 1, 1) * $this->k;
                $this->_out(sprintf('BT %.2F Tc ET', $char_space));
            }
            $align = '';
        }

        $this->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);

        if ($fit)
            $this->_out('BT ' . ($scale ? '100 Tz' : '0 Tc') . ' ET');
    }

    public function CellFitSpace($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        $this->CellFit($w, $h, $txt, $border, $ln, $align, $fill, $link, false, false);
    }

    public function MBGetStringLength($s)
    {
        if ($this->CurrentFont['type'] == 'Type0') {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++) {
                if (ord($s[$i]) < 128)
                    $len++;
                else {
                    $len++;
                    $i++;
                }
            }
            return $len;
        } else {
            return strlen($s);
        }
    }
}