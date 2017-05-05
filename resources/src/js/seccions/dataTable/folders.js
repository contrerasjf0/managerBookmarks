export default function (){
    var data = [
    {
        "id":"1",
        "name":"Folder 1",
        "description":"Esta es una nota 1"
    },
    {
        "id":"2",
        "name":"Folder 2",
        "description":"Esta es una nota 2"
    },
    {
        "id":"3",
        "name":"Folder 3",
        "description":"Esta es una nota 3"
    },
    {
        "id":"4",
        "name":"Folder 4",
        "description":"Esta es una nota 4"
    }
];
    $('#folder-table').DataTable({
        processing: true,
        scrollY: '800px',
        scrollX: false,
        scrollCollapse: true,
        lengthMenu: [10, 25, 50, "All"],
        processing: true,
        //serverSide: true,
        //ajax: '',
        data: data,
        columnDefs:[
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ],
        columns: [
            { data: 'id' },
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { data: 'name' },
            { data: 'description' }
        ],
        order: [[0, 'asc']]
    });
}