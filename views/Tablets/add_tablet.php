<form action="/tablets/all">
    <button>Cancel</button>
</form>

<script>
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
</script>

<form>
    <label for="paste-input">Paste Info:</label>
    <input type="text" id="paste-input" oninput="parseInput()" placeholder="[number] [last name], [first name] [middle name]">
</form>

<form method="post" action="/tablets/create">
    <?php require "tablet_form.php"; ?>
</form>