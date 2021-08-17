const medicalRecordSection = document.getElementsByClassName('medical-record-section');
const medicalRecordNav = document.querySelectorAll('.record-nav');

console.log(medicalRecordNav);
console.log(medicalRecordSection);

medicalRecordNav[0].addEventListener('click', () => loadRecord(0));
medicalRecordNav[1].addEventListener('click', () => loadRecord(1));

function loadRecord(i) {
    for(let j = 0; j<medicalRecordSection.length; j++) {
        medicalRecordSection[j].style.display = (i === j) ? 'block' : 'none';
    } 
    if(i == 1) {
        medicalRecords();
    }
}


function medicalRecords() {
    var XML = new XMLHttpRequest();
    console.log('here');
    XML.onload = function() {
        if(XML.status === 200) {
            var json = JSON.parse(this.responseText);
            buildMedicalRecordsTable(json);

            // if(json.length < 1) {
            //     document.querySelector('.table-medicalRecords').innerHTML = "Nothing uploaded yet!";
            // } else {
            //     buildMedicalRecordsTable(json);
            // }
        }
    }
    XML.open("GET", "./../../../../Hospital-Management-System/Patient/Controllers/Validation/viewall-medicalRecords.php", true);
    XML.send();
}

function buildMedicalRecordsTable(jsonData) {
    if(jsonData.length < 1) {
        document.querySelector('.table_responsive').innerHTML = "Nothing uploaded yet!";
        return;
    }
    const tableResponsive = document.querySelector('.table_responsive');
    console.log(tableResponsive);
    tableResponsive.innerHTML = "";
    document.querySelector('.table_responsive').innerHTML = "<h1>All Medical Records</h1>"
    var table = document.createElement('table');
    table.classList.add("all-medical-records-table");
    tableResponsive.append(table);
    table.innerHTML = `<thead class="thead-all-records">
                            <tr>
                                <th>ID</th>
                                <th>File Name</th>
                                <th>Upload Date</th>
                                <th>File Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-all-records">
                        </tbody>`;
    
    // tableResponsive.innerHTML += table;

    var tbody = document.querySelector('.tbody-all-records');
    for(var i = 0; i < jsonData.length; i++) {
        var row = `
        <tr>
            <td>${jsonData[i].id}</td>
            <td>${jsonData[i].fileName}</td>
            <td>${jsonData[i].date}</td>
            <td>${jsonData[i].fileType}</td>
            <td>
                <span class="action_btn">
                    <button type="submit">DOWNLOAD</button>
                    <button type="submit">REMOVE</button>
                </span>
            </td>
        </tr>`;

        tbody.innerHTML += row;
    }
}



