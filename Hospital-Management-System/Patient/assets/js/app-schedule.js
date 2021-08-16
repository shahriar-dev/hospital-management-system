const view_all_button = document.querySelector('#view-all-button');
const schedule_button = document.querySelector('#schedule-button');
const container = document.querySelector('.container');

const schedule = document.getElementById('schedule');
const viewall = document.getElementById('viewall');

// const addSchedule = () => container.classList.add('schedule-mode');
const removeSchedule = () => container.classList.remove('schedule-mode');

view_all_button.addEventListener('click', addSchedule);
schedule_button.addEventListener('click', removeSchedule);

viewall.addEventListener('click', addSchedule);
schedule.addEventListener('click', removeSchedule);

console.log(document.querySelectorAll('.inputs-schedule'));

function scheduleAppointment() {   
    const inputs_schedule = document.querySelectorAll('.inputs-schedule');
    const inputs_schedule_date = inputs_schedule[0].value;
    const inputs_schedule_department= inputs_schedule[1].value;
    const inputs_schedule_consultant = inputs_schedule[2].value;
    const inputs_schedule_time = inputs_schedule[3].value;
    const inputs_schedule_symptoms = inputs_schedule[4].value;


    var XML = new XMLHttpRequest();
    XML.onload = function() {
        if(XML.status === 200) {
            document.querySelector('.message').innerHTML = XML.responseText;
        }
    }

    XML.open("POST", "./../../../../Hospital-Management-System/Patient/Controllers/Validation/schedule-appointment.php", true);
    XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XML.send("scheduleDate=" + inputs_schedule_date + "&scheduleDepartment=" + inputs_schedule_department
                + "&scheduleConsultant=" + inputs_schedule_consultant + "&scheduleTime=" + inputs_schedule_time
                + "&scheduleSymptoms=" + inputs_schedule_symptoms);
}

function addSchedule() {
    container.classList.add('schedule-mode')
    var XML = new XMLHttpRequest();
    XML.onload = function() {       
        if(XML.status === 200) {
            // document.getElementById('appointment-table').innerHTML = `<h3>${this.responseText}</h3>`;
            var json = JSON.parse(this.responseText);
            buildAppointmentTable(json);
        }
    }
    XML.open("GET", "./../../../../Hospital-Management-System/Patient/Controllers/Validation/viewall-appointment.php", true);
    XML.send();
}

function buildAppointmentTable(jsonData) {
    var appointmentTable = document.getElementById('appointment-table');

    var table = document.createElement('table');
    table.classList.add('appointment-table-data');
    table.style.border = "1px solid black";
    table.innerHTML = `
                            <tr>
                                <th>Appointment ID</th>
                                <th>Consultant Name</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Department</th>
                            </tr>
`;

    for(var i = 0; i < jsonData.length; i++) {
        var row = ` <tr>
                        <td>${jsonData[i].id}</td>
                        <td>${jsonData[i].consultant}</td>
                        <td>${jsonData[i].time}</td>
                        <td>${jsonData[i].date}</td>
                        <td>${jsonData[i].department}</td>
                    </tr>`;
        table.innerHTML += row;
    }

    appointmentTable.innerHTML = '';
    appointmentTable.append(table);
}




