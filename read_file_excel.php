<?php

include_once 'validate_login.php';

try {
    //seting email y template
    include_once 'setting_email.php';

    //library to open the file y save
    include_once 'library/PHPExcel/class.upload.php';

    // library  excel reading 
    require_once 'library/PHPExcel/PHPExcel.php';

    //Queries Splynx
    include_once 'splynx_queries.php';

    Queries::log('------- PROCESO INICIADO ---------');

    //Get toker admin
    $token = Queries::token();

    if (isset($_FILES["file"])) {

        //rename file
        $_FILES["file"]["name"] = "recargo_automatico_" . date("d-m-Y");

        //get file upload
        $up_file = new Upload($_FILES["file"]);

        //path to save the file in the document folder
        $up_file->Process("./documents/");

        //start process
        $up_file->Process();


        //save the file in the folder
        $file = "documents/" . $up_file->file_dst_name;

        //FileType
        $filetype = PHPExcel_IOFactory::identify($file);

        //read file
        $objReader = PHPExcel_IOFactory::createReader($filetype);

        //loading the file
        $objPHPExcel = $objReader->load($file);

        $sheet = $objPHPExcel->getSheet(0);

        //get the rows
        $highestRow = $sheet->getHighestRow();

        //It will start with the row since it has a header at the beginning
        //looping through the rows will get the cells
       
        for ($row = 3; $row <= $highestRow; $row++) {

            //if in case the token expired this function renew the token
            if (time() > intval($token[0])) {
                $token = Queries::renew_token($token[2]);
            }
            $customer        = $sheet->getCell("B" . $row)->getValue();
            $record          = $sheet->getCell("C" . $row)->getValue();
            $application_day = $sheet->getCell("D" . $row)->getValue();
            #$date_generator  = $application_day . "/" . date('m') . "/" . date('Y'); #generate the date since the excel file only brings the day
            $charges_type    = $sheet->getCell("E" . $row)->getValue();
            $amount          = $sheet->getCell("F" . $row)->getValue();
            $pending_charges = $sheet->getCell("G" . $row)->getValue();
            $email  = $sheet->getCell("H" . $row)->getValue();
            #$email = Queries::get_email_customer($token[1], $record);
            #echo $customer . " | " . $record . " | " . $application_day . " | " . $charges_type . " | " . $amount . " | " . $pending_charges . " | " . $email . " <br>";
            Queries::payment($token[1], $record, $application_day, $amount);
            Email::send_email($customer, $application_day, $amount, $email);
        } //end for


        Queries::log('La información se ha importado con éxito en splynx');
        Queries::log('------- PROCESO FINALIZADO ---------');
        // if everything was correct it redirects you to the home page
        //In case of an error, it will show the message on the web
        #header('Location: upload_file.php?status=1');
    }
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    Queries::log('Excepción capturada: ',  $e->getMessage());
}
