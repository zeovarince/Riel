<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON to HTML by ID Range</title>
</head>
<body>
    <div id="output"></div>

    <script>
        // Fetch data from the JSON file
        fetch('data.json')
            .then(response => response.json())
            .then(dataObject => {
                // Access the 'mahasiswa' array within the object
                const dataArray = dataObject.mahasiswa;

                const outputDiv = document.getElementById('output');
                let htmlContent = '';

                // Loop through the IDs from 5 to 100
                for (let id = 171; id <= 233; id++) {
                    // Find the entry with the matching ID
                    const data = dataArray.find(item => item.id === id);

                    // If an entry with the current ID exists, generate the HTML for it
                    if (data) {
                        htmlContent += `
                            <div style="margin-bottom: 20px;">
                                <h2>${data.nama}</h2>
                                <p><strong>NIM:</strong> ${data.nim}</p>
                                <p><strong>Kelompok:</strong> ${data.kelompok}</p>
                                <p><strong>Alamat:</strong> ${data.alamat}</p>
                                <p><strong>TTL:</strong> ${data.ttl}</p>
                                <p><strong>No:</strong> ${data.no}</p>
                                <div>
                                    <strong>Foto Formal:</strong><br>
                                    <img src="${data.fotoformal}" alt="Foto Formal" width="200">
                                </div>
                                <div>
                                    <strong>Foto Selfie:</strong><br>
                                    <img src="${data.fotoselfie}" alt="Foto Selfie" width="200">
                                </div>
                            </div>
                        `;
                    }
                }

                // If no matching entries are found, show a message
                if (htmlContent === '') {
                    htmlContent = '<p>No data found for IDs 5-100.</p>';
                }

                outputDiv.innerHTML = htmlContent;
            })
            .catch(error => console.error('Error fetching the data:', error));
    </script>
</body>
</html>
