<?php

class Usuarios implements EntidadeInterface
{
    private $valueId;
    private $fieldId;
    private $login;
    private $senha;
    private $table = "usuarios";

    /**
     * @return mixed
     */
    public function getValueId()
    {
        return $this->valueId;
    }

    /**
     * @param mixed $valueId
     */
    public function setValueId($valueId)
    {
        $this->valueId = $valueId;
        return $this;
    }

    /**
     * @param mixed $login
     * @return Cliente
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @param mixed $login
     * @return Cliente
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $senha
     * @return Cliente
     */
    public function setSenha($senha)
    {
        $options = [
            'salt' => md5('384jksdo%783*'),
            'cost' => 10
        ];
        $senha = password_hash($senha, PASSWORD_DEFAULT, $options);
        $this->senha = $senha;
        return $this;
    }

    /**
     * @param mixed $senha
     * @return Cliente
     */
    public function getSenha()
    {
        return $this->senha;
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