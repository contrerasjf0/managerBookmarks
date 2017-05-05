
import  dataTable  from 'datatables.net';
import dataTableBookMarks from './bookMarks';
import dataTableFolder from './folders';

$(document).ready(() =>{
    dataTable(window, $);
    dataTableBookMarks();
    dataTableFolder();
});



