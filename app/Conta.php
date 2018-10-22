<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = 'contas';
    public $timestamps = false;

    /**
     * RELACIONAMENTO COM TIPO CONTA
     */
    public function tipo_conta()
    {
        return $this->belongsTo('App\TipoConta', 'tipo_conta_id');
    }

    public function banco()
    {
        return $this->belongsTo('App\Banco', 'banco_id');
    }
}
