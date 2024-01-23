function showSuggestions(str) {
    if(str.length == 0) {
        document.getElementById("cities").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("cities").innerHTML = this.
            }
        };
    }
}