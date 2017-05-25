<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <!-- <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
            body {
                margin: 0;
                padding: 0;
                padding-top: 65px ;
                width: 100%;
                display: table;
                font-weight: 100;
                background: white;
                color: black;
            }

    </style>

</head>
<body>

<div class="container">
    <?php foreach ($user as $u_key){ ?>
    <h2>Editing User   <b><i> <?php echo $u_key->username;?></i></b></h2>



    <form action="" method="post">
        <div class="form-group">
            <label>name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>


        <!-- address -->
        <div class="form-group">
            <label>address</label>
            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo !empty($user['address'])?$user['address']:''; ?>">
            <?php echo form_error('address','<span class="help-block">','</span>'); ?>
        </div>
        <!-- bday -->
        <div class="form-group">
            <label>birthday</label>
            <input type="date" class="form-control" name="birthday" placeholder="Birthday" value="<?php echo !empty($user['birthday'])?$data['birthday']:''; ?>">
            <?php echo form_error('birthday','<span class="help-block">','</span>'); ?>
        </div>
      <div class="form-group">
              <label>user type</label>
              <select class="form-control">
              <option value="1">Admin</option>
              <option value="0">User</option>
  
              </select>
              <input type="number" class="form-control" name="birthday" placeholder="Birthday" value="<?php echo !empty($user['birthday'])?$data['birthday']:''; ?>">
              <?php echo form_error('birthday','<span class="help-block">','</span>'); ?>
          </div>

<!--         <div class="form-group">
          <label>password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <label>password confirm</label>
          <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" required="">
          <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
        </div> -->

        <div class="form-group">
            <input type="submit" name="upSubmit" class="btn-primary" value="Submit"/>
        </div>
        </form> 
      <?php }?>
    <p class="footInfo"><a href="<?php echo base_url(); ?>index.php/users/">Back</a></p>
</div>
</body>
</html>
