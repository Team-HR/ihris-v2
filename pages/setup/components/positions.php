<div class="overflow-x-auto">
    <table class="">
        <thead>
            <tr>
                <th>ID</th>
                <th>Position Code</th>
                <th>Position</th>
                <th>Functional</th>
            </tr>
        </thead>
        <tbody id="output">

        </tbody>
    </table>

    <script>
        (async () => {
            const output = document.getElementById('output');
            // Show loading message
            output.innerHTML = `<tr><td colspan="4" style="text-align: center;">Loading...</td></tr>`;

            try {
                const result = await api.get('api/positions');
                // Clear loading message
                output.innerHTML = '';
                result.forEach(position => {
                    output.innerHTML += `<tr>
                    <td>${position.id}</td>
                    <td>${position.position_code}</td>
                    <td>${position.position}</td>
                    <td>${position.functional}</td>
                </tr>`;
                });


            } catch (error) {
                output.innerHTML = `<tr><td colspan="4" style="color: red; text-align: center;">Error: ${error.message}</td></tr>`;
            }
        })();
    </script>
</div>