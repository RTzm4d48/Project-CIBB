<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');
require_once (URL_PROJECT. '/app/model/connection.php');
/* -- */
class CRUD_FO_ACCESS extends Connection{

    function __construct(){
        $this->connect();
    }
    function crud_obtain_id_fo($fo_code){
        $pr=$this->conn->prepare("SELECT fo_id FROM `f_o` WHERE fo_code = '".$fo_code."';");
        $pr->execute();
        $pr->store_result();
        if($pr->num_rows==0){echo"<div style='color: white;font-family:Arial;text-align:center;width:90%;margin:0px auto'>";
        exit('<h1>Error #404 <br> vuelva a intentarlo mas tarde</h1>');echo"</div>";
        }else{
            $pr->bind_result($fo_id);
            while($pr->fetch()){$pr->close();return$fo_id;}
        }
    }
    function crud_select_tree_users_img($id_fo){
        $pr=$this->conn->prepare("SELECT us_id,us_img_little FROM `the_user` WHERE fo_id=".$id_fo." LIMIT 3;");
        $pr->execute();
            $pr->store_result();
            if($pr->num_rows<=2){$pr->close();return null;}
            else{
                //crear una carpeta
                $ruta=URL_PROJECT."/public/tmp/all_img_users";
                if(!file_exists($ruta)){
                    mkdir($ruta,0700);
                }
                $data_id=[];
                $pr->bind_result($id_user,$us_img_little);
                while($pr->fetch())
                {
                    $img_little=stripslashes(base64_decode($us_img_little));
                    $ruta=URL_PROJECT."/public/tmp/all_img_users/user_".$id_user."_img.jpg";
                    $this->base64_to_jpeg($img_little,$ruta);
                    array_push($data_id,$id_user);
                }
                $pr->close();return $data_id;
            }
    }
    function base64_to_jpeg($base64_string,$output_file) {
        $ifp=fopen($output_file,"wb");
        fwrite($ifp,$base64_string);
        fclose($ifp);
    }
    function crud_select_num_all_user($id_fo){
        $pr=$this->conn->prepare("SELECT us_id FROM `the_user` WHERE fo_id=".$id_fo.";");
        $pr->execute();
        $pr->store_result();
        $num=$pr->num_rows();
        $pr->close();return $num;
    }
    function crud_select_users($id_fo){
        $pr=$this->conn->prepare("SELECT us_id,us_user,us_state,us_rank,us_point,us_img_little,us_premium FROM `the_user` WHERE fo_id=".$id_fo.";");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($id_user,$us_user,$us_state,$us_rank,$us_point,$us_img_little,$us_premium);
        
        $data_officer=[];
        $data_legend=[];

        $data_lider=[];
        $data_officer_all=[];
        $data_legend_all=[];

        $i_officer=0;
        $i_legend=0;

        $ruta=URL_PROJECT."/public/tmp/all_img_users";
        if(!file_exists($ruta)){
            mkdir($ruta,0700);
        }

        while($pr->fetch())
        {
            if($us_rank=='Oficial'){$data_officer=[$id_user,$us_user,$us_state,$us_rank,$us_point,$us_premium];array_push($data_officer_all,$data_officer);$i_officer++;}
            else if($us_rank=='Leyenda'){$data_legend=[$id_user,$us_user,$us_state,$us_rank,$us_point,$us_premium];array_push($data_legend_all,$data_legend);$i_legend++;}
            else array_push($data_lider,$id_user,$us_user,$us_state,$us_rank,$us_point,$us_premium);

            $img_little=stripslashes(base64_decode($us_img_little));
            $ruta=URL_PROJECT."/public/tmp/all_img_users/user_".$id_user."_img.jpg";
            $this->base64_to_jpeg($img_little,$ruta);

        }
        $data=['lider'=>$data_lider,'officers'=>$data_officer_all,'legends'=>$data_legend_all,'num_officers'=>$i_officer,'num_legends'=>$i_legend];
        $pr->close();return $data;
    }

    function crud_select_rules($id_fo){
        $pr=$this->conn->prepare("SELECT `rf_rule` FROM `rules_fo` WHERE fo_id=$id_fo;");
        $pr->execute();
        $pr->store_result();
        $num=$pr->num_rows();
        $pr->bind_result($rf_rule);
        $data=[];
        while($pr->fetch())
        {
            array_push($data,$rf_rule);
        }
        $all_data=['num_rules'=>$num,'rules'=>$data];
        $pr->close();return $all_data;
    }
    function crud_select_prohibitions($id_fo){
        $pr=$this->conn->prepare("SELECT `pf_prohibition` FROM `prohibition_fo` WHERE fo_id=$id_fo;");
        $pr->execute();
        $pr->store_result();
        $num=$pr->num_rows();
        $pr->bind_result($pf_prohibition);
        $data=[];
        while($pr->fetch())
        {
            array_push($data,$pf_prohibition);
        }
        $all_data=['num_prohibitions'=>$num,'prohibitions'=>$data];
        $pr->close();return $all_data;
    }
    
}
?>