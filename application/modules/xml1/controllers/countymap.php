<?php
if (!defined('BASEPATH'))
	
     exit('No direct script access allowed');



class countymap extends MY_Controller {

	var $county;
	var $siteC;
	var $MTBnegC;
	var $MTBposC;
	var $RifResC;
	var $testC;
	var $previousmonth;
	var $currentyear;

	function __construct() {
		
		parent::__construct();

	$county = $this->input->post('id',TRUE);

	$this->previousmonth= @date("m")- 1 ;
	$this->currentyear= @date("Y");	
	$this->siteC=$this->GetAllGeneSitesInCounty($this->county);
	$this->MTBnegC = $this->getmtbnegpercounty($this->county);
	$this->MTBposC = $this->getmtbpospercounty($this->county);
	$this->testC = $this->gettestsdonepercounty($this->county);	
	$this->RifResC = $this->getmtbrifpercounty($this->county);

}
		public function index(){
			
			$this->countyall_();
			
			
			
		}

		public function countymap_(){



			
			$county = $this->input->post('id',TRUE);

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');

        	$data['siteC'] = $this->GetAllGeneSitesInCounty($this->county);
        	$data['MTBnegC'] = $this->getmtbnegpercounty($this->county);
        	$data['MTBposC'] = $this->getmtbpospercounty($this->county);
        	$data['testC'] = $this->gettestsdonepercounty($this->county);
        	$data['RifResC'] = $this->getmtbrifpercounty($this->county);
        	
            $data['currentmonth'] = $this->get_county_chart_();
       		$data['currentyear'] = $this->get_county_chart_();
       		$data['previousmonth'] = $this->get_county_chart_();
        	//$countyall_data = $this->countyfmap_m->countyall_xml();
        
        	//$data['countyall_data'] = $countyall_data;

        	//$this->load->load_allocation('countyall_v');





		}

		public function get_national_outcome_chart_(){

			$query_str ="SELECT ID AS a  ,name from countys as b";
			 $result = $this->db->query($query_str)->result_array();
           
			


			        $county_name = array();
			        $map =$title= $data=null;
			        $datas = array();
			        $status = '';


			$colors=array("FFFFCC"=>"1","E2E2C7"=>"2","FFCCFF"=>"3","F7F7F7"=>"5","FFCC99"=>"6","B3D7FF"=>"7","CBCB96"=>"8","FFCCCC"=>"9");
            $map .= "<map showBevel='0' showMarkerLabels='1' caption='$title'  fillColor='F1f1f1' borderColor='000000' hoverColor='efeaef' canvasBorderColor='FFFFFF' baseFont='Verdana' baseFontSize='10' markerBorderColor='000000' markerBgColor='FF5904' markerRadius='6' legendPosition='bottom' useHoverColor='1' showMarkerToolTip='1'  showExportDataMenuItem='1' >";


		    foreach ($result as $counties) {

		           


					 $countyid=$counties['a'];
				   	 $countyname=trim($counties['name']);

				   	 
				   	 $siteC=$this->GetAllGeneSitesInCounty($counties["a"]);
				   	 $MTBnegC = $this->getmtbnegpercounty($counties["a"]);
        			 $MTBposC = $this->getmtbpospercounty($counties["a"]);
		        	 $testC = $this->gettestsdonepercounty($counties["a"]);
		        	 $RifResC = $this->getmtbrifpercounty($counties["a"]);

				   	


				   	$data .= "<entity link='countyview/$countyid' id='$countyid' displayValue ='$countyname' color='" . array_rand($colors,1) . "'  toolText='County :$countyname&lt;BR&gt; Total Tests:".$this->testC."&lt;BR&gt; MTB Positive :".$this->MTBposC." &lt;BR&gt; Not Detected:".$this->MTBnegC."  &lt;BR&gt; RIF Resistsnt:".$this->RifResC." &lt;BR&gt; GeneXpert Sites:".$this->siteC."'/>";
		 

				   }




		           $map .= "<data>";
			        $map .= $data;
			        $map .= "</data>
						    <styles> 
						    <definition>
						    <style name='TTipFont' type='font' isHTML='1'  color='FFFFFF' bgColor='666666' size='11'/>
						    <style name='HTMLFont' type='font' color='333333' borderColor='CCCCCC' bgColor='FFFFFF'/>
						    <style name='myShadow' type='Shadow' distance='1'/>
						    </definition>
						    <application>
						    <apply toObject='MARKERS' styles='myShadow' /> 
						    <apply toObject='MARKERLABELS' styles='HTMLFont,myShadow' />
						    <apply toObject='TOOLTIP' styles='TTipFont' />
						    </application>
						    </styles>
						    </map>";


							echo $map;
							    } 






		

			public function gettestsdonepercounty($county){
	
					 $query_str="SELECT COUNT(*) FROM sample 
					LEFT  JOIN `facilitys` ON `sample`.`facility` = `facilitys`.`ID`
					LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
					LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
					LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
					WHERE  `countys`.`ID` ='$county' AND  cond='1'";	

					$result = $this->db->query($query_str)->result_array();
					
					$this->testC = count($result[0]);
					return $this->testC;
						
	}

			public function getmtbpospercounty($county){
					$query_str="SELECT 
					sum(CASE WHEN Test_Result = 'MTB DETECTED HIGH; Rif Resistance NOT DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance NOT DETECTED'OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance NOT DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance NOT DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE'  OR  Test_Result = 'MTB DETECTED HIGH; Rif Resistance DETECTED' OR  Test_Result = 'MTB DETECTED LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance DETECTED' THEN 1 ELSE 0 END ) AS mtbpos
					FROM sample 
					LEFT  JOIN `facilitys` ON `sample`.`facility` = `facilitys`.`ID`
					LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
					LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
					LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
					WHERE  `countys`.`ID` ='$county'";

					$result = $this->db->query($query_str)->result_array();
					$this->MTBposC = count($result[0]['mtbpos']);
					return $this->MTBposC;
 
	}

			public function getmtbnegpercounty($county){
					$query_str="SELECT sum( CASE WHEN Test_Result = 'MTB NOT DETECTED' THEN 1 ELSE 0 END ) AS MTBNEG
					FROM sample 
					LEFT  JOIN `facilitys` ON `sample`.`facility` = `facilitys`.`ID`
					LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
					LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
					LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
					WHERE  `countys`.`ID` ='$county'";	

					$result = $this->db->query($query_str)->result_array();
					$this->MTBnegC = count($result[0]['MTBNEG']);
					return $this->MTBnegC;
						
				}
				
			public function getmtbrifpercounty($county){
					$query_str="SELECT 
					sum( CASE WHEN Test_Result = 'MTB DETECTED HIGH; Rif Resistance DETECTED' OR Test_Result = 'MTB DETECTED LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED MEDIUM; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance DETECTED'  OR  Test_Result = 'MTB DETECTED VERY LOW; Rif Resistance INDETERMINATE' THEN 1 ELSE 0 END ) AS mtbrif
					FROM sample 
					LEFT  JOIN `facilitys` ON `sample`.`facility` = `facilitys`.`ID`
					LEFT  JOIN `districts` ON `districts`.`ID` = `facilitys`.`district`
					LEFT  JOIN `countys` ON `countys`.`ID` = `districts`.`county`
					LEFT  JOIN `provinces` ON `countys`.`province` = `provinces`.`ID`
					WHERE  `countys`.`ID` ='$county'";	

					$result = $this->db->query($query_str)->result_array();
					$this->RifResC = count($result[0]['mtbrif']);
					return $this->RifResC; 
				
				}
			function GetAllGeneSitesInCounty($county)
			{
				$query_str="SELECT 
					`section3`.`facility` AS a,
					`facilitys`.`name` AS b, 
					`districts`.`name` AS c,
					section3.make AS d,
					`countys`.`name` as county
					FROM `section3` ,facilitys, `districts` ,`countys`
					WHERE 
					`section3`.`facility`= `facilitys`.`ID`
					AND  `districts`.`ID` = `facilitys`.`district`
					AND `countys`.`ID` = `districts`.`county`
					AND `countys`.`ID` ='$county'";

					$result = $this->db->query($query_str)->result_array();
					$this->siteC = count($result);
					return $this->siteC;
					
			}



			






	}