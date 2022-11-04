<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ExcelController extends Controller
{

    public function upload(Request $request)
    {
        $this->validate($request, [
            'uploaded_file' => 'required|file|mimes:csv'
        ]);

        $file_name = time() . '-product.' . $request->file('uploaded_file')->getClientOriginalExtension();
        $file_path = $request->file('uploaded_file')->storeAs('uploads', $file_name);

        $file_data = fopen($request->file('uploaded_file'), 'r');

        $result = $this->createTable($file_data);

        echo $result;
    }

    protected function createTable($file_data)
    {
        try {
            $heading = $this->getHeading($file_data);
            // $create_table_heading = join(
            //     ', ',
            //     array_map(
            //         function ($field) {
            //             return "$field VARCHAR(255) NULL";
            //         },
            //         $heading
            //     )
            // );

            // Schema::dropIfExists('product');
            // $query = "CREATE TABLE IF NOT EXISTS product ($create_table_heading) ";
            // DB::statement($query);

            try{
                $this->createData($file_data, $heading);
            }
            catch(Exception $ex){
                return $this->getExceptionMessage($ex);
            }

            return json_encode(
                array(
                    'status' => 'true',
                    'message' => 'Data imported successfully'
                )
            );

        } catch (Exception $ex) {
            return $this->getExceptionMessage($ex);
        }
    }


    protected function getExceptionMessage($ex){
        $code = $ex->getCode();
        $message = $ex->getMessage();
        $file = $ex->getFile();
        $line = $ex->getLine();

        return json_encode(
            array(
                'status' => 'false',
                'message' => "Exception thrown in $file on line $line: [Exception Code: $code] $message"
            )
        );
    }

    protected function createData($file_data, $heading){
        $heading = '('.implode(",", $heading).')';
        while ($row = fgetcsv($file_data, 0, ',')) {
            $value = '(';
            for($i=0; $i<count($row); $i++){
                if($row[$i] != NULL){
                    if($i == count($row)-1) $value .= "'".str_replace("'", "", $row[$i])."'";
                    else $value .= "'".str_replace("'", "", $row[$i])."',";
                }else{
                    if($i == count($row)-1) $value .= 'null';
                    else $value .= 'null'.',';
                }
            }
            $value .= ')';

            $value =  rtrim($value, ',');
            $query = "INSERT INTO product $heading VALUES $value";
            $query = trim($query);
            DB::statement($query);
        }
    }

    protected function getHeading($file_data){
        $heading = array_map(
            function ($field) {
                return $field;
            },
            fgetcsv($file_data, 0, ',')
        );
        return $heading;
    }

}
