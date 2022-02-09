<?php 
	session_start();
	if(!isset($_SESSION['user_id'])){
		header('Location: index.php');
		die();
	}
	require_once __DIR__ . '/tables/User.php';
	require_once __DIR__ . '/tables/Message.php';
	$users = User::getAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Korisnik</title>
	<script src="jquery-3.6.0.js"></script>
	<script>
		$(function(){
			$('.all_buttons_delete').on('click', function(e){
				var message_id = $(this).attr('data-messageid');
				var li = $(this).parent();
				$.ajax({
					'url':'logic/delete_message.php',
					'method':'post',
					'data':{
						'message_id': message_id
					},
					'success':function(answer){
						if(answer == 'success'){
							li.remove();
						}else{
							alert('Error: Database Error')
						}
					}
				})
			})
			$('.all_buttons_read').on('click', function(e){
				var message_id = $(this).attr('data-messageid');
				var li = $(this).parent();
				var span = li.children(6)[6];
				var speed = li.children(6)[7].innerHTML;
				if(span.innerHTML === 'Neprocitano'){
					$.ajax({	
						'url':'logic/read_message.php',
						'method':'post',
						'data':{
							'message_id': message_id,
							'current_time':"<?= date("Y-m-d H:i:s") ?>"
						},
						'success':function(answer){
							if(answer !== null){
								span.innerHTML = answer;
								//if(speed === 'nije_hitno') //nije mi najjasnije iz teksta bilo da li sve procitane poruke treba da budu zelene ili samo one koje nisu hitne, ako su samo hitne treba dodati ovaj if
								li.css('background-color', "rgba(0,150,50,0.5)");
							}else{
								alert('Error: Database Error')
							}
						}
					})
				}
			})
		})
	</script>
	<link rel="stylesheet" type="text/css" href="all_styles/korisnik.css">
</head>
<body>
<a href="logic/logout.php" id="logout_link">Logout</a>
<form action="logic/send_message.php" method="post" id="form">
	<?php $logged_user = User::getById($_SESSION['user_id'])?>
	<div id="profile">
		<img src="<?= $logged_user->picture ?>" class="all_pictures">
		<span class="all_names"><?= $logged_user->name_surname ?></span><br><br>
	</div>
	<input type="text" name="header" id="header" placeholder="Title" required><br><br>
	<textarea name="message" id="message" placeholder="Message" required maxlength="160"></textarea><br>
	<select name="send_to" id='send_to' required>
		<?php foreach($users as $user): ?>
			<option data-userid="<?= $user->id ?>" required><?= $user->email ?></option>
		<?php endforeach ?>
	</select><br><br>
	<div id="speed">
		<input type="radio" name="speed" id="hitno" value="hitno" required>
		<label for="hitno">URGENT</label><br>	
		<input type="radio" name="speed" id="nije_hitno" value="nije_hitno" required>
		<label for="nije_hitno">NOT URGENT</label><br><br>
	</div>
	<input type="submit" value="Send" id="send">
</form><hr>
<h2>Messages</h2>
<?php 
$messages = Message::getAllUserMessages($_SESSION['user_id']);
?>
<ul id="messages_list" type="none">
	<?php foreach($messages as $message): ?>
		<li class="all_massages" data-messageid="<?= $message->id ?>"
			style="background:<?php if($message->speed === 'hitno' || $message->read_time == null){ 
				echo "rgba(255,0,0,0.5)"; 
			}else { 
				echo "rgba(0,150,50,0.5)";
			}?>;">
			<?php $user = User::getById($message->sender_id); ?>
			<img class="all_pictures" src="<?= $user->picture ?>">
			<span class="all_names"><?= $user->name_surname ?></span><br>
			<span class="all_time_sent">Sent: <?= date("d.m.Y. H:i", strtotime($message->sent_time)) ?></span><br>
			<label>Read:</label>
			<span class="all_time_read"><?php if(!($message->read_time === null)) {
					echo date("d.m.Y. H:i", strtotime($message->read_time));
				}else{
					echo "Neprocitano";
				}?></span>
			<?php if($_SESSION['user_id'] === $message->sender_id): ?>
				<input type="hidden" name="hidden_message_id" value="<?= $message->id ?>">
				<button class="all_buttons_delete" data-messageid="<?= $message->id ?>">Delete</button>
			<?php else: ?>
				<label style="display:none"><?= $message->speed ?></label>
				<input type="hidden" name="hidden_message_id" value="<?= $message->id ?>">
				<button class="all_buttons_read" data-messageid="<?= $message->id ?>">Read</button>
			<?php endif ?>
			<p class="all_headers">Title: <?= $message->header ?></p>
			<hr>
			<p class="all_texts">Message: <?= $message->message ?></p>
		</li>
	<?php endforeach ?>
</ul>
</body>
</html>