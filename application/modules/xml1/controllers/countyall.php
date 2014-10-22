<?php
if (!defined('BASEPATH'))
	
     exit('No direct script access allowed');



class countyall extends MY_Controller {

	var $county;
	var $siteC;
	var $TT;
	var $TT1;
	var $previousmonth;
	var $currentyear;

	function __construct() {
		
		parent::__construct();

	$county = $this->input->post('id',TRUE);

	$this->previousmonth= @date("m")- 1 ;
	$this->currentyear= @date("Y");	
	$this->siteC=$this->GetAllGeneSitesInCounty($this->county);
	$this->TT1=$this->TOTALFacilitypercounty($this->county);
	$this->TT=$this->TOTALFacilityReportedpercounty($this->county,$this->previousmonth,$this->currentyear);
	
		
	}
		
		
		public function index(){
			
			$this->countyall_();
			
			
			
		}

		public function countyall_(){



			$county = $this->input->post('id',TRUE);

			$data['category'] = $this->session->userdata('category');
			$data['user'] = $this->session->userdata('user');
        	$data['name'] = $this->session->userdata('name');
        	//$countyall_data = $this->countyfmap_m->countyall_xml();
        
        	//$data['countyall_data'] = $countyall_data;

        	$data['siteC'] = $this->GetAllGeneSitesInCounty($this->county);
        	$data['TT1'] = $this->TOTALFacilityReportedpercounty($this->county,$this->previousmonth,$this->currentyear);
            $data['TT'] = $this->TOTALFacilitypercounty($this->county);
            $data['currentmonth'] = $this->get_county_chart_();
       		$data['currentyear'] = $this->get_county_chart_();
       		$data['previousmonth'] = $this->get_county_chart_();

        	$this->load->load_allocation('countyall_v',$data);





		}
		public function allocation_ca(){



			$query_str= "SELECT ID as a,name as b from countys";
			


			$result = $this->db->query($query_str)->result_array();
			
			$currentmonth=@date("m");
			$currentyear=@date("Y");
			$previousmonth=@date("m")- 1;

			if ($currentmonth ==1)
			{
			$previousmonth=12;
			$currentyear=@date("Y")-1;
			}
			else
			{
			$previousmonth=@date("m")- 1;
			$currentyear=@date("Y");
			}

			return $currentmonth;
			return $currentyear;
			return $previousmonth;
}

		public function get_county_chart_(){




			 $query_str ="SELECT ID as a,name from countys as b";
			 $result = $this->db->query($query_str)->result_array();
           
			


			        $county_name = array();
			        $map =$title= $data=null;
			        $datas = array();
			        $status = '';


			        $colors=array("FFFFCC"=>"1","E2E2C7"=>"2","FFCCFF"=>"3","F7F7F7"=>"5","FFCC99"=>"6","B3D7FF"=>"7","CBCB96"=>"8","FFCCCC"=>"9");
                    $map .= "<map showBevel='0' showMarkerLabels='1' caption='$title'  fillColor='F1f1f1' borderColor='000000' hoverColor='efeaef' canvasBorderColor='FFFFFF' baseFont='Verdana' baseFontSize='10' markerBorderColor='000000' markerBgColor='FF5904' markerRadius='6' legendPosition='bottom' useHoverColor='1' showMarkerToolTip='1'  showExportDataMenuItem='1' >";





		    foreach ($result as $counties) 
		    {


					 $countyid=$counties['a'];
				   	 $countyname=trim($counties['name']);

				   	 $TT=$this->TOTALFacilitypercounty($counties["a"]);
				   	 $TT1=$this->TOTALFacilityReportedpercounty($counties["a"],$this->previousmonth,$this->currentyear);
				   	 $siteC=$this->GetAllGeneSitesInCounty($counties["a"]);

		             $data .= "<entity link='countyallocation?id=$countyid' id='$countyid' displayValue ='$countyname' color='" . array_rand($colors,1) . "'  toolText='County :$countyname&lt;BR&gt; Total No of Facilities:".$this->TT."&lt;BR&gt; Reported facilities :".$this->TT1." &lt;BR&gt; GeneXpert Sites:".$this->siteC."  '/>";
		 
		            	
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





		

			public function GetAllGeneSitesInCounty($county)
			{
				$query_str="SELECT 
					`section3`.`facility` AS a,
					`facilitys`.`name` AS b, 
					`districts`.`name` AS c,
					section3.make AS d,
					`countys`.`name` as county
					FROM `section3` ,facilitys, `districts` ,`countys`
					WHERE 
					`section3`.`facility`= `facilitys`.`facilitycode`
					AND  `districts`.`ID` = `facilitys`.`district`
					AND `countys`.`ID` = `districts`.`county`
					AND `countys`.`ID` ='$county'";
				
				$result = $this->db->query($query_str)->result_array();
			
				$this->siteC = count($result);
				return $this->siteC;
					
			}


			public function TOTALFacilitypercounty($county){
		
					$query_str="SELECT 
					`facilitys`.`facilitycode` AS CODE,
					`facilitys`.`name` AS FACILITY, 
					`districts`.`name` AS DISTRICT,
					`countys`.`name` AS COUNTY
					FROM `facilitys` , `districts` ,`countys`
					WHERE 
					`districts`.`ID` = `facilitys`.`district`
					AND `countys`.`ID` = `districts`.`county`
					AND `countys`.`ID` = '$county'

					";

					$result = $this->db->query($query_str)->result_array();
					$this->TT=count($result);
					return $this->TT;

				}
					
			function TOTALFacilityReportedpercounty($county,$previousmonth,$currentyear){
					$query_str= "SELECT 
					`consumption`.`facility` AS a,
					`facilitys`.`name` AS b, 
					`districts`.`name` AS c,
					consumption.commodity AS d,
					consumption.quantity AS e,
					consumption.quantity_used AS f,
					consumption.end_bal AS g,
					consumption.q_req AS h,
					`countys`.`name` as county
					FROM `consumption` ,facilitys, `districts` ,`countys`
					WHERE 
					`consumption`.`facility`= `facilitys`.`facilitycode`
					AND  `districts`.`ID` = `facilitys`.`district`
					AND `countys`.`ID` = `districts`.`county`
					AND `countys`.`ID` = '$county'
					AND MONTH(consumption.date)='$previousmonth'
					AND YEAR(consumption.date)='$currentyear'
					Group by `consumption`.`facility`";

					$result = $this->db->query($query_str)->result_array();
					$this->TT1 = count($result);
					return $this->TT1;

					
}






	}