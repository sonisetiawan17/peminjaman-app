const email = document.getElementById("email");
const password = document.getElementById("password");
const button = document.getElementById("button");

function checkAndChangeButtonColor(userEmail, userPassword) {
    const isEmailValid =
        userEmail.includes("@gmail.com") ||
        userEmail.includes("@yahoo.com") ||
        userEmail.includes("@sipinjam.com");

    const isPasswordValid = userPassword.length > 4;

    if (isEmailValid && isPasswordValid) {
        button.style.backgroundColor = "#5465ff";
        button.style.color = "white";
        button.style.cursor = "pointer";
        button.style.transitionDuration = "300ms";

        const bgColor = { backgroundColor: "#5465ff" };
        const bgColorHover = { backgroundColor: "rgba(84, 101, 255, 0.5)" };

        Object.assign(button.style, bgColor);

        button.addEventListener("mouseover", function () {
            Object.assign(button.style, bgColorHover);
        });

        button.addEventListener("mouseout", function () {
            Object.assign(button.style, bgColor);
        });
    } else {
        button.style.backgroundColor = "rgba(44, 62, 80, 0.1)";
        button.style.color = "rgba(0, 0, 0, 0.5)";
        button.style.cursor = "not-allowed";
    }
}

email.addEventListener("input", function (event) {
    const emailValue = event.target.value;
    checkAndChangeButtonColor(emailValue, password.value);
});

password.addEventListener("input", function (event) {
    const passwordValue = event.target.value;
    checkAndChangeButtonColor(email.value, passwordValue);
});

// Password Visible Handler
const div = document.getElementById("div");
const icon = document.getElementById("icon");

div.addEventListener("click", function () {
    icon.classList.toggle("fa-eye-slash");
    icon.classList.toggle("fa-eye");

    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
});
