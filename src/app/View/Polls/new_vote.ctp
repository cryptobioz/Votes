<script src="/js/jquery.min.js"></script>

<div class="poll">
	<h1>Nouveau vote</h1>
	<form action="register" method="POST" name="form">
		<!-- Title -->
		<input type="text" name="title" placeholder="Question" class="title" required />
		<!-- Description -->
		<textarea name="description" placeholder="Description" class="description" required></textarea>
		
		<!-- Date -->
		<div class="date">
			<!-- Day -->
			<select name="day" id="day" class="day">
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>
			<!-- Month -->
			<select name="month" id="month" class="month">
				<option value="01">Janvier</option>
				<option value="02">Février</option>
				<option value="03">Mars</option>
				<option value="04">Avril</option>
				<option value="05">Mai</option>
				<option value="06">Juin</option>
				<option value="07">Juillet</option>
				<option value="08">Août</option>
				<option value="09">Septembre</option>
				<option value="10">Octobre</option>
				<option value="11">Novembre</option>
				<option value="12">Décembre</option>
			</select>
			<!-- Year -->
			<select name="year" id="year" class="year">
				<option value="<?php echo date('Y'); ?>"><?php echo date("Y"); ?></option>
				<option value="<?php echo date('Y')+1; ?>"><?php echo date('Y')+1; ?></option>
			</select>
			<!-- Infini -->
			<div class="large-2 columns">
				<div class="switch infini-choice">
				  	<input id="infini" type="checkbox" onClick="disable_date()">
					<label for="infini"></label>
				</div> 
			</div>
		</div>
		<br />
		<!-- Buttons type response -->
		<div class="buttons-type-response">
			<input type="button" id="binary" class="button btn-choice" value="Oui / Non" onclick="disable_button('binary');display_choices('none');set_response_type('binary');" />
			<input type="button" id="checkbox" class="button btn-choice" value="Choix multiple" onclick="disable_button('checkbox');display_choices('show');set_response_type('checkbox');" />
			<input type="button" id="radio" class="button btn-choice" value="Choix unique" onclick="disable_button('radio');display_choices('show');set_response_type('radio');" />
		</div>


		<!-- Type response -->
		<input type="hidden" id="response_type" name="response_type" value="" />

		<!-- Choices -->
		<div class="choices" style="display:none" id="choices">
			<!-- Checkbox fields -->
			<div class="choices-fields">
				<!-- List of checkbox fields -->
				<div class="list-checkbox-choice">
					<!-- Checkbox field -->
					<input type="text" id="field_1" name="field[1]" placeholder="Choix 1" class="input" />
				</div>
				<!-- Add a checkbox field -->
				<input type="button" class="button success" value="Ajouter un choix" class="add-choice" onclick="addField()" />
				<!-- Remove a checkbox field -->
				<input type="button" class="button alert" value="Supprimer un choix" class="remove-choice" onclick="removeField()">
			</div>
		</div>
		<div class="submit">
			<input type="submit" value="Créer le vote" class="button default" />
		</div>

	</form>
</div>
<script>

function disable_date(){
	if(document.getElementById('day').disabled == false){
		$("#day").attr("disabled", true);
		$("#month").attr("disabled", true);
		$("#year").attr("disabled", true);
	}
	else{
		$("#day").attr("disabled", false);
		$("#month").attr("disabled", false);
		$("#year").attr("disabled", false);
	}
}

function disable_button(button){
	if(button == "binary"){
		$("#binary").attr('disabled', true);
		$("#checkbox").attr('disabled', false);
		$("#radio").attr('disabled', false);
	}
	else if(button == "checkbox"){
		$("#binary").attr('disabled', false);
		$("#checkbox").attr('disabled', true);
		$("#radio").attr('disabled', false);
	}
	else if(button == "radio"){
		$("#binary").attr('disabled', false);
		$("#checkbox").attr('disabled', false);
		$("#radio").attr('disabled', true);
	}
}

function display_choices(display){
	if(display == "show"){
		document.getElementById('choices').style.display = "block";
	}else{
		document.getElementById('choices').style.display = "none";
	}
}

function set_response_type(type){
	$("#response_type").val(type);
}

var i = 1;
function addField(){
	i = i + 1;
	$(".list-checkbox-choice").append('<input type="text" id="field_'+i+'" name="field['+i+']" placeholder="Choix '+i+'" class="input" />');
}
function removeField(){
	$("#field_"+i).remove();

	if(i > 0){
		i = i - 1;
	}
}
</script>