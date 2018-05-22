{extends 'template.tpl'}
{block 'page_content'}
  <div class="row">
    <div class="col-12 text-center">
      <h2 class="h2">List</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10 col-sm-12">
      <div class="form-group">
        <input
            onkeydown="filter_products($event)"
            type="text" class="form-control" id="search" placeholder="Find products by..">
      </div>
    </div>
    <div class="col-md-2 col-sm-12">
      <button type="button" class="btn btn-success w-100 mb-3" onclick="window.location.href='/new'">
        Add new
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Producer</th>
          <th scope="col">Country</th>
          <th scope="col">Price</th>
          <th scope="col">Expiration Date</th>
          <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        {foreach $products as $product}
          <tr id="product_{$product->getId()}">
            <th scope="row">{$product->getId()}</th>
            <td>{$product->getName()}</td>
            <td>{$product->getProducer()}</td>
            <td>{$product->getCountry()}</td>
            <td>{$product->getPrice()}</td>
            <td>{$product->getExpirationDate()}</td>
            <td>
              <button id='{$product->getId()}' onclick="deleteProduct(event)"
                      type="button" class="btn btn-outline-danger w-100">
                -
              </button>
            </td>
          </tr>
        {/foreach}
        </tbody>
      </table>
    </div>
  </div>
{/block}