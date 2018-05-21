function deleteProduct(event) {
  console.log('delete product', event)
  var xhr = new XMLHttpRequest();
  xhr.open('post', '/list/delete', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert('Something went wrong.  Name is now ' + xhr.responseText);
    }
    else if (xhr.status !== 200) {
      alert('Request failed.  Returned status of ' + xhr.status);
    }
  };
  // xhr.send(encodeURI('name=' + newName));
  // xhr.body = { id: event.target.id};
  xhr.send({ id: event.target.id});
  // if (xhr.status != 200) {
  //   // обработать ошибку
  //   alert(xhr.status + ': ' + xhr.statusText); // пример вывода: 404: Not Found
  // } else {
  //   // вывести результат
  //   alert('success ' + xhr.responseText); // responseText -- текст ответа.
  // }
}
