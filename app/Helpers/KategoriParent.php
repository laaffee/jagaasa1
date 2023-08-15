<?php

namespace App\Helpers;

use App\Models\Kategori;

class KategoriParent
{
    public static function getParent($id)
    {
        $key = Kategori::where('id', $id)->first();
        
        return $key->kategori_nama ?? "- Induk Menu -";
    }
}