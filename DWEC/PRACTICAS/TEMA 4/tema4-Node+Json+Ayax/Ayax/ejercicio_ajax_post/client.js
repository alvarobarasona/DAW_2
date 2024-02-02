function searchFruit() {
    var input = document.getElementById('fruit-input').value;
    
    document.getElementById('fruit-text').innerHTML = '';
    
    if (input.trim() === '') {
      return;
    }
    
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        showResults(JSON.parse(this.responseText), input);
      }
    };
    xhr.open("POST", "/searchFruit", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify({type: input}));
  }
  
  function showResults(data, filter) {
    var ul = document.getElementById('fruit-text');
    ul.innerHTML = '';
    
    data.filter(fruit => fruit.type.toLowerCase().includes(filter.toLowerCase()))
      .forEach(fruit => {
        var li = document.createElement('li');
        li.appendChild(document.createTextNode(fruit.type + ' ' + fruit.color + ' - weight: ' + fruit.weight + ' g'));
        ul.appendChild(li);
      });
  }