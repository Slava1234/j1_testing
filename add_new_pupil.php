<?php require_once 'header.php' ?>

<body>
	<div class="col-md-6 col-md-offset-3 margin-top-30">
		<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				if(isset($_GET['class_id'])) { 
					$classId = (int)$_GET['class_id'];

					$fio = filter_var($_POST['fio'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
					$score = filter_var($_POST['score'], FILTER_SANITIZE_NUMBER_INT);
					$startDate = filter_var($_POST['start_date'], FILTER_SANITIZE_SPECIAL_CHARS);

					if($fio != null) {
						$sth = $db->prepare("
							INSERT INTO pupil(full_name, class_id, score, start_date) 
							VALUES(?, ?, ?, ?) 
						");

						$sth->execute([$fio, $classId, $score, $startDate]);

						// count class pupils amount
						$amountSth = $db->query("SELECT COUNT(id) as amount FROM pupil where class_id = '$classId'");
						$countPupils = $amountSth->fetch(PDO::FETCH_ASSOC);
						$countPupils = $countPupils['amount'];

						// increase class pupils amount
						$db->query("UPDATE class SET number_of_pupils = '$countPupils' WHERE id = '$classId'");

						$_SESSION['pupil_added'] = 'true';

						header("Location: class_profile.php?class=$classId");
						die();
					} else { 
						echo "<p class='alert alert-danger'>Необходимо заполнить имя ученика<p>";
					}
				}
			}
		?>

		<h4>Добавить нового ученика</h4>
		<form action="" method="POST">
		  <div class="form-group">
		    <label for="fio">ФИО:</label>
		    <input type="text" class="form-control" id="fio" name="fio">
		  </div>
		  <div class="form-group">
		    <label for="score">Балл ученика:</label>
		    <input type="text" class="form-control" id="score" name="score">
		  </div>
		  <div class="form-group">
		    <label for="start_date">Дата начала учебы в классе "гг-мм-дд":</label>
		    <input type="text" class="form-control" id="start_date" name="start_date">
		  </div>
		  <button type="submit" class="btn btn-success">Добавить</button>
		</form>
	</div>

<?php require_once 'footer.php' ?>