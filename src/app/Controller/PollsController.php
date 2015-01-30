<?php
class PollsController extends AppController {

  public $helpers = array('Html', 'Votes');
  public $components = array('Session', 'Email');

  public function new_vote(){
    $this->check_session();
  }

  public function choices(){
    $this->check_session();
    
    $limitless = $this->check_limitless($this->request->data);
    $this->set('limitless', $limitless);
    if($limitless == 0){
      $this->set('day', $this->request->data['day']);
      $this->set('month', $this->request->data['month']);
      $this->set('year', $this->request->data['year']);
    }
    // Adding data to poll_data
    $this->change_poll_data($this->request->data, "checkbox");
  }



  public function register(){
    $this->check_session();
    $this->change_poll_data($this->request->data);
    $this->add_poll_mysql($this->Session->read("poll_data"));
    $this->redirect('/votes/list');
  }


  /**************************/
  /********* PRIVATE ********/
  /**************************/

  private function check_session(){
    if(!$this->Session->check('token')){
      $this->redirect(array('controller'=>'connect', 'action'=>'index'));
    }
  }

  private function choices_serialization($choices){
    $serie = "";
    foreach($choices as $item){
      $item = str_replace(";", ",", $item);
      $serie .= ";".$item;
    }
    return $serie;
  }

  private function check_limitless($data){
    if(empty($data['day'])){
      return 1;
    }else{
      return 0;
    }
  }

  private function change_poll_data($data){
    $this->Session->write("poll_data.title", $data['title']);
    $this->Session->write("poll_data.description", $data['description']);
    $this->Session->write("poll_data.date_start", time());
    if($this->check_limitless($data) == 0){
      $this->Session->write("poll_data.date_end", mktime(0, 0, 0, $data['day'], $data['month'], $data['year']));
    } else {
      $this->Session->write("poll_data.date_end", 0);
    }
    $this->Session->write("poll_data.authorId", $this->Session->read("userId"));
    $this->Session->write("poll_data.link", md5($data['title'].time()));
    $this->Session->write("poll_data.response_type", $data['response_type']);
    $this->Session->write("poll_data.availables_responses", $this->choices_serialization($data['field']));
  }

  private function add_poll_mysql($data){
    $this->loadModel('Vote');
    $this->Vote->create($data);
    $this->Vote->save();
  }
}
?>
