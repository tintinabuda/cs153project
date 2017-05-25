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
    <?php foreach ($user as $u){ ?>
    <h2>Editing User   <b><i> <?php echo $u->username;?></i></b></h2>



    <form action="" method="post">
        <div class="form-group">
            <label>name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo !empty($u->name)?$u->name:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>


        <!-- address -->
        <div class="form-group">
            <label>address</label>
            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo !empty($u->address)?$u->address:''; ?>">
            <?php echo form_error('address','<span class="help-block">','</span>'); ?>
        </div>
        <!-- bday -->
        <div class="form-group">
            <label>birthday</label>
            <input type="date" class="form-control" name="birthday" placeholder="Birthday" value="<?php echo !empty($u->birthday)?$u->birthday:''; ?>">
            <?php echo form_error('birthday','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <label>type (user = 0, admin = 1) </label>
            <input type="text" class="form-control" name="type" placeholder="" value="<?php echo !empty($u->type)?$u->type:''; ?>">
            <?php echo form_error('birthday','<span class="help-block">','</span>'); ?>
        </div>

        <div class="form-group">
            <input type="submit" name="upSubmit" class="btn-primary" value="Submit"/>
        </div>
        </form> 
      <?php }?>
    <p class="footInfo"><a href="<?php echo base_url(); ?>index.php/users/">Back</a></p>
</div>
</body>
</html>
