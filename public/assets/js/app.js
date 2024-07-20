const form = document.querySelector('#form');

form.addEventListener('submit', function (e) {

    let hasError = false

    function showError(selector, message) {
        const element = document.querySelector(selector);
        element.innerText = message;
        element.classList.remove('d-none');
    }

    function hideError(selector) {
        document.querySelector(selector).classList.add('d-none');
    }

    // Validate title
    const title = document.querySelector('#title').value;
    if (!title) {
        showError('#titleError', 'Title is required');
        hasError = true;
    } else {
        hideError('#titleError');
    }

    // Validate content
    const content = document.querySelector('#content').value;
    if (!content) {
        showError('#contentError', 'Content is required');
        hasError = true;
    } else {
        hideError('#contentError');
    }

    // Validate tag
    const tag_id = document.querySelector('#tag_id').value;
    if (!tag_id) {
        showError('#tag_id_Error', 'Tag is required');
        hasError = true;
    } else {
        hideError('#tag_id_Error');
    }

    // Validate thumbnail
    const thumbnail = document.querySelector('#thumbnail').files[0];
    if (!thumbnail) {
        showError('#thumbnailError', 'Thumbnail is required');
        hasError = true;
    } else {
        hideError('#thumbnailError');
    }

    // Prevent form submission if any errors exist
    if (hasError) {
        e.preventDefault();
    }
});










