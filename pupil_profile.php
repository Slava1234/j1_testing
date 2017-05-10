<?php require_once 'header.php' ?>

<body>
	<div class="col-md-12">
		<?php 
			if(isset($_GET['pupil_id'])): 
				$pupilId = (int)$_GET['pupil_id'];

				$sth = $db->prepare('SELECT * FROM pupil WHERE id = :pupilId');
				$sth->bindParam(':pupilId', $pupilId);
				$sth->execute();

				$pupil = $sth->fetch(PDO::FETCH_ASSOC);
		?>
			
		<div class="col-md-8 col-md-offset-2 margin-top-30">
			<h3>Профиль ученика</h3>
			<a href="edit_pupil_profile.php?pupil_id=<?=$pupil['id']?>" class="btn btn-primary btn-sm margin-bottom-15">Редактировать</a>
			<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>ФИО</th>
			        <th>Класс</th>
			        <th>Балл ученика</th>
			        <th>Дата начала учебы в классе</th>
			        <th>Дата окончания</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td><?=$pupil['full_name']?></td>
			        
			        <td><a href="class_profile.php?class=<?=$pupil['class_id']?>">класс "<?=$pupil['class_id']?>"</a></td>
			        <td><?=$pupil['score']?></td>
			        <td><?=$pupil['start_date']?></td>
			        <td><?=$pupil['graduation_date']?></td>
			      </tr>
			    </tbody>
	  		</table>
		</div>
		<?php endif; ?>
	</div>

<?php require_once 'footer.php' ?>