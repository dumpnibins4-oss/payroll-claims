<?php
    session_start();
?>

<div class="flex flex-col items-start justify-start w-full h-full gap-6">
    <div class="flex flex-col items-start justify-start w-full h-auto gap-1">
        <h1 class="text-2xl font-bold text-zinc-800 tracking-wide">Payroll Request</h1>
        <p class="text-sm text-zinc-400 font-medium">Submit and manage your payroll claims</p>
    </div>
    <div class="flex flex-col items-center justify-start flex-1 w-full rounded-2xl bg-zinc-200 p-6 overflow-y-auto">
        <form action="" class="flex flex-col gap-4 w-200 h-auto min-h-full bg-white py-5 gap-5 rounded-xl border-2 border-zinc-300">
            <div class="flex flex-row items-center justify-between w-full h-auto gap-2 px-7">
                <div class="flex flex-row items-center justify-start w-auto h-auto gap-3">
                    <div class="flex items-center justify-center w-10 h-10 bg-green-500/10 border border-green-300 rounded-lg">
                        <i class="fa-solid fa-file-lines text-green-400 text-lg"></i>
                    </div>
                    <div class="flex flex-col items-start justify-between w-auto h-full">
                        <h2 class="text-md font-medium text-zinc-800 whitespace-nowrap">Payroll Request Form</h2>
                        <p class="text-xs text-zinc-400 font-medium">Complete all required fields before submitting</p>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-end h-full w-auto">
                    <p class="text-xs text-zinc-400 font-medium">Fields marked <span class="text-red-500">*</span> are required</p>
                </div>
            </div>
            <hr class="w-full border-zinc-300" />
            <div class="flex flex-col items-start justify-start w-full h-auto px-7 gap-3">
                <div class="flex flex-row items-center justify-start w-full h-auto gap-2">
                    <p class="text-xs font-bold text-zinc-500 tracking-wide">EMPLOYEE INFORMATION</p>
                    <hr class="h-0 flex-1 border-zinc-300" />
                </div>
                <div class="grid grid-cols-2 grid-rows-2 w-full h-auto gap-4">
                    <!-- Full Name -->
                    <div class="flex flex-col items-center justify-start w-full h-auto gap-1">
                        <div class="flex flex-row items-center justify-start w-full h-auto gap-1">
                            <h2 class="text-xs font-bold text-zinc-400 tracking-wide">Full Name</h2>
                            <i class="fa-solid fa-lock text-xs text-zinc-400"></i>
                        </div>
                        <div class="flex flex-row items-center justify-start w-full h-8 bg-zinc-100 border border-zinc-200 rounded-md p-1 overflow-hidden">
                            <p class="text-xs font-medium text-zinc-500 truncate pl-2"><?php echo $_SESSION['user_information']['FirstName'] . ' ' . $_SESSION['user_information']['LastName']; ?></p>
                        </div>
                    </div>
                    <!-- Employee ID -->
                    <div class="flex flex-col items-center justify-start w-full h-auto gap-1">
                        <div class="flex flex-row items-center justify-start w-full h-auto gap-1">
                            <h2 class="text-xs font-bold text-zinc-400 tracking-wide">Employee ID</h2>
                            <i class="fa-solid fa-lock text-xs text-zinc-400"></i>
                        </div>
                        <div class="flex flex-row items-center justify-start w-full h-8 bg-zinc-100 border border-zinc-200 rounded-md p-1 overflow-hidden">
                            <p class="text-xs font-medium text-zinc-500 truncate pl-2"><?php echo $_SESSION['user_information']['EmployeeID']; ?></p>
                        </div>
                    </div>
                    <!-- Department -->
                    <div class="flex flex-col items-center justify-start w-full h-auto gap-1">
                        <div class="flex flex-row items-center justify-start w-full h-auto gap-1">
                            <h2 class="text-xs font-bold text-zinc-400 tracking-wide">Department</h2>
                            <i class="fa-solid fa-lock text-xs text-zinc-400"></i>
                        </div>
                        <div class="flex flex-row items-center justify-start w-full h-8 bg-zinc-100 border border-zinc-200 rounded-md p-1 overflow-hidden">
                            <p class="text-xs font-medium text-zinc-500 truncate pl-2"><?php echo $_SESSION['user_information']['Department']; ?></p>
                        </div>
                    </div>
                    <!-- Date Today -->
                    <div class="flex flex-col items-center justify-start w-full h-auto gap-1">
                        <div class="flex flex-row items-center justify-start w-full h-auto gap-1">
                            <h2 class="text-xs font-bold text-zinc-400 tracking-wide">Date Today</h2>
                            <i class="fa-solid fa-lock text-xs text-zinc-400"></i>
                        </div>
                        <div class="flex flex-row items-center justify-start w-full h-8 bg-zinc-100 border border-zinc-200 rounded-md p-1 overflow-hidden">
                            <p class="text-xs font-medium text-zinc-500 truncate pl-2"><?php echo date('m/d/Y'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="w-full border-zinc-300" />
            <div class="flex flex-col items-start justify-start w-full h-auto px-7 gap-3">
                <div class="flex flex-row items-center justify-start w-full h-auto gap-2">
                    <p class="text-xs font-bold text-zinc-500 tracking-wide">REQUEST DETAILS</p>
                    <hr class="h-0 flex-1 border-zinc-300" />
                </div>
                <div class="grid grid-cols-2 grid-rows-1 w-full h-auto gap-4">
                    <!-- Incident / coverage date -->
                    <div class="flex flex-col items-center justify-start w-full h-auto gap-1">
                        <div class="flex flex-row items-center justify-start w-full h-auto gap-1">
                            <h2 class="text-xs font-bold text-zinc-400 tracking-wide">Incident / coverage date <span class="text-red-500">*</span></h2>
                        </div>
                        <div class="flex flex-row items-center justify-start w-full h-8 bg-transparent border border-zinc-200 rounded-md p-1 overflow-hidden">
                            <input type="date" name="incident_date" class="w-full h-full bg-transparent border-none outline-none text-zinc-500 text-xs font-medium" />
                        </div>
                    </div>
                    <!-- Coverage Date -->
                    <div class="flex flex-col items-center justify-end w-full h-auto gap-1">
                        <div class="flex flex-row items-center justify-start w-full h-8 bg-transparent border border-zinc-200 rounded-md p-1 overflow-hidden">
                            <input type="date" name="coverage_date" class="w-full h-full bg-transparent border-none outline-none text-zinc-500 text-xs font-medium" />
                        </div>
                    </div>
                </div>
                <!-- Reason -->
                <div class="flex flex-col items-center justify-start w-full h-auto gap-1">
                    <div class="flex flex-row items-center justify-start w-full h-auto gap-1">
                        <h2 class="text-xs font-bold text-zinc-400 tracking-wide">Reason <span class="text-red-500">*</span></h2>
                    </div>
                    <div class="flex flex-row items-center justify-start w-full h-15 bg-transparent border border-zinc-200 rounded-md pt-1 px-2 pb-0 overflow-hidden">
                        <textarea name="reason" class="w-full h-full bg-transparent border-none outline-none text-zinc-500 text-xs font-medium" placeholder="Provide a clear and detailed explanation for this payroll request. Include relevant context such as the nature of work performed, circumstances of the incident, or any other supporting information..."></textarea>
                    </div>
                </div>
            </div>
            <hr class="w-full border-zinc-300" />
            <!-- Attachments -->
            <div class="flex flex-col items-start justify-start w-full h-auto px-7 gap-3">
                <div class="flex flex-row items-center justify-start w-full h-auto gap-2">
                    <p class="text-xs font-bold text-zinc-500 tracking-wide">SUPPORTING DOCUMENTS</p>
                    <hr class="h-0 flex-1 border-zinc-300" />
                </div>
                <!-- Upload Zone -->
                <div id="upload-zone" class="relative flex flex-col items-center justify-center w-full h-auto min-h-28 border-2 border-dashed border-zinc-300 rounded-xl bg-zinc-50 hover:border-green-400 hover:bg-green-50/50 transition-all duration-200 cursor-pointer gap-2 py-6 px-4">
                    <input type="file" id="file-input" name="attachments[]" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full" />
                    <div class="flex items-center justify-center w-9 h-9 bg-zinc-200 rounded-lg">
                        <i class="fa-solid fa-cloud-arrow-up text-zinc-400 text-base"></i>
                    </div>
                    <div class="flex flex-col items-center gap-0.5">
                        <p class="text-xs font-semibold text-zinc-600">Drop files here or <span class="text-green-500">browse</span></p>
                        <p class="text-xs text-zinc-400 font-medium">Attach timesheets, approval forms, or supporting documents</p>
                        <p class="text-[10px] text-zinc-300 font-medium mt-1">PDF, DOC, DOCX, JPG, PNG · Max 10MB per file</p>
                    </div>
                </div>
                <!-- File List -->
                <div id="file-list" class="flex flex-col w-full gap-2"></div>
            </div>
            <hr class="w-full border-zinc-300" />
            <!-- Footer -->
            <div class="flex flex-row items-center justify-between w-full h-auto px-7 pb-2">
                <p class="text-xs text-zinc-400 font-medium">This request will be sent to your immediate supervisor for review.</p>
                <div class="flex flex-row gap-2">
                    <button type="button" onclick="clearAttachments()" class="text-xs font-medium text-zinc-500 border border-zinc-300 rounded-md px-4 py-2 hover:bg-zinc-100 transition-all cursor-pointer">Clear</button>
                    <button type="submit" class="text-xs font-medium text-white bg-green-500 rounded-md px-4 py-2 hover:bg-green-600 transition-all cursor-pointer">Submit request</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const fileInput = document.getElementById('file-input');
    const fileList  = document.getElementById('file-list');
    const uploadZone = document.getElementById('upload-zone');
    let attachedFiles = [];

    fileInput.addEventListener('change', () => {
        Array.from(fileInput.files).forEach(f => addFile(f));
        fileInput.value = '';
    });

    uploadZone.addEventListener('dragover', e => {
        e.preventDefault();
        uploadZone.classList.add('border-green-400', 'bg-green-50');
    });
    uploadZone.addEventListener('dragleave', () => {
        uploadZone.classList.remove('border-green-400', 'bg-green-50');
    });
    uploadZone.addEventListener('drop', e => {
        e.preventDefault();
        uploadZone.classList.remove('border-green-400', 'bg-green-50');
        Array.from(e.dataTransfer.files).forEach(f => addFile(f));
    });

    function addFile(file) {
        const MAX = 10 * 1024 * 1024;
        if (file.size > MAX) {
            alert(`"${file.name}" exceeds the 10MB limit and was not added.`);
            return;
        }
        const id   = Date.now() + Math.random();
        const size = file.size < 1024 * 1024
            ? (file.size / 1024).toFixed(1) + ' KB'
            : (file.size / 1024 / 1024).toFixed(1) + ' MB';

        attachedFiles.push({ id, file });

        const ext  = file.name.split('.').pop().toLowerCase();
        const icon = ['jpg','jpeg','png'].includes(ext)
            ? 'fa-file-image'
            : ext === 'pdf'
                ? 'fa-file-pdf'
                : 'fa-file-word';

        const div = document.createElement('div');
        div.id = 'file-' + id;
        div.className = 'flex flex-row items-center justify-between w-full h-auto bg-green-50 border border-green-200 rounded-lg px-3 py-2 gap-3';
        div.innerHTML = `
            <div class="flex flex-row items-center gap-2 min-w-0">
                <i class="fa-solid ${icon} text-green-400 text-sm flex-shrink-0"></i>
                <p class="text-xs font-medium text-green-800 truncate">${file.name}</p>
            </div>
            <div class="flex flex-row items-center gap-3 flex-shrink-0">
                <p class="text-[10px] text-green-400 font-medium">${size}</p>
                <button type="button" onclick="removeFile(${id})" class="text-zinc-300 hover:text-red-400 transition-colors text-base leading-none font-light">&times;</button>
            </div>
        `;
        fileList.appendChild(div);
    }

    function removeFile(id) {
        attachedFiles = attachedFiles.filter(f => f.id !== id);
        const el = document.getElementById('file-' + id);
        if (el) el.remove();
    }

    function clearAttachments() {
        attachedFiles = [];
        fileList.innerHTML = '';
        fileInput.value = '';
    }
</script>