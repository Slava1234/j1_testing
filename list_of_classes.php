<?php require_once 'header.php' ?>

<body>
	<div class="col-md-12">
		<h3>Список классов</h3>
		<?php
			$sth = $db->query("SELECT * from class");
			$classes = $sth->fetchAll();
		?>

		<div class="col-md-4">
			<div class="list-group">
				<?php foreach($classes as $class): ?>
					<a href='class_profile.php?class=<?= $class['id']?>' class='list-group-item'>
						<?= $class['class_teacher_full_name']?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	
<?php require_once 'footer.php' ?>