<div class="overflow-x-auto">
    <table class="">
        <thead>
            <tr>
                <th>ObjID</th>
                <th>Department ObjID</th>
                <th>Office Id</th>
                <th>Code</th>
                <th>Office Name</th>
                <th>Office Head Name</th>
            </tr>
        </thead>
        <tbody id="output">

        </tbody>
    </table>

    <script>
        (async () => {
            const output = document.getElementById('output');
            try {
                // output.innerHTML += '<p>Testing GET /api/offices...</p>';
                const result = await api.get('api/offices');

                // console.log(result);

                result.forEach(office => {
                    output.innerHTML += `<tr>
                    <td>${office.objid}</td>
                    <td>${office.office_id}</td>
                    <td>${office.department_objid}</td>
                    <td>${office.code}</td>
                    <td>${office.office_name}</td>
                    <td>${office.officeheadname}</td>
                </tr>`;
                });


            } catch (error) {
                output.innerHTML += `<p style="color: red;">Error: ${error.message}</p>`;
            }
        })();
    </script>
</div>