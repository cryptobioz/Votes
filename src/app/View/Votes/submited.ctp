<div class="show">
	<h1><?php echo $vote['votes']['title']; ?></h1>

	<div class="description">
		<?php echo $vote['votes']['description']; ?>
	</div>
	<br />
	<div class="author">
		<img src="/img/person.png" alt="" /> <?php echo $vote['users']['pseudo']; ?>
	</div>
	<div class="date">
		<img src="/img/clock.png" alt="" /> Créé le : <?php echo date('d-m-Y', $vote['votes']['date_start']); ?>, expire le : <?php echo $this->Votes->check_date_end($vote['votes']['date_end']); ?>
	</div>

	<br />
	<br />
	<br />
	<center>
		<span style="color:green">Vote bien validé.</span>
	</center>
</div>