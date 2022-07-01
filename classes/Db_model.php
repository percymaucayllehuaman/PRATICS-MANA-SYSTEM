<?php
    // if($ajaxRequest){
    //     require_once "../Core/config.php";
    // }else{
    //     require_once "./Core/config.php";
    // }
    require_once ("core/settings.php");
    require_once "core/config.php";
    require_once "core/general_config.php";

    class DB_PDO{

        public function connect(){
            try {
                $link = new PDO(SGBD,DB_USER,DB_PASSWORD);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET NAMES 'utf8'");
                return $link;
            }catch(PDOException $e){
                die(sprintf('No  hay conexión a la base de datos, hubo un error: %s', $e->getMessage()));
            }
        }

        public function run_simple_query($query){
            try{
                $answer=$this->connect()->prepare($query);
                $answer->execute();
                return $answer;
            }catch(Exception $e){
                throw $e;
            }
        }

        public function first_data($table){
            try {
                $answer=$this->connect()->prepare("select * from ".$table." limit 1");
                $answer->execute();
                return $answer;

            }catch(Exception $e){
                throw $e;
            }
            
        }
        public function last_data($table, $order_by){
            try {
                $answer=$this->connect()->prepare("select * from ".$table." order by ".$order_by." desc limit 1");
                $answer->execute();
                return $answer;

            }catch(Exception $e){
                throw $e;
            }
            
        }

        // protected function sweet_alert($data){
        //     if($data['Alert']=="simple"){
        //         $alert="
        //             <script>
        //             Swal.fire({
        //                     title: '".$data['title']."',
        //                     text: '".$data['text']."',
        //                     icon: '".$data['icon']."',
        //                     showConfirmButton: false,
        //                     timer: 1500
        //                 });
        //             </script>
                 
        //         ";
        //     }elseif($data['Alert']=="sales"){ 
        //         $alert="
        //             <script>
        //             Swal.fire({
        //                     title: '".$data['title']."',
        //                     text: '".$data['text']."',
        //                     icon: '".$data['icon']."',
        //                     confirmButtonText: 'Aceptar'
        //                 }).then((result) => {
        //                     if (result.value) {
        //                         window.location.href='".base_url()."/sales_list/';
        //                     } 
        //                 });
        //             </script>
        //     ";
        //     }elseif($data['Alert']=="recharge"){ 
        //         $alert="
        //             <script>
        //             Swal.fire({
        //                     title: '".$data['title']."',
        //                     text: '".$data['text']."',
        //                     icon: '".$data['icon']."',
        //                     confirmButtonText: 'Aceptar'
        //                 }).then((result) => {
        //                     if (result.value) {
        //                         location.reload();
        //                     }
        //                 });
        //             </script>
        //     ";
        //     }elseif($data['Alert']=="clean"){
        //         $alert="
             
        //             <script>
        //             Swal.fire({ 
        //                 title: '".$data['title']."',
        //                 text: '".$data['text']."',
        //                 icon: '".$data['icon']."',
        //                 showConfirmButton: false,
		// 	            timer: 1500,
        //                 confirmButtonText: 'Aceptar'
        //             }).then(function () {
        //                 $('#form')[0].reset();
        //             });
        //         </script>
        //     ";
        //     }
        //     return $alert;
        // }
    }

   
    

    
