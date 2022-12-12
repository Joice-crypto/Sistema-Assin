<?php

class Student
{

    private $nome_Aluno;
    private $curso_Aluno;
    private $matricula_Aluno;
    private $Grau_Aluno;
    private $Modalidade_Aluno;
    private $cpf;
    private $identidade;
    private $email;
    private $celular;
    private $endereco;
    private $nomeFamiliar_Aluno;
    private $grauParentesco_Aluno;
    private $telefoneFamiliar_Aluno;
    private $EmailFamiliar_Aluno;
    private $dataSaida_Aluno;
    private $dataRetorno_Aluno;
    private $finalidadeIntercambio;
    private $axilioFinanceiro;
    private $tipoAuxilio_Aluno;

    public function getnomeAluno()
    {
        return $this->nome_Aluno;
    }
    public function setnomeAluno($nome_Aluno)
    {
        $this->nome_Aluno = $nome_Aluno;
    }
    public function getcursoAluno()
    {
        return $this->curso_Aluno;
    }
    public function setcursoAluno($curso_Aluno)
    {
        $this->curso_Aluno = $curso_Aluno;
    }
    public function getmatriculaAluno()
    {
        return $this->matricula_Aluno;
    }
    public function setmatriculaAluno($matricula_Aluno)
    {
        $this->matricula_Aluno=$matricula_Aluno;
    }
    public function setIdentidadeAluno($identidade){

        $this->identidade = $identidade;

    }
    public function getIdentidadeAluno()
    {
        return $this->identidade;
    }
    public function setEmailAluno($email){

        $this->email = $email;

    }
    public function getEmailAluno()
    {
        return $this->email;
    }
    public function setCelularAluno($celular){

        $this->celular = $celular;

    }
    public function getCelularAluno()
    {
        return $this->celular;
    }
    public function setEnderecoAluno($endereco){

        $this->endereco = $endereco;

    }
    public function getEnderecoAluno()
    {
        return $this->endereco;
    }
    public function setNomeFamiliarAluno($nomeFamiliar_Aluno){

        $this->nomeFamiliar_Aluno = $nomeFamiliar_Aluno;

    }
    public function getNomeFamiliarAluno()
    {
        return $this->nomeFamiliar_Aluno;
    }
    public function setGrauParentescoAluno($grauParentesco_Aluno){

        $this->grauParentesco_Aluno = $grauParentesco_Aluno;

    }
    public function getGrauParentescoAluno()
    {
        return $this->grauParentesco_Aluno;
    }

    public function getgrauAluno()
    {
        return $this->Grau_Aluno;
    }
    public function setgrauAluno($Grau_Aluno)
    {
        $this->Grau_Aluno = $Grau_Aluno;
    }
    public function getmodalidadeAluno()
    {
        return $this->Modalidade_Aluno;
    }
    public function setmodalidadeAluno($Modalidade_Aluno)
    {
        $this->Modalidade_Aluno = $Modalidade_Aluno;
    }
    public function getcpfAluno()
    {
        return $this->cpf;
    }
    public function setcpfAluno($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getTelefoneFamAluno()
    {
    
    return $this->telefoneFamiliar_Aluno;
    }
    public function setTelefoneFamAlunoluno($telefoneFamiliar_Aluno)
    {
        $this->telefoneFamiliar_Aluno = $telefoneFamiliar_Aluno;
    }
    public function getEmailFamAluno()
    {
        return $this->EmailFamiliar_Aluno;
    }
    public function setEmailFamAluno($EmailFamiliar_Aluno)
    {
        $this->EmailFamiliar_Aluno = $EmailFamiliar_Aluno;
    }
    public function getDataSaidaAluno()
    {
        return $this->dataSaida_Aluno;
    }
    public function setDataSaidaAluno($dataSaida_Aluno)
    {
        $this->dataSaida_Aluno = $dataSaida_Aluno;
    }
    public function getDataRetornoluno()
    {
        return $this->dataRetorno_Aluno;
    }
    public function setDataRetornoluno($dataRetorno_Aluno)
    {
        $this->dataRetorno_Aluno = $dataRetorno_Aluno;
    }
    public function getFinalidadeIntercambio()
    {
        return $this->finalidadeIntercambio;
    }
    public function setFinalidadeIntercambio($finalidadeIntercambio)
    {
        $this->finalidadeIntercambio = $finalidadeIntercambio;
    }

    public function getAuxlioFinanceiro()
    {
        return $this->axilioFinanceiro;
    }

    public function setAuxilioFinanceiro($axilioFinanceiro)
    {
        $this->axilioFinanceiro = $axilioFinanceiro;
    }

    public function getTipoAux()
    {
        return $this->tipoAuxilio_Aluno;
    }

    public function setTipoAux($tipoAuxilio_Aluno)
    {
        $this->tipoAuxilio_Aluno = $tipoAuxilio_Aluno;
    }
}
