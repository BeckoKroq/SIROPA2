<?php

namespace App\own_clases;

class Paquete
{
  public function ultimo_listas($lista)
    {
        for($i = 0; $i <= count($lista); $i++)
        {
            if($i == count($lista))
            {
                $ultimo = $lista[i];
            }
        }
        return $ultimo;
    }
}