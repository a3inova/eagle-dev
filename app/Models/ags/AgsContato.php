<?php

namespace App\Models\ags;

use Illuminate\Database\Eloquent\Model;

class AgsContato extends Model
{
    //Indicates if the IDs are auto-incrementing.
    //public $incrementing = false;

    //Desable timestamps.
    public $timestamps = false;

    //Overiding table.
    protected $table = 'AGS_CONTATO';

    //The primary key associated with the table.
    protected $primaryKey = 'ID';

    //If primary key is not an integer.
    //protected $keyType = 'string';

    //Attributes table.
    protected $fillable = [
                           'ID',
                           'ID_PESSOA',
                           'TP_CONTATO',
                           'NR_DDD',
                           'NR_TELEFONE',
                           'NM_EMAIL',
                           'TXT_OBSERVACAO',
                           'SN_PRINCIPAL',
                           'SN_ATIVO',

                           ];

}
