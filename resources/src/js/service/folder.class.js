import axios from "axios";
import config from "../configs/configs";
import baseClass from "./baseClass";
import isEmpty from "lodash/isEmpty";
import isUndefined from "lodash/isUndefined";
import clearField from "../utils/clearField";
import utilValidate from "../utils/validate";

class folder extends baseClass{

    constructor(){
        super();
    }

    save(data = {}) {

        if(isEmpty(data)) throw (new Error('Var data empty'));

        let rules = {
            name: 'required|min:3|max:30',
            description: 'max:255'
        };

        this.result = {};
        let objUtilValidate = new utilValidate();
        let errors = objUtilValidate.isValidate(data, rules);

        if(!isEmpty(errors)) return errors;

       axios({
                method: 'post',
                url: config.baseUrl+'folder',
                headers:{'X-CSRF-TOKEN': this.csrf},
                data: data
            }).then((res) =>{
                 objUtilValidate = new utilValidate();
                    
                    if(isUndefined(res.data.id)){
                        objUtilValidate.showMessagesDanger(res.data);
                    }else{
                        objUtilValidate.showMessageSuccess("success-save","danger-save");
                        try {
                           let objClearField = new clearField(); 
                           objClearField.clear(data);
                        } catch (e) {
                            console.log('('+e.name+') -> '+e.message);
                        }
                    }
            }).catch((err) => {
                //throw (new Error(err.response.data))
                console.log(err);
            });
    }

    getList(){
        axios({
                method: 'get',
                url: config.baseUrl+'folder',
                headers:{'X-CSRF-TOKEN': this.csrf}
            }).then((res) =>{
                 let folders = res.data,
                     options = '<option value="0" selected></option>';

                 folders.forEach((folder)=>{
                    options += '<option value="'+folder.id+'">'+folder.name+'</option>';
                 });

                 $('#folder_id').append(options);
            }).catch((err) => {
                //throw (new Error(err.response.data))
                console.log(err);
            });
    }

}

export default folder;