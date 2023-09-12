const alertDiv = document.getElementById("alertDiv");
const alertMessage = `<div class="alert alert-info my-4" role="alert">
        Form submitted successfully. I'll get in touch with you soon.
    </div>`;
alertDiv.innerHTML = alertMessage;
setTimeout(() => {
    alertDiv.innerHTML = "";
}, 5000)