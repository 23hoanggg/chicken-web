// Hiển thị và ẩn khi click nút contact-button
document.querySelector('#contact-button').addEventListener('click', function (event) {
    const contactContainer = document.querySelector('.contact-container');

    if (contactContainer.style.display === "none" || contactContainer.style.display === "") {
        contactContainer.style.display = "block";
        console.log("clickkkkk");
    } else {
        contactContainer.style.display = "none";
        console.log("clickkkkk22222");
    }

    // Ngăn sự kiện click lan ra ngoài
    event.stopPropagation();
});

// Ẩn container khi click ra ngoài
document.addEventListener('click', function (event) {
    const contactContainer = document.querySelector('.contact-container');
    const contactButton = document.querySelector('#contact-button');

    // Kiểm tra nếu click không vào contactContainer hoặc nút contactButton
    if (
        contactContainer.style.display === "block" &&
        !contactContainer.contains(event.target) &&
        !contactButton.contains(event.target)
    ) {
        contactContainer.style.display = "none";
        console.log("Click ra ngoài, ẩn container.");
    }
});
