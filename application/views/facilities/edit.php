<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Update Facilities</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          <div class="card">
            <div class="card-header" style="padding-top: 50px;">
              <h4>Edit Facility <a href="<?= base_url('facilities/manage') ?>" style="float: right;"" class="btn btn-primary">Back</a></h4>
            </div>
            <div class="card-body">
              <form action="<?= base_url('facilities/update/'.$facility->id) ?>" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label>Name of Facility</label>
                  <input type="text" class="form-control" value="<?= $facility->fName; ?>" placeholder="Enter Name of the Facility" name="fName">
                  <small><?php echo form_error('fName'); ?></small>
                </div>

                <div class="form-group">
                  <label>Description of Facility</label>
                  <input type="text" class="form-control" value="<?= $facility->fDes; ?>" placeholder="What's the Facility For?" name="fDes">
                  <small><?php echo form_error('fDes'); ?></small>
                </div>

                <div class="form-group">
                  <label>Image of the Facility</label>
                  <input type="hidden" name="old_fac_image" value="<?= $facility->fImageName; ?>">
                  <input type="file" class="form-control" name="fImage">
                  <small><?php if(isset($error)){echo $error;} ?></small>
                </div>

                <button type="submit" name="facility_update" class="btn btn-info">Update</button>
              </form>
            </div>
            <!-- <?php if($this->session->flashdata('status')): ?>
              <div class="alert alert-success">
                <?= $this->session->flashdata('status'); ?>
              </div> 
            <?php endif; ?> -->
          </div>
        </div>
        <div class="col-md-4">
          <img src="<?= base_url('images/facility/'.$facility->fImageName) ?>" class="w-100" style="padding-top: 50px;" alt="Facility Image">
        </div>
      </div>
    </div>

  </body>
</html>
