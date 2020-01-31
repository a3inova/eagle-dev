<?php

namespace App\Models\ags;

use Illuminate\Database\Eloquent\Model;

class AgsCep extends Model
{
    //Indicates if the IDs are auto-incrementing.
    //public $incrementing = false;

    //Desable timestamps.
    public $timestamps = false;

    //Overiding table.
    protected $table = 'AGS_CEP';

    //The primary key associated with the table.
    protected $primaryKey = 'ID';

    //If primary key is not an integer.
    //protected $keyType = 'string';

    //Attributes table.
    protected $fillable = [
                           'ID',
                           'ID_BAIRRO',
                           'NR_CEP',
                           'ID_TIPO_LOGRADOURO',
                           'NM_LOGRADOURO',
                           'SN_ATIVO',

                           ];

}
