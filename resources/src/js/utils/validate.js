import validator from "Validator";


class validate{

    constructor(){}

    isValidate(data, rules){

        var validatorObj = validator.make(data, rules)

        if (validatorObj.fails()) {

            var errors = validatorObj.getErrors()
            return errors;

        }

        return {};
    }

     showMessageSuccess(selectorsSucces, selectorsDanger){
        let elementIdSucces = document.getElementById(selectorsSucces),
            elementIdDanger = document.getElementById(selectorsDanger);

        elementIdSucces.classList.remove("hide");
        elementIdSucces.classList.add("show");
        elementIdDanger.classList.remove("show");
        elementIdDanger.classList.add("hide");

        this.hideMessage(selectorsSucces);
    }

     showMessagesDanger(messageError){

        Object.keys(messageError).forEach((key) => {
            
            let messages = messageError[key];

            let elementId = document.getElementById("messaje-error-"+key);
                elementId.innerHTML = messages[0];
                elementId.classList.remove("hide"); 
                elementId.classList.add("show");
        });
        
        this.hideMessageDanger(messageError);
        
    }

    hideMessage(selectorHide){

        let elementId = document.getElementById(selectorHide);
        setTimeout(()=>{
            elementId.classList.remove("show");
            elementId.classList.add("hide");
        }, 3000);
    }

    hideMessageDanger(messageError){

        setTimeout(()=>{
            Object.keys(messageError).forEach((key) => {
                
                let elementId = document.getElementById("messaje-error-"+key);

                elementId.innerHTML = "";
                elementId.classList.remove("show"); 
                elementId.classList.add("hide");
                
            });
        }, 3000);

    }

}

export default validate;