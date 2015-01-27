<?php

$post = PostData::getById($_GET["id"]);

?>
<div class="container">
<div class="row">
	<div class="col-md-12">
	<h2 class="post-title"><?php echo $post->title; ?></h2>
	<blockquote><?php echo $post->brief; ?></blockquote>
	<div><?php echo $post->content; ?></div>
	<p class="text-muted"> <i class="fa fa-clock-o"></i>  <?php echo $post->created_at; ?></p>
	</div>
</div>
</div>