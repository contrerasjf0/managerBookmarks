
import storeUser from './errors/storeUser'
import loginUser from './errors/loginUser'
import sStoreUser from './success/storeUser'

$(document).ready(() => {
   loginUser();
   storeUser();
   sStoreUser();
});