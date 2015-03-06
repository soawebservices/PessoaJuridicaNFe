<?php
require_once 'sws_extensao.php';
require_once 'sws_cdc_PessoaJuridicaNFe.php';

$credenciais = new Credenciais();
$credenciais->Email = 'seu Smail';
$credenciais->Senha = 'sua Senha';

$pjnfe = new PessoaJuridicaNFe();
$pjnfe->Credenciais = $credenciais;
$pjnfe->Documento = 'Documento de teste';

$cdc = new CDC();
$pjnfe = $cdc->getPessoaJuridicaNFe($pjnfe);

echo "\n\n-----------------------   INFORMACOES GERAIS   -----------------------\n\n\n";

# PRINT PROPRIEDADES DO OBJETO
echo 'Documento			            :' . $pjnfe->Documento . "\n";
echo 'Razao Social			        :' . $pjnfe->RazaoSocial . "\n";
echo 'Nome Fantasia			        :' . $pjnfe->NomeFantasia . "\n";
echo 'DataFundacao			        :' . date('d/m/Y H:i:s', $pjnfe->DataFundacao) . "\n";
echo 'Codigo Atividade Economica	:' . $pjnfe->CodigoAtividadeEconomica . "\n";
echo 'Atividade Economica Descricao	:' . $pjnfe->CodigoAtividadeEconomicaDescricao . "\n";
echo 'Codigo Natureza Juridica	    :' . $pjnfe->CodigoNaturezaJuridica . "\n";
echo 'Natureza Juridica Descricao	:' . $pjnfe->CodigoNaturezaJuridicaDescricao . "\n";
echo 'SituacaoRFB			        :' . $pjnfe->SituacaoRFB . "\n";


echo 'Mensagem			            :' . $pjnfe->Mensagem . "\n";
echo 'Status				        :' . $pjnfe->Status . "\n";

echo "\n----------------------------------------------------------------------\n\n\n";


echo "\n\n\n";
echo "----------------------------------------------------------------------\n";
echo "Enderecos\n";
echo "----------------------------------------------------------------------\n";
foreach ($pjnfe->Enderecos as $Endereco) {
    echo 'Tipo			: ' . $Endereco->Tipo . "\n";
    echo 'Logradouro		: ' . $Endereco->Logradouro . "\n";
    echo 'Numero			: ' . $Endereco->Numero . "\n";
    echo 'Complemento		: ' . $Endereco->Complemento . "\n";
    echo 'Bairro			: ' . $Endereco->Bairro . "\n";
    echo 'Cidade			: ' . $Endereco->Cidade . "\n";
    echo 'Estado			: ' . $Endereco->Estado . "\n";
    echo 'CEP			: ' . $Endereco->CEP . "\n";
    echo 'DataAtualizacao		: ' . $Endereco->DataAtualizacao . "\n";
    echo 'Codigo IBGE		: ' . $Endereco->CodigoIBGE . "\n";
}

# PRINT TODOS ELEMENTOS (TESTE)
//print_r($pjnfe);
?>
