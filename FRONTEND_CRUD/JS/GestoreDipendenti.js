var data = [{
        "id": 10001,
        "birthDate": "1953-09-01",
        "firstName": "Georgi",
        "lastName": "Facello",
        "gender": "M",
        "hireDate": "1986-06-25",
    },
    {
        "id": 10002,
        "birthDate": "1964-06-01",
        "firstName": "Bezalel",
        "lastName": "Simmel",
        "gender": "F",
        "hireDate": "1985-11-20",
    },
    {
        "id": 10003,
        "birthDate": "1959-12-02",
        "firstName": "Parto",
        "lastName": "Bamford",
        "gender": "M",
        "hireDate": "1986-08-27",
    },
    {
        "id": 10004,
        "birthDate": "1954-04-30",
        "firstName": "Chirstian",
        "lastName": "Koblick",
        "gender": "M",
        "hireDate": "1986-11-30",
    },
    {
        "id": 10005,
        "birthDate": "1955-01-20",
        "firstName": "Kyoichi",
        "lastName": "Maliniak",
        "gender": "M",
        "hireDate": "1989-09-11",
    }
];


function listaImpiegati() {
    var rows = "";
    $.each(data, function(key, value) {
        rows += "<tr>";
        rows += "<td>" + value.id + "</td>";
        rows += "<td>" + value.firstName + "</td>";
        rows += "<td>" + value.lastName + "</td>";
        rows += "<td>" + value.birthDate + "</td>";
        rows += "<td>" + value.hireDate + "</td>";
        rows += "<td>" + "<img src='./Images/matita.png' alt='Modifica' width='28.125px' height='56.25px'>" + " " + "<img src='./Images/cestino.png' alt='Modifica' width='28.125px' height='56.25px'>" + "</td>";
        rows += "</tr>";
    });
    $("tbody").append(rows);
}

$(window).ready(function() {

    listaImpiegati();
    $("tbody").append("<tr><td></td></tr>");
    console.log("pronto");
});