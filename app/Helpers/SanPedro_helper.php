<?php

use App\Models\Querys;

if (!function_exists('authenticated')) {
    function authenticated()
    {
        $idUser = (\Config\Services::session())->get('id_persona');
        $nameGroup = (\Config\Services::session())->get('nombre_grupo');
        $user = (new Querys())->verifyUser(['id_persona' => $idUser, 'nombre_grupo' => $nameGroup])->getRowArray();
        return (is_null($user) ? FALSE : $user);
    }
}
if (!function_exists('is')) {
    function is($nameGroup = [])
    {
        $roles = (new Querys())->verifyUser(['id_persona' => (\Config\Services::session())->get('id_persona'), 'nombre_grupo' => (\Config\Services::session())->get('nombre_grupo')])->getRowArray();
        if ($roles != null) {
            if (is_array($nameGroup)) {
                return in_array($roles['nombre_grupo'], $nameGroup);
            } else {
                // return in_array($nombre_grupo, explode(',', preg_replace('/\s+/', '', $CI->load->get_var('usuario')['nombre_grupo'])));
                return ($roles['nombre_grupo'] === $nameGroup);
            }
        } else return false;
    }
}
if (!function_exists('css_tag')) {
    function css_tag($src = '', $type = 'text/css')
    {
        $css = '<st' . 'yle type="' . $type . '">';
        if (is_file(FCPATH . 'css/' . $src . '.css')) {
            if (strpos($src, '://') === FALSE) {
                ob_start();
                require(FCPATH . 'css/' . $src . '.' . 'css');
                $css .= ob_get_clean();
            }
        }
        $css .= '</st' . 'yle>';
        return $css;
    }
}

if (!function_exists('script_tag')) {
    function script_tag($src = '', $flashdata = NULL, $type = 'text/javascript')
    {
        $script = '<scr' . 'ipt type="' . $type . '">';
        if (is_file(FCPATH . 'js/' . $src . '.js')) {
            if (strpos($src, '://') === FALSE) {
                ob_start();
                require(FCPATH . 'js/' . $src . '.' . 'js');
                $script .= ob_get_clean();
            }
        }
        if (is_array($flashdata)) {
            foreach ($flashdata as $kmsg => $msg) {
                $script .= "$.toast({
                                icon: `<?php echo ((is_numeric({$kmsg}) || empty({$kmsg})) ? 'error' : {$kmsg}); ?>`,
                                heading: `<?php echo ((is_numeric({$kmsg}) || empty({$kmsg})) ? 'ERROR [' . {$kmsg} . ']' : 'INFORMACIÓN'); ?>`,
                                text: `<?php echo {$msg} ?>`,
                                position: `top-center`,
                                showHideTransition: `plain`,
                                allowToastClose: true,
                                loaderBg: `#FFF`,
                                hideAfter: 5000,
                                stack: 5 });";
            }
        }
        $script .= '</scr' . 'ipt>';
        return $script;
    }
}

if (!function_exists('mes_literal')) {
    function mes_literal($mes = 0)
    {
        switch (intval($mes)) {
            case 1:
                return 'ENERO';
                break;
            case 2:
                return 'FEBRERO';
                break;
            case 3:
                return 'MARZO';
                break;
            case 4:
                return 'ABRIL';
                break;
            case 5:
                return 'MAYO';
                break;
            case 6:
                return 'JUNIO';
                break;
            case 7:
                return 'JULIO';
                break;
            case 8:
                return 'AGOSTO';
                break;
            case 9:
                return 'SEPTIEMBRE';
                break;
            case 10:
                return 'OCTUBRE';
                break;
            case 11:
                return 'NOVIEMBRE';
                break;
            case 12:
                return 'DICIEMBRE';
                break;
            default:
                return '';
                break;
        }
    }
}

if (!function_exists('fecha_literal')) {
    function fecha_literal($fecha, $formato = 0)
    {
        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $infofecha = getdate(strtotime($fecha));
        if (empty($fecha)) {
            return ('');
        } else {
            switch ($formato) {
                case 1:
                    return ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . ' de ' . $meses[$infofecha['mon']] . ' de ' . $infofecha['year'];
                    break;
                case 2:
                    return $dias[$infofecha['wday']] . ', ' . ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . ' de ' . $meses[$infofecha['mon']] . ' de ' . $infofecha['year'];
                    break;
                case 3:
                    return $dias[$infofecha['wday']] . ', ' . ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . ' de ' . $meses[$infofecha['mon']] . ' de ' . $infofecha['year'] . ' [Hrs. ' . ($infofecha['hours'] < 10 ? '0' : '') . $infofecha['hours'] . ':' . ($infofecha['minutes'] < 10 ? '0' : '') . $infofecha['minutes'] . ']';
                    break;
                case 5:
                    return ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . ' de ' . $meses[$infofecha['mon']] . ' de ' . $infofecha['year'] . ' [Hrs. ' . ($infofecha['hours'] < 10 ? '0' : '') . $infofecha['hours'] . ':' . ($infofecha['minutes'] < 10 ? '0' : '') . $infofecha['minutes'] . ']';
                    break;
                case 9:
                    return ($infofecha['mday'] < 10 ? '0' : '') . $infofecha['mday'] . '/' . substr(strtolower($meses[$infofecha['mon']]), 0, 3);
                    break;
                case 10:
                    return $infofecha['year'];
                    break;
                case 20:
                    return $infofecha['mon'];
                    break;
                case 30:
                    return $infofecha['mday'];
                    break;
                default:
                    return date('Y-m-d H:i:s', strtotime($fecha));
                    break;
            }
        }
    }
}

if (!function_exists('mayusculas')) {
    function mayusculas($cadena = NULL)
    {
        $resultado = NULL;
        if (!is_null($cadena)) {
            $resultado = mb_strtoupper($cadena);
        }
        return $resultado;
    }
}
if (!function_exists('minusculas')) {
    function minusculas($cadena = NULL)
    {
        $resultado = NULL;
        if (!is_null($cadena)) {
            $resultado = mb_strtolower($cadena);
        }
        return $resultado;
    }
}
function numero_literal($num, $fem = false, $dec = true, $is_num = false)
{
    $numOriginal = $num;
    $matuni[2] = "dos";
    $matuni[3] = "tres";
    $matuni[4] = "cuatro";
    $matuni[5] = "cinco";
    $matuni[6] = "seis";
    $matuni[7] = "siete";
    $matuni[8] = "ocho";
    $matuni[9] = "nueve";
    $matuni[10] = "diez";
    $matuni[11] = "once";
    $matuni[12] = "doce";
    $matuni[13] = "trece";
    $matuni[14] = "catorce";
    $matuni[15] = "quince";
    $matuni[16] = "dieciseis";
    $matuni[17] = "diecisiete";
    $matuni[18] = "dieciocho";
    $matuni[19] = "diecinueve";
    $matuni[20] = "veinte";
    $matunisub[2] = "dos";
    $matunisub[3] = "tres";
    $matunisub[4] = "cuatro";
    $matunisub[5] = "quin";
    $matunisub[6] = "seis";
    $matunisub[7] = "sete";
    $matunisub[8] = "ocho";
    $matunisub[9] = "nove";

    $matdec[2] = "veint";
    $matdec[3] = "treinta";
    $matdec[4] = "cuarenta";
    $matdec[5] = "cincuenta";
    $matdec[6] = "sesenta";
    $matdec[7] = "setenta";
    $matdec[8] = "ochenta";
    $matdec[9] = "noventa";
    $matsub[3] = 'mill';
    $matsub[5] = 'bill';
    $matsub[7] = 'mill';
    $matsub[9] = 'trill';
    $matsub[11] = 'mill';
    $matsub[13] = 'bill';
    $matsub[15] = 'mill';
    $matmil[4] = 'millones';
    $matmil[6] = 'billones';
    $matmil[7] = 'de billones';
    $matmil[8] = 'millones de billones';
    $matmil[10] = 'trillones';
    $matmil[11] = 'de trillones';
    $matmil[12] = 'millones de trillones';
    $matmil[13] = 'de trillones';
    $matmil[14] = 'billones de trillones';
    $matmil[15] = 'de billones de trillones';
    $matmil[16] = 'millones de billones de trillones';

    $numeroFloat = explode('.', $num);
    $num = $numeroFloat[0];
    $num = trim((string)@$num);
    if ($num[0] == '-') {
        $neg = 'menos ';
        $num = substr($num, 1);
    } else
        $neg = '';
    while ($num[0] == '0')
        $num = substr($num, 1);
    if ($num[0] < '1' or $num[0] > 9)
        $num = '0' . $num;
    $zeros = true;
    $punt = false;
    $ent = '';
    $fra = '';
    for ($c = 0; $c < strlen($num); $c++) {
        $n = $num[$c];
        if (!(strpos(".,'''", $n) === false)) {
            if ($punt)
                break;
            else {
                $punt = true;
                continue;
            }
        } elseif (!(strpos('0123456789', $n) === false)) {
            if ($punt) {
                if ($n != '0')
                    $zeros = false;
                $fra .= $n;
            } else
                $ent .= $n;
        } else
            break;
    }
    $ent = '     ' . $ent;
    if ($dec and $fra and !$zeros) {
        $fin = ' coma';
        for ($n = 0; $n < strlen($fra); $n++) {
            if (($s = $fra[$n]) == '0')
                $fin .= ' cero';
            elseif ($s == '1')
                $fin .= $fem ? ' una' : ' un';
            else
                $fin .= ' ' . $matuni[$s];
        }
    } else
        $fin = '';
    if ((int)$ent === 0)
        return 'Cero ' . $fin;
    $tex = '';
    $sub = 0;
    $mils = 0;
    $neutro = false;
    while (($num = substr($ent, -3)) != '   ') {
        $ent = substr($ent, 0, -3);
        if (++$sub < 3 and $fem) {
            $matuni[1] = 'una';
            $subcent = 'as';
        } else {
            $matuni[1] = $neutro ? 'un' : 'uno';
            $subcent = 'os';
        }
        $t = '';
        $n2 = substr($num, 1);
        if ($n2 == '00') {
        } elseif ($n2 < 21)
            $t = ' ' . $matuni[(int)$n2];
        elseif ($n2 < 30) {
            $n3 = $num[2];
            if ($n3 != 0)
                $t = 'i' . $matuni[$n3];
            $n2 = $num[1];
            $t = ' ' . $matdec[$n2] . $t;
        } else {
            $n3 = $num[2];
            if ($n3 != 0)
                $t = ' y ' . $matuni[$n3];
            $n2 = $num[1];
            $t = ' ' . $matdec[$n2] . $t;
        }
        $n = $num[0];
        if ($n == 1) {
            $t = ' ciento' . $t;
            if ($is_num == true) {
                $t = ' cien';
            }
        } elseif ($n == 5) {
            $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t;
        } elseif ($n != 0) {
            $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t;
        }
        if ($sub == 1) {
        } elseif (!isset($matsub[$sub])) {
            if ($num == 1) {
                $t = ' mil';
            } elseif ($num > 1) {
                $t .= ' mil';
            }
        } elseif ($num == 1) {
            $t .= ' ' . $matsub[$sub] . '&oacute;n';
        } elseif ($num > 1) {
            $t .= ' ' . $matsub[$sub] . 'ones';
        }
        if ($num == '000')
            $mils++;
        elseif ($mils != 0) {
            if (isset($matmil[$sub]))
                $t .= ' ' . $matmil[$sub];
            $mils = 0;
        }
        $neutro = true;
        $tex = $t . $tex;
    }
    $tex = $neg . substr($tex, 1) . $fin;
    if (empty($numeroFloat[1])) {
        $numeroFloat[1] = '00';
    } else {
        $parte_decimal = (round($numOriginal, 2) - (int)$numOriginal) * 100;
    }
    $bolivianos = '/100 bolivianos';
    if ($is_num == true) {
        $bolivianos = '';
        $numeroFloat[1] = '';
    }
    if (empty($parte_decimal))
        $end_num = ucfirst($tex) . ' ' . $numeroFloat[1] . $bolivianos;
    else
        $end_num = ucfirst($tex) . ' ' . round($parte_decimal) . $bolivianos;
    return $end_num;
}
if (!function_exists('numero_romano')) {
    function numero_romano($integer, $upcase = true)
    {
        $table = array(
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100,
            'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9,
            'V' => 5, 'IV' => 4, 'I' => 1
        );
        $return = '';
        while ($integer > 0) {
            foreach ($table as $rom => $arb) {
                if ($integer >= $arb) {
                    $integer -= $arb;
                    $return .= ($upcase ? $rom : strtolower($rom));
                    break;
                }
            }
        }
        return $return;
    }
}
