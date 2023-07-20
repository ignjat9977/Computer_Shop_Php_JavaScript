<?php
    session_start();
    include "../../config/connection.php";
    include "../functions.php";
    include('../../composer/Classes/PHPExcel.php');
    if(isset($_POST["btn"])){
 
        $objPHPExcel    =   new PHPExcel();
        $spent = user_spent();
                                
        
        $objPHPExcel->setActiveSheetIndex(0);
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'User email');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Spends');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Date');
        
        $objPHPExcel->getActiveSheet()->getStyle("A1:C1")->getFont()->setBold(true);
        
        $rowCount   =   2;
        foreach($spent as $s){
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $s->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($s->amount,'UTF-8'));
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($s->date,'UTF-8'));
            $rowCount++;
        }
        
        
        $objWriter  =   new PHPExcel_Writer_Excel2007($objPHPExcel);
        
        
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="order-table.xlsx"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
        $objWriter->save('php://output');
    }else{
        redirect("404.php");
    }