<div class="container my-5">
	<div class="row">
		<div class="col">
			<div class="card">
				<img src="<?= base_url('uploads/'.$post->image) ?>" class="card-img-top" alt="<?= $post->title ?>">
				<div class="card-body">
					<h3 class="card-title"><?= $post->title ?></h3>
					<p>
						<?= $post->post ?>
					</p>
				</div>
			</div>				
		</div>
	</div>
</div>