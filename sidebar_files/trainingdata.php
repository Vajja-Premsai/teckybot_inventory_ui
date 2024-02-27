<?php
include('../config.php');

$countSql = "SELECT COUNT(*) as memberCount FROM inhousetraining";
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
        .div-container {
          /* background-image: url('images/blur.jpg'); 
          background-size: cover; 
          background-position: center; */
          position: relative;
          display: flex;
          flex-direction: column;
          height:100%;
          min-height: 100vh;
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
  <div class="admin">SUPER ADMIN</div>
  <div class="dataset">
    <div class="totalcount">TOTAL IN HOUSE TRAINING DATA - <?php echo $memberCount; ?></div>
    <div class="div-icon">
      <div class="searchbar">
        <img
          loading="lazy"
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/450b4626eeaccd7e8b874675ef61045165b1db1dfa4093f4a8b0c7ff301f0ce6?apiKey=f5413c5928f9429689f992fe9cf3aac0&"
          class="img-searchbar"
        />
      </div>
      <img
        loading="lazy"
        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/17ab4f79-1206-4c9f-9ef1-51c89a5d0891?apiKey=f5413c5928f9429689f992fe9cf3aac0&"
        class="add"
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
            <th>Name</th>
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
        <tr>
            <td> Name</td>
            <td>Address</td>
            <td>Email</td>
            <td>
                Phone Number
                <br />
                Number
            </td>
            <td>Items ordered</td>
            <td>
                Quantity of each
                <br />
                item ordered
            </td>
            <td>
                Cost of
                <br />
                each item
            </td>
            <td>Total Cost</td>
        </tr>
        <tr>
            <td> Name</td>
            <td>Address</td>
            <td>Email</td>
            <td>
                Phone Number
                <br />
                Number
            </td>
            <td>Items ordered</td>
            <td>
                Quantity of each
                <br />
                item ordered
            </td>
            <td>
                Cost of
                <br />
                each item
            </td>
            <td>Total Cost</td>
        </tr>
    </tbody>
</table>
</div>

</body>
</html>
