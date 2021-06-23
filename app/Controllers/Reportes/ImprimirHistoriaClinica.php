<?php

namespace App\Controllers\Reportes;

use FPDF;

class ImprimirHistoriaClinica extends FPDF
{

    public function imprimir($data = null, $fecha_inicial=null, $fecha_final=null, $id = null)
    {
        $this->AliasNbPages();
        $this->AddPage('P', 'letter');
        $this->SetFont('Arial', 'B', 15);
        $this->Image("odontograma/images/odontograma_paciente/6.png", 1, 60, 200, 200);
        $this->Image('img/cabecera.jpg', 6, 5, 202);
        $this->SetXY(6.9, 30);
        $this->Cell(200,10,utf8_decode("HISTORIA CLÍNICA ODONTOLÓGICA"), 0, 1, "C");
        $this->Image('img/cabecera_dos.jpg', 6, 39, 202);

       

        // $this->cabeceraHorizontal($header, $length);
//        $this->datosHorizontal($data, $length, $cantidad);

        echo base64_encode($this->Output('S'));
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