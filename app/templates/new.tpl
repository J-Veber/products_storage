{extends 'template.tpl'}
{block 'page_content'}
  <div class="row">
    <div class="col-12">
      <h2 class="h2">Add new product</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <form class="needs-validation" method="post" action="/new/save">
        <div class="form-row">
          <label for="name">Product Name</label>
          <input type="text" class="form-control" name="name" id="name" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="form-row">
          <label for="country">Country</label>
          <input type="text" class="form-control" name="country" id="country">
        </div>
        <div class="form-row">
          <label for="producer">Producer</label>
          <input type="text" class="form-control" name="producer" id="producer">
        </div>
        <div class="form-row">
          <label for="price">Price</label>
          <input type="text" class="form-control" name="price" id="price" required>
        </div>
        <div class="form-row">
          <label for="expiration_date">Expiration Date</label>
          <input type="text" class="form-control" name="expiration_date" id="expiration_date">
        </div>
        <div class="btn-group" role="group">
          <button type="submit" class="btn btn-success" id="create">Create</button>
          <button onclick="window.location.href = '/list'" class="btn btn-secondary">Cancel</button>
        </div>
      </form>
    </div>
  </div>
{/block}