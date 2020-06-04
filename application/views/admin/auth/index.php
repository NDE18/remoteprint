<style>
div.img {
    border: 1px solid #ccc;
}

div.img:hover {
    border: 1px solid #777;
}

div.img img {
    width: 100%;
    height: auto;
}


* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 47.99999%;
}

@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}
</style>
<head>
<link rel="stylesheet" href="<?php  css_url('bootstrap.min')?>">
 <link rel="stylesheet" href="<?php css_url('font-awesome/css/font-awesome.min')?>">

</head>
<body class="hold-transition login-page" style="background-color:#e4e5e6">
<div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8">
    <div class="login-box">
        <div class="login-logo">
         <h1 align="center">  <a href="<?= base_url() ?>"><b>Remote-</b>Print</a></h1>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div class="card-group">
        <div class="responsive" >
          <div class="img">
          <img src="<?php  img_url('logo.png')?>" class="img-responsive" width="600" height="400" alt="User Image"  />
            </div>
          </div>
          <div class="card p-4">
            <div class="card-body">
              <h1>Login</h1>
              <p class="text-muted">connecter vous a votre compte</p>
              <?php if(isset($error)){ ?>
            <div class="row">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= $error?>
                </div>
            </div>
            <?php } ?>
              <form action="<?= base_url('admin/auth') ?>" method="post">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="login">
              </div>
              <?= form_error('login') ?>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="pwd">
              </div>
              <?= form_error('pwd') ?>
              <div class="row">
                <div class="col-6">
                  <button type="submit" class="btn btn-primary px-4">connexion</button>
                </div>
                <div class="col-6 text-right">
                  <button type="button" class="btn btn-link px-0">mot de passe oublie?</button>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
</body>
