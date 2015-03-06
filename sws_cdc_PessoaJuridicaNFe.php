<?php

class CDC extends WebService
{
    /* URL de Test-Drive */

    const URI_LOCATION = 'http://www.soawebservices.com.br/webservices/test-drive/cdc/cdc.asmx';
    const URI_LOCATION_WSDL = 'http://www.soawebservices.com.br/webservices/test-drive/cdc/cdc.asmx?WSDL';

    /* URL de Producao */
    /*
    const URI_LOCATION      = 'http://www.soawebservices.com.br/webservices/producao/cdc/cdc.asmx';
    const URI_LOCATION_WSDL = 'http://www.soawebservices.com.br/webservices/producao/cdc/cdc.asmx?WSDL';
    */

    private $_traceEnabled = 1;

    public function __construct()
    {
        $options = array
        (
            'location' => CDC::URI_LOCATION,
            'trace' => $this->_traceEnabled,
            'style' => SOAP_RPC,
            'use' => SOAP_ENCODED,
        );

        parent::__construct(CDC::URI_LOCATION_WSDL, $options);
    }

    public function getPessoaJuridicaNFe(PessoaJuridicaNFe $pjnfe)
    {
        $result = $this->callMethod('PessoaJuridicaNFe', array('parameters' => Util::objectToArray($pjnfe)));
        //print_r($result);
        return Util::arrayToObject($result->{$this->getLastCalledMethod() . 'Result'}, $pjnfe);
    }
}

class Credenciais
{
    public $Email;
    public $Senha;
}

class PessoaJuridicaNFe extends ClassMap
{
    public $Documento;
    public $RazaoSocial;
    public $NomeFantasia;
    public $DataFundacao;
    public $CodigoAtividadeEconomica;
    public $CodigoAtividadeEconomicaDescricao;
    public $CodigoNaturezaJuridica;
    public $CodigoNaturezaJuridicaDescricao;
    public $SituacaoRFB;
    public $DataSituacaoRFB;
    public $DataConsultaRFB;
    public $MotivoSituacaoRFB;
    public $MotivoEspecialSituacaoRFB;
    public $DataMotivoEspecialSituacaoRFB;
    public $CNAES;
    public $Enderecos;

    public $Mensagem;
    public $Status;

    public function __construct()
    {
        parent::__construct(array(
            'Documento' => 'string',
            'RazaoSocial' => 'string',
            'NomeFantasia' => 'string',
            'DataFundacao' => 'string',
            'CodigoAtividadeEconomica' => 'string',
            'CodigoAtividadeEconomicaDescricao' => 'string',
            'CodigoNaturezaJuridica' => 'string',
            'CodigoNaturezaJuridicaDescricao' => 'string',
            'SituacaoRFB' => 'string',
            'DataSituacaoRFB' => 'string',
            'DataConsultaRFB' => 'string',
            'MotivoSituacaoRFB' => 'string',
            'MotivoEspecialSituacaoRFB' => 'string',
            'DataMotivoEspecialSituacaoRFB' => 'string',
            'CNAES' => 'CNAES',
            'Enderecos' => 'Endereco',
            'Mensagem' => 'string',
            'Status' => 'boolean'
        ));
    }
}

class CNAES extends ClassMap
{
    public $CNAE;
    public $CNAEDescricao;

    public function __construct()
    {
        parent::__construct(array(
            'CNAE' => 'string',
            'CNAEDescricao' => 'string'
        ));
    }
}


class Endereco extends ClassMap
{
    public $Tipo;
    public $Logradouro;
    public $Numero;
    public $Complemento;
    public $Bairro;
    public $Cidade;
    public $Estado;
    public $CEP;
    public $GeoLocalizacao;
    public $DataAtualizacao;
    public $CodigoIBGE;

    public function __construct()
    {
        parent::__construct(array(
            'Tipo' => 'string',
            'Logradouro' => 'string',
            'Numero' => 'string',
            'Complemento' => 'string',
            'Bairro' => 'string',
            'Cidade' => 'string',
            'Estado' => 'string',
            'CEP' => 'string',
            'GeoLocalizacao' => 'GeoLocalizacao',
            'DataAtualizacao' => 'string',
            'CodigoIBGE' => 'string'
        ));
    }
}

class GeoLocalizacao extends ClassMap
{
    public $Latitude;
    public $Longitude;

    public function __construct()
    {
        parent::__construct(array(
            'Latitude' => 'string',
            'Longitude' => 'string'
        ));
    }
}

?>