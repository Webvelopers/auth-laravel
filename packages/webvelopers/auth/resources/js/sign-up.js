const inputs = document.querySelectorAll('input[name^="captcha-"]');

inputs.forEach((input, i) => {
    input.addEventListener("input", (event) => {
        const value = event.target.value;
        event.target.value = value.replace(/[^0-9]/g, "").slice(0, 1);

        if (value) {
            if (i < inputs.length - 1) {
                inputs[i + 1].focus();
            }
        }
    });

    input.addEventListener("keypress", (event) => {
        if (isNaN(event.key)) {
            event.preventDefault();
        } else {
            event.target.value = event.key.slice(0, 1);
        }
    });

    input.addEventListener("keydown", (event) => {
        if (event.key === "Backspace" && event.target.value === "") {
            if (i > 0) {
                inputs[i - 1].focus();
            }
        }
    });
});
