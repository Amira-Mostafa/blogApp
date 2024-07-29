
document.addEventListener('DOMContentLoaded', async function () {
    const createForm = document.querySelector('#createForm');
    const editForm = document.querySelector('#editForm');

    async function ajaxSubmit(form) {
        const formData = new FormData(form);
        try {
            const config =
            {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }
            const request = await fetch(form.action, config);
            if (!request.ok) {
                throw new Error('Network resoponse was not ok');
            }
            const result = await request.json();
            if (result.success) {
                alert(result.message);
                window.location.href = '/home'; // redirect to the home page or any other page
                form.reset();
            } else {
                alert('error', data.message);
            }
        } catch (error) {
            console.log("There was fetching data", error);
            alert('Failed to create post. Please try again.');
        }
    }
    if (createForm) {
        createForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            await ajaxSubmit(createForm);
        })
    }
    if (editForm) {
        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            await ajaxSubmit(editForm);
        })
    }
});


//     // const form = event.target;



//     // Function to display validation errors
//     const displayErrors = (errors) => {
//         document.querySelectorAll('.alert-warning').forEach(el => el.classList.add('d-none'));
//         for (let field in errors) {
//             const errorElement = document.getElementById(`${field}Error`);
//             if (errorElement) {
//                 errorElement.classList.remove('d-none');
//                 errorElement.textContent = errors[field][0];
//             }
//         }
//     };


//         if (!response.ok) {
//             const errorData = await response.json();
//             handleErrors(errorData.errors);
//             throw new Error('Network response was not ok');
//         }

//         if (result.success) {
//             alert('Post created successfully!');
//             form.reset();
//         } else {
//             handleErrors(result.errors);
//         }

// function handleErrors(errors) {
//     clearErrors();
//     for (let [key, value] of Object.entries(errors)) {
//         const errorDiv = document.getElementById(`${key}Error`);
//         if (errorDiv) {
//             errorDiv.textContent = value[0];
//             errorDiv.classList.remove('d-none');
//         }
//     }
// }

// function clearErrors() {
//     document.querySelectorAll('.alert-warning').forEach(div => {
//         div.textContent = '';
//         div.classList.add('d-none');
//     });
// }