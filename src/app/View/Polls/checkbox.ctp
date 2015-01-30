<script src="/js/jquery.min.js"></script>
<div class="main">
	<form action="register" method="POST">
		<div class="checkbox-poll">
			<!-- Title -->
			<div class="title">
	        	<?php echo $this->Session->read('poll_data.title'); ?>
			</div>
			<!-- Description -->
			<div class="description">
				<?php echo $this->Session->read('poll_data.description'); ?>
			</div>
			<div class="date">
				<?php if($limitless == 0){ ?>
					Fin du vote : <?php echo $day; ?>/<?php echo $month; ?>/<?php echo $year; ?>
				<?php }else{ ?>
					Sondage d'une durée infini
				<?php } ?>
			</div>
			<br />
			<!-- Choice -->
			<div class="response_type">
				Choix multiple
			</div>
			<br />
			<!-- Checkbox fields -->
			<div class="line-checkbox-field">
				<!-- List of checkbox fields -->
				<div class="list-checkbox-choice">
					<!-- Checkbox field -->
					<input type="text" id="field_1" name="field[1]" placeholder="Choix 1" class="input" />
				</div>
				<!-- Add a checkbox field -->
				<div class="add-choice">
					<input type="button" class="button success" value="Ajouter un choix" onclick="addField()" />
				</div>
				<!-- Remove a checkbox field -->
				<div class="remove-choice">
					<input type="button" class="button alert" value="Supprimer un choix" onclick="removeField()">
				</div>
			</div>
			<div class="submit">
				<input type="submit" value="Créer le vote" class="button default" />
			</div>
		</div>
	</form>
</div>

<script>
var i = 1;
function addField(){
	i = i + 1;
	$(".list-checkbox-choice").append('<input type="text" id="field_'+i+'" name="field['+i+']" placeholder="Choix '+i+'" class="input" />');
}
function removeField(){
	$("#field_"+i).remove();
	i = i - 1;
}
</script>