<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- boostrap --->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Login</title>
  </head>
  <body>
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 mt-5">
          <div class="card">
            <div class="card-header" style="padding-top: 50px;">
              <h4>Login <a href="<?= base_url('viewfacilities') ?>" style="float: right;"" class="btn btn-primary">Back</a></h4>
            </div>
            <div class="card-body">
              <form action="<?= base_url('login') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Enter your email" name="email">
                  <small><?php echo form_error('email'); ?></small>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Enter your password" name="password">
                  <small><?php echo form_error('password'); ?></small>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    

  </body>
</html>