
import bookMark from "../../service/bookMark.class"
import yo from "yo-yo";
import empty from "empty-element";
import eventUtil from "../../utils/events";
import taggle from "taggle";
import template from "./template";
import isNull from "lodash/isNull";
import isEmpty from "lodash/isEmpty";
import folder from "../../service/folder.class";

export default function (){

    let element = document.getElementById("add-link");

    if(!isNull(element)){
        
        eventUtil.addEventAction(element, "click",  () => {
        
            var form = template();

            let formContainer = document.getElementById('container-form'),
                folderObj = new folder();

            empty(formContainer).appendChild(form);

            folderObj.getList();

            var objTags = new taggle('tags', {
                placeholder: "Ingresa tus tags",
                allowDuplicates: false,
                duplicateTagClass: 'bounce',
                additionalTagClasses: "label label-primary",
                containerFocusClass: "active"
            });

            document.getElementById("add-folder").classList.remove('active');
            document.getElementById("add-link").classList.add('active');
            
            eventUtil.addEventAction(document.getElementById("bm-save"),"click", () => {

                let objBookMark = new bookMark(),
                    selectFolder = document.getElementById("folder_id");
                
                let data = {
                    name: document.getElementById("name").value,
                    url: document.getElementById("url").value,
                    folder_id: selectFolder.options[selectFolder.selectedIndex].value,
                    note: document.getElementById("note").value,
                    tags: objTags.getTagValues()
                };

                try {
                    let result = objBookMark.save(data, objTags);
                }catch (e) {
                    console.log('('+e.name+') -> '+e.message); 
                }  

            });

        });
    }  
}