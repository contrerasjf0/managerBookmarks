import yo from  'yo-yo';
import  empty from "empty-element";
$(document).ready(() => {

  $("#add-folder").on("click", () => {

    var form = yo `
        <form class="form-horizontal">
          <div class="form-group">
           <label for="name_folder" class="col-xs-2 control-label">Nombre</label>
           <div class="col-xs-8">
             <input type="text" class="form-control" id="name_folder">
           </div>
          </div>
          <div class="form-group">
           <label for="description" class="col-xs-2 control-label">Descripciòn</label>
           <div class="col-xs-8">
             <input type="text" class="form-control" id="description">
           </div>
          </div>
          <div class="form-group">
           <div class="col-xs-offset-5 col-xs-4">
             <button type="submit" class="btn btn-default">Agregar</button>
           </div>
          </div>
        </form>
    `;

    let formContainer = document.getElementById('container-form');

     empty(formContainer).appendChild(form);
     $("#add-flink").removeClass('active');
     $("#add-folder").addClass('active');
  });
});
