<?php
    require_once '../models/database.php';
     spl_autoload_register(function($class){
          require '../models/' . $class . ".php";
     });
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $id = (int)($id);
        $productModel = new productsModel;
        $trangThaiModel = new trangThaiModel;
        $loaiModel = new loaiModel;
        $body = "";
        $selectTrangThai = "<select name='editTrangThai' id='editTrangThai'>";
        $option = "";
        $selectLoai = "<select name='editLoai' id='editLoai'>";
        if(!empty($productModel->getIDProduct($id))){
            foreach($productModel->getIDProduct($id) as $array){
                foreach($trangThaiModel->getAllTrangThai() as $arrayTT){
                    if($arrayTT['ID_TrangThai'] == $array['ID_TrangThai']){
                        $selectTrangThai .= "
                                    <option selected value='".$arrayTT['ID_TrangThai']."'>".$arrayTT['TenTrangThai']."</option>
                                    ";
                    }
                    else{
                        $selectTrangThai .= "<option value='".$arrayTT['ID_TrangThai']."'>".$arrayTT['TenTrangThai']."</option>";
                    }   
                }
                foreach($loaiModel->getAllLoai() as $arrayL){
                    if($arrayL['ID_LoaiGiayDep'] == $array['ID_LoaiGiayDep']){
                        $selectLoai .= "
                                    <option selected value='".$arrayL['ID_LoaiGiayDep']."'>".$arrayL['TenLoai']."</option>
                             
                                    ";
                    }
                    else{
                        $selectLoai .= "<option value='".$arrayL['ID_LoaiGiayDep']."'>".$arrayL['TenLoai']."</option>";
                    }   
                }
                $selectTrangThai .= "</select>";
                $selectLoai .= "</select>";
                //<input type="hidden" name="" id="idGiayDep" value="<?= $array['ID_GiayDep']>
                $body = "<input type='hidden'  name='idGiayDep' value='".$array['ID_GiayDep']."'>
                        <p>T??n :</p><input type='text' value='".$array['TenGiayDep']."' name='editTen' >
                        <p>???nh :</p><img style='width: 90px;height:120px' src= '../../public/images/".$array['Anh']."'> 
                        <input type='file' name='anhEdit' >
                        <p>Gi?? :</p><input type='number' name='editGia' value='".$array['Gia']."'>
                        <p>Tr???ng th??i :</p>$selectTrangThai
                        <p>Lo???i :</p>$selectLoai
                        <p>Xu???t x??? : </p><input type='text' name='editXuatXu' value='".$array['XuatXu']."'>
                        <p>Ch???t li???u : </p><input type='text' name='editChatLieu' value='".$array['ChatLieu']."'>
                        ";
                        echo $body ;
            }
        }
    }
    if(isset($_GET['idDelete'])){
        $id = $_GET['idDelete'];
        $id = (int)($id);
        $productModel = new productsModel;
        $trangThaiModel = new trangThaiModel;
        $loaiModel = new loaiModel;
        $body = "";
        if(!empty($productModel->getIDProduct($id))){
            foreach($productModel->getIDProduct($id) as $array){
                $body = "<input type='hidden'  name='idDelete' value='".$array['ID_GiayDep']."'>
                        <p>B???n c?? ch???c ch???n x??a?</p>
                        ";
                        echo $body ;
            }
        }
    }
?>