/**
 *Author     : Ishaan Manga (102878937)
 *File name  : enquiry.js
 *Purpose    : Assignment 2 JavaScript addition
 *Created    : 17/04/2021
 *Last Updated: 24/04/2021
 */
"use strict";

/* Changes for enquiry form */
window.onload=function() {
//  var errorMsg = "";
//	var postCodeError = "";
    var totalPrice = 0;
    var modelPriceObj = {};
    modelPriceObj['2018'] = 1200;
    modelPriceObj['2019'] = 1400;
    modelPriceObj['2020'] = 1600;
    modelPriceObj['2021'] = 1800;


             // MATCHING POSTCODE CRITERIA BY JS   //
   /*     var pc = document.getElementById('postcode');
        var st = document.getElementById('state');
        st.addEventListener('change', function (e) {
            validatePostCode()
        });

        pc.addEventListener('change', function (e) {
            validatePostCode()
        });

        function validatePostCode(el){   
		    postCodeError = "";
            var postCodeInvalid = false;
            var state = st.value;
            var text = pc.value.substring(0,1);
            if (state === 'VIC'){
                if(text !== '3' && text !== '8') {
                    postCodeInvalid = true;
                }
            } else if (state === 'NSW'){
                if(text !== '1' && text !== '2') {
                    postCodeInvalid = true;
                }
            } else if (state === 'QLD'){
                if(text !== '4' && text !== '9') {
                    postCodeInvalid = true;
                }
            } else if (state === 'NT' || state === 'act'){
                if(text !== '0') {
                    postCodeInvalid = true;
                }
            } else if (state === 'WA'){
                if(text !== '6') {
                    postCodeInvalid = true;
                }
            } else if (state === 'SA'){
                if(text !== '5') {
                    postCodeInvalid = true;
                }
            } else if (state === 'TAS'){
                if(text !== '7') {
                    postCodeInvalid = true;
                }
            } else if (state === 'plsSelect'){
				alert('Please select postcode');
				postCodeInvalid = true; 
			} else if (state === 'ACT') {
				if (text !== '0') {
					postCodeInvalid = true;
				}
			}
			

            if(postCodeInvalid){
                postCodeError = "1";
                document.getElementById('postcode-error').innerHTML = "Invalid postcode for selected state.";
            }else{
                document.getElementById('postcode-error').innerHTML = "";
            }
   		}  */
 
         //  MODEL QUANTITY AND TOTAL PRICE  //
       
    var md1 = document.getElementById('model1');
	var md2 = document.getElementById('model2');
	var md3 = document.getElementById('model3');
	var md4 = document.getElementById('model4');
    var q = document.getElementById('qty');
	var md = "";
    md1.addEventListener('change', function (e) {
		md = md1.value;
        if(q.value > 0){
            totalPrice = "$ " +modelPriceObj[md1.value] * q.value ;
			
        }
    });
	md2.addEventListener('change', function (e) {
		md = md2.value;
        if(q.value > 0){
            totalPrice = "$ " +modelPriceObj[md2.value] * q.value ;
			
        }
    });
   md3.addEventListener('change', function (e) {
	   md = md3.value;
        if(q.value > 0){
            totalPrice = "$ " +modelPriceObj[md3.value] * q.value ;
			
        }
    });
	md4.addEventListener('change', function (e) {
		md = md4.value;
        if(q.value > 0){
            totalPrice = "$ " + modelPriceObj[md4.value] * q.value ;
			
        }
    });
    q.addEventListener('change', function (e) {
        if(modelPriceObj[md]){
            totalPrice = "$ " + modelPriceObj[md] * q.value ;
		}
    });
	q.addEventListener('change', function (e) {
	if (md== ''){
		alert('Please select product');
		
	}});
   
    
   /* const form = document.getElementById('enquiryForm');
    form.addEventListener('submit', function(e) {
		    
            errorMsg = validateQty();    
            errorMsg += validateFormFields(this.firstName);
			errorMsg += validateFormFields(this.lastName);
            errorMsg += validateFormFields(this.email);
			errorMsg += validateFormFields(this.street);
			errorMsg += validateFormFields(this.town);
			errorMsg += validateFormFields(this.phoneNo);
			
			
			
                          
            if (errorMsg.length > 0 || postCodeError.length > 0) {
                e.preventDefault();
                return false;
            } else {
                storeAndSubmit(this);
                return true;
            }
    });

    function validateFormFields(el) {
        var error = "";
        if (el.value.length === 0) {
            document.getElementById(el.name+'-error').innerHTML = "Please fill in the required fields";
            error = "1";
        } else {
            document.getElementById(el.name+'-error').innerHTML = '';
        }
        return error;
    }   */

          //  STORING DATA FILLED in LOCAL STORAGE   //
    function storeAndSubmit(form){ 
	    
       
        let myStorage = window.localStorage;
        myStorage.setItem('firstName', form.firstName.value);
		myStorage.setItem('lastName', form.lastName.value);
	    myStorage.setItem('street', form.street.value);
		myStorage.setItem('town', form.town.value);
		myStorage.setItem('phoneNo', form.phoneNo.value);
		myStorage.setItem('state', state.value);
		myStorage.setItem('postcode', postcode.value);
        myStorage.setItem('email', form.email.value);
        myStorage.setItem('total',totalPrice);
        myStorage.setItem('cost',modelPriceObj[md]);
        myStorage.setItem('model',md);
		myStorage.setItem('qty', form.qty.value);
		
    }
	    
		   //   QUANTITY CANT BE NEGATIVE OR GREATER THAN 15  //
	
/*	function validateQty() {
		var errMsg = "";
		var err = "";
		var result = true;
		var quantity = document.getElementById("qty").value;
		if(quantity <= 0)  {
			errMsg = errMsg + "Quantity should be a positive value\n";
			result = false;
		}
		if (quantity >= 15) {
				errMsg = errMsg + "You cant add more than 15 items to your cart.\n";
				result = false;
		  }
		if (!result) {
			err = "1";
			document.getElementById('qty-error').innerHTML = errMsg;
			
		} else {
			document.getElementById('qty-error').innerHTML = "";
		}
		return err;
   } */


   const form = document.getElementById('enquiryForm');
    form.addEventListener('submit', function(e) {
			
	           storeAndSubmit(this);
                return true;
             }
    )
   }    
