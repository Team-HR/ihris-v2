<div class="p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="form-control">
            <label class="label">
                <span class="label-text">GSIS ID No.</span>
            </label>
            <input type="text" id="gsisidno" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Pag-IBIG No.</span>
            </label>
            <input type="text" id="pagibigno" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">PhilHealth No.</span>
            </label>
            <input type="text" id="philhealthno" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">SSS No.</span>
            </label>
            <input type="text" id="sssno" class="input input-bordered w-full" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">TIN No.</span>
            </label>
            <input type="text" id="tinno" class="input input-bordered w-full" />
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
                _id('gsisidno').value = data.gsisidno || '';
                _id('pagibigno').value = data.pagibigno || '';
                _id('philhealthno').value = data.philhealthno || '';
                _id('sssno').value = data.sssno || '';
                _id('tinno').value = data.tinno || '';
            }
        } catch (e) {
            console.error("Error fetching PDS data", e);
        }

        // Save data
        _id('btn-save-personal').addEventListener('click', async () => {
            const payload = {
                gsisidno: _id('gsisidno').value,
                pagibigno: _id('pagibigno').value,
                philhealthno: _id('philhealthno').value,
                sssno: _id('sssno').value,
                tinno: _id('tinno').value
            };
            try {
                const res = await api.put(`/api/pds?empid=${empid}&type=professional`, payload);
                alert("Professional information saved successfully!");
            } catch (e) {
                console.error("Error saving PDS data", e);
                alert("Failed to save data.");
            }
        });
    })();
</script>