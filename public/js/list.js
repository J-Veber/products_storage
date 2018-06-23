let products = [];

window.onload = () => {
  products = sendGetAllRequest();
  var searchInput = document.getElementById('search');
  if (!!searchInput ) {
    document.addEventListener('keydown', function(key) {
      if (key.key.toLowerCase() === 'enter') {
        sendSearchRequest(searchInput.value);
      }
    });
  }
};

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
 * @description filter all products in table
 * @param event
 */
function filter_products(event) {
  let filteredProducts = products;
  const filterString = event.target.value;
  if (filterString.length >= 0) {
    const filterWords = filterString.split(' ');
    for (let i = 0; i<filteredProducts.length; i++) {
      let isFinded = true;
      for (let q = 0; q < filterWords.length && isFinded; q++) {
        isFinded = !compare(products[i], filterWords[q]) && isFinded;
      }
      const row = document.getElementById('product_' + products[i].id);
      if (!isFinded) {
        row.classList.add('d-none');
      } else {
        row.classList.remove('d-none');
      }
    }
  }
}

function sendSearchRequest(searchValue) {
  if (!searchValue) {
    searchValue = document.getElementById('search').value;
  }
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/list/search', false);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.send(JSON.stringify({'searchValue': searchValue}));

  if (xhr.status !== 200) {
    console.log( xhr.status + ': ERROR' + xhr.statusText ); // пример вывода: 404: Not Found
  } else {
    console.log( xhr.responseText ); // responseText -- текст ответа.
  }
}

/**
 * @description get all products from list_controller:action_all
 * @return {object[]} - all products
 */
function sendGetAllRequest() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", '/list/all', true);
  xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
  xhr.send();
  xhr.onload = function () {
    if (xhr.status === 200) {
      return JSON.parse(xhr.response);
    }
  };
}

/**
 * @description search word in Product Object
 * @param product
 * @param word
 */
function compare(product, word){
  let result = false;
  Object.keys(product).forEach( key => {
    if ( key === 'expiration_date') {
      if (!result && product[key]) {
        let date = product[key].date.substr(0, product[key].date.indexOf(' '));
        date = date.replace(/-/g, '/');
        result = date.indexOf(word) !== -1 || result;
      }
    } else {
      if (!result && product[key]) {
        result = product[key].toString().indexOf(word) !== -1 || result;
      }
    }

  });
  return !result;
}

/**
 * @description remove row from DOM
 * @param product_id
 */
function remove(product_id) {
  document.getElementById('product_' + product_id).remove();
}
