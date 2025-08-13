<!DOCTYPE html>
<html>
<head>
    <title>AJAX Old-School Order</title>
</head>
<body>

<input type="text" id="searchName" placeholder="Search by Name">
<button onclick="loadData(this.value)">Load Data</button>
<div id="result"></div>

<script>
function loadData() {
    // Get value from input after DOM is loaded
    var nameInput = document.getElementById('searchName');
    if (!nameInput) {
        console.error("Input with id 'searchName' not found");
        return;
    }

    var name = nameInput.value.trim();
    console.log(name);

    if (name === "") {
        alert("Please enter a name to search.");
        return;
    }

    var ajax_request = null;

    // Browser compatibility check
    if (window.XMLHttpRequest) {
        ajax_request = new XMLHttpRequest();
    } else {
        ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // Set callback
    ajax_request.onreadystatechange = function() {
        if (ajax_request.readyState === 4) {
            if (ajax_request.status === 200) {
                document.getElementById("result").innerHTML = ajax_request.responseText;
            } else {
                document.getElementById("result").innerHTML = "Error loading data.";
            }
        }
    };

    // Pass 'name' as query parameter
    ajax_request.open("GET", "ajax_process.php?action=gettime&name=" + encodeURIComponent(name), true);

    // Send request
    ajax_request.send();
}
</script>

</body>
</html>
