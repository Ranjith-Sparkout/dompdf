<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use URL;
use PDF;
use Excel;
use Illuminate\Http\Request; 
define('BASE_URL', URL::to('/').'/');
class BaseController extends Controller
{ 
    public function dom_pdf()
    { 
        return view('dom-pdf'); 
    }  
    public function downloadPDF($type)
    {
        $datas='';
        $datas = array("tes"=>"val");
        $pdf = PDF::loadView('pdf.users_pdf', compact('datas')); 
        if($type = 1)
        {
            echo "test";
            exit;
         $pdf->download('pdf_new.pdf');  
        }
        else{
            return true; 
        }
       
    }
    public function download_section1(Request $request)
    { 

        $type = $request->type;
        $datas='';
        $datas = array("tes"=>"val"); 
            $pdf = PDF::loadView('pdf.users_pdf', compact('datas'));   
            // return $pdf->download('_'.time().'.pdf');  
            file_put_contents("pdf/".time()."_.pdf", $pdf->output());
            return response(json_encode(array("status"=>"success","msg"=>"download successfully"))); 
    
    } 
    public function download_section(Request $request)
    {  
        $type = $request->type;
        $datas='';
        $datas = array("tes"=>"val");
        $pdf = PDF::loadView('pdf.users_pdf', compact('datas'));   
        return $pdf->download('test1.pdf');       
    }  
    public function download_excel(Request $request)
    { 
       
        Excel::create('Export data', function($excel) {

            $excel->sheet('Sheet 1', function($sheet) {
                $data[] = array(
                    'test1','test2','test3','test4','test5'
                );
                $data[] = array(
                    'test1','test2','test3','test4','test5'
                );
                $sheet->fromArray($data, null, 'A1', false, false);
                $headings = array('date start', 'date end', 'status condition', 'security', 'company'); 
                $sheet->prependRow(1, $headings); 
                // $sheet->fromArray($data);
            });
        })->export('xls');
     
    }  
    public function save_excel(Request $request)
    { 
        Excel::create('excel_data', function($excel) {

            $excel->sheet('Sheet 1', function($sheet) {
                $data[] = array(
                    'test1','test2','test3','test4','test5'
                );
                $data[] = array(
                    'test1','test2','test3','test4','test5'
                );
                $sheet->fromArray($data, null, 'A1', false, false);
                $headings = array('date start', 'date end', 'status condition', 'security', 'company'); 
                $sheet->prependRow(1, $headings); 
                // $sheet->fromArray($data);
            });
        })->store('xls', 'excel');
    // })->store('xls', storage_path('excel'));
    return response(json_encode(array("status"=>"success","msg"=>"download successfully"))); 
    }  
    public function get_excel_data(Request $request)
    { 
     
        return view('excel'); 
    } 
    public function get_data(Request $request) 
    {  
    //  print_R($request->file('file')->getRealPath());
    //  exit;
    $headers = array();
    $data = array();
    $real_path = $request->file('file')->getRealPath();
       $results = Excel::load($real_path)->get(); 
        // print_r($results); 
        $first = $results->first(); 
        $workbookTitle = $results->getTitle();
        // $results = $reader->all();
        
        foreach($first as $k=>$v)
        {
           $headers[] = $k;
        }  

        return view('excel_table',['headers'=>$headers,'data'=>$results]);  
    // foreach($results as $k=>$sheet)
    // { 
    //     foreach($headers as $v)
    // { 
    //     $data[][$v] = $sheet; 
        
    // }
    // }
        // print_r($headers);
        // print_r($data);
        // exit;
    } 
 
}
