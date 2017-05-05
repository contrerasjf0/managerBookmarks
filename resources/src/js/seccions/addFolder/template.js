import yo from "yo-yo";

export default function template(){
    return yo `
        <div>
          <div id="success-save" class="alert alert-success hide style-margin-messaje">
              Carpeta creada!!!
          </div>
          <div id="danger-save"  class="alert alert-danger hide style-margin-messaje">
              Problemas al crear la carpeta :(
          </div>
          <form class="form-horizontal form-style-margin-add">
            <div class="form-group">
            <label for="name_folder" class="col-xs-2 control-label">Nombre</label>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="name_folder" name="name_folder">
              <div id="messaje-error-name_folder" class="alert alert-danger style-messaje-form hide" role="alert">
                                
              </div>
            </div>
            </div>
            <div class="form-group">
            <label for="description" class="col-xs-2 control-label">Descripciòn</label>
            <div class="col-xs-8">
              <input type="text" class="form-control" id="description" name="description">
              <div id="messaje-error-description" class="alert alert-danger style-messaje-form hide" role="alert">
                                
              </div>
            </div>
            </div>
            <div class="form-group">
            <div class="col-xs-offset-5 col-xs-4">
              <button id="f-save" type="button" class="btn btn-default">Agregar</button>
            </div>
            </div>
          </form>
        </div>
      `;

};