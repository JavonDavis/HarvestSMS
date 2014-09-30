<?php
         
		 /**
		 * Callback function for when a text received
		 */
		 
		ini_set('display_errors', 'On');

		echo "string";
     include ( "NexmoMessage.php" );
	// include ("crop.php");
     // Declare new NexmoMessage.
     $sms = new NexmoMessage('d1923006', 'f3252994');
     
      class Crop
{
	private $id,$name,$price,$pest,$soil,$fertilize,$weather,$harvest_time,$produced;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($string){
		$this->id=$string;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($string){
		$this->name=$string;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	public function setPrice($string){
		$this->price=$string;
	}
	
        public function getPest(){
               return $this->pest;
        }

        public function setPest($string){
               $this->pest=$string;
        }
     
	public function getSoil(){
		return $this->soil;
	}
	
	public function setSoil($string){
		$this->soil=$string;
	}
	
	public function getFertilizer(){
		return $this->fertilize;
	}
	
	public function setFertilizer($string){
		$this->fertilize=$string;
	}
	
	public function getWeather(){
		return $this->weather;
	}
	
	public function setWeather($string){
		$this->weather=$string;
	}
	
	public function getHarvestTime(){
		return $this->harvest_time;
	}
	
	public function setHarvestTime($string){
		$this->harvest_time=$string;
	}
	
	public function getProduced(){
		return $this->produced;
	}
	
	public function setProduced($string){
		$this->produced=$string;
	}
}



  if ($sms->inboundText()) {
  	echo "INBOUND TEXT";

         $text = $sms->text;
$int_version = (int) $text;
         switch($int_version)
         {
			case 0: $sms->reply('Not a valid entryu') ;
				break;
            case 400: $sms->reply("1.Crop Selection\n2.Weather Information\n") ;
                break;
            default:
            	$sms->reply("NO TEXT");

     //                    case 2: $sms->reply("Please Reply With You're Farmer ID In Order To Receive Weather Information For You're Farm Location. In The Future Simply Send You're ID For Weather Updates");         
		   //      break;
     //                    case 1:	$reply = '';
					// 	    foreach($stack as $key => $crop )
					// 		{
					// 		     $reply.= ($key.'-'.$crop->{'getName'}()."\n");
					// 		}
			  //               $sms->reply($reply);
     //            			break;
     //            			default:
                    
				 //     			if($int_version<999)
					// 				 {
					// 				 try
					// 				 	{
					//  						$crop = $stack[$int_version];
													
					// 						$option1 = $int_version."1. Last recorded price"; 
					// 						$option2 = $int_version."2. Methods of pest management";
					// 						$option3 = $int_version."3. Suggested soil that are best for this crop";
					// 						$option4 = $int_version."4. Suggested methods of fertilization";
					// 						$option5 = $int_version."5. Climate Suggestions";
					// 						$option6 = $int_version."6. Recorded amount of ".$crop->{'getName'}." sold last month"; 
				 //                                                        $option7 = $int_version."7. Suggested Time of Harvest";
							
					// 						$sms->reply($option1."\n".$option2."\n".$option3."\n");
				 //                                                        $sms->reply($option4."\n".$option5."\n".$option6."\n".$option7."\n");
					// 					}
					// 				catch(Exception $e){}
					// 			}
					// 				elseif(substr($int_version,0,3)) {
					// 					$key_code = substr($int_version,0,3);
					// 					$option=substr($int_version,3,3);						
					// 					$crop=$stack[$key_code];
					// 					switch($option)	{						
					// 						case 1:$sms->reply($crop->{'getPrice'}());
					// 						break;
										
					// 						case 2:$sms->reply($crop->{'getPest'}());
					// 						break;
										
					// 						case 3:$sms->reply($crop->{'getSoil'}());
					// 						break;
											
					// 						case 4:$sms->reply($crop->{'getFertilizer'}());
					// 						break;
											
					// 						case 5:$sms->reply($crop->{'getWeather'}());
					// 						break;
											
					// 						case 6:$sms->reply($crop->{'getProduced'}());
					// 						break;
				 
					// 						case 7:$sms->reply($crop->{'getHarvestTime'}());
					// 						break;
					// 					}                       
					// }
     //              }
				
}}
?>		
		