document.ready = () => {
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