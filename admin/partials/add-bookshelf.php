<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h2>Create Bookshelf</h2>
            <span><button id="ajaxSubmit" type="button" class="btn btn-primary">AJAX Submit</button></span>
            <form id="addBookshelf" method="POST" data-parsley-validate>
                <div class="form-group">
                    <label for="book-name">name</label>
                    <input type="text" class="form-control" name="name" id="book-name" required minlength="3" aria-describedby="book-name-help-id" placeholder="name">
                    <small id="book-name-help-id" class="form-text text-muted">A B C</small>
                </div>
                <div class="form-group">
                    <label for="book-capacity">capacity</label>
                    <input type="number" class="form-control" name="capacity" id="book-capacity" required minlength="1" min="1" aria-describedby="book-capacity-help-id" placeholder="capacity">
                    <small id="book-capacity-help-id" class="form-text text-muted">A B C</small>
                </div>
                <div class="form-group">
                    <label for="book-location">location</label>
                    <input type="text" class="form-control" name="location" id="book-location" required minlength="3" aria-describedby="book-location-help-id" placeholder="location">
                    <small id="book-location-help-id" class="form-text text-muted">A B C</small>
                </div>
                <div class="form-group">
                    <label for="book-status">status</label>
                    <select class="form-control" name="status" id="book-status">
                        <option value="1">active</option>
                        <option value="0">inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>