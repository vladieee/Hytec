let contactModal = document.getElementById('contactModal');
contactModal.addEventListener('show.bs.modal', function (event) {
    let button = event.relatedTarget;
    let action = button.getAttribute('data-action');
    let modalTitle = document.getElementById('contactModalLabel');
    let form = document.getElementById('contactForm');
    let contactIdInput = document.getElementById('contactId');
    let firstNameInput = document.getElementById('firstName');
    let lastNameInput = document.getElementById('lastName');
    let emailInput = document.getElementById('email');
    let contactNumberInput = document.getElementById('contactNumber');

    if (action === 'edit') {
        modalTitle.textContent = 'Edit Contact';
        form.setAttribute('action', 'add_contact.php'); 
        contactIdInput.value = button.getAttribute('data-id');
        firstNameInput.value = button.getAttribute('data-fname');
        lastNameInput.value = button.getAttribute('data-lname');
        emailInput.value = button.getAttribute('data-email');
        contactNumberInput.value = button.getAttribute('data-cnum');
    } else {
        modalTitle.textContent = 'Add Contact';
        form.setAttribute('action', 'add_contact.php');
        contactIdInput.value = '';
        firstNameInput.value = '';
        lastNameInput.value = '';
        emailInput.value = '';
        contactNumberInput.value = '';
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.querySelector(".roundbtn label");
    const callLogsText = document.getElementById("callLogsText");
    const callLogsIcon = document.getElementById("callLogsIcon");
    const utext = document.getElementById("utxt");
    const ucon = document.getElementById("uicon");
    const h2Element = document.getElementById("dynamicH2");
    const tableElement = document.getElementById("dynamicT");
    const topsect = document.getElementById("topG");
    const dashboardRadioButton = document.getElementById("btnradio1");
    const contactsRadioButton = document.getElementById("btnradio2");

    // Function to toggle visibility of h2 and table
    function toggleElements() {
        if (dashboardRadioButton.checked) {
            // Show the h2 element if the dashboard radio button is checked
            h2Element.style.display = "block";
            // Hide the table element if the dashboard radio button is checked
            tableElement.style.display = "none";
        } else if (contactsRadioButton.checked) {
            // Show the table element if the contacts radio button is checked
            tableElement.style.display = "table";
            tableElement.style.marginLeft = "150px";
            // Hide the h2 element if the contacts radio button is checked
            h2Element.style.display = "none";
        }
    }

    // Initial toggle on page load
    toggleElements();

    // Event listener for toggle button
    toggleButton.addEventListener("click", function() {
        if (callLogsText.style.display !== "none") {
            // Hide call logs text when "<" is clicked
            callLogsText.style.display = "none";
            utext.style.display = "none";
            // Align the image to the right
            callLogsIcon.style.float = "right";
            ucon.style.float = "right";
        } else {
            // Show call logs text when ">" is clicked
            callLogsText.style.display = "inline";
            utext.style.display = "inline";
            // Reset the alignment of the image to the center
            callLogsIcon.style.float = "none";
            ucon.style.float = "none";
        }

        if (h2Element.style.marginLeft !== "-50px") {
            // Adjust h2 position when round button is clicked
            h2Element.style.marginLeft = "-50px";
            tableElement.style.marginLeft = "-50px";
            topsect.style.marginLeft = "-50px";
        } else {
            // Reset h2 position when round button is clicked again
            h2Element.style.marginLeft = "150px";
            tableElement.style.marginLeft = "150px";
            topsect.style.marginLeft = "150px";
        }
    });

    // Event listener for dashboard radio button
    dashboardRadioButton.addEventListener("change", toggleElements);

    // Event listener for contacts radio button
    contactsRadioButton.addEventListener("change", toggleElements);
});

document.getElementById("deleteForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Perform an AJAX request to delete_contact.php
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_contact.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(new URLSearchParams(new FormData(this)));

    // After successfully deleting, redirect to contacts-deleted.php
    xhr.onload = function() {
        if (xhr.status == 200) {
            window.location.href = "contacts-deleted.php";
        }
    };
});
