<div class="p-4">
    <div class="grid grid-cols-1 gap-4">
        <div class="col-span-full mb-4">
            <h2 class="text-2xl font-bold mb-4">Civil Service Eligibility</h2>
            <div id="eligibility_container" class="space-y-4">
                <!-- Dynamic rows will be added here -->
            </div>
            <button id="btn-add-eligibility" class="btn btn-sm btn-secondary mt-4">+ Add Eligibility</button>
        </div>
    </div>
</div>

<div class="mt-4 flex justify-end">
    <button id="btn-save-eligibility" class="btn btn-primary">Save</button>
</div>

<script>
    (async () => {
        const _id = (id) => document.getElementById(id);
        const empid = 24; // Fixed as per requirement

        const formatDateToISO = (dateStr) => {
            if (!dateStr || dateStr === 'N/A' || dateStr === 'None') return '';
            // Assuming mm/dd/yyyy from DB
            const parts = dateStr.split('/');
            if (parts.length === 3) {
                return `${parts[2]}-${parts[0].padStart(2, '0')}-${parts[1].padStart(2, '0')}`;
            }
            return dateStr;
        };

        const formatDateToDB = (dateStr) => {
            if (!dateStr) return '';
            // HTML date input gives yyyy-mm-dd
            const parts = dateStr.split('-');
            if (parts.length === 3) {
                return `${parts[1]}/${parts[2]}/${parts[0]}`;
            }
            return dateStr;
        };

        const addEligibilityRow = (data = {}) => {
            const container = _id('eligibility_container');
            const div = document.createElement('div');
            div.className = 'relative border border-base-300 rounded-lg p-4 bg-base-100';
            div.innerHTML = `
                <button class="absolute top-2 right-2 btn btn-xs btn-circle text-red-600 border-none remove-eligibility">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Name of Examination / Test</span>
                        </label>
                        <input type="text" class="input input-bordered w-full eligibility-name" value="${data.eligibility || ''}" placeholder="e.g. Civil Service Examination" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Rating</span>
                        </label>
                        <input type="text" class="input input-bordered w-full eligibility-rating" value="${data.rating || ''}" placeholder="e.g. 85.00" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Date of Examination</span>
                        </label>
                        <input type="date" class="input input-bordered w-full eligibility-date" value="${formatDateToISO(data.examdate)}" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Place of Examination</span>
                        </label>
                        <input type="text" class="input input-bordered w-full eligibility-place" value="${data.examplace || ''}" placeholder="e.g. Manila" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">License / Bar Number</span>
                        </label>
                        <input type="text" class="input input-bordered w-full eligibility-license" value="${data.licenseno || ''}" placeholder="e.g. 123456" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Date of Validity</span>
                        </label>
                        <input type="date" class="input input-bordered w-full eligibility-validity" value="${formatDateToISO(data.validitydate)}" />
                    </div>
                </div>
            `;
            container.appendChild(div);

            div.querySelector('.remove-eligibility').addEventListener('click', () => {
                div.remove();
            });
        };

        _id('btn-add-eligibility').addEventListener('click', () => addEligibilityRow());

        // Fetch data
        try {
            const data = await api.get(`/api/pds?empid=${empid}&type=eligibility`);
            if (data && Array.isArray(data)) {
                if (data.length === 0) {
                    addEligibilityRow(); // Add one empty row if none exists
                } else {
                    data.forEach(item => addEligibilityRow(item));
                }
            } else {
                addEligibilityRow();
            }
        } catch (e) {
            console.error("Error fetching Eligibility data", e);
            addEligibilityRow();
        }

        // Save data
        _id('btn-save-eligibility').addEventListener('click', async () => {
            const rows = document.querySelectorAll('#eligibility_container > div');
            const payload = Array.from(rows).map(row => ({
                eligibility: row.querySelector('.eligibility-name').value,
                rating: row.querySelector('.eligibility-rating').value,
                examdate: formatDateToDB(row.querySelector('.eligibility-date').value),
                examplace: row.querySelector('.eligibility-place').value,
                licenseno: row.querySelector('.eligibility-license').value,
                validitydate: formatDateToDB(row.querySelector('.eligibility-validity').value)
            }));

            try {
                const res = await api.put(`/api/pds?empid=${empid}&type=eligibility`, payload);
                alert("Eligibility information saved successfully!");
            } catch (e) {
                console.error("Error saving Eligibility data", e);
                alert("Failed to save data.");
            }
        });
    })();
</script>