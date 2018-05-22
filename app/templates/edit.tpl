{extends 'template.tpl'}
{block 'page_content'}
  <div class="row">
    <div class="col-12">
      <h2 class="h2">Edit product</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <form class="needs-validation" method="post" >
        <div class="form-row">
          <label for="name">Product ID</label>
          <input type="text" class="form-control" name="id" id="id" required value="{$product->getId()}" disabled>
        </div>
        <div class="form-row">
          <label for="name">Product Name</label>
          <input type="text" class="form-control" name="name" id="name" required value="{$product->getName()}">
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="form-row">
          <label for="country">Country</label>
          <input type="text" class="form-control" name="country" id="country" value="{$product->getProducer()}">
        </div>
        <div class="form-row">
          <label for="producer">Producer</label>
          <input type="text" class="form-control" name="producer" id="producer" value="{$product->getCountry()}">
        </div>
        <div class="form-row">
          <label for="price">Price</label>
          <input type="text" class="form-control" name="price" id="price" required value="{$product->getPrice()}">
        </div>
        <div class="form-row">
          <label for="expiration_date">Expiration Date</label>
          <input type="text" class="form-control" name="expiration_date" id="expiration_date" value="">
        </div>
        <div class="btn-group" role="group">
          <button type="submit" class="btn btn-success" id="create">Create</button>
          <button onclick="window.location.href = '/list'" class="btn btn-secondary">Cancel</button>
        </div>
      </form>
    </div>
  </div>
{/block}