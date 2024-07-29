const form = document.querySelector('#createForm');

createForm.addEventListener('submit', function (e) {
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





// function validateForm(formData) {
//     let isValid = true;

//     // Clear previous errors
//     clearErrors();

//     // Example validation: Check if the title is empty
//     if (!formData.get('title')) {
//         const titleError = document.getElementById('titleError');
//         titleError.textContent = 'Title is required';
//         titleError.classList.remove('d-none');
//         isValid = false;
//     }

//     // Example validation: Check if the content is empty
//     if (!formData.get('content')) {
//         const contentError = document.getElementById('contentError');
//         contentError.textContent = 'Content is required';
//         contentError.classList.remove('d-none');
//         isValid = false;
//     }

//     // Example validation: Check if a tag is selected
//     if (!formData.get('tag_id')) {
//         const tagError = document.getElementById('tag_id_Error');
//         tagError.textContent = 'Tag is required';
//         tagError.classList.remove('d-none');
//         isValid = false;
//     }

//     // Example validation: Check if a thumbnail is uploaded
//     if (!formData.get('thumbnail')) {
//         const thumbnailError = document.getElementById('thumbnailError');
//         thumbnailError.textContent = 'Thumbnail is required';
//         thumbnailError.classList.remove('d-none');
//         isValid = false;
//     }

//     // Add more validation logic as needed
//     // ...

//     return isValid;
// }

// function clearErrors() {
//     document.querySelectorAll('.alert-warning').forEach(div => {
//         div.textContent = '';
//         div.classList.add('d-none');
//     });
// }




