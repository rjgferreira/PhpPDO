<?php

class Alunos implements EntidadeInterface
{
    private $valueId;
    private $nome;
    private $nota;
    private $fieldId;
    private $table = "alunos";

    /**
     * @return mixed
     */
    public function getValueId()
    {
        return $this->valueId;
    }

    /**
     * @param mixed $id
     */
    public function setValueId($valueId)
    {
        $this->valueId = $valueId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     * @return Cliente
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFieldId()
    {
        return $this->fieldId;
    }

    /**
     * @param mixed $fieldId
     * @return Alunos
     */
    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}