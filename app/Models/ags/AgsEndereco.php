<?php

namespace App\Models\ags;

use Illuminate\Database\Eloquent\Model;

class AgsEndereco extends Model
{
    //Indicates if the IDs are auto-incrementing.
    //public $incrementing = false;

    //Desable timestamps.
    public $timestamps = false;

    //Overiding table.
    protected $table = 'AGS_ENDERECO';

    //The primary key associated with the table.
    protected $primaryKey = 'ID';

    //If primary key is not an integer.
    //protected $keyType = 'string';

    //Attributes table.
    protected $fillable = [
                           'ID',
                           'ID_PESSOA',
                           'TP_ENDERECO',
                           'ID_CEP',
                           'ID_TIPO_LOGRADOURO',
                           'DS_LOGRADOURO',
                           'DS_COMPLEMENTO',
                           'NM_BAIRO',
                           'NM_CIDADE',
                           'ID_UF',
                           'TXT_OBSERVACAO',
                           'SN_PRINCIPAL',
                           'SN_ATIVO',

                           ];

}
