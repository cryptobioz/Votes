<?php
class ConnectController extends AppController {

  public $helpers = array('Html');
  public $components = array('Session', 'Email');
  

  public function index(){
    
    $this->layout = 'connect';
    $this->set('error', '');
    $this->loadModel('User');


    if($this->request->is('post') || $this->request->is('put')){
      $auth = $this->User->findByEmail($this->request->data['email']);
      $pass = crypt($this->request->data['pass'], "m8KnYvs5");
      if($auth && $pass == $auth['User']['password']){
        $date = new DateTime();
        $date = $date->getTimestamp();
        $this->Session->write('token', md5($auth['User']['email'].$date));
        $this->Session->write('userId', $auth['User']['id']);
        $this->redirect(array('controller'=>'users', 'action'=>'index'));
      }
      else{
        return $this->set('error', '<span style="color:red;">Login ou mot de passe invalide.</span>');      
      }
    }
  }

  public function disconnect(){
    $this->Session->destroy('token');
    $this->redirect(array('controller'=>'connect', 'action'=>'index'));
  }

  public function contact(){
    if(!empty($this->params->query['s']) && $this->params->query['s'] == 1){
      $this->set('sent', '<span style="color:green">Email successfully sent !</span>');
    }
  }

  public function send_mail(){

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$this->request->data['name'].' <'.$this->request->data['email'].'>' . "\r\n";

    mail('leo.depriester@exadot.fr', $this->request->data['subject'], $this->request->data['body'], $headers);
    $this->redirect('contact?s=1');
  }


}
?>
