<div class="category">
    <table class="category-data-table">
        <tr>
            <th style="text-align: center;">STT</th>
            <th style="text-align: center">Order ID</th>
            <th style="text-align: center">User</th>
            <th style="text-align: center">
                <img style="width: 25px" src="../PUBLIC-PAGE/images/settingtr.svg">
            </th>
            <th style="text-align: center">Time</th>
            <th style="text-align: center">Status</th>
            <th style="text-align: center">Ship MT</th>
            <th style="text-align: center">Note</th>
        </tr>

        <tr>
            <td style="text-align: center">
                <img type="image" style="width: 25px" src="../PUBLIC-PAGE/images/filter.svg">
            </td>
            <td style="text-align: center" >
                <form action="index.php?pid=1&categoryId=0" method="post" id="myForm">
                    <input name="searchByIdCategory" placeholder="Find category ID" type="text" id="searchByIdCategory">
                </form>
            </td>
            <td style="text-align: center" colspan = 2>
                <form action="index.php?pid=1&categoryId=0" method="post" id="myForm">
                    <input name="searchByNameCategory" placeholder="Find category Name" type="text" id="searchByNameCategory">
                </form>
            </td>
        </tr>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'shopping_online');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $itemsPerPage = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $itemsPerPage;

        $sql = "SELECT shopping_carts.id, shopping_carts.user_id, users.username, shopping_carts.created_at, status_cart.name_status, shipping_methods.method_name, shopping_carts.note
        FROM shopping_carts
        JOIN users ON shopping_carts.user_id = users.id
        JOIN shipping_methods ON shopping_carts.ship_method = shipping_methods.id
        JOIN status_cart ON shopping_carts.status = status_cart.id
        LIMIT $offset, $itemsPerPage";

        $result = $conn->query($sql);

        if (isset($_GET['categoryId'])) {
            $categoryId = $_GET['categoryId'];
            if ($categoryId == '0') {
                include "searching/order-searching.php";
            } else {
                include "searching/order-detail.php";
            }
        } else {
            include "searching/order-detail.php";
        }

        ?>
    </table>
</div>


<script>
    function showButtons(element) {
        var actionButtons = element.querySelector('.action-buttons');
        if (actionButtons) {
            actionButtons.style.display = 'block';
        }
    }

    function hideButtons(element) {
        var actionButtons = element.querySelector('.action-buttons');
        if (actionButtons) {
            actionButtons.style.display = 'none';
        }
    }
</script>
<style>
    .action-buttons {
        z-index: 1.0;
        position: absolute;
        display: flex;
        flex-direction: column;
        margin-left: 30px;
        margin-top: 0px;
        display: none;
    }

    .edit-button {
        border-radius: 10px 10px 0 0;
        border-bottom: 1px solid white;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .edit-button:hover {
        opacity: 0.7;
    }

    .delete-button {
        border-radius: 0 0 10px 10px;
        border: none;
        width: 100%;
    }

    .delete-button:hover {
        opacity: 0.7;
    }

    .action-buttons button {
        padding: 10px 28px 10px 28px;
        background-color: #3b5d50;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
    }

    .category {
        width: 100%;
        margin-top: 20px;
    }

    .category-data-table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
    }

    .category-data-table th,
    .category-data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .category-data-table td {
        height: 50px;
    }

    .category-data-table tr td input {
        width: 80%;
        height: 60%;
        padding: 3px 8px;
        border: #3b5d50 1px solid;
        border-radius: 6px;
    }

    .category-data-table th {
        background-color: #f2f2f2;
    }

    .pagination {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #fff;
        padding: 10px;
    }

    .pagination a {
        padding: 8px;
        text-decoration: none;
        color: #000;
        background-color: #f2f2f2;
        margin-right: 5px;
        border: none;
        border-radius: 4px;
        background-color: #3b5d50;
        padding: 10px 15px;
        color: white;
    }

    .pagination a:hover {
        background-color: #ddd;
    }
</style>