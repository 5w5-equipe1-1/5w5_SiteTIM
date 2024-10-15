document.querySelectorAll('.bouton_cube').addEventListener('click', function() {
    const selectedCategory = document.getElementById('categorySelect').value;

    fetch('categorie.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'category': selectedCategory
        })
    })
    .then(response => response.text())
    .then(data => {
        console.log('Success:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});