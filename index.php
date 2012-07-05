<!DOCTYPE HTML>
<html lang="pt-br" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Chat</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#form").submit(function() {
				$.post('ajaxPost.php', $('#form').serialize(), function() {
					$('#messages').load(location.href);
				});

				return false;
			});

			$('.update').click(function() {
				var item = $(this).parent();
				var id = $(this).attr('rel');
				
				$.post('ajaxUpdate.php', {'id' : id});
			});

			$('.delete').click(function() {
				var item = $(this).parent();
				var id = $(this).attr('rel');
				
				$.post('ajaxDelete.php', {'id' : id}, function() {
					$(item).hide();
				});
			});
		});
	</script>
</head>
<body>
	<div id="messages">
		<?php 
		include 'config.php';

		$db->query('SELECT * FROM messages');

		$data = $db->Get();

		foreach ($data as $key => $value): ?>
		<div class="row<?php echo $value['id']; ?>">
			<input class="name" type="text" value="<?php echo $value['name']; ?>" name="name" />
			<input class="phone" type="text" value="<?php echo $value['phone']; ?>" name="phone" />
			<input class="address" type="text" value="<?php echo $value['address']; ?>" name="address" />
			<a class="update" href="#" rel="<?php echo $value['id']; ?>">Update</a>
			<a class="delete" href="#" rel="<?php echo $value['id']; ?>">Delete</a>
		</div>
		<?php endforeach; ?>
	</div>
	<br />
	<form id="form">
		<label>Name</label>
		<input type="text" name="name" /><br />
		<label>Phone</label>
		<input type="text" name="phone" /><br />
		<label>Address</label>
		<input type="text" name="address" /><br />
		<input type="submit" value="Send" />
	</form>
</body>
</html>
