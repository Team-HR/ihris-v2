<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr>
                <th>Plantilla ID</th>
                <th>Item No</th>
                <th></th>
                <th>Employee Name</th>
                <th></th>
                <th>Office Name</th>
                <th></th>
                <th></th>
                <th>Position</th>
            </tr>
        </thead>
        <tbody id="output">

        </tbody>
    </table>

    <script>
        (async () => {
            const output = document.getElementById('output');
            output.innerHTML = `<tr><td colspan="7" style="text-align: center;">Loading...</td></tr>`;
            try {
                // output.innerHTML += '<p>Testing GET /api/plantilla...</p>';
                const result = await api.get('api/plantilla');
                // console.log(result);
                output.innerHTML = '';
                result.forEach(plantilla => {
                    output.innerHTML += `<tr>
                    <td class="p-2">${plantilla.plantilla_id}</td>
                    <td class="p-2">${plantilla.itemno}</td>
                    <td class="p-2">empid: ${plantilla.empid}</td>
                    <td class="p-2">${plantilla.full_name}</td>
                    <td class="p-2">dept_id: ${plantilla.dept_id}</td>
                    <td class="p-2">${plantilla.officename}</td>
                    <td class="p-2">section_id: ${plantilla.section_id}</td>
                    <td class="p-2">position_id: ${plantilla.position_id}</td>
                    <td class="p-2">${plantilla.position}</td>
                </tr>`;
                });


            } catch (error) {
                output.innerHTML += `<p style="color: red;">Error: ${error.message}</p>`;
            }
        })();
    </script>
</div>