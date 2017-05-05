
export default function(){
  var messageErrorLogin = $('#message-error-login');

   if(messageErrorLogin.length > 0){
     setTimeout(()=>{
       messageErrorLogin.remove();
     }, 3000);
   }
}