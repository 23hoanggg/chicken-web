document.querySelector('.button-search').addEventListener('click', function () {
    const searchContainer = document.querySelector('.search-container');

    if (searchContainer.style.display === "none" || searchContainer.style.display === "") {
        searchContainer.style.display = "block";
        console.log("clickkkkk");
    } else {
        searchContainer.style.display = "none";
        console.log("clickkkkk22222");
    }
});
