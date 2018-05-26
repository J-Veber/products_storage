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
  const datepicker = document.getElementById('expiration_date');
  if (!!datepicker) {
    const options={
      format: 'mm/dd/yyyy',
      todayHighlight: true,
      autoclose: true,
      startDate: '-21y'
    };
    datepicker.datepicker(options);
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

/**
 * @description search word in Product Object
 * @param product
 * @param word
 */
function compare(product, word){
  let result = false;
  Object.keys(product).forEach( key => {
    if (!result && product[key]) {
      result = product[key].toString().indexOf(word) !== -1 || result;
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

/**
 * @description open /edit for current product
 * @param product_id - current product
 */
function editProduct(product_id) {
  window.location.href = '/edit?product_id='+product_id;
}

/**
 * @description open /show for current product
 * @param product_id
 */
function showProduct(product_id) {
  window.location.href = '/show?product_id='+product_id;
}
