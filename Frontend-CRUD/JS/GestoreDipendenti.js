$(document).ready(function () {
    $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: './index.php',
            type: 'POST',
        },
        columns: [
            { data: 'first_name' },
            { data: 'last_name' },
            { data: 'birth_date' },
            { data: 'hire_date' },
            { data: 'gender' },
        ],
    });
});