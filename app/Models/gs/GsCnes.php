<?php

namespace App\Models\gs;

use Illuminate\Database\Eloquent\Model;

class GsCnes extends Model
{
    //Indicates if the IDs are auto-incrementing.
    //public $incrementing = false;

    //Desable timestamps.
    public $timestamps = false;

    //Overiding table.
    protected $table = 'GS_CNES';

    //The primary key associated with the table.
    protected $primaryKey = 'ID';

    //If primary key is not an integer.
    //protected $keyType = 'string';

    //Attributes table.
    protected $fillable = [
                           'ID',
                           'ID_PESSOA',
                           'TP_ESFERA_ADMINISTRATIVA',
                           'DS_BPA_ARQ',
                           'NM_ORGAO_EMISSOR',
                           'NR_IBGE_ORGAO_EMISSOR',
                           'NR_PAB_ORGAO_EMISSOR',
                           'TP_ORGAO_EMISSOR',
                           'ID_DIRETOR',
                           'ID_RESPONSAVEL',
                           'ID_AUDITOR',
                           'ID_AUTORIZADOR',
                           'ID_CLINICO',
                           'TP_NATUREZA_JURIDICA',
                           'NR_IVHE',
                           'QTD_LEITOS',
                           'DS_SIGLA',
                           'VE_TETO_GR',
                           'VE_TETO_ES',
                           'VE_TETO_PR',
                           'SN_RECEPCAO',
                           'SN_SADT',
                           'SN_RAIOX',
                           'SN_GENERICO',
                           'SN_DIGITA_BPA',
                           'SN_DIGITA_APAC',
                           'SN_DIGITA_AIH',
                           'SN_MEDICO_CREDENCIADO',
                           'SN_FAIXA_APAC',
                           'SN_MANTENEDOR',
                           'SN_BRW_DIG',
                           'SN_CADASTRA_PACIENTE',
                           'SN_SERVICO_BPA',
                           'SN_VALIDIDA_55',
                           'SN_EXIGE_AUTORIZACAO',
                           'SN_COMPLEMENTA_PACIENTE',
                           'SN_CTRL_REMESSA',
                           'SN_AIH_PROVIS',
                           'NR_CTRL_AIH',
                           'SN_BLQ_AUTORI',
                           'TP_MEDICO_AUDITOR',
                           'SN_CNS_MEDICO',
                           'SN_ETIQUETA_AIH',
                           'SN_REPETE_CID',
                           'SN_CBO',
                           'SN_CRM',

                           ];

}
