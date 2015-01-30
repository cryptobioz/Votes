<h1>Contact</h1>
<br />
<?php
if(!empty($sent)){
  echo $sent;
}
else{
?>
<form action="send_mail" method="POST">
  <div class="form-group">
    <input type="text" class="form-control" name="name" style="width:40vw" placeholder="Name" />
  </div>
  <div class="form-group">
    <input type="email" class="form-control" name="email" style="width:40vw" placeholder="Email" />
  </div>
  <br />
  <div class="form-group">
    <input type="text" class="form-control" name="subject" style="width:40vw" placeholder="Subject" />
  </div>
  <div class="field">
    <textarea class="form-control" name="body" style="width:40vw"></textarea>
  </div>

  <br />
  <div class="form-group">
    <input type="submit" value="Send" class="btn btn-success" style="width:40vw" />
  </div>
</form>
<?php
}
?>