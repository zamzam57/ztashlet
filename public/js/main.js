function loadContent(page) {
    fetch(`/load-content/${page}`)
        .then(response => {
            if (!response.ok) throw new Error('Page not found');
            return response.text();
        })
        .then(html => {
            document.getElementById('content').innerHTML = html;
        })
        .catch(error => {
            document.getElementById('content').innerHTML = `<p>Error loading content: ${error.message}</p>`;
        });
}

document.querySelectorAll('.menu a').forEach(link => {
    link.addEventListener('click', function () {
        document.querySelectorAll('.menu a').forEach(el => el.classList.remove('active'));
        this.classList.add('active');
    });
});
