<?php

class Validator
{
    private $data;
    protected $errors = [];

    /**
     * @param array $data
     * @return array|bool
     */
    public function validates (array $data)
    {
        $this->errors=[];
        $this->data = $data;
    }

    public function validate (string $field, string $method, ...$parameters) { // ...plusieurs paramètre cumulable
        if (!isset($this->data[$field])) {
            $this->errors[$field] = "Le champs $field n'est pas rempli";
        }else {
            call_user_func([$this, $method], $field, ...$parameters); // appeller la methode
        }
    }

    public function minLength (string $field, int $length): bool {
        if (mb_strlen($field) < $length) // Prend en compte emoji ..
        {
            $this->errors[$field] = "Le champs doit avoir plus de $length caractères";
            return false;
        }
        return true;
    }

    public function date (string $field): bool {
        if (\DateTime::createFromFormat('Y-m-d', $this->data[$field]) === false) // renvoi date si fonctionne, false sinon
        {
            $this->errors[$field] = "La date ne semble pas valide";
            return false;
        }
        return true;
    }

    public function time (string $field): bool {
        if (\DateTime::createFromFormat('H:i', $this->data[$field]) === false) // renvoi date si fonctionne, false sinon
        {
            $this->errors[$field] = "Le temps ne semble pas valide";
            return false;
        }
        return true;
    }

    /**
     * Permet de savoir si le debut de l'evenement est bien avant la fin
     * @param string $startField
     * @param string $endField
     */
    public function beforeTime (string $startField, string $endField) {
        if ($this->time($startField) && $this->time($endField)) {
            $start = \DateTime::createFromFormat('H:i', $this->data[$startField]);
            $end = \DateTime::createFromFormat('H:i', $this->data[$endField]);
            if ($start->getTimestamp() > $end->getTimestamp()) {
                $this->errors[$startField] = "La fin de l'évènement doit être après le début";
                return false;
            }
            return true;
        }
        return false;
    }

}