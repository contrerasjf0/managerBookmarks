
import config from "../../configs/configs";

export default function (){
    
    $('#bookmark-table').DataTable({
        processing: true,
        scrollY: '800px',
        scrollX: false,
        scrollCollapse: true,
        lengthMenu: [10, 25, 50, "All"],
        serverSide: true,
        ajax: config.baseUrl+'bookmark/list',
        columnDefs:[
            {
                targets: [ 0 ],
                visible: false,
                searchable: false
            },{
                targets: [ 1 ],
                searchable: false
            },{
                targets: [ 5 ],
                searchable: false
            }
        ],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'favicon'},
            { data: 'name', name: 'name'},
            { data: 'url', name: 'url' },
            { data: 'note', name: 'note' },
            { data: 'share'}
        ],
        order: [[0, 'asc']]
    });
}