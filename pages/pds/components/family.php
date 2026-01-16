<div class="p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="col-span-full">
            <h2 class="font-bold text-lg mb-2">Spouse Information</h2>
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Spouse Last Name</span>
            </label>
            <input type="text" id="spouse_lname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Spouse First Name</span>
            </label>
            <input type="text" id="spouse_fname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Spouse Middle Name</span>
            </label>
            <input type="text" id="spouse_mname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Spouse Extension Name</span>
            </label>
            <input type="text" id="spouse_extname" class="input input-bordered w-full" placeholder="..." />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Occupation</span>
            </label>
            <input type="text" id="occupation" class="input input-bordered w-full" placeholder="..." />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Employer/Business</span>
            </label>
            <input type="text" id="employer_name" class="input input-bordered w-full" placeholder="..." />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Business Address</span>
            </label>
            <input type="text" id="business_address" class="input input-bordered w-full" placeholder="..." />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Telephone No.</span>
            </label>
            <input type="text" id="s_telephone_no" class="input input-bordered w-full" placeholder="..." />
        </div>

        <div class="col-span-full">
            <h2 class="font-bold text-lg mb-2">Children Information</h2>
            <div id="children_container" class="space-y-4">
                <!-- Dynamic rows will be added here -->
            </div>
            <button id="btn-add-child" class="btn btn-sm btn-secondary mt-4">+ Add Child</button>
        </div>


        <!-- father and mother information -->

        <div class="col-span-full">
            <h2 class="font-bold text-lg mb-2">Father Information</h2>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Father Last Name</span>
            </label>
            <input type="text" id="father_lname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Father First Name</span>
            </label>
            <input type="text" id="father_fname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Father Middle Name</span>
            </label>
            <input type="text" id="father_mname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Father Extension Name</span>
            </label>
            <input type="text" id="fatherextname" class="input input-bordered w-full" placeholder="..." />
        </div>

        <div class="col-span-full">
            <h2 class="font-bold text-lg mb-2">Mother Information</h2>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Mother Last Name</span>
            </label>
            <input type="text" id="mother_lname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Mother First Name</span>
            </label>
            <input type="text" id="mother_fname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Mother Middle Name</span>
            </label>
            <input type="text" id="mother_mname" class="input input-bordered w-full" />
        </div>
    </div>
</div>
<div class="mt-4 flex justify-end">
    <button id="btn-save-family" class="btn btn-primary">Save</button>
</div>

<script>
    (async () => {
        const _id = (id) => document.getElementById(id);
        const empid = 24; // Fixed as per requirement

        const addChildRow = (name = '', dob = '') => {
            const container = _id('children_container');
            const index = container.children.length;
            const div = document.createElement('div');
            div.className = 'relative border border-base-300 rounded-lg p-4 bg-base-100';
            div.innerHTML = `
                <button class="absolute top-2 right-2 btn btn-xs btn-circle text-red-600 border-none remove-child">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Name of Child</span>
                        </label>
                        <input type="text" class="input input-bordered w-full child-name" value="${name}" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Date of Birth</span>
                        </label>
                        <input type="date" class="input input-bordered w-full child-dob" value="${dob}" />
                    </div>
                </div>
            `;
            container.appendChild(div);

            div.querySelector('.remove-child').addEventListener('click', () => {
                div.remove();
            });
        };

        _id('btn-add-child').addEventListener('click', () => addChildRow());

        // Fetch data
        try {
            const data = await api.get(`/api/pds?empid=${empid}&type=family`);
            if (data) {
                console.log(data);
                _id('spouse_lname').value = data.spouse_lname || '';
                _id('spouse_fname').value = data.spouse_fname || '';
                _id('spouse_mname').value = data.spouse_mname || '';
                _id('spouse_extname').value = data.spouseextname || '';
                _id('occupation').value = data.occupation || '';
                _id('employer_name').value = data.employer_name || '';
                _id('business_address').value = data.business_address || '';
                _id('s_telephone_no').value = data.s_telephone_no || '';
                _id('father_lname').value = data.father_lname || '';
                _id('father_fname').value = data.father_fname || '';
                _id('father_mname').value = data.father_mname || '';
                _id('fatherextname').value = data.fatherextname || '';
                _id('mother_lname').value = data.mother_lname || '';
                _id('mother_fname').value = data.mother_fname || '';
                _id('mother_mname').value = data.mother_mname || '';

                // Handle children
                const names = (data.name_child || '').split('/').filter(n => n);
                const dobs = (data.date_birth || '').split(',').filter(d => d);

                // Assuming parity in length, or just loop max
                const maxLen = Math.max(names.length, dobs.length);
                for (let i = 0; i < maxLen; i++) {
                    // Convert mm/dd/yyyy to yyyy-mm-dd for input
                    let dob = dobs[i] || '';
                    if (dob) {
                        const parts = dob.trim().split('/');
                        if (parts.length === 3) {
                            dob = `${parts[2]}-${parts[0].padStart(2, '0')}-${parts[1].padStart(2, '0')}`;
                        }
                    }
                    addChildRow(names[i] || '', dob);
                }
            }
        } catch (e) {
            console.error("Error fetching PDS data", e);
        }


        // Save data
        _id('btn-save-family').addEventListener('click', async () => {
            // Collect children data
            const childNameInputs = document.querySelectorAll('.child-name');
            const childDobInputs = document.querySelectorAll('.child-dob');

            const childNames = Array.from(childNameInputs).map(i => i.value).join('/');
            const childDobs = Array.from(childDobInputs).map(i => {
                const val = i.value; // yyyy-mm-dd
                if (!val) return '';
                const parts = val.split('-');
                if (parts.length === 3) {
                    return `${parts[1]}/${parts[2]}/${parts[0]}`; // mm/dd/yyyy
                }
                return val;
            }).join(',');

            const payload = {
                spouse_lname: _id('spouse_lname').value,
                spouse_fname: _id('spouse_fname').value,
                spouse_mname: _id('spouse_mname').value,
                spouseextname: _id('spouse_extname').value,
                occupation: _id('occupation').value,
                employer_name: _id('employer_name').value,
                business_address: _id('business_address').value,
                s_telephone_no: _id('s_telephone_no').value,
                father_lname: _id('father_lname').value,
                father_fname: _id('father_fname').value,
                father_mname: _id('father_mname').value,
                fatherextname: _id('fatherextname').value,
                mother_lname: _id('mother_lname').value,
                mother_fname: _id('mother_fname').value,
                mother_mname: _id('mother_mname').value,
                name_child: childNames,
                date_birth: childDobs
            };

            try {
                const res = await api.put(`/api/pds?empid=${empid}&type=family`, payload);
                alert("Family information saved successfully!");
            } catch (e) {
                console.error("Error saving PDS data", e);
                alert("Failed to save data.");
            }
        });
    })();
</script>