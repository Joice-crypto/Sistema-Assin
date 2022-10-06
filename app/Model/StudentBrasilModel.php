<?php

class StudentBrasil extends Student // vai ter todos os atributos e metodos da classe student
{

    private $campus_Aluno;
    private $intituicaoDestino_Aluno;
    private $paisInstituicao_Aluno;
    private $cartadeAceitacao_Aluno;
    private $programaAceitacao_Aluno;



    public function getcampusAluno()
    {
        return $this->campus_Aluno;
    }
    public function setcampusAluno($campus_Aluno)
    {
        $this->campus_Aluno = $campus_Aluno;
    }

    public function getInstitDestAluno()
    {
        return $this->intituicaoDestino_Aluno;
    }
    public function setInstitDestluno($intituicaoDestino_Aluno)
    {
        $this->intituicaoDestino_Aluno = $intituicaoDestino_Aluno;
    }
    public function getPaisDestAluno()
    {
        return $this->paisInstituicao_Aluno;
    }
    public function setPaisDestAluno($intituicaoDestino_Aluno)
    {
        $this->intituicaoDestino_Aluno = $intituicaoDestino_Aluno;
    }
    public function getCartaAceit()
    {
        return $this->cartadeAceitacao_Aluno;
    }
    public function setCartaAcei($cartadeAceitacao_Aluno)
    {
        $this->cartadeAceitacao_Aluno = $cartadeAceitacao_Aluno;
    }
    public function getProgrAceit()
    {
         return $this->programaAceitacao_Aluno;
    }
    public function setProgrAceit($programaAceitacao_Aluno)
    {
        $this->programaAceitacao_Aluno = $programaAceitacao_Aluno;
    }
}
