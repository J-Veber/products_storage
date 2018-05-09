function toCreatePage() {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/new', true);
  xhr.send();
  if (xhr.status != 200) {
    // обработать ошибку
    alert(xhr.status + ': ' + xhr.statusText); // пример вывода: 404: Not Found
  } else {
    // вывести результат
    alert(xhr.responseText); // responseText -- текст ответа.
  }
}
