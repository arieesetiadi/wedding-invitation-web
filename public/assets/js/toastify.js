function toastSuccess(text) {
    Toastify({
        text: text,
        duration: 3000,
        close: false,
        gravity: "top",
        position: "center",
        className: "rounded-5",
    }).showToast();
}

function toastWarning(text) {
    Toastify({
        text: text,
        duration: 3000,
        close: false,
        gravity: "top",
        position: "center",
        className: "rounded-5",
        style: {
            background: "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 135, 95))",
        },
    }).showToast();
}