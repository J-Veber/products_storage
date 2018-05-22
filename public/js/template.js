/**
 * @description send delete request and remove row from table
 * @param event - clicked button
 */
function deleteProduct(event) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", '/list/delete', true);
  xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
  var data = { id: event.target.id};
  var json = JSON.stringify(data);
  xhr.send( json );
  xhr.onload = function() {
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

}

/**
 * @description remove row from DOM
 * @param product_id
 */
function remove(product_id) {
  // console.log('deleteProduct', product_id);
  // console.log('deleteProduct', document.getElementById('product_'+product_id));
  if (product_id instanceof String) {
    document.getElementById('product_'+product_id).remove();
  } throw new Error ('invalid parameter in function remove');
}

window.onload = () => {
  console.log('onload');
};