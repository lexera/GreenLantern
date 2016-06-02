function showResults() {
    var xmlhttp = new XMLHttpRequest();
    var url = "show_student_results.php";
    var params = "city=" + document.getElementById("city").value +
    "&group=" + document.getElementById("group").value +
    "&datefrom=" + document.getElementById("datefrom").value +
    "&dateto=" + document.getElementById("dateto").value;

    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xmlhttp.ononreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            alert(xmlhttp.responseText);
        }
    }
    //alert(xmlhttp.readyState);
    xmlhttp.send(params);


}
