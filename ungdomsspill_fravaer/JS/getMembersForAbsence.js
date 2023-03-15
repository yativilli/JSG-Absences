$(document).ready(function () {
    // Get Members (from php)
    $.getJSON("../PHP/faamedlemer.php", function (result) {
        // Set counter for foreach to zero
        var i = 0;
        // Go through array and add the things to the table
        result.forEach(displayCurrent);

        function displayCurrent(data) {
            // Count Foreach-Counter up
            i++;
            // Get Tablebody-Element with Jquery
            var table = $('#tableWithMembers');
            // Append row to Table; Use Foreach-Counter to make unqiue name for each <select> input-thingy
            table.append("<tr><td>" + data.name + "</td><td>" + data.instrument + "</td><td><select name='status" + i + "' id='status'><option value='0'>Präsent</option><option value='1'>Abwesend</option></select></td></tr>");
        }
    })
})
