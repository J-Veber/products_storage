// submit form - this is a listening click event. Bad practise for IE-9
document.getElementById('submit').addEventListener('click', () =>{
  const form = document.getElementsByTagName('form')[0];
  Object.keys(form.elements).forEach( element_key => {
    if (form.elements[element_key].tagName.toLowerCase() === 'input') {
     switch (form.elements[element_key].id) {
       case 'name':
         if (form.elements[element_key].value.length === 0) {
           showPatternError(form.elements[element_key], 'This is a required field');
         } else if (!form.elements[element_key].value.match(/[\d\w\s]{1,20}/)) {
           showPatternError(form.elements[element_key], 'This field should consist of: any letters, numbers? symbol "_" and spaces');
         } else if (form.elements[element_key].value.length > 20) {
           showPatternError(form.elements[element_key], 'So long value');
         } else {
           hidePatternError(form.elements[element_key]);
         }
         break;
       case 'country':
         if (form.elements[element_key].value.length > 15) {
           showPatternError(form.elements[element_key], 'So long value');
         }
         break;
       case 'producer':
         if (form.elements[element_key].value.length > 20) {
           showPatternError(form.elements[element_key], 'So long value');
         }
         break;
       case 'price':
         if (form.elements[element_key].value.length === 0) {
           showPatternError(form.elements[element_key], 'This is a required field');
         } else if (!form.elements[element_key].value.match(/^[+-]?([0-9]*[.])?[0-9]+$/g)) {
           showPatternError(form.elements[element_key], 'This is a numeric field');
         } else if (form.elements[element_key].value < 0) {
           showPatternError(form.elements[element_key], 'Price cannot be negative');
         } else {
           hidePatternError(form.elements[element_key]);
         }
         break;
       case 'expiration_date':
         if (!form.elements[element_key].value.match(/\d\d\/\d\d\/\d\d\d\d/) &&
           form.elements[element_key].value.length !== 0) {
           showPatternError(form.elements[element_key], 'This is a date field with pattern: dd/mm/yyyy');
         } else {
           hidePatternError(form.elements[element_key]);
         }
         break;
       default:
         break;
     }
    }
  });
});

function showPatternError(input, msg) {
  if (!!input) {
    input.nextElementSibling.textContent = msg;
    input.nextElementSibling.classList.add('d-flex', 'text-danger');
  }
  event.preventDefault();
}

function hidePatternError(input) {
  if (!!input) {
    input.nextElementSibling.classList.remove('d-flex', 'text-danger');
  }
}