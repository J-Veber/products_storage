function deleteProduct(event) {
  console.log('delete product', event)
  var xhr = new XMLHttpRequest();
  xhr.open('DELETE', '/list/delete', true);
  xhr.body = [{ id: event.target.id}];
  xhr.send();
  // if (xhr.status != 200) {
  //   // обработать ошибку
  //   alert(xhr.status + ': ' + xhr.statusText); // пример вывода: 404: Not Found
  // } else {
  //   // вывести результат
  //   alert('success ' + xhr.responseText); // responseText -- текст ответа.
  // }
}
