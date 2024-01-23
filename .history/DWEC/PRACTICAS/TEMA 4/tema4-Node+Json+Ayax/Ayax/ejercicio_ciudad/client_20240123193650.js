document.getElementById('cityInput').addEventListener('input', function() {
    var city = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:3000/recommend?city=' + city, true);
    xhr.onload = function() {
        if (this.status == 200) {
            var suggestions = JSON.parse(this.responseText).suggestions;
            var suggestionsDiv = document.getElementById('suggestions');
            suggestionsDiv.innerHTML = '';
            suggestions.forEach(function(city) {
                suggestionsDiv.innerHTML += '<p>' + city + '</p>';
            });
        }
    }
    xhr.send();
});