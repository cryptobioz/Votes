<?php
class VotesController extends AppController {

  public $helpers = array('Html', 'Votes');
  public $components = array('Session', 'Email');

  public function index(){
    $this->check_session();
    $vote = $this->Vote->query('SELECT title, description, date_start, date_end, authorId, link , response_type, availables_responses FROM votes INNER JOIN users ON votes.authorId = users.id WHERE votes.link = "'.$this->params['link'].'"');
    $this->set('vote', $vote[0]);

    if($vote[0]['votes']['response_type'] != "YES_NO"){
      $response_list = $vote[0]['votes']['availables_responses'];
      $response_list = explode(";", $response_list);
      $this->set('response_list', $response_list);
      $this->set('i', 0);
    }
  }

  public function submited(){
    $this->loadModel('Voter');
    $this->check_session();
    if($this->request->is('post') || $this->request->is('put')){
      $choice = $this->choices_serialization($this->request->data);
      $data = array('userId'=>$this->Session->read('pseudo'), 'voteId'=>$this->Vote->findByLink($this->params['link'])['Vote']['id'], 'choices'=>$choice);
      $this->Voter->create($data);
      $this->Voter->save();
      $vote = $this->Vote->query('SELECT pseudo, date_start, date_end, title, description, link, response_type, responses FROM votes INNER JOIN users ON votes.author = users.id WHERE votes.link = "'.$this->params['link'].'"');
      $this->set('vote', $vote[0]); 
    }else{
      $this->redirect("/votes/<?php echo $this->params['link']; ?>");
    }
  }






  public function list_votes(){
    $this->check_session();
    $this->set('votes', $this->Vote->query('SELECT title, description, date_start, date_end, authorId, link FROM votes INNER JOIN users ON votes.authorId = users.id WHERE votes.date_start < votes.date_end OR votes.date_end = 0'));
  }


  /**************************/
  /********* PRIVATE ********/
  /**************************/

  private function check_session(){
    if(!$this->Session->check('token')){
      $this->redirect(array('controller'=>'connect', 'action'=>'index'));
    }
  }

  private function choices_serialization($data){
    $choice = "";
    foreach($data as $item){
      $choice .= ";".$item;
    }
    return $choice;
  }

  private function check_limitless($data){
    if(empty($data['day'])){
      return 1;
    }else{
      return 0;
    }
  }
}
?>
