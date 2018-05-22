function deleteProduct(event) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", '/list/delete', true);
  xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
  var data = { id: event.target.id};
  var json = JSON.stringify(data);
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert('Something went wrong.  Name is now ' + xhr.responseText);
    }
    else if (xhr.status !== 200) {
      alert('Request failed.  Returned status of ' + xhr.status);
    }
  };
  // xhr.send({ id: event.target.id.toString()});
  xhr.send( json );
}
