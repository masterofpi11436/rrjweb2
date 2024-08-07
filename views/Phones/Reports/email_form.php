<form action="/phones/directory">
    <button>Cancel</button>
</form>
<div class="form-container">
    <form action="/phones/emailSuccess" method="post">

        <div>   
            <h2>Please enter the information that needs to changed</h2>
            <p>*Not all fields are required</p>
        </div>

        <div>
            <h3>Please enter your work email</h3>
            <label for="sender">Work Email:</label>
            <input type="text" id="sender" name="sender" placeholder="Work Email" value="<?= htmlspecialchars($sender); ?>" required>
        </div>
        
        <div class="form-container">
            <div>
                <label for="old_extension">Current Extension:</label>
                <input type="text" id="old_extension" name="old_extension" placeholder="Current Extension" value="<?= htmlspecialchars($oldNum); ?>">
            </div>
            <div>
                <label for="new_extension">New Extension:</label>
                <input type="text" id="new_extension" name="new_extension" placeholder="New Extension" value="<?= htmlspecialchars($newNum); ?>">
            </div>
        </div>

        <div class="form-container">
            <div>
                <label for="old_name">Current Name:</label>
                <input type="text" id="old_name" name="old_name" placeholder="Current name (Last Name, First Initial)" value="<?= htmlspecialchars($oldName); ?>">
            </div>
            <div>
                <label for="new_name">New Name:</label>
                <input type="text" id="new_name" name="new_name" placeholder="New name (Last Name, First Initial)" value="<?= htmlspecialchars($newName); ?>">
            </div>
        </div>

        <div class="form-container">
            <div>
                <label for="old_ranktitle">Current Rank/Title:</label>
                <input type="text" id="old_ranktitle" name="old_ranktitle" placeholder="Current rank or title" value="<?= htmlspecialchars($oldRankTitle); ?>">
            </div>
            <div>
                <label for="new_ranktitle">New Rank/Title:</label>
                <input type="text" id="new_ranktitle" name="new_ranktitle" placeholder="New rank or title" value="<?= htmlspecialchars($newRankTitle); ?>">
            </div>
        </div>

        <div class="form-container">
            <div>
                <label for="old_section">Current Section:</label>
                <input type="text" id="old_section" name="old_section" placeholder="Current Section Name" value="<?= htmlspecialchars($oldSection); ?>">
            </div>
            <div>
                <label for="new_section">New Section:</label>
                <input type="text" id="new_section" name="new_section" placeholder="New Section Name" value="<?= htmlspecialchars($newSection); ?>">
            </div>
        </div>

        <div>
            <div>
                <label for="note">Notes</label>
                <textarea name="note" id="note" value="<?= htmlspecialchars($note) ?>"></textarea>
            </div>
        </div>
        <button>Submit</button>
    </form>
</div>