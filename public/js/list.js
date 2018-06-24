window.products = [];

window.onload = () => {
  window.products = sendGetAllRequest();
  var searchInput = document.getElementById('search');
  if (!!searchInput ) {
    searchInput.addEventListener('keydown', function(key) {
      if (key.key.toLowerCase() === 'enter') {

        filterProducts(searchInput);
      }
    });
  }

  var searchBtn = document.getElementById('btn-search');
  if (!!searchBtn) {
    searchBtn.addEventListener('click', function () {
      filterProducts(searchInput);
    })
  }
};

function filterProducts(searchInput) {
  var receivedProducts = searchInput.value.length > 0 ? sendSearchRequest(searchInput.value): window.products;

  window.products.forEach( function(product) {
    const row = document.getElementById('product_' + product.id);
    if (!receivedProducts.find( receivedProduct => receivedProduct.id === product.id)) {
      row.classList.add('d-none');
    } else {
      row.classList.remove('d-none');
    }
  });
}

/**
 * @description send delete request and remove row from table
 * @param event - clicked button
 */
function deleteProduct(event) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", '/list/delete', true);
  xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
  const data = {id: event.target.id};
  const json = JSON.stringify(data);
  xhr.send(json);
  xhr.onload = function () {
    if (xhr.status === 200) {
      remove(event.target.id);
    }
  };
}

/**
 * @description get filtered products from list_controller:action_search
 * @return {object[]} - filtered products
 */
function sendSearchRequest(searchValue) {

  if (!searchValue) {
    searchValue = document.getElementById('search').value;
  }
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/list/search', false);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.send(JSON.stringify({'searchValue': searchValue}));

  if (xhr.status !== 200) {
    console.log( xhr.status + ': ' + xhr.statusText );
  } else {
    return JSON.parse(xhr.response);
  }
}

/**
 * @description get all products from list_controller:action_all
 * @return {object[]} - all products
 */
function sendGetAllRequest() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", '/list/all', false);
  xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
  xhr.send();
  if (xhr.status === 200) {
    return JSON.parse(xhr.response);
  }
}

/**
 * @description remove row from DOM
 * @param product_id
 */
function remove(product_id) {
  document.getElementById('product_' + product_id).remove();
}
