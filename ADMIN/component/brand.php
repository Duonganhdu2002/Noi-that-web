<div class="brand">
    <table class='brand-data-table'>

        <tr>
            <th style='text-align: center;'>STT</th>
            <th style='text-align: center'>ID</th>
            <th style='text-align: center'>
                <img style='width: 25px' src='../PUBLIC-PAGE/images/settingtr.svg'>
            </th>
            <th style='text-align: center'>Brand Name</th>
            <th style='text-align: center'>Description</th>
        </tr>

        <tr>
            <td style='text-align: center'>
                <img style='width: 25px' src='../PUBLIC-PAGE/images/filter.svg'>
            </td>
            <td style='text-align: center' colspan='2'>
                <form action="index.php?pid=3&brandId=0" method="post" id="myForm">
                    <input name="searchByIdBrand" id='searchByIdBrand' placeholder="Find brand ID" type="text">
                </form>
            </td>
            <td style='text-align: center'>
                <form action="index.php?pid=3&brandId=0" method="post" id="myForm">
                    <input name="searchByNameBrand" id='searchByNameBrand' placeholder="Find brand Name" type="text">
                </form>
            </td>
        </tr>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'shopping_online');

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Định số mục trên mỗi trang
        $itemsPerPage = 8;

        // Lấy trang hiện tại từ tham số truyền vào hoặc mặc định là trang 1
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Tính offset để lấy dữ liệu từ database
        $offset = ($page - 1) * $itemsPerPage;

        // Lấy dữ liệu từ bảng brands với giới hạn số dòng và offset
        $sql = "SELECT id, brand_name, description, logo FROM brands LIMIT $offset, $itemsPerPage";
        $result = $conn->query($sql);

        if (isset($_GET['brandId'])) {
            $brandId = $_GET['brandId'];
            if ($brandId == '0') {
                include "searching/brand-searching.php";
            } else {
                include "searching/brand-detail.php";
            }
        } else {
            include "searching/brand-detail.php";
        }
        ?>
      </table>   
</div>

<style>
    .brand {
        width: 100%;
        margin-top: 20px;
    }

    .brand-data-table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
    }

    .brand-data-table th,
    .brand-data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .brand-data-table td {
        height: 50px;
    }

    .brand-data-table tr td input {
        width: 80%;
        height: 60%;
        padding: 3px 8px;
        border: #3b5d50 1px solid;
        border-radius: 6px;
    }

    .brand-data-table th {
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