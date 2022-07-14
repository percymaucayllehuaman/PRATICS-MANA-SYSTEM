<?php

    class DB_PDO{

        public static function connect(){
            try {
                //$link = new PDO(SGBD,DB_USER,DB_PASSWORD);
                $link = new PDO(SGBD,DB_USER,DB_PASSWORD);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET NAMES 'utf8'");
                return $link;
            }catch(PDOException $e){
                die(sprintf('No  hay conexión a la base de datos, hubo un error: %s', $e->getMessage()));
            }
        }

        public static function run_simple_query($query){
            try{
                $answer = self::connect()->prepare($query);
                $answer->execute();
                return $answer;
            }catch(Exception $e){
                throw $e;
            }
        }

        public  function encryption($string){

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
            return $output;
            
		}
		public  function decryption($string){

			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
            return $output;
            
        }
        protected function random_code($letter,$length,$number){

            for($i=1; $i<=$length ; $i++){
                $num = rand(0,9);
                $letter.=$num;
            }
            return $letter.$number;

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

   
    

    
