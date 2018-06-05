// document.ready = () => {
//   const datepicker = document.getElementById('expiration_date');
//   if (!!datepicker) {
//     const options={
//       format: 'yyyy/mm/dd',
//       todayHighlight: true,
//       autoclose: true,
//       startDate: '-3d'
//     };
//     // datepicker.defaults.format = "yyyy/mm/dd";
//     datepicker.datepicker({
//       format: "yyyy/mm/dd"
//     });
//   }
// };

$('[data-toggle="datepicker"]').datepicker({
  format: 'yyyy/mm/dd'
});

