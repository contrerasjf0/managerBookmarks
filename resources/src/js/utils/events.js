
class eventUtil {

    constructor(){}

    static addEventAction(elementV  ,nameEventV = "click", listenerV){
        
        elementV.addEventListener(nameEventV, listenerV);

        return this;
    }

}

export default eventUtil;