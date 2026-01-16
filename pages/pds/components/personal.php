<div class="p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="col-span-full">
            <h2 class="font-bold text-lg mb-2">Personal Information</h2>
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Last Name</span>
            </label>
            <input type="text" id="lname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">First Name</span>
            </label>
            <input type="text" id="fname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Middle Name</span>
            </label>
            <input type="text" id="mname" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Extension Name</span>
            </label>
            <input type="text" id="extname" class="input input-bordered w-full" placeholder="..." />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Date of Birth</span>
            </label>
            <input type="date" id="birthdate" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Place of Birth</span>
            </label>
            <input type="text" id="placebirth" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Gender</span>
            </label>
            <select id="gender" class="select select-bordered w-full">
                <option value="" disabled selected>Select Gender</option>
                <option value="MALE">MALE</option>
                <option value="FEMALE">FEMALE</option>
            </select>
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Civil Status</span>
            </label>
            <select id="civilstatus" class="select select-bordered w-full">
                <option value="" disabled selected>Select Civil Status</option>
                <option value="SINGLE">SINGLE</option>
                <option value="MARRIED">MARRIED</option>
                <option value="WIDOWED">WIDOWED</option>
                <option value="SEPARATED">SEPARATED</option>
                <option value="DIVORCED">DIVORCED</option>
            </select>
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Citizenship</span>
            </label>
            <input type="text" id="citizenship" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Height (cm)</span>
            </label>
            <input type="text" id="height" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Weight (kg)</span>
            </label>
            <input type="text" id="weight" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Blood Type</span>
            </label>
            <input type="text" id="bloodtype" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Contact Person</span>
            </label>
            <input type="text" id="contact_person" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Contact No.</span>
            </label>
            <input type="text" id="contact_no" class="input input-bordered w-full" />
        </div>

        <!-- Residential Address -->
        <div class="col-span-full">
            <h2 class="font-bold text-lg mb-2">Residential Address</h2>
        </div>
        <div class="form-control col-span-full">
            <label class="label">
                <span class="label-text">Address</span>
            </label>
            <input type="text" id="residential_address" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Zip Code</span>
            </label>
            <input type="text" id="residential_zipcode" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Telephone No.</span>
            </label>
            <input type="text" id="residential_telno" class="input input-bordered w-full" />
        </div>

        <!-- Permanent Address -->
        <div class="col-span-full mt-4 flex items-center gap-2">
            <h2 class="font-bold text-lg">Permanent Address</h2>
            <label class="cursor-pointer label">
                <input type="checkbox" id="same_address_checkbox" class="checkbox checkbox-sm" />
                <span class="label-text ml-2">Same as Residential Address</span>
            </label>
        </div>
        <div class="form-control col-span-full">
            <label class="label">
                <span class="label-text">Address</span>
            </label>
            <input type="text" id="permanent_address" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Zip Code</span>
            </label>
            <input type="text" id="permanent_zipcode" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Telephone No.</span>
            </label>
            <input type="text" id="permanent_telno" class="input input-bordered w-full" />
        </div>
    </div>
</div>
<div class="mt-4 flex justify-end">
    <button id="btn-save-personal" class="btn btn-primary">Save</button>
</div>

<script>
    (async () => {
        const _id = (id) => document.getElementById(id);
        const empid = 24; // Fixed as per requirement

        // Fetch data
        try {
            const data = await api.get(`/api/pds?empid=${empid}`);
            if (data) {
                console.log(data);
                _id('lname').value = data.lname || '';
                _id('fname').value = data.fname || '';
                _id('mname').value = data.mname || '';
                _id('extname').value = data.extname || '';
                _id('birthdate').value = data.birthdate || '';
                _id('placebirth').value = data.placebirth || '';
                _id('gender').value = data.gender || '';
                _id('civilstatus').value = data.civilstatus || '';
                _id('citizenship').value = data.citizenship || '';
                _id('height').value = data.height || '';
                _id('weight').value = data.weight || '';
                _id('bloodtype').value = data.bloodtype || '';
                _id('contact_person').value = data.contact_person || '';
                _id('contact_no').value = data.contact_no || '';
                _id('residential_address').value = data.residential_address || '';
                _id('residential_zipcode').value = data.residential_zipcode || data.reszipcode || '';
                _id('residential_telno').value = data.residential_telno || '';
                _id('permanent_address').value = data.permanent_address || '';
                _id('permanent_zipcode').value = data.permanent_zipcode || '';
                _id('permanent_telno').value = data.permanent_telno || '';

            }
        } catch (e) {
            console.error("Error fetching PDS data", e);
        }

        // Checkbox logic
        const syncAddress = () => {
            if (_id('same_address_checkbox').checked) {
                _id('permanent_address').value = _id('residential_address').value;
                _id('permanent_zipcode').value = _id('residential_zipcode').value;
                _id('permanent_telno').value = _id('residential_telno').value;

                // Disable permanent fields when synced
                _id('permanent_address').disabled = true;
                _id('permanent_zipcode').disabled = true;
                _id('permanent_telno').disabled = true;
            } else {
                // Enable back
                _id('permanent_address').disabled = false;
                _id('permanent_zipcode').disabled = false;
                _id('permanent_telno').disabled = false;
            }
        };

        _id('same_address_checkbox').addEventListener('change', syncAddress);

        // Auto-update if checked
        ['residential_address', 'residential_zipcode', 'residential_telno'].forEach(id => {
            _id(id).addEventListener('input', () => {
                if (_id('same_address_checkbox').checked) syncAddress();
            });
        });

        // Save data
        _id('btn-save-personal').addEventListener('click', async () => {
            const payload = {
                lname: _id('lname').value,
                fname: _id('fname').value,
                mname: _id('mname').value,
                extname: _id('extname').value,
                birthdate: _id('birthdate').value,
                placebirth: _id('placebirth').value,
                gender: _id('gender').value,
                sex: _id('gender').value == 'MALE' ? 1 : _id('gender').value == 'FEMALE' ? 2 : null,
                civilstatus: _id('civilstatus').value,
                citizenship: _id('citizenship').value,
                height: _id('height').value,
                weight: _id('weight').value,
                bloodtype: _id('bloodtype').value,
                blood_type: _id('bloodtype').value,
                contact_person: _id('contact_person').value,
                contact_no: _id('contact_no').value,
                residential_address: _id('residential_address').value,
                residential_zipcode: _id('residential_zipcode').value,
                reszipcode: _id('residential_zipcode').value,
                residential_telno: _id('residential_telno').value,
                permanent_address: _id('permanent_address').value,
                permanent_zipcode: _id('permanent_zipcode').value,
                permanent_telno: _id('permanent_telno').value
            };

            try {
                const res = await api.put(`/api/pds?empid=${empid}`, payload);
                console.log("Saved:", res);
                // Optional: show success message
                alert("Personal information saved successfully!");
            } catch (e) {
                console.error("Error saving PDS data", e);
                alert("Failed to save data.");
            }
        });
    })();
</script>