<?php
header('Access-Control-Allow-Origin: *');
class Crons extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function tttsss(){
        
        $dss = array(
            array('label'=>'January','income'=>21,'sales'=>41),
            array('label'=>'February','income'=>25,'sales'=>76),
            array('label'=>'March','income'=>56,'sales'=>23),
            array('label'=>'April','income'=>23,'sales'=>53),
            array('label'=>'May','income'=>75,'sales'=>23),
            array('label'=>'June','income'=>35,'sales'=>32),
            );
        print_r(json_encode($dss));
    }
    public function roi_closing(){
        
        $source="roi";
        $datetime=date('Y-m-d H:i:s');
        $all_cr_array =$this->conn->runQuery('*','orders',"status=1 and payout_status=0");
        
        foreach($all_cr_array as $user_details){
            
            $userid=$user_details->u_code;
            $tx=$user_details->id;
            $order_amount=$user_details->order_amount;
            $active_date=$user_details->added_on;
            $tx_type=$user_details->tx_type;
			$roi=$user_details->roi;
			$cappings=$order_amount*3;

            // $active_mem=$this->conn->runQuery('c9','user_wallets',"u_code='$userid' ");
        
            // $active_id=$active_mem[0]->c9;
            // if($active_id  >= 5){
            //         $roi=1; 
            // }else{
            //     $roi=0.5; 
            // }
            
           
            // echo "roi".$roi;
            $perday=$order_amount*$roi/100;
            $payable_amt1=$perday;            
            $token_rats= $this->conn->company_info('token_rate');   
			$datetime=date('Y-m-d H:i:s');             
			// $check_tx=$this->conn->runQuery('id','transaction',"u_code='$userid' and tx_type='income' and tx_record='$tx' and source='$source' and DATE(date)=DATE('$datetime')");
			//if(!$check_tx){
				if($payable_amt1>0){     
				    
				    
				    $total_amountss=$this->conn->runQuery('SUM(amount) as amts','transaction',"u_code='$userid' and tx_type='income' and (source='$source' ) ")[0]->amts;
                    $payable21=$payable_amt1+$total_amountss;
                    if($cappings>$payable21){
                        $payables=$payable_amt1;
                        $flash=0;
                    }else{
                        $payables=$cappings-$total_amountss;
                         $this->db->set('payout_status',1);
                         $this->db->where('id',$tx);
                            $this->db->update('orders');
                    } 
				    
				   if($payables>0){
				    
    					//$pays=$payable_amt1/$token_rats;		
    					$income=array(); 
    					$income['u_code']=$userid;
    					$income['tx_type']='income';
    					$income['source']=$source;
    					$income['debit_credit']='credit';
    					$income['amount']=$payables; 
    					
    				///	$income['token']=$payable_amt1;					
    					$income['date']=date('Y-m-d H:i:s');             
    					$income['added_on']=date('Y-m-d H:i:s');
    					$income['status']=1;
    					$income['tx_record']=$tx;
    					$income['txs_res']=1;                   
    					$income['wallet_type']='roi_wallet';
    					$income['remark']="Recieve $source income of amount $payables";
    					
    					if($this->db->insert('transaction',$income)){
    					    echo "<br><br><br><br>payables=".$payables;
    					    echo"<br>userid=".$userid;
    						$income_lvl=$income['amount'];//-$income['tx_charge'];
    						$this->update_ob->add_amnt($userid,$source,$income_lvl);                    
    						$this->update_ob->add_amnt($userid,'main_wallet',$income_lvl);
    						$this->distribute->direct_roi_destribute($userid,$payables,10);
    						
    				   }
				   }
				}
                
           // }
            
        }
    }
    public function matching_closing(){
	    $arr=array();
    	$source='binary';
    	$crncy=$this->conn->company_info('currency');
    	$all_users=$this->conn->runQuery('id','users',"active_status=1 ");
    	$plan = $this->conn->runQuery('*','plan',"id='1'")[0];
    	
   	    if($all_users){
	       	foreach($all_users as $user_details){
	       	    $user_id=$user_details->id;
	       	    $my_actives_left=$this->team->my_actives_position($user_id,1);
	       	    $ttl_actives_left=$my_actives_left!=''? COUNT($my_actives_left) : 0;
	       	    $my_actives_right=$this->team->my_actives_position($user_id,2);
	       	    $ttl_actives_right=$my_actives_right!=''? COUNT($my_actives_right) : 0;
	       	    //die();
               // if($ttl_actives_left>=1 && $ttl_actives_right>=1){
                     
                	  $my_left=$this->team->team_by_pv($user_id,1);
                	  $my_right=$this->team->team_by_pv($user_id,2);
                	 //print_R($my_left);
                // 	 echo $user_id."<br>";
                	echo "left". $cout_my_left=$my_left."<br>";
                	 echo "right". $cout_my_right=$my_right."<br>";
                	// die();
                  //echo "leftBV".$my_left_business=$this->team->team_by_business($user_id,1)."<br>";                	 
                // echo "rightBV".$my_right_business=$this->team->team_by_business($user_id,2)."<br>";
                $my_left_business=$this->team->team_by_business($user_id,1);
                $my_right_business=$this->team->team_by_business($user_id,2);
                	  if(($cout_my_left>=1 && $cout_my_right>=1) || ($cout_my_left>=1 && $cout_my_right>=1) ){
                	   //   echo "ewew";
                	   //   die();
            	  	       //echo "ttl_ben--".$ttl_ben=$this->team->ben_pairs($user_id);
            	  	      $ttl_ben=$this->team->ben_pairs($user_id);
            	  	      
            	          $ttl_matchings=min($my_left_business,$my_right_business);
            	          
            	          
            	          
                	      $ttl_max_matchings=max($my_left_business,$my_right_business);
                	     echo  "match1----".$ttl_matchings."<br>";
                	   //   echo  "match2----".$ttl_max_matchings."<br>";
                	      
                	      $carry_bes=((int)$ttl_max_matchings-(int)$ttl_matchings);
                	      
                	   //   echo  "carry_bes----".$carry_bes."<br>";
                	      if($my_left_business==$my_right_business){
                	          $pos="left";
                	      }elseif($my_left_business>$my_right_business){
                	          $pos="left";
                	      }else{                	      
                	          $pos="right";
                	      }
                	      
                	      $ben_business=((int)$ttl_matchings-(int)$ttl_ben);
                	      $my_pkgs=$this->business->package($user_id);
                	     
                	  
                	    
                	      $total_capping=$my_pkgs*5;
                	      $per_pair=10;//$plan->per_pair;
                	      
            	   $binary_amt1=$ben_business*$per_pair/100;
                                $binary_amt=$binary_amt1;
                                $flash=0;
                                $ben_pair=$binary_amt/$per_pair;
                            
                            
                            
                         echo "tt--". 
	                            	$total_amount=$this->conn->runQuery('SUM(order_amount) as amts','orders',"u_code='$user_id' and status='1' ")[0]->amts;
	                            	echo "<br>tamt".$total_amount;
                            $payable2=$binary_amt+$total_amount;
                          
                            if($total_capping>$payable2){
                                $payable=$binary_amt;
                                $flash=0;
                            }else{
                                $payable=$total_capping-$total_amount;
                                
                            } 
                            
                        echo "<br>payable---".$payable ;
                         //die();
                            if($payable>0){
            	           
                                
                                $arr1['source']=$source;		               
                                $arr1['u_code']=$user_id;
                                $arr1['tx_type']='income';
                                $arr1['debit_credit']='credit';
                                $arr1['wallet_type']='income_wallet';
                                
                                $arr1['amount']=$payable;	              
                                $arr1['date']=date('Y-m-d H:i:s');
                                $arr1['status']=1;
                                 
                                $arr1['remark']= "Recieve $payable $crncy Matching Bonus ";          
                                $qury=$this->conn->get_insert_id('transaction',$arr1);
                                echo "last".$this->db->last_query();
                                //die();
                               if($qury){
                                   
                                   $mtching = array();
                                   $mtching['matching']=$ben_business;
                                   $mtching['ben_matching']=$ben_business;
                                   $mtching['flash']=$flash;
                                   $mtching['u_code']=$user_id;
                                   $mtching['tx_id']=$qury;
                                   $mtching['status']=1;
                                   $this->db->insert('binary_matching',$mtching);
                                   
                               }
                               
                                $this->update_ob->add_amnt($user_id,$source,$payable);
                                $this->update_ob->any_update($user_id,'matching',$ttl_matchings);
                                $this->update_ob->any_update($user_id,'carry',$carry_bes);
                                $this->update_ob->add_amnt($user_id,'main_wallet',$payable);
                	        }
                            
                             
            	        }
            	    }
               // }
	       		
	       	}
	    }      		           	    

	
	public function rank_closing(){
	    $datetime=date('Y-m-d H:i:s');
	    $source="rank";
	    $crncy=$this->conn->company_info('currency');
	    $all_usersdetails=$this->conn->runQuery('*','users',"1=1");
	   // print_r($all_ranks);
	    foreach($all_usersdetails as $userdetails){
	        $bonus_rank=$userdetails->bonus_rank;
	        if(!empty($bonus_rank)){
	            $userid=$userdetails->id;
	            $rankdetails=$this->conn->runQuery('rank_bonus,rank_times','plan',"rank='$bonus_rank'");
	            $rank_bonus=$rankdetails[0]->rank_bonus;
	            $rank_times=$rankdetails[0]->rank_times;
	            $prerankdetails=$this->conn->runQuery('bonus_received','rank',"rank='$bonus_rank'");
	            $bonus_received=$prerankdetails[0]->bonus_received;
	            if($bonus_received<$rank_times){
	                    
	                    $income=array(); 
    					$income['u_code']=$userid;
    					$income['tx_type']='income';
    					$income['source']='rank';
    					$income['debit_credit']='credit';
    					$income['amount']=$rank_bonus; 
    					
    				///	$income['token']=$payable_amt1;					
    					$income['date']=$datetime;             
    					$income['added_on']=date('Y-m-d H:i:s');
    					$income['status']=1;
    					$income['tx_record']=$bonus_rank;
    					$income['txs_res']=1;                   
    					$income['wallet_type']='roi_wallet';
    					$income['remark']="Recieve $source income of amount $rank_bonus for $bonus_rank Rank";
    					
    					if($this->db->insert('transaction',$income)){
    					    
    				// 		echo"<br><br><br>payable=".$rank_bonus;
    				// 		echo "<br>rank=".$bonus_rank;
    				// 		echo "<br>user=".$userid;
    						$this->update_ob->add_amnt($userid,'rank',$rank_bonus);                    
    						$this->update_ob->add_amnt($userid,'main_wallet',$rank_bonus);
    						
    				   }
	               // print_r($prerankdetails);
	            }elseif($bonus_received>=$rank_times){
	                $this->db->set('status','1');
	                $this->db->where('rank', $bonus_rank);
	                $this->db->where('u_code', $userid);
	                $this->db->update('rank');
	                
	            }
	            
	            
	        }
	    }
	    
	}
		
    
    
    public function reward_closing(){
	    $arr=array();
	    $datetime=date('Y-m-d H:i:s');
    	$source='reward';
    	$crncy=$this->conn->company_info('currency');
    	$all_users=$this->conn->runQuery('*','users',"active_status=1 and my_rank IS NOT NULL");
   	    if($all_users){
	       	foreach($all_users as $user_details){
	       	    $user_id=$user_details->id;
	       	    $rank_id=$user_details->my_rank;
	       	    
	       	    $plan_details=$this->conn->runQuery('*','plan',"package_name='$rank_id'");
	       	    $rewards=$plan_details[0]->reward;
	       	    $tx=$plan_details[0]->id;
	       	    $max_rewards=$plan_details[0]->max_reward;
	       	    
	       	    $check_tx=$this->conn->runQuery('SUM(amount) as amts','transaction',"u_code='$user_id' and tx_type='income' and tx_record='$tx' and source='reward' ")[0]->amts;
			    $total_amts=$check_tx+$rewards;
			    if($total_amts<$max_rewards){
			        $pay=$rewards;
			    }else{
			       $pay=$total_amts-$check_tx;
			    }
			    
			    if($pay>0){
           	    	$income=array(); 
    				$income['u_code']=$user_id;
    				$income['tx_type']='income';
    				$income['source']='reward';
    				$income['debit_credit']='credit';
    				$income['amount']=$pay; 
    				$income['date']=date('Y-m-d H:i:s');             
    				$income['added_on']=date('Y-m-d H:i:s');
    				$income['status']=1;
    				$income['tx_record']=$tx;
    				$income['txs_res']=1;                   
    				$income['wallet_type']='reward';
    				$income['remark']="Recieve $pay $ from Reward Income";
    				
    				if($this->db->insert('transaction',$income)){
    					$income_lvl=$income['amount'];//-$income['tx_charge'];
    					$this->update_ob->add_amnt($user_id,'reward',$income_lvl);
    					$this->update_ob->add_amnt($user_id,'main_wallet',$income_lvl); 
    					
    			   }
			    } 
	       	    
	       	}
   	    }
     }    
    public function royalty_closing(){
	    $arr=array();
	    $datetime=date('Y-m-d H:i:s');
    	$source='royalty';
    	$crncy=$this->conn->company_info('currency');

		$roylty=$this->conn->runQuery('*','royalty_wallet',"id='1'"); 
		$club1=$roylty[0]->club1;
		$club2=$roylty[0]->club2;
		$club3=$roylty[0]->club3;
		$club4=$roylty[0]->club4;
		$club5=$roylty[0]->club5;
		$club6=$roylty[0]->club6;

		$total_all_club1=$this->conn->runQuery('COUNT(id) as club1','users',"active_status=1 and my_rank='club1'")[0]->club1;
		$total_all_club2=$this->conn->runQuery('COUNT(id) as club2','users',"active_status=1 and my_rank='club2'")[0]->club2;
		$total_all_club3=$this->conn->runQuery('COUNT(id) as club3','users',"active_status=1 and my_rank='club3'")[0]->club3;
		$total_all_club4=$this->conn->runQuery('COUNT(id) as club4','users',"active_status=1 and my_rank='club4'")[0]->club4;
		$total_all_club5=$this->conn->runQuery('COUNT(id) as club5','users',"active_status=1 and my_rank='club5'")[0]->club5;
		$total_all_club6=$this->conn->runQuery('COUNT(id) as club6','users',"active_status=1 and my_rank='club6'")[0]->club6;
		
		if($club1 > 0 && $ $total_all_club1 > 0){
				$pay=$club1/$total_all_club1;
            	$all_users=$this->conn->runQuery('id','users',"active_status=1 and my_royalty='club1'");
           	    if($all_users){
        	       	foreach($all_users as $user_details){
        	       	    $userid=$user_details->id;
        	       	    
        	       	    $income=array(); 
    					$income['u_code']=$userid;
    					$income['tx_type']='income';
    					$income['source']=$source;
    					$income['debit_credit']='credit';
    					$income['amount']=$pay; 
    					
    						
    					$income['date']=date('Y-m-d H:i:s');             
    					$income['added_on']=date('Y-m-d H:i:s');
    					$income['status']=1;
    				                  
    					$income['wallet_type']='main_wallet';
    					$income['remark']="Recieve DSG Club 1 income of amount $pay .";
    					
    					if($this->db->insert('transaction',$income)){
    						$income_lvl=$income['amount'];//-$income['tx_charge'];
    						$this->update_ob->add_amnt($userid,$source,$income_lvl);
    						$this->update_ob->add_amnt($userid,'main_wallet',$income_lvl);                    
    						
    				   }
        	       	    
        	       	}
				}
		}
		if($club2 > 0 && $ $total_all_club2 > 0){
			$pay=$club2/$total_all_club2;
            	$all_users=$this->conn->runQuery('id','users',"active_status=1 and my_royalty='club2'");
           	    if($all_users){
        	       	foreach($all_users as $user_details){
        	       	    $userid=$user_details->id;
        	       	    
        	       	    $income=array(); 
    					$income['u_code']=$userid;
    					$income['tx_type']='income';
    					$income['source']=$source;
    					$income['debit_credit']='credit';
    					$income['amount']=$pay; 
    					
    						
    					$income['date']=date('Y-m-d H:i:s');             
    					$income['added_on']=date('Y-m-d H:i:s');
    					$income['status']=1;
    				                  
    					$income['wallet_type']='main_wallet';
    					$income['remark']="Recieve DSG Club 2 income of amount $pay.";
    					
    					if($this->db->insert('transaction',$income)){
    						$income_lvl=$income['amount'];//-$income['tx_charge'];
    						$this->update_ob->add_amnt($userid,$source,$income_lvl);
    						$this->update_ob->add_amnt($userid,'main_wallet',$income_lvl);                    
    						
    				   }
        	       	    
        	       	}
				}			
		}
		if($club3 > 0 && $ $total_all_club3 > 0){
			$pay=$club3/$total_all_club3;
            	$all_users=$this->conn->runQuery('id','users',"active_status=1 and my_royalty='club3'");
           	    if($all_users){
        	       	foreach($all_users as $user_details){
        	       	    $userid=$user_details->id;
        	       	    
        	       	    $income=array(); 
    					$income['u_code']=$userid;
    					$income['tx_type']='income';
    					$income['source']=$source;
    					$income['debit_credit']='credit';
    					$income['amount']=$pay; 
    					
    						
    					$income['date']=date('Y-m-d H:i:s');             
    					$income['added_on']=date('Y-m-d H:i:s');
    					$income['status']=1;
    				                  
    					$income['wallet_type']='main_wallet';
    					$income['remark']="Recieve DSG Club 3 income of amount $pay.";
    					
    					if($this->db->insert('transaction',$income)){
    						$income_lvl=$income['amount'];//-$income['tx_charge'];
    						$this->update_ob->add_amnt($userid,$source,$income_lvl);
    						$this->update_ob->add_amnt($userid,'main_wallet',$income_lvl);                    
    						
    				   }
        	       	    
        	       	}
				}
		}
		if($club4 > 0 && $ $total_all_club4 > 0){
			$pay=$club4/$total_all_club4;
            	$all_users=$this->conn->runQuery('id','users',"active_status=1 and my_royalty='club4'");
           	    if($all_users){
        	       	foreach($all_users as $user_details){
        	       	    $userid=$user_details->id;
        	       	    
        	       	    $income=array(); 
    					$income['u_code']=$userid;
    					$income['tx_type']='income';
    					$income['source']=$source;
    					$income['debit_credit']='credit';
    					$income['amount']=$pay; 
    					
    						
    					$income['date']=date('Y-m-d H:i:s');             
    					$income['added_on']=date('Y-m-d H:i:s');
    					$income['status']=1;
    				                  
    					$income['wallet_type']='main_wallet';
    					$income['remark']="Recieve DSG Club 4 income of amount $pay.";
    					
    					if($this->db->insert('transaction',$income)){
    						$income_lvl=$income['amount'];//-$income['tx_charge'];
    						$this->update_ob->add_amnt($userid,$source,$income_lvl);
    						$this->update_ob->add_amnt($userid,'main_wallet',$income_lvl);                    
    						
    				   }
        	       	    
        	       	}
				}
		}
		if($club5 > 0 && $ $total_all_club5 > 0){
			$pay=$club5/$total_all_club5;
            	$all_users=$this->conn->runQuery('id','users',"active_status=1 and my_royalty='club5'");
           	    if($all_users){
        	       	foreach($all_users as $user_details){
        	       	    $userid=$user_details->id;
        	       	    
        	       	    $income=array(); 
    					$income['u_code']=$userid;
    					$income['tx_type']='income';
    					$income['source']=$source;
    					$income['debit_credit']='credit';
    					$income['amount']=$pay; 
    					
    						
    					$income['date']=date('Y-m-d H:i:s');             
    					$income['added_on']=date('Y-m-d H:i:s');
    					$income['status']=1;
    				                  
    					$income['wallet_type']='main_wallet';
    					$income['remark']="Recieve DSG Club 5 income of amount $pay.";
    					
    					if($this->db->insert('transaction',$income)){
    						$income_lvl=$income['amount'];//-$income['tx_charge'];
    						$this->update_ob->add_amnt($userid,$source,$income_lvl);
    						$this->update_ob->add_amnt($userid,'main_wallet',$income_lvl);                    
    						
    				   }
        	       	    
        	       	}
				}
		}
		if($club6 > 0 && $ $total_all_club6 > 0){
			$pay=$club6/$total_all_club6;
            	$all_users=$this->conn->runQuery('id','users',"active_status=1 and my_royalty='club6'");
           	    if($all_users){
        	       	foreach($all_users as $user_details){
        	       	    $userid=$user_details->id;
        	       	    
        	       	    $income=array(); 
    					$income['u_code']=$userid;
    					$income['tx_type']='income';
    					$income['source']=$source;
    					$income['debit_credit']='credit';
    					$income['amount']=$pay; 
    					
    						
    					$income['date']=date('Y-m-d H:i:s');             
    					$income['added_on']=date('Y-m-d H:i:s');
    					$income['status']=1;
    				                  
    					$income['wallet_type']='main_wallet';
    					$income['remark']="Recieve DSG Club 6 income of amount $pay.";
    					
    					if($this->db->insert('transaction',$income)){
    						$income_lvl=$income['amount'];//-$income['tx_charge'];
    						$this->update_ob->add_amnt($userid,$source,$income_lvl);
    						$this->update_ob->add_amnt($userid,'main_wallet',$income_lvl);                    
    						
    				   }
        	       	    
        	       	}
				}
		}
			$this->db->set('club1',0);
			$this->db->set('club2',0);
			$this->db->set('club3',0);
			$this->db->set('club4',0);
			$this->db->set('club5',0);
			$this->db->set('club6',0);
			$this->db->where('id',1);
			$this->db->update('royalty_wallet');
		
	}   
    
    
     
    public function clear_form_submit(){
        $this->db->empty_table('form_request'); 
    }
    
    
     public function auto_withdrawal(){
        $datetime=date('Y-m-d');
        $all_cr_array =$this->conn->runQuery('id,name,username,my_rank,active_date','users',"active_status=1");    
     
        
        $min_wd_limit=$this->conn->setting('min_withdrawal_limit');
        $crncy=$this->conn->company_info('currency');
        $insertincome=array();               
       
        foreach($all_cr_array as $user_details){
            echo $userid=$user_details->id;
            $wallet_amt=$this->update_ob->wallet($userid,'main_wallet');
            $bank_details=$this->profile->my_default_account($userid);
            $direct_details=$this->team->my_actives($userid);
            if(!empty($bank_details)){
            if($wallet_amt>$min_wd_limit  && count($direct_details)>=2){
                $bank_details=$bank_details=$this->profile->my_default_account($userid);//$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");
    	        $inserttrans['bank_details']=json_encode($bank_details);
    			
                $crncy=$this->conn->company_info('currency');
    		  
    		   $inserttrans['wallet_type']='main_wallet';
    		   $inserttrans['tx_type']='withdrawal';
               $inserttrans['debit_credit']="debit";             
    	 	   $inserttrans['u_code']=$userid;
    		   $inserttrans['date']=date('Y-m-d H:i:s');
    		   $amnt=abs($wallet_amt);
    		   $tx_charge=$amnt*15/100;
    		   $inserttrans['amount']=$amnt-$tx_charge;
    		   $inserttrans['tx_charge']=$tx_charge;
    		   $inserttrans['status']=0;
    		   $inserttrans['open_wallet']=$this->update_ob->wallet($userid,'main_wallet');
    		   $inserttrans['closing_wallet']=$inserttrans['open_wallet']-$inserttrans['amount'];
    		   $inserttrans['remark']=" Withdraw  $crncy $amnt";
    
    			if($this->db->insert('transaction',$inserttrans)){
    			    
    			    //$this->update_ob->add_amnt($tx_u_code,$wallet_type,$amnt);
    			    $this->update_ob->add_amnt($userid,'main_wallet',-$amnt);
    			    $this->update_ob->add_amnt($userid,'total_withdrawal',$amnt);
    			}
    			
            }}
        }
     }   
     
     
    public function check(){
        $team=$this->team->my_generation(1);
        $team_details=$this->team->my_level_team(1);
        print_R($team_details);
    }
    
    
   public function checkss(){
       
            $with_dts="2022-09-10 16:29:06";//$user_withdrawals[0]->date;
            $current_days=date("Y-m-d");
    	    $from= date("Y-m-d", strtotime($with_dts));
            $dStart = new DateTime($from);
            $dEnd  = new DateTime($current_days);
            $dDiff = $dStart->diff($dEnd);
            echo $ttl_dt_diff=$dDiff->format('%r%a');
            die();
    
    }
    

    
    
    
    

   
}