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
		<!-- YES/NO -->
		<?php if($vote['votes']['response_type'] == "YES_NO"){ ?>
			<div class="yes">
				<a href=""><img src="/img/checkmark.png" alt="" /></a>
			</div>
			<div class="no">
				<a href=""><img src="/img/close.png" alt="" /></a>
			</div>
		<!-- CHECKBOX -->
		<?php }elseif($vote['votes']['response_type'] == "CHECKBOX"){ ?>
			<form action="submited" method="POST">
				<table>
					<thead>
						<tr>
							<?php foreach($response_list as $response){ ?>
								<th><?php echo $response; ?></th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>					
						<?php foreach($response_list as $response){ ?>
							<td>
								<div class="switch small">
	  								<input id="<?php echo $response; ?>" type="checkbox" value="<?php echo $response; ?>" name="<?php echo $i; ?>">
	  								<label for="<?php echo $response; ?>"></label>
								</div>
							</td>
							<?php $i++; ?>
						<?php } ?>
					</tbody>
				</table>
				<br />
				<br />
				<input type="submit" class="button success" style="width:60vh" value="Valider" />
			</form>			
		<!-- RADIO -->
		<?php }elseif($vote['votes']['response_type'] == "RADIO"){ ?>
			<form action="submited" method="POST">
				<table>
					<thead>
						<tr>
							<?php foreach($response_list as $response){ ?>
								<th><?php echo $response; ?></th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($response_list as $response) { ?>
							<td>
								<div class="switch small">
	  								<input id="<?php echo $response; ?>" type="radio" value="<?php echo $response; ?>" name="0">
	  								<label for="<?php echo $response; ?>"></label>
								</div> 
							</td>
						<?php } ?>
					</tbody>
				</table>
				<br />
				<br />
				<input type="submit" class="button success" style="width:60vh" value="Valider" />
			</form>
		<?php } ?>
	</center>
</div>