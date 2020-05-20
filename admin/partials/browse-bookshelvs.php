<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-10 offset-1">
            <table id="browseBookshelvs" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Capacity</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($bookShelvs) > 0) {
                        foreach ($bookShelvs as $key => $bookShelfe) {

                    ?>
                            <tr>
                                <td><?php echo $bookShelfe->id ?></th>
                                <td><?php echo $bookShelfe->name ?></th>
                                <td><?php echo intval($bookShelfe->capacity) ?></th>
                                <td><?php echo $bookShelfe->location ?></th>
                                <td>
                                    <?php
                                    if ($bookShelfe->status) {
                                    ?>
                                        <button class="btn btn-info">Active</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="btn btn-warning">Deactive</button>
                                    <?php
                                    }
                                    ?>

                                </td>
                                <td>
                                        <button class="btn btn-info">Edit</button>
                                        <button class="btn btn-warning">Delete</button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Capacity</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>