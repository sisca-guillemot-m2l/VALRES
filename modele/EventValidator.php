<?php
//namespace calendar;
require_once 'Validator.php';

class EventValidator extends \Validator
{

    /**
     * @param array $data
     * @return array|bool
     */
    public function validates (array $data)
    {
        parent::validates($data);
        $this->validate('name','minLength', 3);
        $this->validate('date','date');
        $this->validate('start','time');
        $this->validate('end','time');
        $this->validate('start','beforeTime','end');
        return $this->errors;
    }
}