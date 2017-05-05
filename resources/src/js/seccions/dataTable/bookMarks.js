
export default function (){
    var data = [
    {
        "id":"1",
        "favicon":"favicon",
        "name":"Name 1",
        "url":"http://google1.com",
        "note":"Esta es una nota 1",
        "share": "Share"
    },
    {
        "id":"2",
        "favicon":"favicon",
        "name":"Name 2",
        "url":"http://google2.com",
        "note":"Esta es una nota 2",
        "share": "Share"
    },
    {
        "id":"3",
        "favicon":"favicon",
        "name":"Name 3",
        "url":"http://google3.com",
        "note":"Esta es una nota 3",
        "share": "Share"
    },
    {
        "id":"4",
        "favicon":"favicon",
        "name":"Name 4",
        "url":"http://google4.com",
        "note":"Esta es una nota 4",
        "share": "Share"
    },
    {
        "id":"5",
        "favicon":"favicon",
        "name":"Name 5",
        "url":"http://google5.com",
        "note":"Esta es una nota 5",
        "share": "Share"
    },
    {
        "id":"6",
        "favicon":"favicon",
        "name":"Name 6",
        "url":"http://google6.com",
        "note":"Esta es una nota 6",
        "share": "Share"
    }
];
    $('#bookmark-table').DataTable({
        processing: true,
        scrollY: '800px',
        scrollX: false,
        scrollCollapse: true,
        lengthMenu: [10, 25, 50, "All"],
        //serverSide: true,
        //ajax: '',
        data:data,
        columnDefs:[
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },{
                "targets": [ 1 ],
                "searchable": false
            },{
                "targets": [ 5 ],
                "searchable": false
            }
        ],
        columns: [
            { data: 'id' },
            { data: 'favicon'},
            { data: 'name'},
            { data: 'url' },
            { data: 'note' },
            { data: 'share'}
        ],
        order: [[0, 'asc']]
    });
}