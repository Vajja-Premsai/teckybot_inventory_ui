<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        margin: 0%;
        padding: 0%;
        height: 100%;
        min-height: 100vh;
        position: relative;
    }

    .overlay {
        position: fixed;
        width: 100%;
        height: 100%;
        min-height: 100vh;
        background-image: url('images/cardboard.png');
        background-size: cover;
        background-position: center;
        background-repeat:repeat;
        filter: blur(5px);
        z-index: -1;
    }


    .containerr {
        display: flex;
        align-items: flex-start;
        /* Align items at the start */
    }

    .sidebar {
        width: 20%;
        padding: 20px;
        min-height: 100vh;
        box-sizing: border-box;
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        position: fixed;

    }

    .content {
        flex-grow: 1;
        /* Grow to fill remaining space */
        box-sizing: border-box;
    }

    .img-inventory {
        aspect-ratio: 4;
        object-fit: contain;
        object-position: center;
        max-width: 100%;
    }

    .side-content {
        color: #000;
        font-family: Outfit, sans-serif;
        margin-top: 30px;
        color: #000;
        font-weight: 400;
        text-align: center;
        letter-spacing: 1.6px;
    }

    @media (max-width: 991px) {
        .side-content {
            margin-top: 40px;
        }
    }

    .line {
        background: linear-gradient(90deg,
                rgba(221, 156, 97, 0) 0%,
                #dd9c61 52%,
                rgba(221, 156, 97, 0) 100%);
        align-self: stretch;
        margin-top: 30px;
        height: 2px;
    }

    @media (max-width: 991px) {
        .line {
            margin-top: 40px;
        }
    }

    .active-link {
        font-weight: bold;
    }
    </style>
</head>

<body>

    <div class="containerr">
        <div class="overlay"></div>
        <div class="sidebar">
            <img loading="lazy" src="./images/Teckybot Inventory 2.png" class="img-inventory" />
            <div class=" side-content" onclick="loadContent('upload.html')" id="purchase_order-link"> PURCHASE ORDER
                <br />
                MANAGEMENT
            </div>
            <div class="line"></div>
            <div class="side-content" onclick="loadContent('sales_order.html')" id="sales_order-link"> SALES ORDER
                <br />
                MANAGEMENT
            </div>
            <div class="line"></div>
            <div class="side-content" onclick="loadContent('inventory.html')" id="inventory-link"> INVENTORY
                <br />
                MANAGEMENT
            </div>
            <div class=" line"></div>
            <div class=" side-content" onclick="loadContent('vendor.html')" id="vendor-link"> VENDOR
                <br />
                MANAGEMENT
            </div>
            <div class=" line"></div>
            <div class=" side-content" onclick="loadContent('customer.html')" id="customer-link"> CUSTOMER
                <br />
                MANAGEMENT
            </div>
        </div>
        <div class="content"></div>
        
    </div>
    <script>
    function loadContent(url) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();

        document.querySelectorAll('.side-content').forEach(function(link) {
            link.classList.remove('active-link');
        });

        // Add active class to the clicked link
        document.getElementById(url.split('.')[0] + '-link').classList.add('active-link');

    }
    </script>
</body>

</html>