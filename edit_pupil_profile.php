<?php require_once 'header.php' ?>

	<div class="col-md-6 col-md-offset-3 margin-top-30">
		<?php 
			if(isset($_GET['pupil_id'])) {

				$pupilId = (int)$_GET['pupil_id'];

				$sth = $db->prepare('SELECT * FROM pupil WHERE id = :pupilId');
				$sth->bindParam(':pupilId', $pupilId);
				$sth->execute();

				$pupil = $sth->fetch(PDO::FETCH_ASSOC);
			}

			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				if(isset($_GET['pupil_id'])) { 
					$pupilId = (int)$_GET['pupil_id'];

					$fio = filter_var($_POST['fio'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
					$class = filter_var($_POST['class'], FILTER_SANITIZE_NUMBER_INT);
					$score = filter_var($_POST['score'], FILTER_SANITIZE_NUMBER_INT);
					$startDate = filter_var($_POST['start_date'], FILTER_SANITIZE_SPECIAL_CHARS);
					$graduation_date = filter_var($_POST['graduation_date'], FILTER_SANITIZE_SPECIAL_CHARS);
					
					if($fio != null) {
						$sql = "UPDATE pupil SET full_name = ?, class_id = ?, score = ?, start_date = ?, graduation_date = ? WHERE id = '$pupilId'";

						$sth = $db->prepare($sql);
						$sth->execute([$fio, $class, $score, ($startDate == "")?null:$startDate , ($graduation_date == "")? null: $graduation_date]);

						// increase class pupils amount
						$db->query("UPDATE class SET number_of_pupils = '$countPupils' WHERE id = '$classId'");

						header("Location: edit_pupil_profile.php?pupil_id=$pupilId");
						die();
					} else { 
						echo "<p class='alert alert-danger'>Необходимо заполнить имя ученика<p>";
					}
				}
			}
		?>

		<h4>Редактировать профиль ученика</h4>
			<form action="" method="POST">
		  <div class="form-group">
		    <label for="fio">ФИО:</label>
		    <input type="text" value="<?= $pupil['full_name']?>" class="form-control" id="fio" name="fio">
		  </div>
		    <div class="form-group">
		    <label for="class">Класс:</label>
		    <input type="text" value="<?= $pupil['class_id']?>" class="form-control" id="class" name="class">
		  </div>
		  <div class="form-group">
		    <label for="score">Балл ученика:</label>
		    <input type="text" value="<?= $pupil['score']?>" class="form-control" id="score" name="score">
		  </div>
		  <div class="form-group">
		    <label for="start_date">Дата начала учебы в классе "гг-мм-дд":</label>
		    <input type="text" value="<?= $pupil['start_date']?>" class="form-control" id="start_date" name="start_date">
		  </div>
		  <div class="form-group">
		    <label for="graduation_date">Дата окончания "гг-мм-дд":</label>
		    <input type="text" value="<?= $pupil['graduation_date']?>" class="form-control" id="graduation_date" name="graduation_date">
		  </div>
		  <button type="submit" class="btn btn-success">Редактировать</button>
		</form>
	</div>

<?php require_once 'footer.php' ?>