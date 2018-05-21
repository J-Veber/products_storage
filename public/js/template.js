function deleteProduct(event) {
  var xhr = new XMLHttpRequest();
  xhr.open('post', '/list/delete', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.data = { id: event.target.id};
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert('Something went wrong.  Name is now ' + xhr.responseText);
    }
    else if (xhr.status !== 200) {
      alert('Request failed.  Returned status of ' + xhr.status);
    }
  };
  xhr.send();
}
