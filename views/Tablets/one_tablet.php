<a href="/tablets/all">Home</a>
<a href="/tablets/edit/<?= htmlspecialchars($tablet['id']) ?>">Edit Tablet</a>

<p>Inmate Number: <?= htmlspecialchars($tablet["inmate_number"]) ?></p>
<p>First Name: <?= htmlspecialchars($tablet["first_name"]) ?></p>
<p>Middle Name: <?= empty($tablet["middle_name"]) ? 'None' : htmlspecialchars($tablet["middle_name"]) ?></p>
<p>Last Name: <?= htmlspecialchars($tablet["last_name"]) ?></p>
<p>Date Found: <?= empty($tablet["date_found"]) ? 'No date' : htmlspecialchars($tablet["date_found"]) ?></p>
<p>101 Incident Report: <?= $tablet["is_reported"] ? 'Reported' : 'Not Filed' ?></p>
<p>Filed With Inmate Accounts: <?= $tablet["is_filed"] ? 'Filed' : 'Not Filed' ?></p>
<p>Charged By Inmate Accountes: <?= $tablet["is_charged"] ? 'Charged' : 'Not Charged' ?></p>
<p>Payment Status: <?= $tablet["is_paid"] ? 'Account Paid' : 'Owes $300 for Tablet' ?></p>