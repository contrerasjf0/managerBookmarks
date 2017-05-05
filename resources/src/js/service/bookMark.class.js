import isEmpty from "lodash/isEmpty";
import utilValidate from "../utils/validate";

class bookMark{

    constructor(){}

    save(data = {}) {

        if(isEmpty(data)) throw (new Error('Var data empty'));

        let rules = {
            name: 'min:3|max:50|required',
            url: 'required|url',
            folder_id: 'integer',
            note: 'min:5',
            tags: 'array'
           
        };

        let objUtilValidate = new utilValidate();
        let errors = objUtilValidate.isValidate(data, rules);

        if(!isEmpty(errors)) return errors;

        return {
            status: 200,
            id: 1
        };
    }

}

export default bookMark;