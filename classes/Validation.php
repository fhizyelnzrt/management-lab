<?php

class Validation {

  private $_passed = false,
          $_errors = array();

  /**
   * method untuk melakukan pengecekan aturan pengisian form
   * yang dimana aturannya sudah ada di dalam register.php
   */
  public function check($items = array()){
    // var_dump($items);
    // die();
    /**
     * foreach pertama untuk mengeluarkan array pertama ya itu username, email, password
     * foreach kedua untuk mengeluarkan aturan form
     * karna ini yang kita butuhkan itu aturannya makanya dibuat nested foreach seperti ini
     */
    foreach ($items as $item => $rules) {
      foreach ($rules as $rule => $rule_value) {
        
        switch ($rule) {
          case 'required':
            if( trim(Input::get($item)) == false && $rule_value = true ){
              $this->addError(" $item wajib diisi ");
            }
            break;
          case 'min':
            if( strlen(Input::get($item)) < $rule_value){
              $this->addError(" $item minimal $rule_value karekter ");
            }
            break;
          case 'max':
            if( strlen(Input::get($item)) > $rule_value){
              $this->addError(" $item minimal $rule_value karekter ");
            }
            break;
          
          default:
            break;
        }
      }
    }

    //jika errornya tidak ada maka akan langsung mengubah variable $_passed menjadi true untuk melanjukan printah
    if( empty($this->_errors) ) {
      $this->_passed = true;
    }


    return $this;
  }

  /**
   * method untuk memasukan error kedalam variable $_errors[]
   * yang tadinya kosong berupa array
   */
  private function addError($error) {
    $this->_errors[] = $error;
  }

  /**
   * method untuk memunculkan error
   */
  public function errors(){
    return $this->_errors;
  }

  /**
   * method untuk memberitaukan nilai variable $_passed
   */
  public function passed(){
    return $this->_passed;
  }

}