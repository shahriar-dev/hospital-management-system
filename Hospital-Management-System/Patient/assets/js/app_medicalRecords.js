const formMr = document.querySelector('.form-mr');
const fileInput = formMr.querySelector('.file-input');
const progressArea = document.querySelector('.progress-area');
const uploadedArea = document.querySelector('.uploaded-area');



formMr.addEventListener('click', () => {
    progressArea.style.display = 'block';
    fileInput.click();
});

fileInput.onchange = ({target}) => {
    // console.log(target.files);
    let file = target.files[0]; //if multiple file selected then get only first one
    
    if(file) {
        let fileName = file.name;
        if(fileName.length >= 12) {
            let splitName = fileName.split('.');
            fileName = splitName[0].substring(0,12) + "... ." + splitName[1];
        }
        uploadFile(fileName);
    }
}

function uploadFile(name) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./../../Patient/Controllers/Validation/medicalRecordsUpload.php");
    xhr.upload.addEventListener('progress', ({loaded, total})=> {
        let fileLoaded = Math.floor((loaded / total) * 100);
        let fileTotal = Math.floor(total/1024);
        let fileSize;
        (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB";
        let progressHTML = `<li class="row-mr">
                                <i class="fas fa-file-alt"></i>
                                <div class="content-mr">
                                    <div class="details-mr">
                                        <span class="name">${name} - Uploading</span>
                                        <span class="percent">${fileLoaded}%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress" style="width: ${fileLoaded}%"></div>
                                    </div>
                                </div>
                            </li>`;

        uploadedArea.classList.add('onprogress');
        progressArea.innerHTML = progressHTML;
        // uploadedHTML.innerHTML = '';
        if(loaded == total) {
            progressArea.style.display = 'none';
            progressArea.innerHTML = '';
            let uploadedHTML = `<li class="row-mr">
                                    <div class="content-mr">
                                        <i class="fas fa-file-alt"></i>
                                        <div class="details-mr">
                                            <span class="name">${name} - Uploaded</span>
                                            <span class="size-mr">${fileSize}</span>
                                        </div>
                                    </div>
                                    <i class="fa-check-mr fas fa-check"></i>
                                </li>`;
            
            // uploadedArea.innerHTML = uploadedHTML;
            uploadedArea.classList.remove('onprogress');
            uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
        }
        

        
    });

    let formData = new FormData(formMr);
    xhr.send(formData);
}