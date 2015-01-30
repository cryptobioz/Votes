<center>
	<nav class="nav_list_votes">
		<ul>
			<?php
			foreach($votes as $vote){
				?>
				<li>
					<a href="/votes/<?php echo $vote['votes']['link']; ?>/"><span class="title"><?php echo $vote['votes']['title']; ?></span></a>
					<p class="description"><?php echo $vote['votes']['description']; ?></p>
					<div class="author">
						<img src="/img/person.png" alt="" /><?php pr($vote); ?>
					</div>
					<div class="date">
						<img src="/img/clock.png" alt="" />
						<?php echo date('d/m/Y', $vote['votes']['date_start']);?> à <?php echo $this->Votes->check_date_end($vote['votes']['date_end']); ?>
					</div>
				</li>
				<?php
			}
			?>
		</ul>
	</nav>
</center>