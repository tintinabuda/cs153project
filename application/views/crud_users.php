<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CS 153 Project Website</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<h1>files involved <br>
models/User.php <br>
controllers/Users.php  index() <br>
views/ show_users.php</h1>
<h2> Simple CI CRUD Application </h2>

<table>

<tr>

<th scope="col">ID</th>

<th scope="col">User Name</th>

<th scope="col">Name</th>

<th scope="col">Address</th>

<th scope="col">Birthday</th>
<th scope="col">type</th>
<th scope="col">Actions</th>
</tr>

<?php foreach ($user_list as $u_key){ ?>

<tr>

<td><?php echo $u_key->id; ?></td>

<td><?php echo $u_key->username; ?></td>

<td><?php echo $u_key->name; ?></td>

<td><?php echo $u_key->address; ?></td>

<td><?php echo $u_key->birthday; ?></td>
<td><?php echo $u_key->type; ?></td>
<td><a href="<?php echo site_url('users/delete/'.$u_key->id)?>" onClick="show_confirm('delete',<?php echo $u_key->id;?>)">Delete </a></td>
<td><a href="<?php echo site_url('users/edit/'.$u_key->id)?>" onClick="show_confirm('delete',<?php echo $u_key->id;?>)">Edit</a></td>
</tr>

<?php }?>

</table>
</body>
</html>
