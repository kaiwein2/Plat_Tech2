document.getElementById('searchInput').addEventListener('input', function() {
    const query = this.value;
    if (query.length > 0) {
        fetch('search.php?q=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                const searchResults = document.getElementById('searchResults');
                searchResults.innerHTML = '';
                data.forEach(product => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item list-group-item-action';
                    li.textContent = product.title;
                    li.onclick = () => location.href = 'product.php?id=' + product.id;
                    searchResults.appendChild(li);
                });
            });
    } else {
        document.getElementById('searchResults').innerHTML = '';
    }
});