<form action="/medical/processpdf" method="POST" enctype="multipart/form-data">
    <label for="pdfFile">Upload PDF:</label>
    <input type="file" name="pdfFile" accept="application/pdf" required>
    <button type="submit">Upload</button>
</form>

<table>
    <thead>
        <tr>
            <th>PDFs Uploaded</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Orginal</td>
            <td>
                <form action="/medical/processpdf">
                    <button>Process</button>
                </form></td>
        </tr>
        <tr>
            <td>Orginal</td>
            <td>
                <form action="/medical/processpdf">
                    <button>Process</button>
                </form></td>
        </tr>
    </tbody>
</table>