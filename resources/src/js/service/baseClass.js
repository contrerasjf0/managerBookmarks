export default class baseClas{

    constructor(){
        this.csrf = '';

        this.csrf = $('input[name="_token"]').attr('value');

    }
}