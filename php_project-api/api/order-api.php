<?php
     function getOrderByPage($id){
        $order = Orders::readByPage($id);
       echo json_encode($order);  
     }

?>