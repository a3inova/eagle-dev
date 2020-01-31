<?php

namespace App\Models\ags;

use Illuminate\Database\Eloquent\Model;

class AgsUf extends Model
{
    //Indicates if the IDs are auto-incrementing.
    //public $incrementing = false;

    //Desable timestamps.
    public $timestamps = false;

    //Overiding table.
    protected $table = 'AGS_UF';

    //The primary key associated with the table.
    protected $primaryKey = 'ID';

    //If primary key is not an integer.
    //protected $keyType = 'string';

    //Attributes table.
    protected $fillable = [
                           'ID',
                           'ID_REGIAO',
                           'CD_UF',
                           'DS_SIGLA',
                           'NM_UF',
                           'SN_ATIVO',

                           ];

}
