<?php 
/**
* Name:  FPDF
* 
* Author: Jd Fiscus
* 	 	  jdfiscus@gmail.com
*         @iamfiscus
*          
*
* Origin API Class: http://www.fpdf.org/
* 
* Location: http://github.com/iamfiscus/Codeigniter-FPDF/
*          
* Created:  06.22.2010 
* 
* Description:  This is a Codeigniter library which allows you to generate a PDF with the FPDF library
* 
*/
		require_once APPPATH.'third_party/fpdf/FPDF.php';
class fpdf_gen extends FPDF {
		

	public function __construct() {
		
		
		$pdf = new FPDF();
		$pdf->AddPage();
		
		$CI =& get_instance();
		$CI->fpdf = $pdf;
		
	}
	
}
?>