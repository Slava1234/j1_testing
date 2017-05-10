<?php require_once 'header.php' ?>

	<div class="col-md-12">
		<?php 
			if(isset($_GET['class'])): 
				$classId = (int)$_GET['class'];

				$sth = $db->prepare('SELECT * FROM class WHERE id = :class_id');
				$sth->bindParam(':class_id', $classId);
				$sth->execute();

				$classProfile = $sth->fetch(PDO::FETCH_ASSOC);
		?>
			
		<div class="col-md-8 col-md-offset-2 margin-top-30">
			<?php if(isset($_SESSION['pupil_added']) && $_SESSION['pupil_added'] == 'true'): ?>
				<?php $_SESSION['pupil_added'] = 'false' ?>
				<div class="alert alert-success">Новый ученик добавлен</div>
			<?php endif; ?>
			
			<h3>Профиль класса</h3> <a href="add_new_pupil.php?class_id=<?=$classProfile['id']?>" class="btn btn-primary btn-sm margin-bottom-15">Добавить нового ученика</a>
			<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Классный руководитель</th>
			        <th>Средний балл по классу</th>
			        <th>Количество учеников</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td><?=$classProfile['class_teacher_full_name']?></td>
			        <td><?=$classProfile['class_average_score']?></td>
			        <td><?=$classProfile['number_of_pupils']?></td>
			      </tr>
			    </tbody>
	  		</table>
		</div>

		<div class="col-md-8 col-md-offset-2">
			<h4>Список учеников</h4>
			<?php
				$sthPulils = $db->prepare('SELECT * FROM pupil WHERE class_id = :class_id');
				$sthPulils->bindParam(':class_id', $classId);
				$sthPulils->execute();

				$listOfPupils = $sthPulils->fetchAll();
			?>
			<div class="list-group">
				<?php foreach($listOfPupils as $pupil): ?>
					<a href='pupil_profile.php?pupil_id=<?= $pupil['id']?>' class="list-group-item"><?= $pupil['full_name']?></a>
				<?php endforeach;?>
			</div>
		</div>
		<?php endif; ?>
	</div>

<?php require_once 'footer.php' ?>