{extends 'template.tpl'}
{block 'page_content'}
  <div class="row">
    <div class="col-12">
      <h2 class="h2 text-dark text-center">Add new product</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <form class="needs-validation" method="post">
        <div class="form-group">
          <label for="name">Product Name</label>
          <input type="text" class="form-control" name="name" id="name">
          <div class="feedback"></div>
        </div>
        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" class="form-control" name="country" id="country">
          <div class="feedback"></div>
        </div>
        <div class="form-group">
          <label for="producer">Producer</label>
          <input type="text" class="form-control" name="producer" id="producer">
          <div class="feedback"></div>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" class="form-control" name="price" id="price">
          <div class="feedback"></div>
        </div>
        <div class="form-group">
          <label for="expiration_date">Expiration Date</label>
          <input type="text" class="form-control datepicker" name="expiration_date" id="expiration_date"
                 data-provide="datepicker">
          <div class="feedback"></div>
        </div>
        <div class="btn-group w-100 mt-3" role="group">
          <a class="btn btn-secondary" href="/list">
            <span>Cancel</span>
          </a>
          <button type="submit" class="btn btn-success" id="submit">
            <span>Create</span>
          </button>
        </div>
      </form>
    </div>
  </div>
{/block}
{block 'scripts'}
  <script type="text/javascript" src="/node_modules/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript"
          src="/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet"
        href="/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css"/>
  <script async rel="script" src="/public/js/validation.js" type="text/javascript"></script>
  <script async rel="script" src="/public/js/datepicker.js" type="text/javascript"></script>
{/block}