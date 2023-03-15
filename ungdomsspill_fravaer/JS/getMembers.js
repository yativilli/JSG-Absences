$(document).ready(function () {
    // Get Members
    $.getJSON("../PHP/faamedlemer.php", function (result) {
        // Go through objeect and add to table
        result.forEach(displayCurrent);

        function displayCurrent(data){
            // Get Tablebody-Element with Jquer
            var table = $('#tableWithMembers');
            // Append row to Tablebody with Data gotten earlier
            table.append("<tr><td>" + data.name + "</td><td>" + data.instrument + "</td></tr>");
        }
    })
})
