let currentStep = 1;

function showStep(step) {
    document.querySelectorAll(".step").forEach((s) => {
        s.style.display = "none";
    });
    document.querySelector(`.step${step}`).style.display = "block";

    document.getElementById("prevBtn").disabled = step === 1;
    document.getElementById("nextBtn").style.display =
        step === 2 ? "none" : "inline";
    document.getElementById("submitBtn").style.display =
        step === 2 ? "inline" : "none";
}

function nextStep() {
    if (currentStep < 2) {
        currentStep++;
        showStep(currentStep);
    }
}

function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
    }
}

showStep(currentStep);
