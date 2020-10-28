<?php
        function validateRoute($servername,$request_url,$foldername){

            $url = "http://" . $servername . $request_url;
            
            if (strpos($url, "http://localhost/view/$foldername/") !== false) {
                $found = true;
                
            }else{

                $found = false;
            }
            
            return $found;
        }

?>