<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ./login");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Manage_product</title>
        <style>
            .back{
                margin: 20px 0 0 50px;
            }
            form.mb-3 > input{
                width: 500px;
            }
            .category-container {
                display: flex;
                align-items: center;
            }
            #category {
                max-width: 200px;
                margin-left: 10px;
                margin-right: 20px;
                height: 38px;
            }
            .product-img {
                width: 80px;
                height: 80px;
                object-fit: cover;
                object-position: center;
            }

            /* backButton */
            .box {
              width: 100px;
              height: 35px;
              float: left;
              transition: .5s linear;
              position: relative;
              display: block;
              overflow: hidden;
              padding: 5px;
              text-align: center;
              margin: 0 5px;
              background: transparent;
              text-transform: uppercase;
              font-weight: 900;
            }

            .box:before {
              position: absolute;
              content: '';
              left: 0;
              bottom: 0;
              height: 4px;
              width: 100%;
              border-bottom: 4px solid transparent;
              border-left: 4px solid transparent;
              box-sizing: border-box;
              transform: translateX(100%);
            }

            .box:after {
              position: absolute;
              content: '';
              top: 0;
              left: 0;
              width: 100%;
              height: 4px;
              border-top: 4px solid transparent;
              border-right: 4px solid transparent;
              box-sizing: border-box;
              transform: translateX(-100%);
            }

            .box:hover {
              box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            }

            .box:hover:before {
              border-color: #262626;
              height: 100%;
              transform: translateX(0);
              transition: .3s transform linear, .3s height linear .3s;
            }

            .box:hover:after {
              border-color: #262626;
              height: 100%;
              transform: translateX(0);
              transition: .3s transform linear, .3s height linear .5s;
            }

            button {
              color: black;
              text-decoration: none;
              cursor: pointer;
              outline: none;
              border: none;
              background: transparent;
            }


            /* checkbox */
            .checkbox-wrapper-12 {
              position: relative;
            }

            .checkbox-wrapper-12 > svg {
              position: absolute;
              top: -130%;
              left: -170%;
              width: 110px;
              pointer-events: none;
            }

            .checkbox-wrapper-12 * {
              box-sizing: border-box;
            }

            .checkbox-wrapper-12 input[type="checkbox"] {
              -webkit-appearance: none;
              -moz-appearance: none;
              appearance: none;
              -webkit-tap-highlight-color: transparent;
              cursor: pointer;
              margin: 0;
            }

            .checkbox-wrapper-12 input[type="checkbox"]:focus {
              outline: 0;
            }

            .checkbox-wrapper-12 .cbx {
              width: 24px;
              height: 24px;
              top: calc(100px - 12px);
              left: calc(100px - 12px);
            }

            .checkbox-wrapper-12 .cbx input {
              position: absolute;
              top: 0;
              left: 0;
              width: 24px;
              height: 24px;
              border: 2px solid #bfbfc0;
              border-radius: 50%;
            }

            .checkbox-wrapper-12 .cbx label {
              width: 24px;
              height: 24px;
              background: none;
              border-radius: 50%;
              position: absolute;
              top: 0;
              left: 0;
              transform: trasnlate3d(0, 0, 0);
              pointer-events: none;
            }

            .checkbox-wrapper-12 .cbx svg {
              position: absolute;
              top: 5px;
              left: 4px;
              z-index: 1;
              pointer-events: none;
            }

            .checkbox-wrapper-12 .cbx svg path {
              stroke: #fff;
              stroke-width: 3;
              stroke-linecap: round;
              stroke-linejoin: round;
              stroke-dasharray: 19;
              stroke-dashoffset: 19;
              transition: stroke-dashoffset 0.3s ease;
              transition-delay: 0.2s;
            }

            .checkbox-wrapper-12 .cbx input:checked + label {
              animation: splash-12 0.6s ease forwards;
            }

            .checkbox-wrapper-12 .cbx input:checked + label + svg path {
              stroke-dashoffset: 0;
            }

            @-moz-keyframes splash-12 {
              40% {
                background: #866efb;
                box-shadow: 0 -18px 0 -8px #866efb, 16px -8px 0 -8px #866efb, 16px 8px 0 -8px #866efb, 0 18px 0 -8px #866efb, -16px 8px 0 -8px #866efb, -16px -8px 0 -8px #866efb;
              }

              100% {
                background: #866efb;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent, 32px 16px 0 -10px transparent, 0 36px 0 -10px transparent, -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
              }
            }

            @-webkit-keyframes splash-12 {
              40% {
                background: #866efb;
                box-shadow: 0 -18px 0 -8px #866efb, 16px -8px 0 -8px #866efb, 16px 8px 0 -8px #866efb, 0 18px 0 -8px #866efb, -16px 8px 0 -8px #866efb, -16px -8px 0 -8px #866efb;
              }

              100% {
                background: #866efb;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent, 32px 16px 0 -10px transparent, 0 36px 0 -10px transparent, -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
              }
            }

            @-o-keyframes splash-12 {
              40% {
                background: #866efb;
                box-shadow: 0 -18px 0 -8px #866efb, 16px -8px 0 -8px #866efb, 16px 8px 0 -8px #866efb, 0 18px 0 -8px #866efb, -16px 8px 0 -8px #866efb, -16px -8px 0 -8px #866efb;
              }

              100% {
                background: #866efb;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent, 32px 16px 0 -10px transparent, 0 36px 0 -10px transparent, -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
              }
            }

            @keyframes splash-12 {
              40% {
                background: #866efb;
                box-shadow: 0 -18px 0 -8px #866efb, 16px -8px 0 -8px #866efb, 16px 8px 0 -8px #866efb, 0 18px 0 -8px #866efb, -16px 8px 0 -8px #866efb, -16px -8px 0 -8px #866efb;
              }

              100% {
                background: #866efb;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent, 32px 16px 0 -10px transparent, 0 36px 0 -10px transparent, -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
              }
            }
        </style>
    </head>
    <body>
    <div>
        <div class="mb-2 p-4 text-white d-flex align-items-center bg-secondary">
          <h5 class="m-auto"><?php echo $_SESSION['name'] . "&nbsp;&nbsp;"?>'s Cart</h5>
        </div>
      </div>
      <div class="m-4">
        <a href="./index.php">
          <button>
              <span class="box">
              Back
              </span>
          </button>
        </a>
      </div>
  
    <table class="table m-4">
      <thead>
        <tr>
          <th scope="col">Product ID</th>
          <th scope="col">Product Image</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Price</th>
          <th scope="col">Quantity</th>
          <th>Selext</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $totalAmount = 0;
          include('./include/Connection.php');
          $sql ="SELECT
	                Cart_Product.Cart_Id,
                  Product.Product_Id,
                  Product.Product_Name,
                  Product.Product_Price,
                  Product.Product_Img,
                  Cart_Product.Quantity
                FROM
	                Cart_Product, Customer, Cart, Product
                WHERE
                  Cart_Product.Cart_Id = Cart.Cart_Id AND
                  Cart_Product.Product_Id = Product.Product_Id AND
	                Cart.Customer_Id = Customer.Customer_Id AND
                  Customer.Customer_Id = ?";
          $stmt = $connect->prepare($sql);
          $stmt->bind_param("i", $_SESSION['id']);
          $stmt->execute();
          $result = $stmt->get_result();
          $data = $result->fetch_all(MYSQLI_ASSOC);
          foreach ($data as $row):?>
            <tr scope="row" data-product-id="<?php echo $row['Product_Id'] ?>">
              <td><?php echo $row['Product_Id']?></td>
              <td><img class="product-img" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['Product_Img'])?>"></td>
              <td><?php echo $row['Product_Name']?></td>
              <td><?php echo $row['Product_Price']?></td>
              <td><input type="number" value="<?php echo $row['Quantity']?>"></td>
              <!-- CHECKBOX -->
              <td>
                <div class="checkbox-wrapper-12">
                  <div class="cbx">
                    <input checked="" type="checkbox" id="cbx-12">
                    <label for="cbx-12"></label>
                    <svg fill="none" viewBox="0 0 15 14" height="14" width="15">
                      <path d="M2 8.36364L6.23077 12L13 2"></path>
                    </svg>
                  </div>
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                      <filter id="goo-12">
                        <feGaussianBlur result="blur" stdDeviation="4" in="SourceGraphic"></feGaussianBlur>
                        <feColorMatrix result="goo-12" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" mode="matrix" in="blur"></feColorMatrix>
                        <feBlend in2="goo-12" in="SourceGraphic"></feBlend>
                      </filter>
                    </defs>
                  </svg>
                </div>            
              </td>
            </tr>
            <?php 
              $totalAmount += $row['Product_Price'] * $row['Quantity'] ;
            ?>
          <?php endforeach ?>
      </tbody>
    </table>
      <div class="total"><?php echo $totalAmount?>Total Amount</div>
    <div class="d-flex  justify-content-end">
      <button type="button" class="btn btn-success m-3">Check out</button>
    </div>
    </body>
</html>

