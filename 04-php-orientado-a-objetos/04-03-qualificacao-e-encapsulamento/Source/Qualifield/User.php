<?php


namespace Source\Qualifield;


class User
{
    //Propriedades: Que são caracteristicas da classe
    private $firstName;
    private $lastName;
    private $email;

    private $error;

    public function setUser($firstName, $lastName, $email){
        $this->setFirstName($firstName);
        $this->setLastName($lastName);

        if (!$this->setEmail($email)){
            $this->error = "O e-mail {$this->getEmail()} não é válido!";
            return false;
        }
    }

    //Métodos da classe que são as ações e manipula do jeito certo as propriedades.

    public function getError()
    {
        return $this->error;
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function getFirstName()
    {
        return$this->firstName;
    }

    private function setFirstName($firstName)
    {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRIPPED);
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    private function setLastName($lastName)
    {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRIPPED);
    }

    public function getEmail()
    {
        return $this->email;
    }

    private function setEmail($email)
    {
        $this->email = $email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
}