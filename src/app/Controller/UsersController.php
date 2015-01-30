<?php
class UsersController extends AppController {

  public $helpers = array('Html');
  public $components = array('Session', 'Email');

  public function index(){
    $this->check_session();
  }

  public function about(){
  }


  private function check_session(){
    if(!$this->Session->check('token')){
      $this->redirect(array('controller'=>'connect', 'action'=>'index'));
    }
  }

}
?>
