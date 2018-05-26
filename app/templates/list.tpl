{extends 'template.tpl'}
{block 'page_content'}
  <div class="row">
    <div class="col-12 text-center">
      <h2 class="h2">List</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="d-flex">
        <div class="form-group">
          <input onkeyup="filter_products(event)"
                 type="text" class="form-control" id="search" placeholder="Find products by..">
        </div>
        <clr-icon shape="plus" size="32" class="is-success mx-2"
                  alt="Add new product" onclick="window.location.href='/new'"></clr-icon>
      </div>

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
          <th scope="col">Actions</th>
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
            {if ($product->getExpirationDate() === null )}
            <td></td>
            {else}
            <td>{$product->getExpirationDate()->format('d/m/Y')}</td>
            {/if}
            <td>
              <clr-icon id='edit_{$product->getId()}' shape="pencil" size="22" class="is-highlight"
                        alt="Edit product" onclick="editProduct({$product->getId()})"></clr-icon>
              <clr-icon id='show_{$product->getId()}' shape="help-info" size="22" class="is-warning"
                        alt="Show product info" onclick="showProduct({$product->getId()})"></clr-icon>
              <clr-icon id='{$product->getId()}' onclick="deleteProduct(event)"
                        shape="trash" size="22" class="is-error"
                        alt="Delete product"></clr-icon>
            </td>
          </tr>
        {/foreach}
        </tbody>
      </table>
    </div>
  </div>
{/block}
{block 'scripts'}
  <script async rel="script" src="/public/js/list.js" type="text/javascript"></script>
{/block}