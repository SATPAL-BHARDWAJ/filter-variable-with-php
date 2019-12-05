<?php


class Validator {

    public $form_data;
    public $var;
    public $form_controls;

    public function __construct() {
        $this->form_controls = ['string', 'integer', 'email', 'url', 'ip'];
    }

    public function Validate() {
        
        foreach($this->form_controls as $control) {
            $res = $this->rules($control);
            $this->var[$control] = [
                'status' => $res ? 'success' : 'error',
                'value' => $res ? $res : null, 
                'focus' => $res ? '' : 'autofocus'
            ];
        }    
    }

    public function rules($input) {
        $result = false;
        if($this->form_data) {
            $result = filter_var($this->form_data[$input], $this->filter_type($input));
        }
        return $result;
    }

    public function SetForm($data) {
        $this->form_data = $data;
    }

    protected function filter_type($input) {
        switch($input) {
            case 'string':
                return FILTER_SANITIZE_STRING;
                break;
            case 'integer':
                return FILTER_VALIDATE_INT;
                break;
            case 'email':
                return FILTER_VALIDATE_EMAIL;
                break;
            case 'url':
                return FILTER_VALIDATE_URL;
                break;
            case 'ip':
                return FILTER_VALIDATE_IP;
                break;
            default:
                return false;
                break;
        }
    }

    
}