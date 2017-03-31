import yo from "yo-yo";

export default function template(){
    return yo `
            <div>
                <div id="success-save" class="alert alert-success hide style-margin-messaje">
                    Bookmark guardado!!!
                </div>
                <div id="danger-save" class="alert alert-danger hide style-margin-messaje">
                    Problemas al guardar el Bookmark :(
                </div>
                <form class="form-horizontal form-style-margin-add">
                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">Nombre</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="name">
                            <div id="messaje-error-name" class="alert alert-danger style-messaje-form hide" role="alert">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-xs-2 control-label">Url</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="url" name="url">
                            <div id="messaje-error-url" class="alert alert-danger style-messaje-form hide" role="alert">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="folder_id" class="col-xs-2 control-label">Carpeta</label>
                        <div class="col-xs-8">
                            <select class="form-control" id="folder_id" name="folder_id">
                                <option value="0"></option>
                            </select>
                            <div id="messaje-error-folder_id" class="alert alert-danger style-messaje-form hide" role="alert">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-xs-2 control-label">Nota</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="note" name="note">
                            <div id="messaje-error-note" class="alert alert-danger style-messaje-form hide" role="alert">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tags" class="col-xs-2 control-label">Tags</label>
                        <div class="col-xs-8">
                            <div id="tags" class="input textarea clearfix" name="tags"></div>
                            <div id="messaje-error-tags" class="alert alert-danger style-messaje-form hide" role="alert">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-offset-5 col-xs-4">
                            <button id="bm-save" type="button" class="btn btn-default">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        `;
};