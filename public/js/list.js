let products = [];

window.onload = () => {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", '/list/all', true);
  xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
  xhr.send();
  xhr.onload = function () {
    if (xhr.status === 200) {
      products = JSON.parse(xhr.response);
    }
  };
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
