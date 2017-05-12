import axios from "axios";
import config from "../configs/configs";
import isEmpty from "lodash/isEmpty";
import utilValidate from "../utils/validate";
import isUndefined from "lodash/isUndefined";
import clearField from "../utils/clearField";

class bookMark{

    constructor(){}

    save(data = {}, objTags) {

        if(isEmpty(data)) throw (new Error('Var data empty'));

        let rules = {
            name: 'min:3|max:50|required',
            url: 'required|url',
            folder_id: 'integer',
            note: 'min:5',
            tags: 'array'
           
        };

        let response = {};
        let objUtilValidate = new utilValidate();
        let errors = objUtilValidate.isValidate(data, rules);

        if(!isEmpty(errors)) return errors;

        axios({
                method: 'post',
                url: config.baseUrl+'bookmark',
                headers:{'X-CSRF-TOKEN': this.csrf},
                data: data
            }).then((res) =>{

                    if(isUndefined(res.data.id)){
                        objUtilValidate.showMessagesDanger(res.data);
                    }else{
                        objUtilValidate.showMessageSuccess("success-save","danger-save");
                        try {
                            let objClearField = new clearField(); 
                            objClearField.clear(data, objTags);
                        } catch (e) {
                            console.log('('+e.name+') -> '+e.message); 
                        }
                    }
            }).catch((err) => {
                //throw (new Error(err.response.data))
                console.log(err);
            });

    }

}

export default bookMark;