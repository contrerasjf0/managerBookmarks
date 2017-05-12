
import yo from  'yo-yo';
import empty from "empty-element";
import eventUtil from "../../utils/events";
import folder from "../../service/folder.class";
import template from "./template";
import isNull from "lodash/isNull";



export default function(){
    let element = document.getElementById("add-folder");

  if(!isNull(element)){

    eventUtil.addEventAction(element, "click", () => {
        var form = template();

        let formContainer = document.getElementById('container-form');

        empty(formContainer).appendChild(form);

         document.getElementById("add-link").classList.remove('active');
         document.getElementById("add-folder").classList.add('active');

         eventUtil.addEventAction(document.getElementById("f-save"),"click", () => {

                let objFolder = new folder();
                    
                
                let data = {
                    name: document.getElementById("name").value,
                    description: document.getElementById("description").value
                };

                try{
                    let result = objFolder.save(data);
                }catch (e) {
                    console.log('('+e.name+') -> '+e.message); 
                }
                 
          });
    });
  }
}
