<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Manage Facilities</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card mt-3">
            <div class="card-header">
              <h4>
                Manage Facilities
                <a href="<?= base_url('facilities') ?>" class="btn btn-danger float-right">Back</a>
                <a href="<?= base_url('facilities/add') ?>" class="btn btn-primary float-right">Add New Facilities</a>

              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($facilities as $item) : ?>
                  <tr>
                    <td><?= $item->id ?></td>
                    <td><img src="<?= base_url('images/facility/'.$item->fImageName) ?>" height="50px" width="50px" alt="Facility Image"></td>
                    <td><?= $item->fName ?></td>
                    <td><?= $item->fDes ?></td>
                    <td><a href="<?= base_url('facilities/edit/'.$item->id) ?>" class="btn btn-success btn-sm">Edit</a></td>
                    <td><a href="<?= base_url('facilities/delete/'.$item->id) ?>" class="btn btn-danger btn-sm">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  </body>
</html>
