document.addEventListener('DOMContentLoaded', function () {
    const searchContainer = document.querySelector('.search-container');
    const searchButton = document.getElementById('site-search-handle');

    searchButton.addEventListener('click', function (event) {
        event.stopPropagation();
        searchContainer.style.display = 'flex';
        setTimeout(() => {
            searchContainer.classList.add('active');
        }, 10);
    });

    document.addEventListener('click', function (event) {
        if (!searchContainer.contains(event.target) && event.target !== searchButton) {
            searchContainer.classList.remove('active');
            setTimeout(() => {
                searchContainer.style.display = 'none';
            }, 300);
        }
    });
});
