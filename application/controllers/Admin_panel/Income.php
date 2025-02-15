<?php
class Income extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        /*if($this->conn->plan_setting('income_section')!=1){
            $admin_path=$this->conn->company_info('admin_path');
            redirect(base_url($admin_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }*/
         $this->panel_url=$this->conn->company_info('admin_path');
    }

    public function index(){
        $data['search_string']='income_page_string';

        $whr='1=1 AND';
        if(isset($_POST['submit'])){
            if(isset($_POST['date']) && $_POST['date']!=''){
                $date=date('Y-m-d',strtotime($_POST['date']));
                $whr .= " DATE(`date`)=DATE('$date') AND";
            }
            if(isset($_POST['select_month']) && $_POST['select_month']!=''){
                $select_month=date('Y-m-d',strtotime($_POST['select_month']));
                $whr .= " (MONTH(`date`)=MONTH('$select_month') AND YEAR(`date`)=YEAR('$select_month')) AND";
            }

            if(isset($_POST['start_date']) && isset($_POST['end_date']) && $_POST['start_date']!='' && $_POST['end_date']!=''){
                $start_date=date('Y-m-d 00-00-01',strtotime($_POST['start_date']));
                $end_date=date('Y-m-d 23-59-59',strtotime($_POST['end_date']));
                $whr .= " ( `date` BETWEEN '$start_date' AND '$end_date') AND";
            }

        }

        $whr=rtrim($whr,'AND');

        $this->session->set_userdata('income_where',$whr);
        
        $data['query_where']=$whr;
        $this->show->admin_panel('income',$data);
        
    }

    
 public function all_income(){
        if(isset($_REQUEST['export_to_excel'])){
          $get_data=$this->conn->runQuery('u_code,c3,c7,c5','user_wallets',"1=1");
           //echo $cashback=$get_data[0]->c7;
          
           if($get_data){
               for($f=0;$f<count($get_data);$f++){
                $tx_profile=$this->profile->profile_info($get_data[$f]->u_code);
                $package=$this->business->package($get_data[$f]->u_code);
                       $cashback=$get_data[$f]->c7;
                       $referral=$get_data[$f]->c3;
                       $tmf=$get_data[$f]->c5;
                       $ttl_income=$cashback+$referral+$tmf;
                       $admin_charge=$ttl_income/100*10;
                       $paid_amount=$ttl_income-$admin_charge;
                $dta['Name']=$tx_profile->name;
                $dta['Username']=$tx_profile->username;
                $dta['Packages']=$package;
                $dta['Cashback Income']=$get_data[$f]->c7;
                $dta['Referral Income']=$get_data[$f]->c3;
                $dta['TMF']=$get_data[$f]->c5;
                $dta['Admin Charges']=$admin_charge;
                $dta['Total Amount to be paid(net payment)']=$paid_amount;
                $exdataval[$f]=$dta;

               }
           }
             
            $this->export->export_to_excel($exdataval);

        }
        $searchdata['from_table']='user_wallets';
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
           $spo=$this->profile->column_like($_REQUEST['name'],'name');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
          
          
            $spo=$this->profile->column_like($_REQUEST['username'],'username');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
           
        }        
          if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/income/all-income'); 
         
         $this->show->admin_panel('income_detail',$data);
    }

     

     

}