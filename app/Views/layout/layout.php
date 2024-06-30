<!DOCTYPE html>
<html lang="id">
	<?= $this->include("layout/header"); ?>
	<body>
		<div class="dashboard-main-wrapper">

			<?= $this->include("layout/topbar"); ?>
			<?= $this->include("layout/sidebar"); ?>

		    <div class="dashboard-wrapper">
				<?= $this->renderSection("content"); ?>
			</div>

			<?= $this->include("layout/footer"); ?>
			
		</div>

		<?= $this->include("layout/script"); ?>
	</body>
</html>