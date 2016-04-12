<?php
namespace Andersonef\Componentes\Animal\Entities\Views;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnimalConsulta
 * @package Andersonef\Componentes\Entities\Views
 */
class AnimalConsulta extends Model
{
    /**
     * @var string
     */
    protected $table = "AnimalConsulta";


    protected $appends = ['idadeAnimal', 'idadeAnimalAbreviada'];

    /**
     * @var string
     */
    protected $primaryKey = 'codigoAnimal';
    /**
     * @var bool
     */
    public static $snakeAttributes = false;




    public function getIdadeAnimalAttribute()
    {
        if($this->dataNascimentoAnimal){
            $nasc = new \DateTime($this->dataNascimentoAnimal);
            $agora = new \DateTime(date("Y-m-d"));
            $diasAnimal = $agora->diff($nasc)->format("%a");

            $numeros = explode(',', $agora->diff($nasc)->format("%y,%m,%d"));
            if($diasAnimal > 365){
                return trans('Entities/Views/AnimalConsulta.idadeAnimalAnos', ['anos' => $numeros[0], 'meses' => $numeros[1], 'dias' => $numeros[2]]);
            }
            return trans('Entities/Views/AnimalConsulta.idadeAnimalMeses', ['meses' => $numeros[1], 'dias' => $numeros[2]]);
        }
        return 'N/D ';
    }



    public function getIdadeAnimalAbreviadaAttribute()
    {
        if($this->dataNascimentoAnimal){
            $nasc = new \DateTime($this->dataNascimentoAnimal);
            $agora = new \DateTime(date("Y-m-d"));
            $diasAnimal = $agora->diff($nasc)->format("%a");

            $numeros = explode(',', $agora->diff($nasc)->format("%y,%m,%d"));
            return trans('Entities/Views/AnimalConsulta.idadeAnimalAbreviada', ['anos' => $numeros[0], 'meses' => $numeros[1], 'dias' => $numeros[2]]);

        }
        return 'N/D ';
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Mae()
    {
        return $this->belongsTo(AnimalConsulta::class, 'codigoMae', 'codigoAnimal');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Pai()
    {
        return $this->belongsTo(AnimalConsulta::class, 'codigoPai', 'codigoAnimal');
    }



    protected $fillable = ['codigoAnimal',
        'codigoTipoSangue',
        'descTipoSangue',
        'codigoTipoPelagem',
        'descTipoPelagem',
        'codigoPai',
        'codigoMae',
        'nomeAnimal',
        'sexoAnimal',
        'sisBovAnimal',
        'dataNascimentoAnimal',
        'pathFotoAnimal',
        'nomeOriginalFotoAnimal',
        'codigoRegBaseAnimal',
        'mascaraCodigoRegBaseAnimal',
        'contemporaneaAnimal',
        'ptaAnimal',
        'preCadastroAnimal',
        'statusAnimal',
        'codigoPessoaInspetorRegDefinitivo',
        'nomePessoaInspetorRegDefinitivo',
        'letraRegDefinitivo',
        'numeroRegDefinitivo',
        'cadernetaRegDefinitivo',
        'aparenciaRegDefinitivo',
        'capacidadeRegDefinitivo',
        'caracteristicaRegDefinitivo',
        'aparelhoRegDefinitivo',
        'dataInspecaoRegDefinitivo',
        'dataCadastroRegDefinitivo',
        'statusRegDefinitivo',
        'serieUnicaRegDefinitivo',
        'codigoPessoaInspetorRegFundacao',
        'nomePessoaInspetorRegFundacao',
        'letraRegFundacao',
        'numeroRegFundacao',
        'dataInspecaoRegFundacao',
        'dataCadastroRegFundacao',
        'statusRegFundacao',
        'serieUnicaRegFundacao',
        'codigoPessoaInspetorRegNascimento',
        'nomePessoaInspetorRegNascimento',
        'letraRegNascimento',
        'numeroRegNascimento',
        'dataInspecaoRegNascimento',
        'dataCadastroRegNascimento',
        'statusRegNascimento',
        'serieUnicaRegNascimento',
        'codigoTransferenciaProprietario',
        'codigoPessoaProprietario',
        'codigoAssociadoProprietario',
        'nomePessoaProprietario',
        'codigoFazendaProprietario',
        'nomeFazendaProprietario',
        'nroPartTransferenciaProprietario',
        'codigoTransferenciaCriador',
        'codigoPessoaCriador',
        'codigoAssociadoCriador',
        'nomePessoaCriador',
        'codigoFazendaCriador',
        'nomeFazendaCriador',
        'nroPartTransferenciaCriador',
        'rgnProdutoNascimento',
        'codigoComNascimento',
        'codigoCruzamento',
        'codigoComunicacao',
        'codigoReceptora',
        'codigoUltimoServico',
        'codigoStatusAnimalUltimoServico',
        'descStatusAnimalUltimoServico',
        'consignadoAnimal',
        'seloRegDefinitivo',
        'statusAnimalBaixa',
        'regFundacao',
        'mascaraRegFundacao',
        'regNascimento',
        'mascaraRegNascimento',
        'regDefinitivo',
        'mascaraRegDefinitivo',
        'tipoRegistro',
        'mascaraRegistro',
        'codigoCategoriaTouro',
        'nomeCategoriaTouro',
        'descCategoriaTouro',
        'sclAnimal',
        'bitFotoMiniaturaAnimal',
        'codigoFazendaUltimoParto',
        'codigoFazendaUltimoControle',
        'siglaTipoSangue',
        'codigoAnimal',
        'codigoTipoSangue',
        'descTipoSangue',
        'codigoTipoPelagem',
        'descTipoPelagem',
        'codigoPai',
        'codigoMae',
        'nomeAnimal',
        'sexoAnimal',
        'sisBovAnimal',
        'dataNascimentoAnimal',
        'pathFotoAnimal',
        'nomeOriginalFotoAnimal',
        'codigoRegBaseAnimal',
        'mascaraCodigoRegBaseAnimal',
        'contemporaneaAnimal',
        'ptaAnimal',
        'preCadastroAnimal',
        'statusAnimal',
        'codigoPessoaInspetorRegDefinitivo',
        'nomePessoaInspetorRegDefinitivo',
        'letraRegDefinitivo',
        'numeroRegDefinitivo',
        'cadernetaRegDefinitivo',
        'aparenciaRegDefinitivo',
        'capacidadeRegDefinitivo',
        'caracteristicaRegDefinitivo',
        'aparelhoRegDefinitivo',
        'dataInspecaoRegDefinitivo',
        'dataCadastroRegDefinitivo',
        'statusRegDefinitivo',
        'serieUnicaRegDefinitivo',
        'codigoPessoaInspetorRegFundacao',
        'nomePessoaInspetorRegFundacao',
        'letraRegFundacao',
        'numeroRegFundacao',
        'dataInspecaoRegFundacao',
        'dataCadastroRegFundacao',
        'statusRegFundacao',
        'serieUnicaRegFundacao',
        'codigoPessoaInspetorRegNascimento',
        'nomePessoaInspetorRegNascimento',
        'letraRegNascimento',
        'numeroRegNascimento',
        'dataInspecaoRegNascimento',
        'dataCadastroRegNascimento',
        'statusRegNascimento',
        'serieUnicaRegNascimento',
        'codigoTransferenciaProprietario',
        'codigoPessoaProprietario',
        'codigoAssociadoProprietario',
        'nomePessoaProprietario',
        'codigoFazendaProprietario',
        'nomeFazendaProprietario',
        'nroPartTransferenciaProprietario',
        'codigoTransferenciaCriador',
        'codigoPessoaCriador',
        'codigoAssociadoCriador',
        'nomePessoaCriador',
        'codigoFazendaCriador',
        'nomeFazendaCriador',
        'nroPartTransferenciaCriador',
        'rgnProdutoNascimento',
        'codigoComNascimento',
        'codigoCruzamento',
        'codigoComunicacao',
        'codigoReceptora',
        'codigoUltimoServico',
        'codigoStatusAnimalUltimoServico',
        'descStatusAnimalUltimoServico',
        'consignadoAnimal',
        'seloRegDefinitivo',
        'statusAnimalBaixa',
        'regFundacao',
        'mascaraRegFundacao',
        'regNascimento',
        'mascaraRegNascimento',
        'regDefinitivo',
        'mascaraRegDefinitivo',
        'tipoRegistro',
        'mascaraRegistro',
        'codigoCategoriaTouro',
        'nomeCategoriaTouro',
        'descCategoriaTouro',
        'sclAnimal',
        'bitFotoMiniaturaAnimal',
        'codigoFazendaUltimoParto',
        'codigoFazendaUltimoControle',
        'siglaTipoSangue'];
}
