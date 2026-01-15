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
            }
        } catch (e) {
            console.error("Error fetching PDS data", e);
        }


        // Save data
        _id('btn-save-family').addEventListener('click', async () => {
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