function goBack() {
    console.log('goBack function called');
    window.history.back();
}

function parseInput(event) {
    const input = document.getElementById('paste-input').value;
    const pattern = /^(\d+)\s+([a-zA-Z]+),\s+([a-zA-Z]+)(?:\s+([a-zA-Z]+))?$/;
    let match = input.match(pattern);

    if (match) {
        document.getElementById('inmate_number').value = match[1];
        document.getElementById('last_name').value = match[2];
        document.getElementById('first_name').value = match[3];
        document.getElementById('middle_name').value = match[4] || '';
        return true; // Allow form submission
    } else {
        alert('Input does not match the required pattern');
        event.preventDefault(); // Prevent form submission
        return false;
    }
}

function handleSubmit(event) {
    if (!parseInput(event)) {
        event.preventDefault(); // Prevent form submission if parsing fails
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('paste-input').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            parseInput(event);
        }
    });
    document.getElementById('paste-form').addEventListener('submit', handleSubmit);
});