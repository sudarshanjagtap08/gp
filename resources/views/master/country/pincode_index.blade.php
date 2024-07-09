<!DOCTYPE html>
<html>
<head>
    <title>Pincode to Location</title>
    <script>
        function getLocationDetails() {
            const pincode = document.getElementById('pincode').value;

            // Make an API request to fetch location data
            fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                .then(response => response.json())
                .then(data => {
                    const postOffices = data[0].PostOffice;
                    // Loop through each post office and print the details
                    postOffices.forEach(postOffice => {
                        const name = postOffice.Name;
                        const branchType = postOffice.BranchType;
                        const deliveryStatus = postOffice.DeliveryStatus;
                        const circle = postOffice.Circle;
                        const district = postOffice.District;
                        const division = postOffice.Division;
                        const region = postOffice.Region;
                        const block = postOffice.Block;
                        const state = postOffice.State;
                        const country = postOffice.Country;
                        const pincode = postOffice.Pincode;
                    });

                    // Access the first post office details for country, state, city, and area
                    const firstPostOffice = postOffices[0];
                    const country = firstPostOffice.Country;
                    const state = firstPostOffice.State;
                    const city = firstPostOffice.District;
                    const area = firstPostOffice.Division;
                    const region = firstPostOffice.Region;
                    const circle = firstPostOffice.Circle;
                    const name = firstPostOffice.Name;
                    const pincode = firstPostOffice.Pincode;

                    // You can update the HTML elements as well
                    document.getElementById('country').textContent = country;
                    document.getElementById('state').textContent = state;
                    document.getElementById('city').textContent = city;
                    document.getElementById('area').textContent = area;
                    document.getElementById('region').textContent = region;
                    document.getElementById('name').textContent = name;
                    document.getElementById('pincode2').textContent = pincode;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
</head>
<body>
    <h1>Pincode to Location</h1>
    <label for="pincode">Enter Pincode: </label>
    <input type="text" id="pincode">
    <button onclick="getLocationDetails()">Get Location</button>

    <h2>Location Details:</h2>
    <p>Country: <span id="country"></span></p>
    <p>Region: <span id="region"></span></p>
    <p>State: <span id="state"></span></p>
    <p>City: <span id="city"></span></p>
    <p>Area: <span id="area"></span></p>
    <p>Locality: <span id="name"></span></p>
    <p>Pincode: <span id="pincode2"></span></p>
</body>
</html>
