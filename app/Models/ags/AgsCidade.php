<?php

namespace App\Models\ags;

use Illuminate\Database\Eloquent\Model;

class AgsCidade extends Model
{
    //Indicates if the IDs are auto-incrementing.
    //public $incrementing = false;

    //Desable timestamps.
    public $timestamps = false;

    //Overiding table.
    protected $table = 'AGS_CIDADE';

    //The primary key associated with the table.
    protected $primaryKey = 'ID';

    //If primary key is not an integer.
    //protected $keyType = 'string';

    //Attributes table.
    protected $fillable = [
                           'ID',
                           'ID_UF',
                           'CD_CIDADE',
                           'CD_IBGE',
                           'NM_CIDADE',
                           'NR_CEP_GENERICO',
                           'SN_GENERICO',
                           'SN_ATIVO',

                           ];

}
