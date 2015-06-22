<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class rep extends MY_Controller {
	
	
var $rows;
var $rows1;

	function __construct() {
		
		parent::__construct();


	$this->rows=$this->rep();
	$this->rows1=$this->rep();
	
		
	}
		
		public function index(){
			
			$this->rep();

			
			
			
		}

		public function rep()
		{



			$this->load->library('mpdf/mpdf');

			

			$mpdf = new mPDF('');
			$mpdf->AddPage('C',  // mode - default ''
							'A4-L',  // format - A4, for example, default ''
							0,  // font size - default 0
							'', // default font family
							15, // margin_left
							15, // margin right
							16, // margin top
							16, // margin bottom
							9, // margin header
							9, // margin footer
							'L'); // L - landscape, P - portrait)

			//$stylesheet = file_get_contents('stylesheet.css');

		//	$mpdf->WriteHTML($stylesheet,1);




	if ($_REQUEST['generatereport'])
    {
    	
	    $mfl = $this->input->post('mfl',TRUE);


		$startdate = $this->input->post('startdate',TRUE);	
		

		$enddate = $this->input->post('enddate',TRUE);


		$monthly = $this->input->post('monthly',TRUE);


		
		$monthyear = $this->input->post('monthyear');


		$quarterly = $this->input->post('quaterly');				


		$quarteryear = $this->input->post('quarteryear');


		$yearly = $this->input->post('yearly');


		$specificdate = $this->input->post('specificdate');

		
		if($this->input->post('period') == 'Monthly'){
			
			

			 $sql="SELECT lab_no AS a,End_Time AS b, fullname AS c,gender AS d,age AS e, pat_type AS f, mobile AS g, f.name AS h,  Test_Result AS i,mtbRif AS rif,User as j FROM   sample1 s , facilitys f WHERE s.Refacility = f.facilitycode AND month(End_Time) = '$monthly' AND Year(End_Time) = '$monthyear'   AND cond='1'  AND facility='$mfl'";
			  $sql1="SELECT count(CASE WHEN cond='1' THEN 1 ELSE 0 END ) as tests,sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,sum( CASE WHEN Test_Result =  'negative'  THEN 1 ELSE 0 END) as neg,sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,sum( CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END ) AS errs FROM   sample1 WHERE month(End_Time) = '$monthly' AND Year(End_Time) = '$monthyear' AND cond='1' AND facility='$mfl'";
        }elseif($_POST['period'] == 'Quarterly'){
        	
        	      if ($quarterly==1)
				 {
				     $startmonth=$quarteryear."-01-01";
					 $endmonth=$quarteryear."-03-31";
				 }
				  else if ($quarterly==2)
				 {
				     $startmonth=$quarteryear."-04-01";
					 $endmonth=$quarteryear."-06-30";
				 }else if ($quarterly==3)
				 {
				     $startmonth=$quarteryear."-05-01";
					 $endmonth=$quarteryear."-09-30";
				 }else if ($quarterly==4)
				 {
				     $startmonth=$quarteryear."-10-01";
					 $endmonth=$quarteryear."-12-31";
				 }
        	
             $sql="SELECT lab_no AS a,End_Time AS b, fullname AS c,gender AS d,age AS e, pat_type AS f, mobile AS g, f.name AS h,  Test_Result AS i,mtbRif AS rif,User as j FROM   sample1 s , facilitys f WHERE s.Refacility = f.facilitycode AND End_Time BETWEEN '$startmonth' AND '$endmonth'  AND cond='1'  AND facility='$mfl'  ";
             $sql1="SELECT count(CASE WHEN cond='1' THEN 1 ELSE 0 END ) as tests,sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,sum( CASE WHEN Test_Result =  'negative'  THEN 1 ELSE 0 END) as neg,sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,sum( CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END ) AS errs FROM   sample1 WHERE End_Time BETWEEN '$startmonth' AND '$endmonth' AND cond='1' AND facility='$mfl'";
        
		}elseif($_POST['period'] == 'Yearly'){
              
             $sql="SELECT lab_no AS a,End_Time AS b, fullname AS c,gender AS d,age AS e, pat_type AS f, mobile AS g, f.name AS h,  Test_Result AS i,mtbRif AS rif,User as j FROM   sample1 s , facilitys f WHERE s.Refacility = f.facilitycode AND Year(End_Time) = '$yearly' AND cond='1'  AND facility='$mfl'  ";
             $sql1="SELECT count(CASE WHEN cond='1' THEN 1 ELSE 0 END ) as tests,sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,sum( CASE WHEN Test_Result =  'negative'  THEN 1 ELSE 0 END) as neg,sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,sum( CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END ) AS errs FROM   sample1 WHERE Year(End_Time) = '$yearly' AND cond='1' AND facility='$mfl'";
        
        }elseif($_POST['period'] == 'Date Range'){
              
             $sql="SELECT lab_no AS a,End_Time AS b, fullname AS c,gender AS d,age AS e, pat_type AS f, mobile AS g, f.name AS h,  Test_Result AS i,mtbRif AS rif,User as j FROM   sample1 s , facilitys f WHERE s.Refacility = f.facilitycode AND  End_Time BETWEEN '$startdate' AND '$enddate'  AND cond='1'  AND facility='$mfl'  ";
             $sql1="SELECT count(CASE WHEN cond='1' THEN 1 ELSE 0 END ) as tests,sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,sum( CASE WHEN Test_Result =  'negative'  THEN 1 ELSE 0 END) as neg,sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,sum( CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END ) AS errs FROM   sample1 WHERE End_Time BETWEEN '$startdate' AND '$enddate' AND cond='1' AND facility='$mfl'";
        
        }elseif($_POST['period'] == 'Specific Date'){
              
             $sql="SELECT lab_no AS a,End_Time AS b, fullname AS c,gender AS d,age AS e, pat_type AS f, mobile AS g, f.name AS h, Test_Result AS i,mtbRif AS rif,User as j FROM   sample1 s , facilitys f WHERE s.Refacility = f.facilitycode AND End_Time ='$specificdate'  AND cond='1'  AND facility='$mfl'  ";
        	 $sql1="SELECT count(CASE WHEN cond='1' THEN 1 ELSE 0 END ) as tests, sum( CASE WHEN Test_Result = 'positive' THEN 1 ELSE 0 END ) AS mtb,sum( CASE WHEN Test_Result =  'negative'  THEN 1 ELSE 0 END) as neg,sum( CASE WHEN mtbRif = 'positive' THEN 1 ELSE 0 END ) AS rif,sum( CASE WHEN Test_Result = 'ERROR' THEN 1 ELSE 0 END ) AS errs FROM  sample1 WHERE End_Time ='$specificdate'  AND cond='1'  AND facility='$mfl'";
        
        } 
    }
			
	$result = $this->db->query($sql)->result_array();
	$this->rows = $result;
	$tests= $this->db->affected_rows($rows);
	$result1 = $this->db->query($sql1)->result_array();
	$this->rows1 = $result1;


if ($_REQUEST['generatereport'])
          {
          	if($this->input->post('period') == 'Monthly'){
			             			
	             	//get month n year
					$month = $this->input->post('monthly');
					 if ($month==1)
					 {
					     $monthname=" Jan ";
					 }
					else if ($month==2)
					 {
					     $monthname=" Feb ";
					 }else if ($month==3)
					 {
					     $monthname=" Mar ";
					 }else if ($month==4)
					 {
					     $monthname=" Apr ";
					 }else if ($month==5)
					 {
					     $monthname=" May ";
					 }else if ($month==6)
					 {
					     $monthname=" Jun ";
					 }else if ($month==7)
					 {
					     $monthname=" Jul ";
					 }else if ($month==8)
					 {
					     $monthname=" Aug ";
					 }else if ($month==9)
					 {
					     $monthname=" Sep ";
					 }else if ($month==10)
					 {
					     $monthname=" Oct ";
					 }else if ($month==11)
					 {
					     $monthname=" Nov ";
					 }
					  else if ($month==12)
					 {
					     $monthname=" Dec ";
					 }
					$monthyear = $this->input->post('monthyear');
					$dt= $monthname .'- '.  $monthyear;	
			           
        }elseif($this->input->post('period') == 'Quarterly'){
        	//get quarterly
				$quarterly = $this->input->post('quarterly');
				 if ($quarterly==1)
				 {
				     $monthname=" January-March ";
				 }
				else if ($quarterly==2)
				 {
				     $monthname=" April-June ";
				 }else if ($quarterly==3)
				 {
				     $monthname=" July-October ";
				 }else if ($quarterly==4)
				 {
				     $monthname=" November-December ";
				 }
				$quarteryear = $this->input->post('quarteryear');	
				$dt= $monthname . $quarteryear;
		}elseif($_POST['period'] == 'Yearly'){
                
				//get yearly
                $yearly = $this->input->post('yearly');
                $dt= $yearly;
        }
		
		if($county==0){
			 
              $title=" All Counties";
			}
			else if($county>0 and $facility==0){
				$query_str="SELECT name AS cN FROM countys WHERE ID ='$county'";
				$result = $this->db->query($query_str)->result_array();
				
			    $countyname=$result['cN'];
				$title="All facilities in " .$countyname. " County";
			}
			else if($county>0 and $facility>0){
				$query_str="SELECT name AS cN FROM countys WHERE ID ='$county'";
				$result = $this->db->query($query_str)->result_array();
				
			    $countyname=$result['cN'];
				$title="Specific facilities in " .$countyname. " County";
			}
             		
		
		
 }

	//--------------------------------------------------------------------------------------------


			$html='<style>
					table {margin-bottom: 1.4em; width: 100%;}
					th {font-weight: bold; font-size:11px;text-align:center;}
					thead th {background: #C3D9FF;}
					th,td,caption {padding: 4px 10px 4px 5px;}
					tr.even td {background: #F2F6FA;}
					tfoot {font-style: italic;}
					caption {background: #EEE;}
					
					table.data-table {
						border: 1px solid #CCB;
						margin-bottom: 0em;
						width: auto;
						text-align:center;
					}
					table.data-table th {
						background: #F0F0F0;
						border: 1px solid #DDD;
						color: #555;
						text-align:center;
					}
					table.data-table tr {border-bottom: 1px solid #DDD;}
					table.data-table td, table th {padding: 7px;}
					table.data-table td {
						background: #F6F6F6;
						border: 1px solid #DDD;
						font-size:11px;
					}
					table.data-table tr.even td {background: #FCFCFC;}
					
					</style>';
	$html .= '<img style="margin-left: 18%;" src="../img/logo.png" />';
	$html .= '<h4>'.$facilityname.' GeneXpert Register For The Period:  '.$dt.'</h4>';
	$html .= '<table border="1" class = "data-table" align="center">';
	$html .= '
	<thead><tr>
	<th style="text-align:center">Lab No.</th>
	<th style="text-align:center">Date Tested</th>
	<th style="text-align:center">Patient Name</th>
	<th style="text-align:center">Gender</th>
	<th style="text-align:center">Age</th>
	<th style="text-align:center">Patient Type</th>
	<th style="text-align:center">Mobile No.</th>
	<th style="text-align:center">Referred Facility</th>
	<th style="text-align:center">MTB Result</th>
	<th style="text-align:center">MTB/RIf Result</th>
	<th style="text-align:center">Technician</th>
	</tr></thead><tbody>';

if(is_array($this->rows)){

	foreach ($this->rows as $value )
	
					{

	
	$html .= '
	<tr class"odd">
	<td style="text-align:center">'.$value['a'].'</td>
	<td style="text-align:center">'.$value['b'].'</td>
	<td style="text-align:center">'.$value['c'].'</td>
	<td style="text-align:center">'.$value['d'].'</td>
	<td style="text-align:center">'.$value['e'].'</td>
	<td style="text-align:center">'.$value['f'].'</td>
	<td style="text-align:center">'.$value['g'].'</td>
	<td style="text-align:center">'.$value['h'].'</td>
	<td style="text-align:center">'.$value['i'].'</td>
	<td style="text-align:center">'.$value['rif'].'</td>
	<td style="text-align:center">'.$value['j'].'</td>
	</tr>';
	}
}

if(is_array($this->rows1)){

	foreach ($this->rows1 as $value1 )
					
					{


	$html .= '</tbody></table>';
	$html .= '<table border="1" class = "data-table" align="center">
	<tbody><tr class"odd">
	<th style="text-align:center">No.of tests done</th>
	<td style="text-align:center">'.$value1['tests'].'</td>
	<th style="text-align:center">No.of MTB Pos</th>
	<td style="text-align:center">'.$value1['mtb'].'</td>
	<th style="text-align:center">No.of MTB Neg</th>
	<td style="text-align:center">'.$value1['neg'].'</td>
	<th style="text-align:center">No.of MTB Rif</th>
	<td style="text-align:center">'.$value1['rif'].'</td>
	<th style="text-align:center">No.of Test with Errors</th>
	<td style="text-align:center">'.$value1['errs'].'</td>';
	$html .= '</tbody></table>';

}
	}

	$mpdf->WriteHTML($html);
	$mpdf->Output();

			//die();


	


		}







}