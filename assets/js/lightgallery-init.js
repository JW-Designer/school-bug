document.addEventListener("DOMContentLoaded", function() {
    let gallery = document.querySelector(".wp-block-gallery");
    if (gallery) {
        lightGallery(gallery, {
            selector: 'a',
            download: false
        });
    }
});