<a href="/tablets/all">Home</a>
<a href="/tablets/edit/<?= htmlspecialchars($tablet['id']) ?>">Edit Tablet</a>

<p>Inmate Number: <?= htmlspecialchars($tablet["inmate_number"]) ?></p>
<p>First Name: <?= htmlspecialchars($tablet["first_name"]) ?></p>
<p>Middle Name: <?= empty($tablet["middle_name"]) ? 'None' : htmlspecialchars($tablet["middle_name"]) ?></p>
<p>Last Name: <?= htmlspecialchars($tablet["last_name"]) ?></p>
<p>Date Found: <?= empty($tablet["date_found"]) ? 'No date' : htmlspecialchars($tablet["date_found"]) ?></p>
<p>Incident Report: <?= $tablet["is_reported"] ? 'Reported' : 'Not Filed' ?></p>
<p>Filed with Inmate Accounts: <?= $tablet["is_charged"] ? 'Charged' : 'Not Charged' ?></p>
<p>Charged Finaclially: Charged or not</p>
<p>Paid off: Inmate has paid bill or inmate has not paid bill</p>