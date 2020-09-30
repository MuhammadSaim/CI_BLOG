<div class="container my-5">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header">Add Post</div>
				<div class="card-body">
					<?php if(isset($message)) echo $message; ?>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" placeholder="Title" id="title" class="form-control <?php if(form_error('title')) echo "is-invalid"; ?> ">

							<?= form_error('title', '<p class="invalid-feedback">', '</p>') ?>
						</div>
						<div class="form-group">
							<label for="image">Image</label>
							<div class="custom-file">
							  <input type="file" class="custom-file-input <?php if(isset($file_error)) echo "is-invalid"; ?>" id="image" name="image">
							  <label class="custom-file-label" for="customFile">Choose file</label>
							  <?php if(isset($file_error)) echo $file_error; ?>
							</div>
						</div>
						<div class="form-group">
							<label for="post">Post</label>
							<textarea name="post" id="post" cols="10" rows="6" class="form-control <?php if(form_error('post')) echo "is-invalid"; ?> "></textarea>
							<?= form_error('post', '<p class="invalid-feedback">', '</p>') ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>