{extends 'template.tpl'}
{block 'page_content'}
    <div class="row">
        <div class="col-12">
            <h2 class="h2">Add new product</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form class="needs-validation">
                <div class="form-row">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="name" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="form-row">
                    <label for="exampleInputPassword1">Country</label>
                    <input type="text" class="form-control" id="country">
                </div>
                <div class="form-row">
                    <label for="exampleInputPassword1">Producer</label>
                    <input type="text" class="form-control" id="producer">
                </div>
                <div class="form-row">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" id="price" required>
                </div>
                <div class="form-row">
                    <label for="exampleInputPassword1">Expiration Date</label>
                    <input type="text" class="form-control" id="expiration_date">
                </div>
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-success" id="create">Create</button>
                    <button onclick="window.location.href = '/list'" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
{/block}