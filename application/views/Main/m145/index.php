

      <!-- banner start-->
      

    <section>
        <div class="container">
            <div class="buy_wrapper" style="display:flex !important;justify-content:center;">
                <img src="<?= $this->conn->company_info('logo');?>" class="" alt="<?= $this->conn->company_info('company_name');?>" style="width: 20%;">
            </div>
            
        </div>
    </section>
    <section>
        <div class="container" style="padding-top: 20px;">
            <div class="buy_wrapper">
               <div class="group_btn d-none d-sm-block"  style="display:flex !important;justify-content:center;">
                   
                        <!--<a href="<?= base_url();?>login" class="group_link log_in registration">LOG IN</a>-->
                        <!--<a href="<?= base_url();?>register" class="group_link registration hover">SIGN UP</a>-->
                          <li id="prepare" class="list_responsive" style="cursor: pointer;">
                                   <button id="btn-connect"  class="btn btn-gradient-purple btn-glow mb-2 animated">                            
                                   Connect Wallet               
                                   </button>
                                </li>
                                <li style="display: none; cursor: pointer;" id="connected" class="list_responsive" >
                                   <a id="btn-disconnect" class="btn btn-gradient-purple btn-glow mb-2 animated" style ="color: #fff! important;">Disconnect Wallet</a>
                                </li>
                    </div>
            </div>
            
        </div>
    </section>
    <div class="container">
    <div class="modal " id="exampleModal" tabindex="-1000" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <div class="modal_desc">
               <div class="cstm-bx">
                  <div class="sponser_data_page">
                     
                    
                     <div class="sponser_desc">
                        <h3>Sponser Id</h3>
                        <input type="text" id="sp_id" name="sp_id" placeholder="Enter Referral Id" class="form-control" value="<?= isset($_GET['ref']) ? $_GET['ref']:''?>">
                        <br>
                        <?php $poss=isset($_GET['position']) ? $_GET['position']:''?>
                        <select name="position" class="form-control" id="position_detail">
                          <option value="1" <?= $poss==1 ? "selected" : ""  ?>>Left</option>
                          <option value="2" <?= $poss==2 ? "selected" : ""  ?>>Right</option>
                        </select><br>
                        <div class="d-flex justify-content-center">
                        <button type="button"  id="cls_mdl" class="btn btn-primary" onclick="return reg()" >
                        <span aria-hidden="true">submit</span>
                        </button></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        
      </div>
   </div>
</div>
</div>

<script src="https://unpkg.com/web3@latest/dist/web3.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/web3modal"></script>
<script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider"></script>
<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>
<script src="https://cdn.ethers.io/lib/ethers-5.1.umd.min.js" type="text/javascript"></script>
<script>
   function handleForm(event) { event.preventDefault(); } 
   
    
 
 
   const status = document.querySelector('#status');
   const status_sell = document.querySelector('#status_sell');
   const Web3Modal = window.Web3Modal.default;
   const WalletConnectProvider = window.WalletConnectProvider.default;
   const EvmChains = window.evmChains;
   const Fortmatic = window.Fortmatic;
   const contractabi = [{"inputs":[{"internalType": "address","name": "_spender","type": "address"},{"internalType": "uint256","name":"_addedValue","type": "uint256"}],"name": "increaseAllowance","outputs":[{"internalType": "bool","name": "","type":"bool"}],"stateMutability": "nonpayable","type": "function"}];
   const ethers = window.ethers
   
   // Web3modal instance
   let web3Modal
   
   // Chosen wallet provider given by the dialog window
   let provider;
   
   let chainId;
   
   let calculateAll
   
   // Address of the selected account
   let selectedAccount;
   
   let userAddress;
   
   let userBalance;
   /**
    * Setup the orchestra
    */
   function init() {
   
     console.log("Initializing example");
     console.log("WalletConnectProvider is", WalletConnectProvider);
     console.log("Fortmatic is", Fortmatic);
   
     // Tell Web3modal what providers we have available.
     // Built-in web browser provider (only one can exist as a time)
     // like MetaMask, Brave or Opera is added automatically by Web3modal
     const providerOptions = {
       walletconnect: {
         package: WalletConnectProvider,
         display: {
           name: "Wallet Connect"
         },
         options: {
           // Mikko's test key - don't copy as your mileage may vary
           infuraId: "5f40cd78a0004e3dbe19bd078e6d520a",
         }
       },
    
       fortmatic: {
         package: Fortmatic,
         options: {
           // Mikko's TESTNET api key
           key: "pk_test_391E26A3B43A3350"
         }
       }
     };

     web3Modal = new Web3Modal({
       cacheProvider: false, // optional
       providerOptions, // required
     });
     
   }
   
   
   /**
    * Kick in the UI action after Web3modal dialog has chosen a provider
    */
   async function fetchAccountData() {
   
     // Get a Web3 instance for the wallet
     const web3 = new Web3(provider);
   
     console.log("provider: ",provider);
     window.localStorage.provider = new ethers.providers.Web3Provider(provider);
     console.log("Web3 instance is", web3);
     // Get connected chain id from Ethereum node
     chainId = await web3.eth.getChainId();
     console.log(chainId);
     // Load chain information over an HTTP API
    // const chainData = await EvmChains.getChain(chainId);
     // document.querySelector("#network-name").textContent = chainData.name;
   
     // Get list of accounts of the connected wallet
     const accounts = await web3.eth.getAccounts();
   
     // MetaMask does not give you all accounts, only the selected account
     console.log("Got accounts", accounts);
     selectedAccount = accounts[0];
   
     // document.querySelector("#selected-account").textContent = selectedAccount;
   
     // Get a handl
     // const template = document.querySelector("#template-balance");
     // const accountContainer = document.querySelector("#accounts");
   
     // Purge UI elements any previously loaded accounts
     // accountContainer.innerHTML = '';
   
     // Go through all accounts and get their ETH balance
     const rowResolvers = accounts.map(async (address) => {
       userAddress = address;
       const balance = await web3.eth.getBalance(address);
       // ethBalance is a BigNumber instance
       // https://github.com/indutny/bn.js/
       const ethBalance = web3.utils.fromWei(balance, "ether");
       const humanFriendlyBalance = parseFloat(ethBalance).toFixed(4);
       userBalance = humanFriendlyBalance;
   
       // Fill in the templated row and put in the document
       // const clone = template.content.cloneNode(true);
       // clone.querySelector(".address").textContent = address;
       // clone.querySelector(".balance").textContent = humanFriendlyBalance;
       // accountContainer.appendChild(clone);
     });
    //  calculateAll = setInterval(calculateToken, 1000);
    //  calculateAll;
   
     // Because rendering account does its own RPC commucation
     // with Ethereum node, we do not want to display any results
     // until data for all accounts is loaded
     await Promise.all(rowResolvers);
   
     // Display fully loaded UI for wallet data
     document.querySelector("#prepare").style.display = "none";
     document.querySelector("#connected").style.display = "inline-block";
   }
   
   
   
   /**
    * Fetch account data for UI when
    * - User switches accounts in wallet
    * - User switches networks in wallet
    * - User connects wallet initially
    */
   async function refreshAccountData() {
      
     document.querySelector("#connected").style.display = "none";
     document.querySelector("#prepare").style.display = "block";
   
     document.querySelector("#btn-connect").setAttribute("disabled", "disabled")
     await fetchAccountData(provider);
     document.querySelector("#btn-connect").removeAttribute("disabled")
    
        
       $.ajax({
           type: "post",
           headers: {  'Access-Control-Allow-Origin': 'https://www.aptorise.com/' },
           url: "<?= base_url('register/username_available');?>",
           data: {username:userAddress},          
           success: function (response) {  
              // alert(response);
               var res = JSON.parse(response);          
               if(res.error==true){				   
                   $('#exampleModal').modal('show');				                
               }else{
                   var co = res.code;
                   //alert(co);
                   login(co);                          
               }
           }
       });
   }
    
   /**
    * Connect wallet button pressed.
    */
   
   
  
   
   
     async function onConnect() {
     
     console.log("Opening a dialog", web3Modal);
     try {
       provider = await web3Modal.connect();
     } catch(e) {
       console.log("Could not get a wallet connection", e);
       return;
     }
   
     // Subscribe to accounts change
     provider.on("accountsChanged", (accounts) => {
       fetchAccountData();
     });
   
     // Subscribe to chainId change
     provider.on("chainChanged", (chainId) => {
       fetchAccountData();
     });
   
     // Subscribe to networkId change
     provider.on("networkChanged", (networkId) => {
       fetchAccountData();
     });
     
     await refreshAccountData();
   }
   /**
    * Disconnect wallet button pressed.
    */
   async function onDisconnect() {
   
     console.log("Killing the wallet connection", provider);
   
     // TODO: Which providers have close method?
     if(provider.close) {
       await provider.close();
   
       // If the cached provider is not cleared,
       // WalletConnect will default to the existing session
       // and does not allow to re-scan the QR code with a new wallet.
       // Depending on your use case you may want or want not his behavir.
       await web3Modal.clearCachedProvider();
       provider = null;
     }
     clearInterval(calculateAll);
     selectedAccount = null;
   
     // Set the UI back to the initial state
     document.querySelector("#prepare").style.display = "block";
     document.querySelector("#connected").style.display = "none";
   }
   
   
   /**
    * Main entry point.
    */
   window.addEventListener('load', async () => {
      
     init();
    
     document.querySelector("#btn-connect").addEventListener("click", onConnect);
    
    //  document.querySelector("#btn-buy").addEventListener("click", onBuy);
    //  document.querySelector("#btn-sell").addEventListener("click", onSell);
     
     document.querySelector("#btn-disconnect").addEventListener("click", onDisconnect);
   });
   
   // window.onload = function() {            
   //     setInterval(calculateToken, 1000);
   // }
   
   console.log("ethers instance: ", ethers);
   

   
   function truncate(input) {
       if (input.length > 5) {
          return input.substring(0, 6) + '.......' + input.substring(input.length - 5);
       }
       return input;
    };
   
   
    function toFixed(x) {
     if (Math.abs(x) < 1.0) {
       var e = parseInt(x.toString().split('e-')[1]);
       if (e) {
           x *= Math.pow(10,e-1);
           x = '0.' + (new Array(e)).join('0') + x.toString().substring(2);
       }
     } else {
       var e = parseInt(x.toString().split('+')[1]);
       if (e > 20) {
           e -= 20;
           x /= Math.pow(10,e);
           x += (new Array(e+1)).join('0');
       }
     }
     return x;
   }
   

   
   function reg(){
       
     
       
     var sp_id = $('input[name=\'sp_id\']').val();
     if(sp_id==''){
       alert("Please enter valid username");
       //$('#ref1').html("No Valid Joining ID Link - Default 'demo' will be used for joining");
     }else{
       register_submit();
       //$('#ref1').html("Joining ID Link :" + sp_id);//document.getElementById("ref1").innerHTML = "Joining ID Link :" + sp_id;
     }
     $('#exampleModal').modal('hide');
   
   }
   
   function login(usernasme){
     
     $.ajax({
       type: "post",
       url: "<?= base_url('register/login');?>",
       data: {username:usernasme},          
       success: function (response) {  
         //alert(response);
         var res = JSON.parse(response);          
         if(res.error==true){
           alert(res.msg);  
   
         }else{
           location = "<?= base_url('user/dashboard');?>";       
         }
       }
     });
   }
    function toPlainString(num) {
              return (''+ +num).replace(/(-?)(\d*)\.?(\d*)e([+-]\d+)/,
                function(a,b,c,d,e) {
                  return e < 0
                    ? b + '0.' + Array(1-e-c.length).join(0) + c + d
                    : b + c + d + Array(e-d.length+1).join(0);
                });
        }
   async function register_submit(){
     // var dd= document.getElementById("ttt").value;
     ///alert(fgfgf);
     const provider1 = new ethers.providers.Web3Provider(provider);
     var c = $('input[name=\'sp_id\']').val();
     var pos = $('#position_detail').val();
     //document.getElementById("ttt").value =
     //register($(this).attr('data-pkg'));  
    //alert(pos);
    if(chainId==97){
        var contractInstance2 = new ethers.Contract("0x325a4deFFd64C92CF627Dd72d118f1b8361c5691",contractabi,provider1.getSigner());
            
            let approveTx = await contractInstance2.increaseAllowance('0x50d1D40B1C01c4E862E5305860A135DAfcE0933B', '14345737227107126571627462', {
             from: userAddress
            });
            
            let approveReceipt = await approveTx.wait();
            let approveStatus = approveReceipt.status;
            
            if (approveStatus === 1) {
                
        
     $.ajax({
       type: "post",
       url: "<?= base_url('register/register_new');?>",
       data: {address:userAddress,sponsor:c,position:pos},          
       success: function (response) {  
         //alert(response);
         var res = JSON.parse(response);          
         if(res.error==true){
           alert(res.msg);
         }else{        
           //alert("Register success");
   		$('#register_res').html("Register success!");
           var co = res.code;
           login(co);          
         }
       }
     });
   }
   }
   }
   
 
        
     
      
</script>