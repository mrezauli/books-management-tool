<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h2>Create Book</h2>
            <form>
                <div class="form-group">
                    <label for="book-name">name</label>
                    <input type="text" class="form-control" name="name" id="book-name" aria-describedby="book-name-help-id" placeholder="amount">
                    <small id="book-name-help-id" class="form-text text-muted">A B C</small>
                </div>
                <div class="form-group">
                    <label for="book-amount">amount</label>
                    <input type="number" class="form-control" name="amount" id="book-amount" aria-describedby="book-amount-help-id" placeholder="amount">
                    <small id="book-amount-help-id" class="form-text text-muted">A B C</small>
                </div>
                <div class="form-group">
                    <label for="book-description">description</label>
                    <input type="text" class="form-control" name="description" id="book-description" aria-describedby="book-description-help-id" placeholder="description">
                    <small id="book-description-help-id" class="form-text text-muted">A B C</small>
                </div>
                <div class="form-group">
                    <label for="book-language">language</label>
                    <input type="text" class="form-control" name="language" id="book-language" aria-describedby="book-language-help-id" placeholder="language">
                    <small id="book-language-help-id" class="form-text text-muted">A B C</small>
                </div>
                <div class="form-group">
                    <label for="book-status">status</label>
                    <input type="text" class="form-control" name="status" id="book-status" aria-describedby="book-status-help-id" placeholder="status">
                    <small id="book-status-help-id" class="form-text text-muted">A B C</small>
                </div>
                <div class="form-group">
                    <label for="book-image">image</label>
                    <input type="file" class="form-control-file" name="image" id="book-image" placeholder="book-image" aria-describedby="book-image">
                    <small id="book-image-help-id" class="form-text text-muted">image file</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>