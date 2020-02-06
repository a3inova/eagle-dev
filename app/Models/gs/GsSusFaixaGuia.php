<?php

namespace App\Models\gs;

use Illuminate\Database\Eloquent\Model;

class GsSusFaixaGuia extends Model
{
    //Indicates if the IDs are auto-incrementing.
    //public $incrementing = false;

    //Desable timestamps.
    public $timestamps = false;

    //Overiding table.
    protected $table = 'GS_SUS_FAIXA_GUIA';

    //The primary key associated with the table.
    protected $primaryKey = 'ID';

    //If primary key is not an integer.
    //protected $keyType = 'string';

    //Attributes table.
    protected $fillable = [
                           'ID',
                           'ID_CNES',
                           'TP_FAIXA',
                           'NR_FAIXA_INI',
                           'NR_FAIXA_FIM',
                           'DT_INI',
                           'DT_FIM',

                           ];

}
