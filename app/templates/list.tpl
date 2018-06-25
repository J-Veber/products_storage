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
          <input type="text" class="form-control" id="search" placeholder="Find products by [ id, name, producer, country, price ]">
        </div>
        <clr-icon shape="search" id="btn-search" size="32" class="is-success mx-2 mb-3"
                  alt="Add new product"></clr-icon>
        <clr-icon shape="plus" size="32" class="is-success mx-2 mb-3"
                  alt="Add new product" onclick="window.location.href='/new'"></clr-icon>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="table-container">
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
                <td>{$product->getExpirationDate()->format('Y/m/d')}</td>
              {/if}
              <td>
                <a href='/edit/{$product->getId()}'>
                  <clr-icon id='edit_{$product->getId()}' shape="pencil" size="22" class="is-highlight"
                            alt="Edit product"></clr-icon>
                </a>
                <a href='/show/{$product->getId()}'>
                  <clr-icon id='show_{$product->getId()}' shape="help-info" size="22" class="is-warning"
                            alt="Show product info"></clr-icon>
                </a>
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
  </div>
{/block}
{block 'scripts'}
  <script async rel="script" src="/public/js/list.js" type="text/javascript"></script>
{/block}