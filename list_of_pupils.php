<?php require_once 'header.php' ?>

<body>
	<div class="col-md-12">
		<h3>Список учеников</h3>
		<?php
			$sth = $db->query("SELECT * from pupil");
			$pupils = $sth->fetchAll();
		?>

		<div class="col-md-4">
			<div class="list-group">
				<?php foreach($pupils as $pupil): ?>
					<a href='pupil_profile.php?pupil_id=<?= $pupil['id']?>' class='list-group-item'>
						<?= $pupil['full_name']?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	
<?php require_once 'footer.php' ?>