<?php
include('../config.php');
// Initialize $data variable to avoid undefined variable error
$data = [];

// Fetch data from the database
$sql = "SELECT * FROM school";
$result = $conn->query($sql);

// Check for successful query execution
if ($result === false) {
    // Query failed, handle the error
    echo "Error: " . $conn->error;
} else {
    // Proceed with fetching data
    if ($result->num_rows > 0) {
        // Fetch each row of data and store it in the $data array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
}

$countSql = "SELECT COUNT(*) as memberCount FROM school";
$countResult = $conn->query($countSql);
$memberCount = $countResult->fetch_assoc()['memberCount'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      /* Styles for the form popup */
      .form-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            padding: 20px;
            z-index: 9;
        }

        /* Styles for the form fields */
        .form-popup input[type=text],
        .form-popup input[type=email],
        .form-popup input[type=tel] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Styles for the form buttons */
        .form-popup button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        .div-container {
          /* background-image: url('images/blur.jpg'); 
          background-size: cover;
          /* background-position: center;
          background-repeat: repeat; */ 
          position: relative;
          display: flex;
          flex-direction: column;
          min-height: 100vh;
          height:100%;
          padding: 23px 20px 46px;
        }
        @media (max-width: 991px) {
          .div-container {
            max-width: 100%;
            margin-top: 16px;
          }
        }
        .admin {
          color: #fff;
          text-align: center;
          letter-spacing: 2px;
          align-self: center;
          font: 600 20px Poppins, sans-serif;
        }
        .dataset{
          border-radius: 5px;
          border-top: 3px solid #fff;
          display: flex;
          margin-top: 22px;
          width: 100%;
          justify-content: space-between;
          gap: 20px;
          padding: 15px 8px;
        }
        @media (max-width: 991px) {
          .dataset {
            max-width: 100%;
            flex-wrap: wrap;
          }
        }
        .totalcount {
          justify-content: left;
          color: #fff;
          letter-spacing: 2px;
          align-self: start;
          margin-top: 11px;
          flex-grow: 1;
          flex-basis: auto;
          font: 500 20px Poppins, sans-serif;
        }
        .div-icon {
          display: flex;
          justify-content: space-between;
          gap: 6px;
        }
        .searchbar {
          border-radius: 4px;
          border: 0.5px solid #fff;
          background-color: rgba(255, 255, 255, 0.01);
          display: flex;
          flex-grow: 1;
          flex-basis: 0%;
          flex-direction: column;
          justify-content: center;
          align-items: start;
          padding: 3px 60px 3px 0;
        }
        .img-searchbar {
          aspect-ratio: 1;
          object-fit: auto;
          object-position: center;
          width: 24px;
        }
        .add{
          aspect-ratio: 1;
          object-fit: auto;
          object-position: center;
          width: 30px;
        }
        .delete {
          aspect-ratio: 1;
          object-fit: auto;
          object-position: center;
          width: 30px;
        }
        .write {
          aspect-ratio: 1;
          object-fit: auto;
          object-position: center;
          width: 30px;
        }
        table {
          border-collapse: collapse;
          width: 100%;
          margin: 13px auto;
          overflow: hidden; /* Hide overflow to hide row lines */
        }
        th{
          border:1px solid #a1a1a1;
        }
      
        th, td {
          font-family: 'Poppins', sans-serif;
          text-align: center;
          padding: 10px;
          border-right: 1px solid #a1a1a1;
          
        }
      
        th {
          background-color: #fff;
          color: #000;
          font-weight: 600;
          /* Add border only on the right to keep column lines */
        }
      
        tr:nth-child(even) {
         background-color: #f7e1f0;
        }
      
        tr:nth-child(odd) {
          background-color: #fff;
        }
      </style>
</head>
<body>
    <div class="div-container">
  <div class="admin">ADMIN</div>
  <div class="dataset">
    <div class="totalcount">TOTAL SCHOOL DATA -  <?php echo $memberCount; ?></div>
    <div class="div-icon">
      <div class="searchbar">
        <img
          loading="lazy"
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/450b4626eeaccd7e8b874675ef61045165b1db1dfa4093f4a8b0c7ff301f0ce6?apiKey=f5413c5928f9429689f992fe9cf3aac0&"
          class="img-searchbar"
        />
      </div>
      <!-- <div class="div-icon">
        <img loading="lazy" src="add_icon_url" class="add" onclick="openForm()">
    </div> -->
      <img
        loading="lazy"
        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&"
        class="add" onclick="openForm()"
      />
      <img
        loading="lazy"
        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/d2317b63992add6e837efb10b4023d5f7a754644e7dba7a6c118dc00383cca97?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/d2317b63992add6e837efb10b4023d5f7a754644e7dba7a6c118dc00383cca97?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d2317b63992add6e837efb10b4023d5f7a754644e7dba7a6c118dc00383cca97?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/d2317b63992add6e837efb10b4023d5f7a754644e7dba7a6c118dc00383cca97?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/d2317b63992add6e837efb10b4023d5f7a754644e7dba7a6c118dc00383cca97?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d2317b63992add6e837efb10b4023d5f7a754644e7dba7a6c118dc00383cca97?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/d2317b63992add6e837efb10b4023d5f7a754644e7dba7a6c118dc00383cca97?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/d2317b63992add6e837efb10b4023d5f7a754644e7dba7a6c118dc00383cca97?apiKey=f5413c5928f9429689f992fe9cf3aac0&"
        class="delete"
      />
      <img
        loading="lazy"
        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/a2e2fbfb-9606-4724-9a1c-e0b539c40592?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/a2e2fbfb-9606-4724-9a1c-e0b539c40592?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/a2e2fbfb-9606-4724-9a1c-e0b539c40592?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/a2e2fbfb-9606-4724-9a1c-e0b539c40592?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/a2e2fbfb-9606-4724-9a1c-e0b539c40592?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/a2e2fbfb-9606-4724-9a1c-e0b539c40592?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/a2e2fbfb-9606-4724-9a1c-e0b539c40592?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/a2e2fbfb-9606-4724-9a1c-e0b539c40592?apiKey=f5413c5928f9429689f992fe9cf3aac0&"
        class="write"
      />
    </div>
  </div>
 

<table>
    <thead>
        <tr>
            <th>School Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Items ordered</th>
            <th>Quantity of each<br> item ordered</th>
            <th>Cost of each item</th>
            <th>Total Cost</th>
        </tr>
    </thead>
    <tbody>
    <?php
          // Loop through the $data array and display each row in the table
          foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row['schoolname'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phonenumber'] . "</td>";
        echo "<td>" . $row['items_ordered'] . "</td>";
        echo "<td>" . $row['quantity_of_each_item_ordered'] . "</td>";
        echo "<td>" . $row['cost_of_each_item'] . "</td>";
        echo "<td>" . $row['totalcost'] . "</td>";
        echo "</tr>";
      }
                
      ?>
       
    </tbody>
</table>
</div>
<!-- Form popup -->
<div class="form-popup" id="addForm">
        <form action="add_school.php" method="post">
            <h2>Add School</h2>
            <label for="schoolName">School Name</label>
            <input type="text" id="schoolName" name="schoolName" required>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phoneNumber">Phone Number</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" required>

            <label for="itemsOrdered">Items Ordered</label>
            <input type="text" id="itemsOrdered" name="itemsOrdered" required>

            <label for="quantity">Quantity of Each Item Ordered</label>
            <input type="text" id="quantity" name="quantity" required>

            <label for="costPerItem">Cost of Each Item</label>
            <input type="text" id="costPerItem" name="costPerItem" required>

            <button type="submit" class="btn">Submit</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
    <script>
        // Function to open the form popup
        function openForm() {
            document.getElementById("addForm").style.display = "block";
        }

        // Function to close the form popup
        function closeForm() {
            document.getElementById("addForm").style.display = "none";
        }
    </script>

</body>
</html>
