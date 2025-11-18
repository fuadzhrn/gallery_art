// About Section - Read More Toggle
document.addEventListener('DOMContentLoaded', function () {
    const btnReadMore = document.getElementById('btn-read-more');
    const extraText = document.getElementById('about-desc-extra');

    if (btnReadMore && extraText) {
        btnReadMore.addEventListener('click', function () {
            if (extraText.style.display === 'block') {
                extraText.style.display = 'none';
                btnReadMore.textContent = 'read more';
            } else {
                extraText.style.display = 'block';
                btnReadMore.textContent = 'read less';
            }
        });
    }
});
