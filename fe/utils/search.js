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

document.addEventListener('DOMContentLoaded', function () {
    function searchProducts() {
        var query = document.getElementById('search').value; // Lấy giá trị ô input
        if (query.length > 0) {
            // Gửi yêu cầu AJAX nếu có từ khóa tìm kiếm
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "search.php?search=" + encodeURIComponent(query), true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('suggestions').innerHTML = xhr.responseText; // Hiển thị kết quả
                    document.getElementById('suggestions').style.display = 'block'; // Hiển thị div gợi ý
                }
            };
            xhr.send();
        } else {
            document.getElementById('suggestions').innerHTML = ""; // Nếu ô input trống, ẩn gợi ý
            document.getElementById('suggestions').style.display = 'none';
        }
    }

    // Gắn sự kiện vào input
    document.getElementById('search').addEventListener('keyup', searchProducts);
});
