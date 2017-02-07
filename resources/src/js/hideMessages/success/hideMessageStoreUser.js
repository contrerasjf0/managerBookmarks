
$(document).ready(() => {

  var  alertSuccess = $('.alert-success');

  if(alertSuccess.length > 0){
     setTimeout(()=>{
       alertSuccess.remove();
     }, 3000);
  }

});
