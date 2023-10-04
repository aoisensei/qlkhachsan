<?php
    class adCSKH extends Controller {
        public function __construct() {
            $this->feedback = $this->model("QLPhanHoi");
        }

        function Show(){
            $listPhanHoi = $this->model("QLPhanHoi");

            $this->view("app",[
                "layout"=>"admin",
                "folder"=> "adFeedBack",
                "file" => "listFeedback",
                "listFeedback" => $listPhanHoi->GetPhanHoi(),
            ]);
        }

        function update($maphanhoi, $cookieValue) {
            $result_mess = false;
            $findFeedback = $this->feedback->GetPhanHoiById($maphanhoi);

            if (isset($_POST['btn-cskh'])) {
                if (empty($_POST['nhanvienph'])) {{
                    $this->view("app", [
                        "layout" => "admin",
                        "folder" => "adFeedback",
                        "file" => "editFeedback",
                        "findCSKH" => $findFeedback,
                        'result'=> $result_mess,
                      ]);
                }}
                else {
                    $result = $this->feedback->ChamSocKH($cookieValue, $_POST['nhanvienph'], $maphanhoi);
                    header('location: /qlkhachsan/adCSKH');
                }
            }

            $this->view("app", [
                "layout" => "admin",
                "folder" => "adFeedback",
                "file" => "editFeedback",
                "findCSKH" => $findFeedback,
              ]);

        }

    }

?>