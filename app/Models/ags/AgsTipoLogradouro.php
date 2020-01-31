<?php

namespace App\Models\ags;

use Illuminate\Database\Eloquent\Model;

class AgsTipoLogradouro extends Model
{
    //Indicates if the IDs are auto-incrementing.
    //public $incrementing = false;

    //Desable timestamps.
    public $timestamps = false;

    //Overiding table.
    protected $table = 'AGS_TIPO_LOGRADOURO';

    //The primary key associated with the table.
    protected $primaryKey = 'ID';

    //If primary key is not an integer.
    //protected $keyType = 'string';

    //Attributes table.
    protected $fillable = [
                           'ID',
                           'TP_LOGRADOURO',
                           'DS_TIPO_LOGRADOURO',
                           'SN_ATIVO',

                           ];

}
