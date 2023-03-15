$(document).ready(function () {
    // Get the Absence-Entries from today
    $.get('../PHP/faadatafraidag.php', function (data) {
        // Turn them into object
        data = JSON.parse(data);
        // Go through object and append to Table
        data.forEach(displayCurrent);

        function displayCurrent(data) {
            // Get Tablebody per Element
            var table = $('#tbodyUtgave');
            // Append Tablebody with new row (data from data)
            table.append("<tr><td>" + data.Datum + "</td><td>" + data.Name + " (" + data.Instrument + ")</td><td>" + data.Status + "</td></tr>");
        }

    })
})
