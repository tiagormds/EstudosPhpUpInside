<?php

class User
{
    //Propriedades: Que são caracteristicas da classe
    public $firstName;
    public $lastName;
    public $email;

    /**
     * @return mixed
     */

    //Métodos da classe que são as ações e manipula do jeito certo as propriedades.
    public function getFirstName()
    {
        return$this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRIPPED);
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRIPPED);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
}