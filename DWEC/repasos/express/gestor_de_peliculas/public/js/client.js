// document.getElementById('theme-toggle').addEventListener('click', function() {
//     document.body.classList.toggle('dark-mode');
// });

// document.getElementById('color-toggle').addEventListener('click', function() {
//     const colorClass = 'color-' + Math.floor(Math.random() * 10 + 1);
//     document.body.className = ''; 
//     document.body.classList.add(colorClass);
// });

document.addEventListener("DOMContentLoaded", () => {
    loadMovies();
});

function loadMovies() {
    fetch("/movies")
        .then(response => response.json())
        .then(data => {
            const movies = data.usuarios[0].peliculas;
            for (const category in movies) {
                const list = document.querySelector(`.movie-list-${category} ul`);
                if(list) {
                    movies[category].forEach(movie => {
                        const listItem = document.createElement("li");
                        listItem.innerHTML = `${movie} <button>Eliminar</button>`;
                        list.appendChild(listItem);
                    });
                }
            }
        })
}