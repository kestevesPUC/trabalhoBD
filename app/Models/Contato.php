<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public function lista()
    {
        return (object)[
            'nome'=>'Kaio',
            'tel'=>'(31) 3327-6670',
        ];
    }
}
