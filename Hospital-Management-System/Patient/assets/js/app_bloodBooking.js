const view_all_button_booking = document.querySelector('#view-all-button-booking');
const schedule_button_booking = document.querySelector('#booking-button');
const container_booking = document.querySelector('.container-booking');

const donate = document.getElementById('donate');
const history = document.getElementById('history');

// const addBooking = () => container_booking.classList.add('booking-mode');
const removeBooking = () => container_booking.classList.remove('booking-mode');

view_all_button_booking.addEventListener('click', addBooking);
schedule_button_booking.addEventListener('click', removeBooking);

history.addEventListener('click', addBooking);
donate.addEventListener('click', removeBooking);

function generateDonationRequest() {
    const inputs_donation = document.querySelectorAll('.inputs-donation');
    // document.querySelector('.message').innerHTML = '<h1>Working!</h1>';
    const inputs_donation_date = inputs_donation[0].value;
    const inputs_donation_bloodGroup= inputs_donation[1].value;
    const inputs_donation_timeSlot = inputs_donation[2].value;
    const inputs_donation_remarks = inputs_donation[3].value;

    var XML = new XMLHttpRequest();
    
    XML.onload = function() {
        if(XML.status === 200) {
            document.querySelector('.message-blood').innerHTML = this.responseText;
        }
    }

    XML.open("POST", "./../../../../Hospital-Management-System/Patient/Controllers/Validation/blood-donation-booking.php", true);
    XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XML.send("donationDate=" + inputs_donation_date + "&donationBloodgroup=" + inputs_donation_bloodGroup
                + "&donationTimeslot=" + inputs_donation_timeSlot
                + "&donationRemarks=" + inputs_donation_remarks);
}

function addBooking() {
    container_booking.classList.add('booking-mode');
    var XML = new XMLHttpRequest();
    XML.onload = function() {       
        if(XML.status === 200) {
            // console.log(document.getElementById('donationHistory-table'));
            // document.getElementById('donationHistory-table').innerHTML = `<h3>${this.responseText}</h3>`;
            var json = JSON.parse(this.responseText);
            buildDonationHistoryTable(json);
        }
    }
    XML.open("GET", "./../../../../Hospital-Management-System/Patient/Controllers/Validation/viewall-bloodDonation.php", true);
    XML.send();
}

function buildDonationHistoryTable(jsonData) {
    var donationHistoryTable = document.getElementById('donationHistory-table');
    console.log(donationHistoryTable)
    var table = document.createElement('table');
    table.classList.add('donationHistory-table-data');
    table.style.border = "1px solid black";
    table.innerHTML = `
                            <tr>
                                <th>Donation ID</th>
                                <th>Blood Group</th>
                                <th>Date</th>
                                <th>Time Slot</th>
                                <th>Remarks</th>
                            </tr>
`;

    for(var i = 0; i < jsonData.length; i++) {
        var row = ` <tr>
                        <td>${jsonData[i].id}</td>
                        <td>${jsonData[i].bloodgroup}</td>
                        <td>${jsonData[i].date}</td>
                        <td>${jsonData[i].time}</td>
                        <td>${jsonData[i].remarks}</td>
                    </tr>`;
        table.innerHTML += row;
    }

    donationHistoryTable.innerHTML = '';
    donationHistoryTable.append(table);
}