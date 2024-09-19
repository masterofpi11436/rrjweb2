<form action="/medical/uploadpdf" method="POST" enctype="multipart/form-data">
    <label for="pdfFile">Upload PDF:</label>
    <input type="file" name="pdfFile" accept="application/pdf" required>
    <button type="submit">Upload</button>
</form>

<!-- PDFs that have been uploaded -->
<h3>Uploaded PDFs</h3>
<table>
    <thead>
        <tr>
            <th>PDF File</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($uploaded_files)): ?>
            <?php foreach ($uploaded_files as $file): ?>
                <tr>
                    <td><?php echo htmlspecialchars($file); ?></td>
                    <td>
                        <!-- Process button sends the selected PDF file for processing -->
                        <form action="/medical/processpdf" method="POST">
                            <input type="hidden" name="pdf_file" value="<?php echo htmlspecialchars($file); ?>">
                            <button type="submit">Process PDF</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">No PDFs uploaded yet.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>