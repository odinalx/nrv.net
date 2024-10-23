document.addEventListener("DOMContentLoaded", function() {
    const plusButtons = document.querySelectorAll(".plus-button");
    const minusButtons = document.querySelectorAll(".minus-button");

    plusButtons.forEach(button => {
        button.addEventListener("click", function() {
            const targetInput = document.getElementById(this.dataset.target);
            let currentValue = parseInt(targetInput.value);
            targetInput.value = currentValue + 1;
        });
    });

    minusButtons.forEach(button => {
        button.addEventListener("click", function() {
            const targetInput = document.getElementById(this.dataset.target);
            let currentValue = parseInt(targetInput.value);
            if (currentValue > 0) {
                targetInput.value = currentValue - 1;
            }
        });
    });
});
