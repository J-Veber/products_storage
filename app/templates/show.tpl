{extends 'template.tpl'}
{block 'page_content'}
  <div class="row">
    <div class="col-12">
      <h2 class="text-dark text-center">Product Info</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <form class="mt-4">
        <div class="form-group row border-bottom">
          <label for="id" class="col-sm-4 col-form-label font-weight-bold">Product ID</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control-plaintext" id="id" value="{$product->getId()}">
          </div>
        </div>
        <div class="form-group row border-bottom">
          <label for="name" class="col-sm-4 col-form-label font-weight-bold">Product Name</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control-plaintext" id="name" value="{$product->getName()}">
          </div>
        </div>
        <div class="form-group row border-bottom">
          <label for="country" class="col-sm-4 col-form-label font-weight-bold">Country</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control-plaintext" id="country" value="{$product->getCountry()}">
          </div>
        </div>
        <div class="form-group row border-bottom">
          <label for="producer" class="col-sm-4 col-form-label font-weight-bold">Producer</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control-plaintext" id="producer" value="{$product->getCountry()}">
          </div>
        </div>
        <div class="form-group row border-bottom">
          <label for="price" class="col-sm-4 col-form-label font-weight-bold">Price</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control-plaintext" id="price" value="{$product->getPrice()}">
          </div>
        </div>
        <div class="form-group row">
          <label for="expiration_date" class="col-sm-4 col-form-label font-weight-bold">Expiration Date</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control-plaintext" id="expiration_date"
                   value="{$product->getExpirationDate()->format('d/m/Y')}">
          </div>
        </div>
      </form>
      <hr class="my-4">
      <button onclick="window.location.href = '/list'" class="btn btn-secondary">
        <clr-icon shape="arrow" dir="left"></clr-icon>
        <span>Go Back</span>
      </button>
    </div>
  </div>
{/block}