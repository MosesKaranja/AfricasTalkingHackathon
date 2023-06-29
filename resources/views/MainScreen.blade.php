<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medminder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container">
    <h1>Add Medication Event</h1>
    <form id="eventForm" action="process_form.php" method="POST">
        <div class="mb-3">
            <label for="drugName" class="form-label">Drug Name</label>
            <input type="text" id="drugName" name="drugName" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="prescription" class="form-label">Prescription Details</label>
            <textarea id="prescription" name="prescription" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="dosageTimes" class="form-label">Dosage Times</label>
            <input type="text" id="dosageTimes" name="dosageTimes" class="form-control" required>
            <small class="form-text text-muted">Enter multiple dosage times separated by commas.</small>
        </div>
        <button type="submit" class="btn btn-primary" id="addEventBtn">Add Event</button>
    </form>

    <div id="eventList" style="display: none;">
        <h2>Event List</h2>
        <ul id="eventItems">
            <!-- Event items will be dynamically added here -->
        </ul>
        <button type="button" class="btn btn-primary" id="addAnotherEventBtn">Add Another Event</button>
    </div>
   </div>
   <script src="index.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
