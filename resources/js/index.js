const eventForm = document.getElementById('eventForm');
const eventList = document.getElementById('eventList');
const addEventBtn = document.getElementById('addEventBtn');
const addAnotherEventBtn = document.getElementById('addAnotherEventBtn');
const eventItems = document.getElementById('eventItems');

addEventBtn.addEventListener('click', function(event) {
    event.preventDefault();
    // Add event details to the event list
    const drugName = document.getElementById('drugName').value;
    const prescription = document.getElementById('prescription').value;
    const dosageTimes = document.getElementById('dosageTimes').value;

    const eventItem = document.createElement('li');
    const eventText = document.createElement('span');
    eventText.textContent = `Drug Name: ${drugName}, Prescription: ${prescription}, Dosage Times: ${dosageTimes}`;
    eventItem.appendChild(eventText);

    const dropEventBtn = document.createElement('button');
    dropEventBtn.textContent = 'Drop Event';
    dropEventBtn.classList.add('btn', 'btn-danger', 'ms-3');
    dropEventBtn.addEventListener('click', function() {
        eventItem.remove();
    });
    eventItem.appendChild(dropEventBtn);

    eventItems.appendChild(eventItem);

    // Hide the event form and show the event list
    eventForm.style.display = 'none';
    eventList.style.display = 'block';
});

addAnotherEventBtn.addEventListener('click', function(event) {
    // Clear the form inputs
    eventForm.reset();

    // Show the event form and hide the event list
    eventForm.style.display = 'block';
    eventList.style.display = 'none';
});
