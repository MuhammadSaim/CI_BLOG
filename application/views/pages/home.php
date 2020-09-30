<div class="container my-5">
	<div class="row">
		<?php foreach($posts as $post): ?>
			<div class="col-md-4">
				<div class="card">
					<img src="<?= base_url('uploads/'.$post->image) ?>" class="card-img-top" alt="<?= $post->title ?>">
					<div class="card-body">
						<h3 class="card-title"><?= $post->title ?></h3>
						<p>
							<?= word_limiter($post->post, 20) ?>
						</p>
						<a href="<?= base_url('post/'.$post->slug) ?>" class="btn btn-primary">Read more >></a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>