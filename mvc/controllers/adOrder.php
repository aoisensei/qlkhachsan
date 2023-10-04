<?php
class adOrder extends Controller
{
    public $Order;
    public function __construct()
    {
        $this->Order = $this->model("Order");
    }

    function Show()
    {
        $listOrder = $this->model("Order");

        $this->view("app", [
            "layout" => "admin",
            "folder" => "adOrder",
            "file" => "listOrder",
            "listOrder" => $listOrder->GetAllOrder(),
        ]);
    }

    public function delete($idBooking)
    {
        $this->Order->delete($idBooking);

        header('location: /qlkhachsan/adOrder');
    }

    public function search()
    {
        $listSearchOrder = $this->model("Order");
        if (isset($_POST['search'])) {
            $namekey = $_POST['namekey'];
            $result = $this->Order->searchOrder($namekey);
            if ($result) {

                $this->view("app", [
                    "layout" => "admin",
                    "folder" => "adOrder",
                    "file" => "searchOrder",
                    "listSearchOrder" => $listSearchOrder->searchOrder($namekey),
                ]);
            } else {
                echo "Không tồn tại";
            }
        }
    }
};
