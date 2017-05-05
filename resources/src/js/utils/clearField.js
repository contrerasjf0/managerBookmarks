import taggle from "taggle";
import isEmpty from "lodash/isEmpty";


class clearField{

    clear(data = {}, elementTag = null){

        if(isEmpty(data)) throw (new Error('Var data empty'));

        Object.keys(data).forEach((key) => {
            
            let element = document.getElementById(key);
            
            if(element.type === "text"){
                element.value = "";
            }else if(element.type === "select-one"){
                element.selectedIndex  = 0;
            }else if(element.id === "tags"){
               elementTag.removeAll(); 
            }
            
        });
    }
}
export default clearField;