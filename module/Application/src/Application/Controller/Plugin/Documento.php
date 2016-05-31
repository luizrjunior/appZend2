<?php

namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Documento extends AbstractPlugin {

    public function adicionarZeroCpf($nuCpf) {
        return str_pad($nuCpf, 11, "0", STR_PAD_LEFT);
    }

    public function validarCpf($cpf) {
        // Verifiva se o número digitado contém todos os digitos
        $cpf = str_pad(preg_replace('[-|\.]', '', $cpf), 11, '0', STR_PAD_LEFT);

        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
            return false;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }

    function formatarCpf($cpf) {
        $ret = str_pad($cpf, 11, "0", STR_PAD_LEFT);
        return $ret[0] . $ret[1] . $ret[2] . "." . $ret[3] . $ret[4] . $ret[5] . "." . $ret[6] . $ret[7] . $ret[8] . "-" . $ret[9] . $ret[10];
    }

    public function validarCnpj($cnpj) {
        $cnpj = str_pad(preg_replace('/[^0-9]/', '', (string) $cnpj), 14, '0', STR_PAD_LEFT);

        // Valida tamanho
        if (strlen($cnpj) != 14) {
            return false;
        }
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    function formatarCnpj($cnpj) {
        $cnpj = preg_replace("[' '-./ t]", '', $cnpj);
        $valor = str_pad(preg_replace('[^0-9]', '', $cnpj), 14, '0', STR_PAD_LEFT);
        return preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/', '$1.$2.$3/$4-$5', $valor);
    }

    function formatarTelefone($numero) {

        return (float) strtr($numero, array('(' => '', ')' => '', ' ' => '', '-' => ''));
    }

    function formatarSepararTelefone($numero) {
        
        $numero = (float) strtr($numero, array('(' => '', ')' => '', ' ' => '', '-' => ''));

        $nTel = strlen($numero);

        $nuDdd = null;
        $nuTelefone = null;

        if ($nTel == 10 || $nTel == 11) {
            $nuDdd = substr($numero, 0, 2);
            $nuTelefone = substr($numero, 2, $nTel);

            return array('nuDdd' => $nuDdd, 'nuTelefone' => $nuTelefone);
        } else {
            return false;
        }
    }

}
