export default function(){
  var helperBlocks = $('.help-block');

  if(helperBlocks.length > 0){
     var divInput = $('.has-error');
     setTimeout(()=>{
       helperBlocks.remove();
       divInput.removeClass('has-error');
     }, 3000);
  }
}
