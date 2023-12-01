var completion = 0;

function LimitSB() {
    if ( $('#SelectAccount').val() == "Spread Betting" ){
            $('#TradingCurrency').val( 'GBP' );
            $('#TradingCurrency').attr('disabled', 'disabled');
    } else {
            $('#TradingCurrency').removeAttr('disabled');
    }
}

function populatePhoneCode(countryCode) {
    $('#togllePhoneCodeBtn').html($('#phoneCode' + countryCode).html());
    $('#phoneCodeHidden').val($('#phoneCode' + countryCode).html());
}

function populatePhoneCodeFromCountry() {
    
    $('#togllePhoneCodeBtn').html($('#phoneCode' + $('#Country').val()).html());
    $('#phoneCodeHidden').val($('#phoneCode' + $('#Country').val()).html());
}

function populateCountryOfBirth() {
    $('#CountryOfBirth').val($('#Country').val());
}

function redirectToBi() {
    $('#redirectToBiForm').submit();
}

function filterSavings(eventElement) {  

    const selected = $(eventElement).val();
    const order = $('#Salary').find(":selected").data('order');
    $('#Savings').val(selected);

    $("#Savings option").each(function() {
        $(this).show();
        const orderSecond = $(this).attr('data-orderSecond');
        if (order > orderSecond) $(this).hide();
    });
    
}

function tradingExperienceChoose() {
    if ($('#TradingExperienceYesNo').val() == 'Yes') {
        $('#TradingExperienceNo').hide();
        $('#TradingExperienceYes').show();
    } else if ($('#TradingExperienceYesNo').val() == 'No') {
        $('#TradingExperienceYes').hide();
        $('#TradingExperienceNo').show();
    } else {
        $('#TradingExperienceNo').hide();
        $('#TradingExperienceYes').hide();
    }
}

function changeDocumentType() {
    let organization = SERVER_ORGANIZATION;
    let profilecountries;

    switch (organization) {
        case 'Jordan':
            profilecountries = ['AT', 'DK', 'FR', 'DE', 'IE', 'IT', 'LU', 'NL', 'NO', 'ES', 'SE', 'ZA', 'BR', 'CA', 'CN', 'MX', 'GB', 'JO'];
            break;  
        default:
            profilecountries = ['AT', 'DK', 'FR', 'DE', 'IE', 'IT', 'LU', 'NL', 'NO', 'ES', 'SE', 'ZA', 'BR', 'CA', 'CN', 'MX', 'GB'];
            break;
    }

    if ($.inArray($('#CitizenshipCode').val(), profilecountries)!='-1') {
        $('#groupDocumentSelect').show();
        $('#groupPassportId').hide();
        $('#groupIdNumber').hide();
        
        if ($('#CitizenshipCode').val() == 'BR') {
            $('.documentType').hide();
            $('#idBR').show();
            $('#expirationID').html($('#idBR-expiration').html());
            $('#DocumentSelect option[value=IdNumber]').text($('#idBR').text());
        }else if ($('#CitizenshipCode').val() == 'JO' && organization == 'Jordan') {
            $('.documentType').hide();
            $('#id1').show();
            $('#expirationID').html($('#id1-expiration').html());
            $('#DocumentSelect option[value=IdNumber]').text($('#id1').text());
        }else if ($('#CitizenshipCode').val() == 'CA') {
            $('.documentType').hide();
            $('#idCA').show();
            $('#expirationID').html($('#idCA-expiration').html());
            $('#DocumentSelect option[value=IdNumber]').text($('#idCA').text());
        }else if ($('#CitizenshipCode').val() == 'CN') {
            $('.documentType').hide();
            $('#idCN').show();
            $('#expirationID').html($('#idCN-expiration').html());
            $('#DocumentSelect option[value=IdNumber]').text($('#idCN').text());
        }else if ($('#CitizenshipCode').val() == 'MX') {
            $('.documentType').hide();
            $('#idMX').show();
            $('#expirationID').html($('#idMX-expiration').html());
            $('#DocumentSelect option[value=IdNumber]').text($('#idMX').text());
        }else if ($('#CitizenshipCode').val() == 'GB') {
            $('.documentType').hide();
            $('#idGB').show();
            $('#expirationID').html($('#idGB-expiration').html());
            $('#DocumentSelect option[value=IdNumber]').text($('#idGB').text());
        }
        else {
            $('.documentType').hide();
            $('#id1').show();
            $('#expirationID').html($('#id1-expiration').html());
            $('#DocumentSelect option[value=IdNumber]').text($('#id1').text());
        }
        
        
        if ($('#DocumentSelect').val() == 'PassportId') {
            $('#groupPassportId').show();
            
            $('#expirationPassport').show();
            $('#expirationID').hide();
        }
        
        if ($('#DocumentSelect').val() == 'IdNumber') {
            $('#groupIdNumber').show();
            
            $('#expirationPassport').hide();
            $('#expirationID').show();
        }
        
    }
    else {
        $('#groupDocumentSelect').hide();
        $('#groupPassportId').show();
        $('#groupIdNumber').hide();
        
        
        $('#expirationPassport').show();
        $('#expirationID').hide();
    }
    
}


function documentSelect() {
    if ($('#DocumentSelect').val() == 'PassportId') {
        $('#groupIdNumber').hide();
        $('#groupPassportId').show();
        
        $('#expirationPassport').show();
        $('#expirationID').hide();
    }
    if ($('#DocumentSelect').val() == 'IdNumber') {
        $('#groupPassportId').hide();
        $('#groupIdNumber').show();
        
        $('#expirationPassport').hide();
        $('#expirationID').show();
    }
    if ($('#DocumentSelect').val() == '' || $('#DocumentSelect').val() == null) {
        $('#groupPassportId').hide();
        $('#groupIdNumber').hide();
        
        $('#expirationPassport').hide();
        $('#expirationID').show();
    }
}

function setDataInternalTransfer(account, currency, balance, fromto) {
    if(fromto == "from") {
        $('#listGroupFrom > .list-group-item').removeClass('list-group-item-success');
        $('#listGroupFrom > .list-group-item > .checkIcon').hide();
        $('#accountFrom').val( account );
        $('#currencyFrom').val( currency );
        $('#from' + account).addClass('list-group-item-success');
        $('#from' + account + ' > .checkIcon').show();
        $('#InternalAmount').attr( 'placeholder', 'Max: ' + balance + ' ' + currency );
        $('#maxAmountFrom').val( balance );
    }
    
    if(fromto == "to") {
        
        if (balance.slice(0,1) == '-') {
            $('#modalDeficit').modal({
                backdrop: 'static',
                keyboard: false
            });
           $('#modalDeficit').modal('show');
        }
        $('#listGroupTo > .list-group-item').removeClass('list-group-item-success');
        $('#listGroupTo > .list-group-item > .checkIcon').hide();
        $('#accountTo').val( account );
        $('#currencyTo').val( currency );
        $('#to' + account).addClass('list-group-item-success');
        $('#to' + account + ' > .checkIcon').show();
    }
}

function setDataExchangeTransfer(account, currency, balance, fromto, ReceiverAccountType) {
    if(fromto == "from") {
        $('#listGroupFrom > .list-group-item').removeClass('list-group-item-success');
        $('#accountFrom').val( account );
        $('#currencyFrom').val( currency );
        $('#from' + account).addClass('list-group-item-success');
        $('#InternalAmount').attr( 'placeholder', 'Max: ' + balance + ' ' + currency );
        $('#maxAmountFrom').val( balance );
        
    }
    
    if(fromto == "to") {
        
        if (balance.slice(0,1) == '-') {
            $('#modalDeficit').modal({
                backdrop: 'static',
                keyboard: false
            });
           $('#modalDeficit').modal('show');
        }
        $('#listGroupTo > .list-group-item').removeClass('list-group-item-success');
        $('#accountTo').val( account );
        $('#currencyTo').val( currency );
        $('#to' + account).addClass('list-group-item-success');
        
        if (ReceiverAccountType == '1') {
            $('#ReceiverAccountType').val( 'Internal D/W' );
        }
        else {
            $('#ReceiverAccountType').val( '' );
        }
        
    }
}

function validateInternalTransfer() {
    ret = true;

    formatInternalAmount();
    
    if($('#accountFrom').val().trim() == "") {
        $('#helpBlockAccountFrom').css("color", "#a94442");
        $('#helpBlockAccountFrom').html("You need to select source account!"); 
        ret = false;
    }
    else {
        $('#helpBlockAccountFrom').html("");
    }
    
    if($('#accountTo').val().trim() == "") {
        $('#helpBlockAccountTo').css("color", "#a94442");
        $('#helpBlockAccountTo').html("You need to select target account!"); 
        ret = false;
    }
    else {
        $('#helpBlockAccountTo').html("");
    }
    
    if($('#accountFrom').val().trim() == $('#accountTo').val().trim() && $('#accountFrom').val().trim() != "" && $('#accountTo').val().trim() != "") {
        $('#helpBlockDiffAccount').css("color", "#a94442");
        $('#helpBlockDiffAccount').html("Please select different account than source account!"); 
        ret = false;
    }
    else {
        $('#helpBlockDiffAccount').html("");
    }
    
    if($('#currencyFrom').val().trim() != $('#currencyTo').val().trim() && $('#currencyFrom').val().trim() != "" && $('#currencyTo').val().trim() != "") {
        $('#helpBlockDiffCurrency').css("color", "#a94442");
        $('#helpBlockDiffCurrency').html("Please select account with the same currency!"); 
        ret = false;
    }
    else {
        $('#helpBlockDiffCurrency').html("");
    }
    
    if($('#InternalAmount').val().trim() == "" || $('#maxAmountFrom').val().trim() - $('#InternalAmount').val().trim() < 0  || $('#InternalAmount').val().trim() <= 0) {
        $('#groupInternalAmount').addClass("has-error"); 
        $('#helpBlockInternalAmount').css("color", "#a94442");
        if ($('#maxAmountFrom').val().trim() != "") {
            $('#helpBlockInternalAmount').html("Please make sure you entered the right amount! It needs to be >= 0 and <= " + $('#maxAmountFrom').val()); 
        }
        else {
            $('#helpBlockInternalAmount').html("Please make sure you entered the right amount!"); 
        }
        
        ret = false;
    }
    else {
        $('#groupInternalAmount').removeClass("has-error");
        $('#helpBlockInternalAmount').html("");
    }
    
    return ret;
}


function validateNewDemo() {
    ret = true;

    amoSelected = false;
    //platform validation
    if ($('#Platform').is(':visible')) {
        if($('#Platform').val().trim() == "") {
            $('#Platform').addClass("has-error"); 
            $('#helpBlockPlatform').css("color", "#a94442");
            $('#helpBlockPlatform').html(profileselectvaluefromlist); 
            ret = false;
        }
        else {
            if ($('#Platform').val() == 'AMO') {
                amoSelected = true;
            }

            $('#Platform').removeClass("has-error");
            $('#helpBlockPlatform').html("");
        }
    }
    
    //currency validation
    if (!amoSelected) {
        if($('#TradingCurrency').val().trim() == "") {
            $('#TradingCurrency').addClass("has-error"); 
            $('#helpBlockTradingCurrency').css("color", "#a94442");
            $('#helpBlockTradingCurrency').html(tradeaccountselectcurrency); 
            ret = false;
        }
        else {
            $('#TradingCurrency').removeClass("has-error");
            $('#helpBlockTradingCurrency').html("");
        }
    }

    //password validation
    if(!amoSelected) {
        if($('#Password').val().trim() == ""){
            $('#groupPassword').addClass("has-error"); 
            $('#helpBlockPassword').css("color", "#a94442");
            $('#helpBlockPassword').html(signuppassword);
            ret = false;
        }
        else if(validatePasswordReverse($('#Password').val())) {
            $('#groupPassword').addClass("has-error"); 
            $('#helpBlockPassword').css("color", "#a94442");
            $('#helpBlockPassword').html(incorrectpassword);
            ret = false;
        }
        else {
            $('#groupPassword').removeClass("has-error");
            $('#helpBlockPassword').html("");
        }
    } else if (amoSelected) {
        $('#Password').val('');
    }

    if (ret == true) {
        $('#newDemoStaticButton').hide();
        $('#submittingButton').show();
    }

    return ret;
}

function removePasswordCheckIfAmo() {
    if($('#Platform').val() == 'AMO') {
        $('#groupPassword').hide();
    }
}

function validateNewLive() {
    ret = true;
    
    //select account validation
    if($('#TypeOfAccount').val().trim() == "") {
        $('#TypeOfAccount').addClass("has-error"); 
        $('#helpBlockTypeOfAccount').css("color", "#a94442");
        $('#helpBlockTypeOfAccount').html(tradeaccountselectlive); 
        ret = false;
    }
    else {
        $('#TypeOfAccount').removeClass("has-error");
        $('#helpBlockTypeOfAccount').html("");
    }

    amoSelected = false;
    //platform validation
    if ($('#Platform').is(':visible')) {
        if($('#Platform').val().trim() == "") {
            $('#Platform').addClass("has-error"); 
            $('#helpBlockPlatform').css("color", "#a94442");
            $('#helpBlockPlatform').html(profileselectvaluefromlist); 
            ret = false;
        }
        else {
            if ($('#Platform').val() == 'AMO') {
                amoSelected = true;
            }

            $('#Platform').removeClass("has-error");
            $('#helpBlockPlatform').html("");
        }
    }
    
    //currency validation
    if (!amoSelected) {
        if($('#TradingCurrency').val().trim() == "") {
            $('#groupTradingCurrency').addClass("has-error"); 
            $('#helpBlockTradingCurrency').css("color", "#a94442");
            $('#helpBlockTradingCurrency').html(tradeaccountselectcurrency); 
            ret = false;
        }
        else {
            $('#groupTradingCurrency').removeClass("has-error");
            $('#helpBlockTradingCurrency').html("");
        }
    }

    //password validation
    if(!amoSelected) {
        if($('#Password').val().trim() == ""){
            $('#groupPassword').addClass("has-error"); 
            $('#helpBlockPassword').css("color", "#a94442");
            $('#helpBlockPassword').html(signuppassword);
            ret = false;
        }
        else if(validatePasswordReverse($('#Password').val())) {
            $('#groupPassword').addClass("has-error"); 
            $('#helpBlockPassword').css("color", "#a94442");
            $('#helpBlockPassword').html(incorrectpassword);
            ret = false;
        }
        else {
            $('#groupPassword').removeClass("has-error");
            $('#helpBlockPassword').html("");
        }
    } else if (amoSelected) {
        $('#Password').val('');
    }

    if (ret == true) {
        $('#newLiveStaticButton').hide();
        $('#submittingButton').show();
    }
    
    return ret;
}

function newLiveChangePlatform() {
    if ($('#Platform').is(':visible')) {
        if ($('#Platform').val().trim() == 'AMO') {
            $('#groupTradingCurrency').hide();
            $('#groupPassword').hide();
        } else {
            $('#groupTradingCurrency').show();
            $('#groupPassword').show();
        }
    }
}

function newDemoChangePlatform() {
    if ($('#Platform').is(':visible')) {
        if ($('#Platform').val().trim() == 'AMO') {
            $('#groupTradingCurrency').hide();
            $('#groupLeverage').hide();
            $('#groupPassword').hide();
        } else {
            $('#groupTradingCurrency').show();
            $('#groupLeverage').show();
            $('#groupPassword').show();
        }
    }
}

function validateTaxIdNumber(taxId) {
    var re = /^[a-zA-Z0-9\-]+$/;
    return re.test(taxId);
}

function validatePTID(ptid) {
	var re = /^[1-9]\d{6}$/;
	return re.test(ptid);
}

function validateSmallPTID(ptid) {
    var re = /^[1-9]\d{3,4}$/;
    return re.test(ptid);
}

//returns true if password criteria is not met
function validatePasswordReverse(password) {
    //var ret = /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$/;
    var ret = /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*)$/;//without special char
    return ret.test(password);
}

function validateCupPayout() {
    ret = true;
    
    //check balance
    /*if(parseFloat($('#PayoutAmount').val().trim()) >  parseFloat($('#currentBalanceCUP').val())) {
        $('#groupPayoutAmount').addClass("has-error"); 
        $('#helpBlockPayoutAmount').css("color", "#a94442");
        $('#helpBlockPayoutAmount').html(amounthigh);
        ret = false;
    }
    else */if($('#PayoutAmount').val().trim() == "" || !$.isNumeric($("#PayoutAmount").val()) ) {
        $('#groupPayoutAmount').addClass("has-error"); 
        $('#helpBlockPayoutAmount').css("color", "#a94442");
        $('#helpBlockPayoutAmount').html(enteramount); 
        ret = false;
    }
    else {
        $('#groupPayoutAmount').removeClass("has-error");
        $('#helpBlockPayoutAmount').html("");
    }
    
    //amount
    /*if($('#PayoutAmount').val().trim() == "" || !$.isNumeric($("#PayoutAmount").val()) ) {
        $('#groupPayoutAmount').addClass("has-error"); 
        $('#helpBlockPayoutAmount').css("color", "#a94442");
        $('#helpBlockPayoutAmount').html(enteramount); 
        ret = false;
    }
    else {
        $('#groupPayoutAmount').removeClass("has-error");
        $('#helpBlockPayoutAmount').html("");
    }*/
    
    //card holder name validation
    if($('#PayoutCardHolder').val().trim() == "") {
        $('#groupPayoutCardHolder').addClass("has-error"); 
        $('#helpBlockPayoutCardHolder').css("color", "#a94442");
        $('#helpBlockPayoutCardHolder').html(payoutcardholder); 
        ret = false;
    }
    else if(!isChineseCharacters($('#PayoutCardHolder').val().trim())) {
        $('#groupPayoutCardHolder').addClass("has-error"); 
        $('#helpBlockPayoutCardHolder').css("color", "#a94442");
        $('#helpBlockPayoutCardHolder').html(payoutcardholderchinese); 
        ret = false;
    }
    else {
        $('#groupPayoutCardHolder').removeClass("has-error");
        $('#helpBlockPayoutCardHolder').html("");
    }
    
    //acc no validation
    if($('#PayoutAccNo').val().trim() == "") {
        $('#groupPayoutAccNo').addClass("has-error"); 
        $('#helpBlockPayoutAccNo').css("color", "#a94442");
        $('#helpBlockPayoutAccNo').html(payoutaccno); 
        ret = false;
    }
    else {
        $('#groupPayoutAccNo').removeClass("has-error");
        $('#helpBlockPayoutAccNo').html("");
    }
    
    //bank validation
    if($('#PayoutBank').val().trim() == "" || $('#PayoutBank').val().trim() == null) {
        $('#groupPayoutBank').addClass("has-error"); 
        $('#helpBlockPayoutBank').css("color", "#a94442");
        $('#helpBlockPayoutBank').html(profileselectvaluefromlist); 
        ret = false;
    }
    else {
        $('#groupPayoutBank').removeClass("has-error");
        $('#helpBlockPayoutBank').html("");
    }
    
    //state validation
    if($('#PayoutState').val().trim() == "" || $('#PayoutState').val().trim() == null) {
        $('#groupPayoutState').addClass("has-error"); 
        $('#helpBlockPayoutState').css("color", "#a94442");
        $('#helpBlockPayoutState').html(profileselectvaluefromlist); 
        ret = false;
    }
    else {
        $('#groupPayoutState').removeClass("has-error");
        $('#helpBlockPayoutState').html("");
    }
    
    //city validation
    if($('#PayoutCity').val().trim() == "" || $('#PayoutCity').val().trim() == null) {
        $('#groupPayoutCity').addClass("has-error"); 
        $('#helpBlockPayoutCity').css("color", "#a94442");
        $('#helpBlockPayoutCity').html(profileselectvaluefromlist); 
        ret = false;
    }
    else {
        $('#groupPayoutCity').removeClass("has-error");
        $('#helpBlockPayoutCity').html("");
    }
    
    //postal code validation
    if($('#PayoutZip').val().trim() == "") {
        $('#groupPayoutZip').addClass("has-error"); 
        $('#helpBlockPayoutZip').css("color", "#a94442");
        $('#helpBlockPayoutZip').html(profilezip); 
        ret = false;
    }
    else {
        $('#groupPayoutZip').removeClass("has-error");
        $('#helpBlockPayoutZip').html("");
    }
    
    //street name validation
    if($('#PayoutStreet').val().trim() == "") {
        $('#groupPayoutStreet').addClass("has-error"); 
        $('#helpBlockPayoutStreet').css("color", "#a94442");
        $('#helpBlockPayoutStreet').html(profilestreetname); 
        ret = false;
    }
    else {
        $('#groupPayoutStreet').removeClass("has-error");
        $('#helpBlockPayoutStreet').html("");
    }
    
    //phone validation
    if($('#PayoutPhone').val().length < 6 || !validatePhone($('#PayoutPhone').val())) {
        $('#groupPayoutPhone').addClass("has-error"); 
        $('#helpBlockPayoutStreet').css("color", "#a94442");
        $('#helpBlockPayoutStreet').html(profilephone); 
        ret = false;
    }
    else {
        $('#groupPayoutPhone').removeClass("has-error");
        $('#helpBlockPayoutStreet').html("");
    }
    
    if (ret == true) {
        $('#cupSubmit').hide();
        $('#submittingButton').show();
    }
    
    return ret;
}

function validateChangePassword() {
    ret = true;
    
    //password type validation
    if($('#passwordType').val().trim() == ""){
        $('#groupPasswordType').addClass("has-error"); 
        $('.helpBlockPasswordType').css("color", "#a94442");
        $('.helpBlockPasswordType').html(profileselectdropdown);
        ret = false;
    }
    else {
        $('#groupPasswordType').removeClass("has-error");
        $('.helpBlockPasswordType').html("");
    }
    
    //old password validation
    if($('#OldPassword').val().trim() == ""){
        $('#groupOldPassword').addClass("has-error"); 
        $('.helpBlockOldPassword').css("color", "#a94442");
        $('.helpBlockOldPassword').html(profilecurrentportalpass);
        ret = false;
    }
    else {
        $('#groupOldPassword').removeClass("has-error");
        $('.helpBlockOldPassword').html("");
    }
    
    //new password validation
    if($('#NewPassword').val().trim() == ""){
        $('#groupNewPassword').addClass("has-error"); 
        $('.helpBlockNewPassword').css("color", "#a94442");
        $('.helpBlockNewPassword').html(signuppassword);
        ret = false;
    }
    else if(validatePasswordReverse($('#NewPassword').val())) {
        $('#groupNewPassword').addClass("has-error"); 
        $('.helpBlockNewPassword').css("color", "#a94442");
        $('.helpBlockNewPassword').html(signuppasswordcomplexity);
        ret = false;
    }
    else {
        $('#groupNewPassword').removeClass("has-error");
        $('.helpBlockNewPassword').html("");
    }
    
    
    
    return ret;
}

function onIndustryChange() {
    //if ($('#groupIndustry').is(':visible')) {
        if ($('#Industry').val() == 'Other') {
            $('#groupIndustryDescription').show();
        } else {
            $('#IndustryDescription').val('');
            $('#groupIndustryDescription').hide();
        }
    //}
}

function goBackFrom(id) {
    // Hide current section
    $('#collapse'+id).collapse('hide');

    // Find previous section
    sections = $('.panel-collapse');
    prevSectionIndex = sections.index($('#collapse'+id)) - 1;

    // Show previous section, if possible
    if (prevSectionIndex >= 0) {
        $(sections[prevSectionIndex]).collapse('show');
    }
}

function goToNextSection(id) {
    // Find next section
    sections = $('.panel-collapse');
    nextSectionIndex = sections.index($('#collapse'+id)) + 1;
    
    // Show previous section, if possible
    if (nextSectionIndex < sections.length) {
        $(sections[nextSectionIndex]).collapse('show');
    }
}

function validateUpdateTaxId() {
    var ret = true;

    if ($('#TaxIdYesNo').val().trim() == '') {
        
        $('#groupTaxIdYesNo').addClass('has-error');
        $('#helpBlockTaxIdYesNo').css("color", "#a94442");
        $('#helpBlockTaxIdYesNo').html(profiletaxidyesno);
        ret = false;
    
    } else {

        $('#groupTaxIdYesNo').removeClass("has-error");
        $('#helpBlockTaxIdYesNo').html("");

        if ($('#TaxIdYesNo').val().trim() == 'false') {
            
            if ($('#TaxIdReason').val().trim() == '0') {
                $('#groupTaxIdReason').addClass('has-error');
                $('#helpBlockTaxIdReason').css("color", "#a94442");
                $('#helpBlockTaxIdReason').html(profiletaxidreason);
                ret = false;
            } else {
                $('#groupTaxIdReason').removeClass("has-error");
                $('#helpBlockTaxIdReason').html("");
            }

        } else if ($('#TaxIdYesNo').val().trim() == 'true') {

            var taxCountriesSelected = [];
            $('.taxIdRow').each(function() {
                // Tax ID Country validation
                if ($(this).find('.taxCountry').val().trim() == '') {
                    $(this).find('.groupTaxIdCountry').addClass('has-error');
                    $(this).find('.groupTaxIdCountry').css("color", "#a94442");
                    $(this).find('.helpBlockTaxCountry').html(profiletaxidcountry);
                    ret = false;
                } else {
                    // check for repeating countries
                    if ($.inArray($(this).find('.taxCountry').val().trim(), taxCountriesSelected) > -1) {
                        $(this).find('.groupTaxIdCountry').addClass('has-error');
                        $(this).find('.groupTaxIdCountry').css("color", "#a94442");
                        $(this).find('.helpBlockTaxCountry').html(profiletaxidcountrynorepeat);
                        ret = false;
                    } else {
                        $(this).find('.groupTaxIdCountry').removeClass("has-error");
                        $(this).find('.helpBlockTaxCountry').html("");
                    }
                    taxCountriesSelected.push($(this).find('.taxCountry').val().trim());
                }
                // Tax ID Number validation
                if (!validateTaxIdNumber($(this).find('.taxIdNumber').val().trim())) {
                    $(this).find('.groupTaxIdNumber').addClass('has-error');
                    $(this).find('.groupTaxIdNumber').css("color", "#a94442");
                    $(this).find('.helpBlockTaxIdNumber').html(profiletaxidnumber);
                    ret = false;
                } else {
                    $(this).find('.groupTaxIdNumber').removeClass("has-error");
                    $(this).find('.helpBlockTaxIdNumber').html("");
                }
            });
        }
    }
    
    if (ret == true) {
        // Check whether the user has tax id and clear input fields related to the other choice.

        var TaxIdPairs = getTaxIdPairs();

        if ($('#TaxIdYesNo').val().trim() == 'false') {
            $('.groupTaxIdCountry').val('');
            $('.groupTaxIdNumber').val('');
        } else {
            $('#TaxIdReason').val('0');
        }
    }

    return ret;
    
}

function validateUpdateLeverage() {
    
    var ret = true;
    
    //See if any trade account is checked
    var checkedAccountsCount = 0;
    $('#groupSelectTradeAccounts input[type=checkbox]').each(function() {
        if (this.checked) {
            checkedAccountsCount += 1;
        }
    });
    if (checkedAccountsCount < 1) {
        $('#groupSelectTradeAccounts').addClass("has-error"); 
        $('#helpBlockSelectTradeAccounts').css("color", "#a94442");
        $('#helpBlockSelectTradeAccounts').html('Please select at least one trading account');
        ret = false;
    }

    if (ret == true) {
        $('#updateLeverageSubmit').hide();
        $('#submittingButton').show();
    }
    
    return ret;
    
}

function validateUpdateLanguage() {
    ret = true;
    
    if($('#PreferredLanguage').val().trim() == "") {
        $('#groupPreferredLanguage').addClass("has-error"); 
        $('#helpBlockPreferredLanguage').css("color", "#a94442");
        $('#helpBlockPreferredLanguage').html(languagehelptext); 
        ret = false;
    }
    else {
        $('#groupPreferredLanguage').removeClass("has-error");
        $('#helpBlockPreferredLanguage').html("");
    }

    if (ret == true) {
        $('#updateLanguageSubmit').hide();
        $('#submittingButton').show();
    }

    return ret;

}

function validateSendVerificationSms() {
    
    var ret = true;
    
    if (!validatePhoneMobileSMS($('#PhoneSms').val())) {
        $('#PhoneSms').addClass("has-error"); 
        $('#helpBlockPhoneSms').css("color", "#a94442");
        $('#helpBlockPhoneSms').html(profilephone); 
        ret = false;
    } else {
        $('#PhoneSms').removeClass("has-error"); 
        $('#helpBlockPhoneSms').html(''); 
    }

    if (ret == true) {
        $('#validateSendSmsSubmitButton').hide();
        $('#validateSendSmsSubmittingButton').show();
    }
    
    return ret;
}

function validateVerificationCodeSms() {
    
    var ret = true;
    
    if (!/^[0-9]{6}$/.test($('#PhoneSmsCode').val())) {
        $('#PhoneSmsCode').addClass("has-error"); 
        $('#helpBlockPhoneSmsCode').css("color", "#a94442");
        $('#helpBlockPhoneSmsCode').html(verificationcodetxt); 
        ret = false;
    } else {
        $('#PhoneSmsCode').removeClass("has-error"); 
        $('#helpBlockPhoneSmsCode').html(''); 
    }

    if (ret == true) {
        $('#validateSendSmsCodeSubmitButton').hide();
        $('#validateSendSmsCodeSubmittingButton').show();
    }
    
    return ret;
}

function latinCharactersNumbers(text) {
    return /^[a-zA-Z0-9 \-\.\,\']+$/.test(text);
}

function addressCheck(text) {
    // allowing latin characters and "/" character
    return /^[a-zA-Z0-9/ \-\.\,\']+$/.test(text);
}

function latinCharactersNumbersMRZ(text) {
    return /^[a-zA-Z0-9 \-\.\,\'\>\<]+$/.test(text);
}

function displayValidationError(fieldName, message) {
    $('#group'+fieldName).addClass("has-error"); 
    $('#helpBlock'+fieldName).css("color", "#a94442");
    $('#helpBlock'+fieldName).html(message); 
}

function clearValidationError(fieldName) {
    $('#group'+fieldName).removeClass("has-error");
    $('#helpBlock'+fieldName).html("");
}

function errorBlocksClearListener() {
    var helpBlocks = $('.help-block');
    var inputElementsIds = [];
    
    helpBlocks.each(function(i, element) {
        var blockId = $(element).attr('id');
        if (typeof(blockId) != 'undefined') {
            var inputId = blockId.split('helpBlock')[1];
            if (typeof(inputId) != 'undefined') {
                inputElementsIds.push(inputId);
            }
        }
    });

    inputElementsIds.forEach(function(id) {
        $('#'+id).on('focus', function() {
            var changedElementId = $(this).attr('id');
            clearValidationError(changedElementId);
        });
    });
}

function showLoadingButtonNext(section) {
    $('#next_'+section).attr('disabled', true);
    $('#next_'+section).hide();
    $('#nextLoading_'+section).show();
}

function stopLoadingButtonNext(section) {
    $('#next_'+section).attr('disabled', false);
    $('#next_'+section).show();
    $('#nextLoading_'+section).hide();
}

function ajaxUpdateProfile(data) {
    return $.ajax({
        url: "/portal/updateprofileajax",
        method: "POST",
        dataType: "json",
        data: data
    });
}

function updateCompletion(percentage) {
    //updating width of progress bar
    $(".profilePercentageNo").html(percentage+"%");
    //logic for progress bar color based on width
    if (percentage < 20) {
       $(".progress-bar").removeClass("progress-bar-warning");
       $(".progress-bar").removeClass("progress-bar-success");

       $(".progress-bar").addClass("progress-bar-danger");
    }
    else if(percentage < 50) {
        $(".progress-bar").removeClass("progress-bar-danger");
        $(".progress-bar").removeClass("progress-bar-success");

        $(".progress-bar").addClass("progress-bar-warning");
    }
    else if(percentage == 100) {
        $(".progress-bar").removeClass("progress-bar-danger");
        $(".progress-bar").removeClass("progress-bar-warning");

        $(".progress-bar").addClass("progress-bar-success");
    }
    else {
        $(".progress-bar").removeClass("progress-bar-danger");
        $(".progress-bar").removeClass("progress-bar-warning");
        $(".progress-bar").removeClass("progress-bar-success");
    }
    //animate the progress bar
    $(".progress-bar").animate({
        width: percentage + "%"
    }, 1000);

    //update completion status
    completion = percentage;
}

function validateProfilePanel(section, completed) {

    if (completed === undefined) {
        completed = false;
    }

    ret = true;
        
    if (section == 'PersonalInformation') {
        
        var updateFields = {};

        //title validation
        if($('#Title').val().trim() == "" || $('#Title').val().trim() == null) {
            displayValidationError('Title', profileselectvaluefromlist);
            ret = false;
        }
        else {
            clearValidationError('Title');
            updateFields['Title'] = $('#Title').val();
        }
        
        //first name validation
        if($('#FirstName').val().trim() == "") {
            displayValidationError('FirstName', signupfirstname);
            ret = false;
        } else if (!latinCharacters($('#FirstName').val().trim())) {
            displayValidationError('FirstName', latincharactersName);
            ret = false;
        } else {
            clearValidationError('FirstName');
            updateFields['FirstName'] = $('#FirstName').val();
        }
        
        //last name validation
        if($('#LastName').val().trim() == "") {
            displayValidationError('LastName', signuplastname);
            ret = false;
        } else if (!latinCharacters($('#LastName').val().trim())) {
            displayValidationError('LastName', latincharactersName);
            ret = false;
        } else {
            clearValidationError('LastName');
            updateFields['LastName'] = $('#LastName').val();
        }
        
        // date of birth validation;
        //let dobDateObj = new Date($('#DateOfBirth').data('datepicker').getFormattedDate('yyyy-mm-dd'));
        
        var dateString = $('#DateOfBirth').val();
        var dateParts = dateString.split("/");
        var dobDateObj = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);

        if (isNaN(dobDateObj)) { 
            displayValidationError('DOB', profiledob);
            ret = false; 
        } else {
            clearValidationError('DOB');
            //date of birth
            let dobRaw = dobDateObj;
            let dobDay = dobRaw.getDate().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
            let dobMonth = (dobRaw.getMonth() + 1).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
            let dobYear = dobRaw.getFullYear().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
            updateFields['DateOfBirth'] = dobYear+'-'+dobMonth+'-'+dobDay;
        }

        if (!isNaN(dobDateObj)) {
            // check if 18+
            let dobDay = dobDateObj.getDate();
            let dobMonth = dobDateObj.getMonth();
            let dobYear = dobDateObj.getFullYear(); 

            if (new Date(dobYear + 18, dobMonth + 1, dobDay) > new Date()) {
                displayValidationError('DOB', profileeighteen);
                ret = false;
		    } else {
                clearValidationError('DOB');
                //date of birth
                let dobRaw = dobDateObj;
                let dobDay = dobRaw.getDate().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
                let dobMonth = (dobRaw.getMonth() + 1).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
                let dobYear = dobRaw.getFullYear().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
                updateFields['DateOfBirth'] = dobYear+'-'+dobMonth+'-'+dobDay;
            }
	    }
        
        //Education validation
        if (organization == 'Cyprus') {

            if($('#Education').val().trim() == "" || $('#Education').val().trim() == null) {
                displayValidationError('Education', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('Education');
                updateFields['Education'] = $('#Education').val();
            }
        
        }

        //CitizenshipCode validation
        if($('#CitizenshipCode').val().trim() == "") {
            displayValidationError('CitizenshipCode', profilecitizenship);
            ret = false;
        }
        else {
            clearValidationError('CitizenshipCode');
            updateFields['CitizenshipCode'] = $('#CitizenshipCode').val();
        }

        //Marital status validation
        if (organization == 'Cyprus') {

            if($('#MaritalStatus').val().trim() == "" || $('#MaritalStatus').val().trim() == null) {
                displayValidationError('MaritalStatus', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('MaritalStatus');
                updateFields['MaritalStatus'] = $('#MaritalStatus').val();
            }

        }
        
        //Id expiration
        if (organization == 'Cyprus') {

            let idExpValDateObj = new Date($('#IDExpiration').data('datepicker').getFormattedDate('yyyy-mm-dd'));
            if (isNaN(idExpValDateObj)) {
                displayValidationError('IDExpiration', profileselectdropdown);
                ret = false; 
            } else {
                clearValidationError('IDExpiration');
                let idRaw = new Date($('#IDExpiration').data('datepicker').getFormattedDate('yyyy-mm-dd'));
                let idDay = idRaw.getDate().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
                let idMonth = (idRaw.getMonth() + 1).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
                let idYear = idRaw.getFullYear().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
                updateFields['IDExpiration'] = idYear+'-'+idMonth+'-'+idDay;
            }

            if (!isNaN(idExpValDateObj)) {
                var ts = Math.round((new Date()).getTime() / 1000);
                var dateExpiry = Math.round(idExpValDateObj.getTime() / 1000);

                if (ts > dateExpiry) { 
                    displayValidationError('IDExpiration', selectfuturedate);
                    ret = false; 
                } else { 
                    clearValidationError('IDExpiration');
                    let idRaw = new Date($('#IDExpiration').data('datepicker').getFormattedDate('yyyy-mm-dd'));
                    let idDay = idRaw.getDate().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
                    let idMonth = (idRaw.getMonth() + 1).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
                    let idYear = idRaw.getFullYear().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
                    updateFields['IDExpiration'] = idYear+'-'+idMonth+'-'+idDay;
                }
            }
        
        }

        //Gender validation
        if($('#Gender').val().trim() == "" || $('#Gender').val().trim() == null) {
            displayValidationError('Gender', profileselectvaluefromlist);
            ret = false;
        }
        else {
            clearValidationError('Gender');
            updateFields['Gender'] = $('#Gender').val();
        }
        
        //Document select
        if (organization == 'Cyprus') {

            if ($('#DocumentSelect').is(':visible') && $('#DocumentSelect').val().trim() == '') {
                displayValidationError('DocumentSelect', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('DocumentSelect');
            }

            //Passport validation
            if ($('#groupPassportId').is(":visible") && ($('#PassportId').val().trim() == "" || $('#PassportId').val().trim() == null)) {
                displayValidationError('PassportId', documentnumber);
                ret = false;
            }
            else if ($('#groupPassportId').is(":visible") && !latinCharactersNumbersMRZ($('#PassportId').val().trim())) {
                displayValidationError('PassportId', latincharactersNumbers);
                ret = false;
            } else {
                clearValidationError('PassportId');
                updateFields['PassportId'] = $('#PassportId').val();
            }
            
            //Id validation
            if ($('#groupIdNumber').is(":visible") && ($('#IdNumber').val().trim() == "" || $('#IdNumber').val().trim() == null)) {
                displayValidationError('IdNumber', documentnumber);
                $('#helpBlockIdNumber').html(documentnumber);
                ret = false;
            }
            else if ($('#groupIdNumber').is(":visible") && !latinCharactersNumbersMRZ($('#IdNumber').val().trim())) {
                displayValidationError('IdNumber', latincharactersNumbers);
                ret = false;
            } else {
                clearValidationError('IdNumber');
                updateFields['IdNumber'] = $('#IdNumber').val();
            }

        }
        
        //if all passed good
        if (ret == true) {
            showLoadingButtonNext(section);

            ajaxUpdateProfile({
                    fields: updateFields,
                    completed: completed,
                    section: section
                })
                .done(function(data) {
                    if (data.status == 'ok') {
                        $('#collapse'+section).collapse('hide');
                        stopLoadingButtonNext(section);
                        goToNextSection(section);
                        updateCompletion(data.completion);
                        if (data.redirect) {
                            location.href = data.redirect;
                        }
                    } else {
                        alert('error');
                    }
                })
                .fail(function(xhr) {
                    stopLoadingButtonNext(section);
                    alert('error');
                });
        }
        
        return ret;
    }//end step one
    
    if (section == 'ContactAddress') {

        var updateFields = {};

        //street name validation
        if($('#Street').val().trim() == "") {
            displayValidationError('Street', profilestreetname);
            ret = false;
        } else if (!addressCheck($('#Street').val().trim())) {
            displayValidationError('Street', latincharactersNumbers);
            ret = false;
        } else {
            clearValidationError('Street');
            updateFields['Street'] = $('#Street').val();
        }
        
        //house number validation
        if($('#StreetNo').val().trim() == "") {
            displayValidationError('StreetNo', profilehouseno);
            ret = false;
        } else if (!latinCharactersNumbers($('#StreetNo').val().trim())) {
            displayValidationError('StreetNo', latincharactersNumbers);
            ret = false;
        } else {
            clearValidationError('StreetNo');
            updateFields['StreetNo'] = $('#StreetNo').val();
        }
        
        //city validation
        if($('#City').val().trim() == "") {
            displayValidationError('City', profilecity);
            ret = false;
        } else if (!latinCharacters($('#City').val().trim())) {
            displayValidationError('City', latincharacters);
            ret = false;
        } else {
            clearValidationError('City');
            updateFields['City'] = $('#City').val();
        }
        
        //postal code validation
        if($('#Zip').val().trim() == "") {
            displayValidationError('Zip', profilezip);
            ret = false;
        }
        else {
            clearValidationError('Zip');
            updateFields['Zip'] = $('#Zip').val();
        }
        
        //country validation
        if($('#CountryCode').val().trim() == "") {
            displayValidationError('CountryCode', signupcountry);
            ret = false;
        }
        else {
            clearValidationError('CountryCode');
            updateFields['CountryCode'] = $('#CountryCode').val();
        }
        
        //country of birth validation
        if (organization == 'Jordan') {

            if ($('#CountryOfBirthCode').length > 0) {
                if($('#CountryOfBirthCode').val().trim() == "") {
                    displayValidationError('CountryOfBirthCode', signupcountry);
                    ret = false;
                }
                else {
                    clearValidationError('CountryOfBirthCode');
                    updateFields['CountryOfBirthCode'] = $('#CountryOfBirthCode').val();
                }
            }

        }

        //province validation
        if (organization == 'Belize' || organization == 'Jordan') {
            
            if($('#Province').val().trim() != "") {
                if (!latinCharactersNumbers($('#Province').val().trim())) {
                    displayValidationError('Province', latincharacters);
                    ret = false;
                }
            }
    
            updateFields['StateProvince'] = $('#Province').val();

        }

        //phone validation
        if($('#Phone').val().length < 6 || !validatePhone($('#Phone').val()) || $('#phoneCodeHidden').val() == '') {
            displayValidationError('Phone', profilephone);
            ret = false;
        }
        else {
            clearValidationError('Phone');
            updateFields['PhoneNumber'] = $('#Phone').val();
            updateFields['PhoneCode'] = $('#phoneCodeHidden').val();
        }
        
        //mobile validation
        if($('#Mobile').val().length < 6 || !validatePhoneMobile($('#Mobile').val())) {
            displayValidationError('Mobile', profilemobile);
            ret = false;
        }
        else {
            clearValidationError('Mobile');
            updateFields['MobileNumber'] = $('#Mobile').val();
        }
        
        /*alternative address validation*/
        if (organization == 'Cyprus') {

            //street name alt validation
            if($('#checkboxAddressAlt').is(':checked') && $('#StreetAlt').val().trim() == "") {
                displayValidationError('StreetAlt', profilestreetname);
                ret = false;
            } else if ($('#checkboxAddressAlt').is(':checked') && !addressCheck($('#StreetAlt').val().trim())) {
                displayValidationError('StreetAlt', latincharactersNumbers);
                ret = false;
            } else {
                clearValidationError('StreetAlt');
                updateFields['StreetAlt'] = $('#StreetAlt').val();
            }
            
            //house number alt validation
            if($('#checkboxAddressAlt').is(':checked') && $('#StreetNumberAlt').val().trim() == "") {
                displayValidationError('StreetNumberAlt', profilehouseno);
                ret = false;
            } else if ($('#checkboxAddressAlt').is(':checked') && !latinCharactersNumbers($('#StreetNumberAlt').val().trim())) {
                displayValidationError('StreetNumberAlt', latincharactersNumbers);
                ret = false;
            } else {
                clearValidationError('StreetNumberAlt');
                updateFields['StreetNumberAlt'] = $('#StreetNumberAlt').val();
            }
            
            //city alt validation
            if($('#checkboxAddressAlt').is(':checked') && $('#CityAlt').val().trim() == "") {
                displayValidationError('CityAlt', profilecity);
                ret = false;
            } else if ($('#checkboxAddressAlt').is(':checked') && !latinCharacters($('#CityAlt').val().trim())) {
                displayValidationError('CityAlt', latincharacters);
                ret = false;
            } else {
                clearValidationError('CityAlt');
                updateFields['CityAlt'] = $('#CityAlt').val();
            }
            
            //postal code alt validation
            if($('#checkboxAddressAlt').is(':checked') && $('#PostalCodeAlt').val().trim() == "") {
                displayValidationError('PostalCodeAlt', profilezip);
                ret = false;
            }
            else {
                clearValidationError('PostalCodeAlt');
                updateFields['PostalCodeAlt'] = $('#PostalCodeAlt').val();
            }
            
            //country alt validation
            if($('#checkboxAddressAlt').is(':checked') && $('#CountryAlt').val().trim() == "") {
                displayValidationError('CountryAlt', signupcountry);
                ret = false;
            }
            else {
                clearValidationError('CountryAlt');
                updateFields['CountryCodeAlt'] = $('#CountryAlt').val();
            }
            
        }
        /*end alternative address validation*/
        
        
        //if all passed good
        if (ret == true) {
            showLoadingButtonNext(section);

            ajaxUpdateProfile({
                    fields: updateFields,
                    completed: completed,
                    section: section
                })
                .done(function(data) {
                    if (data.status == 'ok') {
                        $('#collapse'+section).collapse('hide');
                        stopLoadingButtonNext(section);
                        goToNextSection(section);
                        updateCompletion(data.completion);
                        if (data.redirect) {
                            location.href = data.redirect;
                        }
                    } else {
                        alert('error');
                    }
                })
                .fail(function(xhr) {
                    stopLoadingButtonNext(section);
                    alert('error');
                });
            }
            
            return ret;
        }//end step two
        
    if (section == 'InvestorInformation') {

        var updateFields = {};

        //Status of Employment validation
        if ($('#StatusOfEmployment').val() == '') {
            displayValidationError('StatusOfEmployment', profileselectdropdown);
            ret = false;
        }

        //Industry validation
        if ($('#StatusOfEmployment').val() == "Employed" || $('#StatusOfEmployment').val() == "Self Employed") {
            if($('#Industry').val().trim() == "") {
                displayValidationError('Industry', profileselectdropdown);
                ret = false;
            }
            else {
                clearValidationError('Industry');
                updateFields['Industry'] = $('#Industry').val();
            } 
        }

        // Source of income description validation
        if($('#groupIncomeDescription').is(':visible') && $('#IncomeDescription').val() == '') {
            displayValidationError('IncomeDescription', profilepreviousemployment);
            ret = false;
        } else {
            clearValidationError('IncomeDescription');
            updateFields['OtherIncome'] = $('#IncomeDescription').val();
        } 

        if($('#groupIndustryDescription').is(':visible') && $('#IndustryDescription').val() == '') {
            displayValidationError('IndustryDescription', profilepreviousemployment);
            ret = false;
        } else {
            clearValidationError('IndustryDescription');
            updateFields['IndustryDescription'] = $('#IndustryDescription').val();
        }

        if (organization == 'Cyprus') {           

            //ClientPEP validation
            if($('#ClientPEP').val().trim() == "") {
                displayValidationError('ClientPEP', profileselectdropdown);
                ret = false;
            }
            else {
                clearValidationError('ClientPEP');
                updateFields['ClientPEP'] = $('#ClientPEP').val();
            } 

            //Position validation
            if($('#Position').is(':visible') && $('#Position').val().trim() == "") {
                displayValidationError('Position', profileselectdropdown);
                ret = false;
            }
            else {
                clearValidationError('Position');
                updateFields['Position'] = $('#Position').val();
            } 
            
        }

        //Education validation
        if (organization == 'Belize' || organization == 'Jordan') {
            if($('#Education').val().trim() == "" || $('#Education').val().trim() == null) {
                displayValidationError('Education', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('Education');
                updateFields['Education'] = $('#Education').val();
            }
        
        }

        //Employer name validation
        if(organization == 'Cyprus' || organization == 'Jordan') {
            if ($('#StatusOfEmployment').val() == "Employed" || $('#StatusOfEmployment').val() == "Self Employed") {
                if($('#NameOfEmployer').val().trim() == "") {
                    displayValidationError('NameOfEmployer', profileemployer);
                    ret = false;
                } else if (!latinCharactersNumbers($('#NameOfEmployer').val().trim())) {
                    displayValidationError('NameOfEmployer', latincharactersNumbers);
                    ret = false;
                } else {
                    clearValidationError('NameOfEmployer');
                    updateFields['EmployerName'] = $('#NameOfEmployer').val();
                } 
            }
        }
        
        //Employer name validation
        if ($('#StatusOfEmployment').val() == "Retired" || $('#StatusOfEmployment').val() == "Unemployed" || $('#StatusOfEmployment').val() == "Student" || $('#StatusOfEmployment').val() == "Other") {
            if($('#PreviousEmployment').length) {
                if($('#PreviousEmployment').val().trim() == "") {
                    displayValidationError('PreviousEmployment', profilepreviousemployment);
                    ret = false;
                }
                else {
                    clearValidationError('PreviousEmployment');
                    updateFields['PreviousEmployment'] = $('#PreviousEmployment').val();
                } 
            }
        }
        
        //Status Of Employment validation
        if($('#StatusOfEmployment').val().trim() == "") {
            displayValidationError('StatusOfEmployment', profileselectdropdown);
            ret = false;
        }
        else {
            clearValidationError('StatusOfEmployment');
            updateFields['EmploymentStatus'] = $('#StatusOfEmployment').val();
        }
        
        //Industry validation
        if ($('#StatusOfEmployment').val() == "Employed" || $('#StatusOfEmployment').val() == "Self Employed") {
            if($('#Industry').val().trim() == "") {
                displayValidationError('Industry', profileselectdropdown);
                ret = false;
            }
            else {
                clearValidationError('Industry');
                updateFields['Industry'] = $('#Industry').val();
                if ($('#groupIndustry').is(':visible') && $('#Industry').val() == 'Other') {
                    updateFields['IndustryDescription'] = $('#IndustryDescription').val();
                }
            }
        }
    
        /*complete profile employment*/
        if(organization == 'Cyprus' || organization == 'Jordan') {
            if ($('#StatusOfEmployment').val() == "Employed" || $('#StatusOfEmployment').val() == "Self Employed") {
                $('#groupPreviousEmployment').hide();
                $('#groupIndustry').show();
                $('#groupNameOfEmployer').show();
                $('#DescriptionOfEmployer').val($('#Industry').val());
                //$('#SourceOfWealth').val('Employment');
                //$('#SourceOfWealth').prop("disabled", true);
            }
            if ($('#StatusOfEmployment').val() == "Retired" || $('#StatusOfEmployment').val() == "Unemployed" || $('#StatusOfEmployment').val() == "Student" || $('#StatusOfEmployment').val() == "Other") {
                $('#groupPreviousEmployment').show();
                $('#groupIndustry').hide();
                $('#groupNameOfEmployer').hide();
                $('#DescriptionOfEmployer').val($('#SourceOfWealth').val());
            }
        } else if (organization == 'Belize') {
            if ($('#StatusOfEmployment').val() == "Employed" || $('#StatusOfEmployment').val() == "Self Employed") {
                $('#groupIndustry').show();
            }
            if ($('#StatusOfEmployment').val() == "Retired" || $('#StatusOfEmployment').val() == "Unemployed" || $('#StatusOfEmployment').val() == "Student" || $('#StatusOfEmployment').val() == "Other") {
                $('#groupIndustry').hide();
            }
        }
        /*end complete profile employment*/
        
        //Source of Wealth validation
        if($('#SourceOfWealth').val().trim() == "") {
            displayValidationError('SourceOfWealth', profileselectdropdown);
            ret = false;
        }
        else {
            clearValidationError('SourceOfWealth');
            updateFields['EmploymentStatusDescription'] = $('#SourceOfWealth').val();
        }
        
        //Salary validation
        if($('#Salary').val().trim() == "") {
            displayValidationError('Salary', profileincome);
            ret = false;
        }
        else {
            clearValidationError('Salary');
            updateFields['AnnualIncome'] = $('#Salary').val();
        }
        
        //Savings validation
        if($('#Savings').val().trim() == "") {
            displayValidationError('Savings', profilesavings);
            ret = false;
        }
        else {
            clearValidationError('Savings');
            updateFields['Assets'] = $('#Savings').val();
        }

        //if all passed good
        if (ret == true) {
            showLoadingButtonNext(section);

            ajaxUpdateProfile({
                    fields: updateFields,
                    completed: completed,
                    section: section
                })
                .done(function(data) {
                    if (data.status == 'ok') {
                        $('#collapse'+section).collapse('hide');
                        stopLoadingButtonNext(section);
                        goToNextSection(section);
                        updateCompletion(data.completion);
                        if (data.redirect) {
                            location.href = data.redirect;
                        }
                    } else {
                        alert('error');
                    }
                })
                .fail(function(xhr) {
                    stopLoadingButtonNext(section);
                    alert('error');
                });
        }
        
        return ret;
    }//end step four

    if (section == 'TradingExpectation') {
        ret = true;
        updateFields = {};

        if (organization != 'Cyprus') {

            //Expected trade volume validation
            if($('#ExpectedTrade').val().trim() == "") {
                displayValidationError('ExpectedTrade', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('ExpectedTrade');
                updateFields['ExpectedTrade'] = $('#ExpectedTrade').val();
            }
            
            //Expected trade frequency validation
            if($('#ExpectedFrequency').val().trim() == "") {
                displayValidationError('ExpectedFrequency', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('ExpectedFrequency');
                updateFields['ExpectedFrequency'] = $('#ExpectedFrequency').val();
            }
            
            //Intended purpose of transaction validation
            if($('#TransactionPurpose').val().trim() == "") {
                displayValidationError('TransactionPurpose', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('TransactionPurpose');
                updateFields['TransactionPurpose'] = $('#TransactionPurpose').val();
            }
        }
    
        if (organization == 'Cyprus') {
            
            //Estimated Turnover validation
            if($('#EstimatedTurnover').val().trim() == "") {
                displayValidationError('EstimatedTurnover', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('EstimatedTurnover');
                updateFields['EstimatedTurnover'] = $('#EstimatedTurnover').val();
            }

            //Expected Frequency validation
            if($('#ExpectedFrequency').val().trim() == "") {
                displayValidationError('ExpectedFrequency', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('ExpectedFrequency');
                updateFields['ExpectedFrequency'] = $('#ExpectedFrequency').val();
            }

            //Expected Frequency validation
            if($('#ExpectedTrade').val().trim() == "") {
                displayValidationError('ExpectedTrade', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('ExpectedTrade');
                updateFields['ExpectedTrade'] = $('#ExpectedTrade').val();
            }

            //Origin of funds validation
            if(!$('#OriginEuBank').is(':checked') && !$('#OriginCreditCard').is(':checked') && !$('#OriginWallet').is(':checked')) {
                displayValidationError('OriginOfFunds', enteroriginoffunds);
                ret = false;
            }
            else {
                clearValidationError('OriginOfFunds');
                updateFields['OriginOfFunds'] = getOriginOfFunds();
            }

            //Account purpose validation
            if($('#TransactionPurpose').val().trim() == "") {
                displayValidationError('TransactionPurpose', enteraccountpurpose);
                ret = false;
            }
            else {
                clearValidationError('TransactionPurpose');
                updateFields['TransactionPurpose'] = $('#TransactionPurpose').val();
            }

            //Risk tolerance validation
            if($('#RiskTolerance').val().trim() == "") {
                displayValidationError('RiskTolerance', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('RiskTolerance');
                updateFields['RiskTolerance'] = $('#RiskTolerance').val();
            }
            
        }

        //if all passed good
        if (ret == true) {
            showLoadingButtonNext(section);

            ajaxUpdateProfile({
                    fields: updateFields,
                    completed: completed,
                    section: section
                })
                .done(function(data) {
                    if (data.status == 'ok') {
                        $('#collapse'+section).collapse('hide');
                        stopLoadingButtonNext(section);
                        goToNextSection(section);
                        updateCompletion(data.completion);
                        if (data.redirect) {
                            location.href = data.redirect;
                        }
                    } else {
                        alert('error');
                    }
                })
                .fail(function(xhr) {
                    stopLoadingButtonNext(section);
                    alert('error');
                });
        }
        
        return ret;
    }

    if (section == 'TradingExperience') {

        ret = true;
        updateFields = {};

        if (organization == 'Belize' || organization == 'Jordan') {
            
            if($('#TradingExperienceYesNo').val().trim() == "") {
                displayValidationError('TradingExperienceYesNo', profileselectvaluefromlist);
                ret = false;
            }
            else {
                clearValidationError('TradingExperienceYesNo');
                updateFields['TradingExpYesNo'] = $('#TradingExperienceYesNo').val();
            }
            if ($('#TradingExperienceYesNo').val() == 'Yes') {
                if($('#TradingVolumeHistory').val().trim() == "") {
                    displayValidationError('TradingVolumeHistory', profileselectvaluefromlist);
                    ret = false;
                }
                else {
                    clearValidationError('TradingVolumeHistory');
                    updateFields['TradingVolumeHistory'] = getTradingVolumeHistory();
                }
                if($('#TradingExperience').val().trim() == "") {
                    displayValidationError('TradingExperience', profileselectvaluefromlist);
                    ret = false;
                }
                else {
                    clearValidationError('TradingExperience');
                    updateFields['TradingExperience'] = getTradingExperience();
                }
            }
            if ($('#TradingExperienceYesNo').val() == 'No') {
                if (!$('#TradingApplicableStatementsQualification').is(':checked') &&
                !$('#TradingApplicableStatementsNews').is(':checked') &&
                !$('#TradingApplicableStatementsMaterial').is(':checked') &&
                !$('#TradingApplicableStatementsNone').is(':checked')
                ) {
                    displayValidationError('TradingApplicableStatements', profileselectvaluefromlist);
                    ret = false;
                }
                else {
                    clearValidationError('TradingApplicableStatements');
                    updateFields['TradingApplicableStatements'] = getTradingApplicableStatements();
                }
            }

        }

        else if (organization == 'Cyprus') {
            // 1.1
            if ($('[name=SharesBondsEquitiesVolume]:checked').length != 1) {
                $('[name=SharesBondsEquitiesVolume]').addClass("has-error"); 
                $('#helpBlockSharesBondsEquitiesVolume').css("color", "#a94442");
                $('#helpBlockSharesBondsEquitiesVolume').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=SharesBondsEquitiesVolume]').removeClass("has-error"); 
                $('#helpBlockSharesBondsEquitiesVolume').html(''); 
            }

            // 1.2
            if ($('[name=DerivativesVolume]:checked').length != 1) {
                $('[name=DerivativesVolume]').addClass("has-error"); 
                $('#helpBlockDerivativesVolume').css("color", "#a94442");
                $('#helpBlockDerivativesVolume').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=DerivativesVolume]').removeClass("has-error"); 
                $('#helpBlockDerivativesVolume').html(''); 
            }

            // 1.3
            if ($('[name=FX_CFDVolume]:checked').length != 1) {
                $('[name=FX_CFDVolume]').addClass("has-error"); 
                $('#helpBlockFX_CFDVolume').css("color", "#a94442");
                $('#helpBlockFX_CFDVolume').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=FX_CFDVolume]').removeClass("has-error"); 
                $('#helpBlockFX_CFDVolume').html(''); 
            }

            // 2
            if ($('[name=AverageInvestedAmount]:checked').length != 1) {
                $('[name=AverageInvestedAmount]').addClass("has-error"); 
                $('#helpBlockAverageInvestedAmount').css("color", "#a94442");
                $('#helpBlockAverageInvestedAmount').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=AverageInvestedAmount]').removeClass("has-error"); 
                $('#helpBlockAverageInvestedAmount').html(''); 
            }

            // 4
            if ($('[name=QualificationLevel]:checked').length != 1) {
                $('[name=QualificationLevel]').addClass("has-error"); 
                $('#helpBlockQualificationLevel').css("color", "#a94442");
                $('#helpBlockQualificationLevel').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=QualificationLevel]').removeClass("has-error"); 
                $('#helpBlockQualificationLevel').html(''); 
            }

            // 5
            if ($('[name=TradingHigherLeverage]:checked').length != 1) {
                $('[name=TradingHigherLeverage]').addClass("has-error"); 
                $('#helpBlockTradingHigherLeverage').css("color", "#a94442");
                $('#helpBlockTradingHigherLeverage').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=TradingHigherLeverage]').removeClass("has-error"); 
                $('#helpBlockTradingHigherLeverage').html(''); 
            }

            // 6
            if ($('[name=InitialMarginRequirement]:checked').length != 1) {
                $('[name=InitialMarginRequirement]').addClass("has-error"); 
                $('#helpBlockInitialMarginRequirement').css("color", "#a94442");
                $('#helpBlockInitialMarginRequirement').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=InitialMarginRequirement]').removeClass("has-error"); 
                $('#helpBlockInitialMarginRequirement').html(''); 
            }

            // 7
            if ($('[name=LargestPotentialPL]:checked').length != 1) {
                $('[name=LargestPotentialPL]').addClass("has-error"); 
                $('#helpBlockLargestPotentialPL').css("color", "#a94442");
                $('#helpBlockLargestPotentialPL').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=LargestPotentialPL]').removeClass("has-error"); 
                $('#helpBlockLargestPotentialPL').html(''); 
            }

            // 8
            if ($('[name=FacebookPriceMovement]:checked').length != 1) {
                $('[name=FacebookPriceMovement]').addClass("has-error"); 
                $('#helpBlockFacebookPriceMovement').css("color", "#a94442");
                $('#helpBlockFacebookPriceMovement').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=FacebookPriceMovement]').removeClass("has-error"); 
                $('#helpBlockFacebookPriceMovement').html(''); 
            }

            // 9
            if ($('[name=CFDCorrectStatement]:checked').length != 1) {
                $('[name=CFDCorrectStatement]').addClass("has-error"); 
                $('#helpBlockCFDCorrectStatement').css("color", "#a94442");
                $('#helpBlockCFDCorrectStatement').html(profileselectvaluefromlist); 
                ret = false;
            } else {
                $('[name=CFDCorrectStatement]').removeClass("has-error"); 
                $('#helpBlockCFDCorrectStatement').html(''); 
            }

            // 10
            if ($('[data=questionnaire-multiple-choice] input[type=checkbox]:checked').length <= 0) {
                $('#helpBlockInstrumentComplexity').css("color", "#a94442");
                $('#helpBlockInstrumentComplexity').html(profileselectvaluefromlist);
                ret = false;
            } else {
                $('#helpBlockInstrumentComplexity').html(''); 
            }

            if (ret == true) {
                $('#QuestionaryCompleted').val('true');

                updateFields['SharesBondsEquitiesVolume'] = $('[name=SharesBondsEquitiesVolume]:checked').val();
                updateFields['DerivativesVolume'] = $('[name=DerivativesVolume]:checked').val();
                updateFields['FX_CFDVolume'] = $('[name=FX_CFDVolume]:checked').val();
                updateFields['AverageInvestedAmount'] = $('[name=AverageInvestedAmount]:checked').val();
                updateFields['QualificationLevel'] = $('[name=QualificationLevel]:checked').val();
                updateFields['TradingHigherLeverage'] = ($('[name=TradingHigherLeverage]:checked').val() == 'true');
                updateFields['InitialMarginRequirement'] = $('[name=InitialMarginRequirement]:checked').val();
                updateFields['LargestPotentialPL'] = $('[name=LargestPotentialPL]:checked').val();
                updateFields['FacebookPriceMovement'] = $('[name=FacebookPriceMovement]:checked').val();
                updateFields['CFDCorrectStatement'] = $('[name=CFDCorrectStatement]:checked').val();
                updateFields['InstrumentComplexityFX'] = $('[name=InstrumentComplexityFX]').is(':checked');
                updateFields['InstrumentComplexityMetals'] = $('[name=InstrumentComplexityMetals]').is(':checked');
                updateFields['InstrumentComplexityIndicies'] = $('[name=InstrumentComplexityIndicies]').is(':checked');
                updateFields['InstrumentComplexityCommodities'] = $('[name=InstrumentComplexityCommodities]').is(':checked');
                updateFields['InstrumentComplexityFutures'] = $('[name=InstrumentComplexityFutures]').is(':checked');
                updateFields['InstrumentComplexityNone'] = $('[name=InstrumentComplexityNone]').is(':checked');
        
 
            } else {
                $('#QuestionaryCompleted').val('false');
            }

        }
    
        //if all passed good
        if (ret == true) {
            showLoadingButtonNext(section);

            ajaxUpdateProfile({
                    fields: updateFields,
                    completed: completed,
                    section: section
                })
                .done(function(data) {
                    if (data.status == 'ok') {
                        $('#collapse'+section).collapse('hide');
                        stopLoadingButtonNext(section);
                        goToNextSection(section);
                        updateCompletion(data.completion);

                        // Show message based on questionary score
                        if (typeof(data.qscore) != 'undefined') {
                            if (data.qscore <= 3) {
                                $('#groupScoringRange1').show();
                                $('#groupScoringRange2').hide();
                                $('#groupScoringRange2').prop('checked', false);
                                $('#groupScoringRange3').hide();
                                $('#groupScoringRange3').prop('checked', false);
                                // Destroy back button in Risk Agreement section
                                $('#RiskAgreementBackButton').remove();
                                // Fix leverage
                                if ($('#Leverage > option[value=20]').length) {
                                    $('#Leverage > option[value=20]').html('1:30');
                                    $('#Leverage > option[value=20]').val('30');
                                }
                            } else if (data.qscore <= 7) {
                                $('#groupScoringRange1').hide();
                                $('#groupScoringRange1').prop('checked', false);
                                $('#groupScoringRange2').show();
                                $('#groupScoringRange3').hide();
                                $('#groupScoringRange3').prop('checked', false);
                                // Destroy back button in Risk Agreement section
                                $('#RiskAgreementBackButton').remove();
                                // Fix leverage
                                if ($('#Leverage > option[value=30]').length) {
                                    $('#Leverage > option[value=30]').html('1:20');
                                    $('#Leverage > option[value=30]').val('20');
                                }
                            } else {
                                $('#groupScoringRange1').hide();
                                $('#groupScoringRange1').prop('checked', false);
                                $('#groupScoringRange2').hide();
                                $('#groupScoringRange2').prop('checked', false);
                                $('#groupScoringRange3').show();
                                // Destroy back button in Risk Agreement section
                                $('#RiskAgreementBackButton').remove();
                                // Fix leverage
                                if ($('#Leverage > option[value=20]').length) {
                                    $('#Leverage > option[value=20]').html('1:30');
                                    $('#Leverage > option[value=20]').val('30');
                                }                                
                            }
                        }
                        if (data.redirect) {
                            location.href = data.redirect;
                        }
                    } else {
                        alert('error');
                    }
                })
                .fail(function(xhr) {
                    stopLoadingButtonNext(section);
                    alert('error');
                });
        }
        
        return ret;
    }



    /*Organization leverage default*/
    if (organization == 'Cyprus') {
        defaultLeverage = '30';
        if ($('#Country').val() == 'ES') {
            defaultLeverage = '10';
        }
    }
    if (organization == 'Belize' || organization == 'Jordan') {
        defaultLeverage = '500';
    }
    /*Organization leverage default*/
    



    if (section == 'RiskAgreement') {

        $ret = true;
        var updateFields = {};
        updateFields['NewScoringRange1'] = false;
        updateFields['NewScoringRange2'] = false;
        updateFields['NewScoringRange3'] = false;

        if (organization == 'Cyprus') {
            
            //Score Consent validation
            
            if ($('#groupScoringRange1').is(':visible')) {
                if (!$('#ScoringRange1').is(':checked')) {
                    displayValidationError('ScoringRange1', acceptscoringagreement);
                    ret = false;
                }
                else {
                    clearValidationError('ScoringRange1');
                    updateFields['NewScoringRange1'] = $('#ScoringRange1').is(':checked');
                }
            }

            if ($('#groupScoringRange2').is(':visible')) {
                if (!$('#ScoringRange2').is(':checked')) {
                    displayValidationError('ScoringRange2', acceptscoringagreement);
                    ret = false;
                }
                else {
                    clearValidationError('ScoringRange2');
                    updateFields['NewScoringRange2'] = $('#ScoringRange2').is(':checked');
                }
            }

            if ($('#groupScoringRange3').is(':visible')) {
                if (!$('#ScoringRange3').is(':checked')) {
                    displayValidationError('ScoringRange3', acceptscoringagreement);
                    ret = false;
                }
                else {
                    clearValidationError('ScoringRange3');
                    updateFields['NewScoringRange3'] = $('#ScoringRange3').is(':checked');
                }
            }

        }

        //if all passed good
        if (ret == true) {
            showLoadingButtonNext(section);

            ajaxUpdateProfile({
                    fields: updateFields,
                    completed: completed,
                    section: section
                })
                .done(function(data) {
                    if (data.status == 'ok') {
                        $('#collapse'+section).collapse('hide');
                        if (data.redirect) {

                            location.href = data.redirect;
                        } else {
                            stopLoadingButtonNext(section);
                            goToNextSection(section);
                            updateCompletion(data.completion);
                        }
                    } else {
                        alert('error');
                    }
                })
                .fail(function(xhr) {
                    stopLoadingButtonNext(section);
                    alert('error');
                });
        }
    }
    




    if (section == 'TradeAccountDetails') {
        
        $ret = true;
        var updateFields = {};
        
        if($('#Leverage').val().trim() == "") {
            displayValidationError('Leverage', profileselectvaluefromlist);
            ret = false;
        }
        else {
            clearValidationError('Leverage');
            //if (completed) {
                updateFields['Leverage'] = $('#Leverage').val();
            //}
        }

        if (ret == true) {
            showLoadingButtonNext(section);

            ajaxUpdateProfile({
                fields: updateFields,
                completed: completed,
                section: section,
            })
            .done(function(data) {
                if (data.status == 'ok') {
                    $('#collapse'+section).collapse('hide');
                    stopLoadingButtonNext(section);
                    goToNextSection(section);
                    updateCompletion(data.completion);
                    if (data.redirect) {
                        location.href = data.redirect;
                    }
                } else {
                    alert('error');
                }
            })
            .fail(function(xhr) {
                stopLoadingButtonNext(section);
                alert('error');
            });
        }
        return ret;
    }

    if (section == 'Agreement') {
        
        ret = true;
        updateFields = {};

        if (organization == 'Belize' || organization == 'Jordan') {

            //CAA validation
            if($('#CAAcheckbox').length > 0 && !$('#CAAcheckbox').is(':checked')) {
                displayValidationError('CAAcheckbox', profileagreement);
                ret = false;
            }
            else {
                clearValidationError('CAAcheckbox');
                updateFields['CAAcheckbox'] = $('#CAAcheckbox').is(':checked');
            }
            
            //TC validation
            if($('#TCcheckbox').length > 0 && !$('#TCcheckbox').is(':checked')) {
                displayValidationError('TCcheckbox', profileconditions);
                ret = false;
            }
            else {
                clearValidationError('TCcheckbox');
                updateFields['TCcheckbox'] = $('#TCcheckbox').is(':checked');
            }

        } else if (organization == 'Cyprus') {

            //CAA and TC validation
            if($('#CAATCcheckbox').length > 0 && !$('#CAATCcheckbox').is(':checked')) {
                displayValidationError('CAATCcheckbox', profileagreement);
                ret = false;
            }
            else {
                clearValidationError('CAATCcheckbox');
                updateFields['CAATCcheckbox'] = $('#CAATCcheckbox').is(':checked');
            }

            updateFields['NewsletterConsent'] = $('#NewsletterConsent').is(':checked');

        }
        
        if (organization == 'Jordan') {
            //credentials security validation
            if($('#CDCcheckbox').length ==1 && !$('#CDCcheckbox').is(':checked')) {
                $('#groupCDCcheckbox').addClass("has-error"); 
                $('#helpBlockCDCcheckbox').css("color", "#a94442");
                $('#helpBlockCDCcheckbox').html(credentialsSecurity); 
                ret = false;
            }
            else {
                clearValidationError('CDCcheckbox');
                updateFields['CDCcheckbox'] = $('#CDCcheckbox').is(':checked');
            }
        }
        
        //if all passed good
        if (ret == true) {
            showLoadingButtonNext(section);

            if (completed == true) {
                ajaxUpdateProfile({
                    fields: updateFields,
                    completed: true,
                    section: section
                })
                .done(function(data) {
                    if (data.status == 'ok') {
                        stopLoadingButtonNext(section);
                        updateCompletion(data.completion);        
                        if (data.redirect) {
                            location.href = data.redirect;
                        }
                    } else {
                        alert('error');
                    }
                })
                .fail(function(xhr) {
                    stopLoadingButtonNext(section);
                    alert('error');
                });
            } else {

                if (organization == 'Belize' || organization == 'Jordan') {

                    if (leverageValue > 0 || ($('#Leverage').length > 0)) {
    
                        // Submit agreement
                        ajaxUpdateProfile({
                            fields: updateFields,
                            completed: true,
                            section: section,
                            wait_newlive: ($('#panelTradeAccountDetailsLive').length > 0)
                        })
                        .done(function(data) {
                            if (data.status == 'ok') {
                                $('#collapse'+section).collapse('hide');
                                stopLoadingButtonNext(section);
                                updateCompletion(data.completion);     
                                if (data.redirect) {
                                    location.href = data.redirect;
                                } else {
                                    goToNextSection(section);               
                                }
                            } else {
                            alert('error');
                            }
                        })
                        .fail(function(xhr) {
                            stopLoadingButtonNext(section);
                            alert('error');
                        });
                    }
                } 
            }         
        }
        
        return ret;  
    }
    
    if (section == 'TradeAccountDetailsLive') {
        
        ret = true;
        updateFields = {};

        if (organization == 'Belize' || organization == 'Jordan') {

            //currency validation
            if($('#TradingCurrency').val().trim() == "") {
                displayValidationError('TradingCurrency', tradeaccountselectcurrency);
                ret = false;
            }
            else {
                clearValidationError('TradingCurrency');
                if (completed) {
                    updateFields['TradingCurrency'] = $('#TradingCurrency').val();
                }
            }

            if ($('#AccountType').length > 0) {
                if($('#AccountType').val().trim() == "") {
                    displayValidationError('AccountType', profileselectvaluefromlist);
                    ret = false;
                }
                else {
                    clearValidationError('AccountType');
                    if (completed) {
                        updateFields['AccountType'] = $('#AccountType').val();
                    }
                }
            }
            
            //password validation
            if($('#Password').val().trim() == ""){
                $('#groupPassword').addClass("has-error"); 
                $('#helpBlockPassword').css("color", "#a94442");
                $('#helpBlockPassword').html(signuppassword);
                ret = false;
            }
            else if(validatePasswordReverse($('#Password').val())) {
                $('#groupPassword').addClass("has-error"); 
                $('#helpBlockPassword').css("color", "#a94442");
                $('#helpBlockPassword').html(incorrectpassword);
                ret = false;
            }
            else {
                $('#groupPassword').removeClass("has-error");
                $('#helpBlockPassword').html("");
                updateFields['Password'] = $('#Password').val();
            }

        } else if (organization == 'Cyprus') {

            ret = false;
        }
        
        //if all passed good
        if (ret == true) {
            showLoadingButtonNext(section);

            if (organization == 'Belize' || organization == 'Jordan') {

                //create new account

                ajaxUpdateProfile({
                    fields: updateFields,
                    completed: true,
                    section: section,
                    newlive: true,
                })
                .done(function(data) {
                    if (data.status == 'ok') {
                        stopLoadingButtonNext(section);
                        updateCompletion(data.completion);     
                        if (data.redirect) {
                            location.href = data.redirect;
                        } else {
                            goToNextSection(section);               
                        }
                    } else if (data.error == 'Invalid portal password') {
                        stopLoadingButtonNext(section);
                        $('#groupPassword').addClass("has-error"); 
                        $('#helpBlockPassword').css("color", "#a94442");
                        $('#helpBlockPassword').html(incorrectpassword);        
                    } else {
                        alert('error');
                    }
                })
                .fail(function(xhr) {
                    stopLoadingButtonNext(section);
                    alert('error');
                });

            }
            
        }
        
        return ret;  
    }

    if (section == 'TaxIdentification') {

        updateFields = {};

        var taxCountriesSelected = [];
        $('.taxIdRow').each(function() {
            // Tax ID Country validation
            if ($(this).find('.taxCountry').val().trim() == '') {
                $(this).find('.groupTaxIdCountry').addClass('has-error');
                $(this).find('.groupTaxIdCountry').css("color", "#a94442");
                $(this).find('.helpBlockTaxCountry').html(profiletaxidcountry);
                ret = false;
            } else {
                // check for repeating countries
                if ($.inArray($(this).find('.taxCountry').val().trim(), taxCountriesSelected) > -1) {
                    $(this).find('.groupTaxIdCountry').addClass('has-error');
                    $(this).find('.groupTaxIdCountry').css("color", "#a94442");
                    $(this).find('.helpBlockTaxCountry').html(profiletaxidcountrynorepeat);
                    ret = false;
                } else {
                    $(this).find('.groupTaxIdCountry').removeClass("has-error");
                    $(this).find('.helpBlockTaxCountry').html("");
                }
                taxCountriesSelected.push($(this).find('.taxCountry').val().trim());
            }
            // Tax ID Number validation
            if (!validateTaxIdNumber($(this).find('.taxIdNumber').val().trim())) {
                $(this).find('.groupTaxIdNumber').addClass('has-error');
                $(this).find('.groupTaxIdNumber').css("color", "#a94442");
                $(this).find('.helpBlockTaxIdNumber').html(profiletaxidnumber);
                ret = false;
            } else {
                $(this).find('.groupTaxIdNumber').removeClass("has-error");
                $(this).find('.helpBlockTaxIdNumber').html("");
            }
        });
        
        if (ret == true) {

            showLoadingButtonNext(section);

            updateFields.TaxApplicable = true;

            taxIdPairs = getTaxIdPairsFields();
            updateFields.TaxCountry1 = taxIdPairs.TaxCountry1;
            updateFields.TaxCountry2 = taxIdPairs.TaxCountry2;
            updateFields.TaxCountry3 = taxIdPairs.TaxCountry3;
            updateFields.TaxCountry4 = taxIdPairs.TaxCountry4;
            updateFields.TaxCountry5 = taxIdPairs.TaxCountry5;
            updateFields.TaxID1 = taxIdPairs.TaxID1;
            updateFields.TaxID2 = taxIdPairs.TaxID2;
            updateFields.TaxID3 = taxIdPairs.TaxID3;
            updateFields.TaxID4 = taxIdPairs.TaxID4;
            updateFields.TaxID5 = taxIdPairs.TaxID5;

            ajaxUpdateProfile({
                fields: updateFields,
                completed: completed,
                section: section,
            })
            .done(function(data) {
                if (data.status == 'ok') {
                    $('#collapse'+section).collapse('hide');
                    stopLoadingButtonNext(section);
                    goToNextSection(section);
                    updateCompletion(data.completion);
                    if (data.redirect) {
                        location.href = data.redirect;
                    }
                } else {
                    alert('error');
                }
            })
            .fail(function(xhr) {
                stopLoadingButtonNext(section);
                alert('error');
            });
        }
    }
}

function taxRowAdd(button) {
    var row = $(button).closest($('.taxIdRow'));
    var rowcount = $('.taxIdRow').length;
    if (rowcount < 5) {
        var newrow = row.clone();
        newrow.find('.taxCountry').val('');        
        newrow.find('.taxIdNumber').val('');
        newrow.find('.help-block').html('');
        newrow.find('.groupTaxIdCountry').removeClass("has-error");
        newrow.find('.groupTaxIdNumber').removeClass("has-error");        
        $('#taxIdRows').append(newrow);
    }
    checkTaxRowButtons();
}

function taxRowDelete(button) {
    var row = $(button).closest($('.taxIdRow'));
    var rowcount = $('.taxIdRow').length;
    if (rowcount > 1) {
        row.remove();
    }
    checkTaxRowButtons();
}

function checkTaxRowButtons() {
    var rowcount = $('.taxIdRow').length;
    if (rowcount == 1) {
        $('.taxIdRow .taxRowAddBtn').closest('.row').show();
        $('.taxIdRow .taxRowDeleteBtn').hide();
    } else {
        $('.taxIdRow .taxRowAddBtn').closest('.row').hide();
        $('.taxIdRow .taxRowDeleteBtn').show();
        if (rowcount < 5) {
            $('.taxIdRow .taxRowAddBtn').last().closest('.row').show();
        }
    }
}

function taxIdToggle() {
    if($('#TaxIdYesNo').val() == 'false') {
        $('#TaxIdNo').show();
        $('#TaxIdYes').hide();
    } else if($('#TaxIdYesNo').val() == 'true') {
        $('#TaxIdNo').hide();
        $('#TaxIdYes').show();
        $('#groupTaxIdYesNo').hide();
    } else {
        $('#TaxIdNo').hide();
        $('#TaxIdYes').hide();
    }
}

function calculateLeverage() {
    res = 0;
    
    if ($('#ForexExp').val() == 'Less than 1 year') {
        res+=1;
        //console.log(res);
    }
    if ($('#ForexExp').val() == '1-3 years') {
        res+=2;
        //console.log(res);
    }
    if ($('#ForexExp').val() == '3 years or more') {
        res+=3;
        //console.log(res);
    }
    
    if ($('#MetalsExp').val() == 'Less than 1 year') {
        res+=1;
        //console.log(res);
    }
    if ($('#MetalsExp').val() == '1-3 years') {
        res+=2;
        //console.log(res);
    }
    if ($('#MetalsExp').val() == '3 years or more') {
        res+=3;
        //console.log(res);
    }
    
    if ($('#StockIndiciesExp').val() == 'Less than 1 year') {
        res+=1;
        //console.log(res);
    }
    if ($('#StockIndiciesExp').val() == '1-3 years') {
        res+=2;
        //console.log(res);
    }
    if ($('#StockIndiciesExp').val() == '3 years or more') {
        res+=3;
        //console.log(res);
    }
    
    if ($('#CommoditiesExp').val() == 'Less than 1 year') {
        res+=1;
        //console.log(res);
    }
    if ($('#CommoditiesExp').val() == '1-3 years') {
        res+=2;
        //console.log(res);
    }
    if ($('#CommoditiesExp').val() == '3 years or more') {
        res+=3;
        //console.log(res);
    }
    
    if ($('#OptionsExp').val() == 'Less than 1 year') {
        res+=1;
        //console.log(res);
    }
    if ($('#OptionsExp').val() == '1-3 years') {
        res+=2;
        //console.log(res);
    }
    if ($('#OptionsExp').val() == '3 years or more') {
        res+=3;
        //console.log(res);
    }
    
    if ($('#CFDExp').val() == 'Less than 1 year') {
        res+=1;
        //console.log(res);
    }
    if ($('#CFDExp').val() == '1-3 years') {
        res+=2;
        //console.log(res);
    }
    if ($('#CFDExp').val() == '3 years or more') {
        res+=3;
        //console.log(res);
    }
    
    
    
    if (res >= 0 && res <= 3) {
        res1 = "50";
        $('#Score03AllConsent').show();
        $('#Score412AllConsent').hide();
        
        $('#Score03AllAdditional').hide();
        $('#Score412AllAdditional').hide();
        $('#ScoreOver12AllAdditional').hide();
        
        if ($('#organizationHidden').val() == 'Belize' || $('#organizationHidden').val() == 'Jordan') {
            $('#Leverage').val('400');
        }
        else {
            //$('#Leverage').val('50');
            
            /*Filtering values*/
            $('#Leverage').find('option').remove();
            $('#Leverage').append($('<option>', {
                value: 50,
                text: '1:50'
            }));
            $('#Leverage').val('50');
            /*End filtering values*/
        }
        
    }
    if (res >= 4 && res <= 7) {
        res1 = "100";
        $('#Score03AllConsent').hide();
        $('#Score412AllConsent').show();
        
        $('#Score03AllAdditional').hide();
        $('#Score412AllAdditional').hide();
        $('#ScoreOver12AllAdditional').hide();
        
        if ($('#organizationHidden').val() == 'Belize' || $('#organizationHidden').val() == 'Jordan') {
            $('#Leverage').val('400');
        }
        else {
            //$('#Leverage').val('50');
            
            /*Filtering values*/
            $('#Leverage').find('option').remove();
            $('#Leverage').append($('<option>', {
                value: 50,
                text: '1:50'
            }));
            $('#Leverage').append($('<option>', {
                value: 100,
                text: '1:100'
            }));
            $('#Leverage').val('50');
            /*End filtering values*/
        }
    }
    if (res >= 8 && res <= 12) {
        res1 = "200";
        $('#Score03AllConsent').hide();
        $('#Score412AllConsent').show();
        
        $('#Score03AllAdditional').hide();
        $('#Score412AllAdditional').hide();
        $('#ScoreOver12AllAdditional').hide();
        
        if ($('#organizationHidden').val() == 'Belize' || $('#organizationHidden').val() == 'Jordan') {
            $('#Leverage').val('400');
        }
        else {
            //$('#Leverage').val('50');
            
            /*Filtering values*/
            $('#Leverage').find('option').remove();
            $('#Leverage').append($('<option>', {
                value: 50,
                text: '1:50'
            }));
            $('#Leverage').append($('<option>', {
                value: 100,
                text: '1:100'
            }));
            $('#Leverage').append($('<option>', {
                value: 200,
                text: '1:200'
            }));
            $('#Leverage').val('50');
            /*End filtering values*/
        }
    }
    if (res >= 13 && res <= 18) {
        res1 = "400";
        $('#Score03AllConsent').hide();
        $('#Score412AllConsent').hide();
        
        $('#Score03AllAdditional').hide();
        $('#Score412AllAdditional').hide();
        $('#ScoreOver12AllAdditional').hide();
        
        if ($('#organizationHidden').val() == 'Belize' || $('#organizationHidden').val() == 'Jordan') {
            $('#Leverage').val('400');
        }
        else {
            $('#Leverage').val('50');
            
            /*Filtering values*/
            $('#Leverage').find('option').remove();
            $('#Leverage').append($('<option>', {
                value: 50,
                text: '1:50'
            }));
            $('#Leverage').append($('<option>', {
                value: 100,
                text: '1:100'
            }));
            $('#Leverage').append($('<option>', {
                value: 200,
                text: '1:200'
            }));
            $('#Leverage').append($('<option>', {
                value: 400,
                text: '1:400'
            }));
            $('#Leverage').val('50');
            /*End filtering values*/
        }
    }
    
    $('#hiddenScoring').val(res); //setting scoring in hidden field so it's used later
    
    //If on update leverage page
    if ($('#Leverage').attr('data') == 'updateleverage') {
        return res1;
    }
    
    if ($('#organizationHidden').val() == 'Cyprus' && $('#Country').val() == 'ES') {
        //alert("1 " + $('#Country').val() + " " + res);
        $('#Leverage').append($('<option>', {
            value: 10,
            text: '1:10'
        }));
        $('#Leverage').val('10');
        $('#Leverage').attr('disabled', 'true');
    }
    else if($('#organizationHidden').val() == 'Cyprus' && res == 0) {
        //alert("2 " + $('#Country').val() + " " + res);
        $('#Leverage').val('50');
        $('#Leverage').attr('disabled', 'true');
        $("select#Leverage option").filter("[value='10']").remove();
    }
    else if($('#organizationHidden').val() == 'Cyprus' && res >= 0 && res <= 3 && $('#Country').val() == 'PL') {
        $('#Leverage').val('50');
        $('#Leverage').attr('disabled', 'true');
        $("select#Leverage option").filter("[value='10']").remove();
    }
    else if($('#organizationHidden').val() == 'Cyprus' && $('#Country').val() == 'PL') {
        $('#Leverage').removeAttr('disabled');
        $('#Leverage').find('option').remove();
        $('#Leverage').append($('<option>', {
            value: 50,
            text: '1:50'
        }));
        $('#Leverage').append($('<option>', {
            value: 100,
            text: '1:100'
        }));
    }
    else {
        //alert("3 " + $('#Country').val() + " " + res);
        $('#Leverage').removeAttr('disabled');
        $("select#Leverage option").filter("[value='10']").remove();
    }
    
    //alert(res1);
    return res1;
}

function showLeverageMessage() {
    if ($('#Leverage').val() != '50' && parseInt($('#hiddenScoring').val()) >= 0 && parseInt($('#hiddenScoring').val()) <= 3) {
        $('#Score03AllAdditional').show();
        $('#Score412AllAdditional').hide();
        $('#ScoreOver12AllAdditional').hide();
    }
    
    if ($('#Leverage').val() != '50' && parseInt($('#hiddenScoring').val()) >= 4 && parseInt($('#hiddenScoring').val()) <= 12) {
        $('#Score03AllAdditional').hide();
        $('#Score412AllAdditional').show();
        $('#ScoreOver12AllAdditional').hide();
    }
    
    if ($('#Leverage').val() != '50' && parseInt($('#hiddenScoring').val()) >= 13 && parseInt($('#hiddenScoring').val()) <= 18) {
        $('#Score03AllAdditional').hide();
        $('#Score412AllAdditional').hide();
        $('#ScoreOver12AllAdditional').show();
    }
}

function validatePhone(phone) {
	//var re = /^(?=.*[0-9])[- +()0-9]+$/;
        var re = /^[0-9]*$/;
	return re.test(phone);
}

function validatePhoneMobile(mobile) {
	var re = /^(?=.*[0-9])[- +()0-9]+$/;
	return re.test(mobile);
}

function validatePhoneMobileSMS(mobile) {
    var re = /^[0-9]*$/;
    if (!re.test(mobile)) {
        return false;
    }
    var re = /(\D*\d){7}/
	return re.test(mobile);
}

function isChineseCharacters(str){
    //return /^[\u4E00-\u9FFF\u3400-\u4DFF ]+$/.test(str);
    return /^[\u4E00-\u9FFF\u3400-\u4DFF\u00B7]+$/.test(str);
    //  /^[\u4E00-\u9FFF\u3400-\u4DFF]+$/;
}

function validateUploadFiles() {
    var ret = true;

        //var sizelimitmin =  106954;
    var sizelimitmin =  0;
    var sizelimitmax = 15728640;
    
    var fileInputs = $("input:file");

    //check for empty file input fields
    var noDocs = true;
    fileInputs.each(function() {
        if (this.files.length > 0) {
            noDocs = false;

            //check file size limit
            if (this.files[0].size > sizelimitmax || this.files[0].size < sizelimitmin) {
                $(this).parent('.form-group').addClass("has-error");
                $(this).siblings('.help-block').css("color", "#a94442");
                $(this).siblings('.help-block').html(helptextfilesizelimit);
                ret = false;
            } else {
                $(this).parent('.form-group').removeClass("has-error");
                $(this).siblings('.help-block').html("");
            }
        }
    });

    if (noDocs) {
        $('#mainhelppanel').html(helptextnodocs);
        $('#mainhelppanel').parent('.alert').show();

        $('html, body').animate({
            scrollTop: $('#panelUpload')
        }, 100);

        ret = false;
    } else {
        $('#mainhelppanel').parent('.alert').hide(); 
        var frontDoc = $("#uploadFilePOIFront");
        var backDoc = $("#uploadFilePOIBack");
        var passportDoc = $("#uploadFilePassFront");
               
        if ($('#typeOfProof').val() == 'ID') {
            if ((frontDoc[0].files.length < 1) ^ (backDoc[0].files.length < 1)) {
                ret = false;
                if (frontDoc[0].files.length < 1) {
                    $('#helpBlockUploadPOIFront').addClass('has-error');
                    $('#helpBlockUploadPOIFront').html(frontBackRequired);
                    $('#helpBlockUploadPOIFront').css("color", "#a94442");
                    
                } else if (backDoc[0].files.length < 1) {
                    $('#helpBlockUploadPOIBack').addClass('has-error');
                    $('#helpBlockUploadPOIBack').html(frontBackRequired);
                    $('#helpBlockUploadPOIBack').css("color", "#a94442");
                }
            }
            // Check for ID number
            if ($('#POIIdNumber').length > 0) {
                if ($('#POIIdNumber').val().trim() == '' || !latinCharactersNumbersMRZ($('#POIIdNumber').val().trim())) {
                    ret = false;
                    displayValidationError('POIIdNumber', documentnumber);
                } else {
                    clearValidationError('POIIdNumber');
                }
            }
        }

        if ($('#typeOfProof').val() == 'Passport' || $('#typeOfProof').val() == 'Driving Licence') {
            if ((passportDoc[0].files.length < 1)) {
                ret = false;
                $('#helpBlockUploadPassport').addClass('has-error');
                $('#helpBlockUploadPassport').html(helptextnodocs);
                $('#helpBlockUploadPassport').css("color", "#a94442");
                                            
            }   
            // Check for ID number
            if ($('#POIIdNumber').length > 0) {
                if ($('#POIIdNumber').val().trim() == '' || !latinCharactersNumbersMRZ($('#POIIdNumber').val().trim())) {
                    ret = false;
                    displayValidationError('POIIdNumber', documentnumber);
                } else {
                    clearValidationError('POIIdNumber');
                }
            }
        }
            
        if (SERVER_ORGANIZATION != 'Cyprus') {
            // Document date mandatory on non-CY portals

            var hasInputPOA = false;
            var hasInputPOI = false;
            $(fileInputs).each(function() {
                if (['uploadFilePOA',
                    'uploadFilePOABack',
                    ].indexOf($(this).attr('id')) !== -1) {
                        if (this.files.length > 0) {
                            hasInputPOA = true;
                            console.log($(this).attr('id'));
                        }
                }
                if (['uploadFilePOIFront',
                    'uploadFilePOIBack',
                    'uploadFilePassFront',
                    ].indexOf($(this).attr('id')) !== -1) {
                        if (this.files.length > 0) {
                            hasInputPOI = true;
                            console.log($(this).attr('id'));
                        }
                }
            });
            if (hasInputPOA) {
                try {
                    dateObj = new Date($('#expiryDatePOA').data('datepicker').getFormattedDate('yyyy-mm-dd'));
                    year = dateObj.getFullYear();
                } catch (e) {
                    dateObj = null;
                    year = null;
                }
                if (isNaN(year)) {
                    $('#helpBlockexpiryDatePOA').css("color", "#a94442");
                    $('#helpBlockexpiryDatePOA').html(selectvaliddate); 
                    ret = false; 
                } else if (year < 1950) {
                    $('#helpBlockexpiryDatePOA').css("color", "#a94442");
                    $('#helpBlockexpiryDatePOA').html(selectvaliddate);
                    ret = false;
                } else if (dateObj >= new Date()) {
                    $('#helpBlockexpiryDatePOA').css("color", "#a94442");
                    $('#helpBlockexpiryDatePOA').html(selectvaliddate);
                    ret = false;  
                } else {
                    $('#helpBlockexpiryDatePOA').html(''); 
                }
            }
            if (hasInputPOI) {
                try {
                    dateObj = new Date($('#expiryDatePOI').data('datepicker').getFormattedDate('yyyy-mm-dd'));
                    year = dateObj.getFullYear();
                } catch (e) {
                    dateObj = null;
                    year = null;
                }
                if (isNaN(year)) { 
                    $('#helpBlockexpiryDatePOI').css("color", "#a94442");
                    $('#helpBlockexpiryDatePOI').html(selectvaliddate); 
                    ret = false; 
                } else if (year < 1950) {
                    $('#helpBlockexpiryDatePOI').css("color", "#a94442");
                    $('#helpBlockexpiryDatePOI').html(selectvaliddate); 
                    ret = false; 
                } else {
                    $('#helpBlockexpiryDatePOI').html(''); 
                }
            }    
        }
        
    }

    if(ret == true) {
        $('#panelUpload').hide();
        $('.panelLoading').show();
        fileInputs.each(function() {
            if (this.files.length > 0) {
                $(this).parent('.form-group').removeClass("has-error");
                $(this).siblings('.help-block').html("");
            }
        });
    }

    return ret;
}

function validateWithdrawal() {
    ret = true;
    //amount
    if ($('#WithdrawAmmount').val().trim() == "" || !$.isNumeric($("#WithdrawAmmount").val()) ) {
        $('#groupWithdrawAmount').addClass("has-error"); 
        $('#helpBlockWithdrawAmount').css("color", "#a94442");
        $('#helpBlockWithdrawAmount').html(enteramount); 
        ret = false;
    }
    else if ($('#WithdrawAmmount').val().trim() > accountBalance) {
        $('#groupWithdrawAmount').addClass("has-error"); 
        $('#helpBlockWithdrawAmount').css("color", "#a94442");
        $('#helpBlockWithdrawAmount').html(textnotenoughfunds); 
        ret = false;
    }
    else {
        $('#groupWithdrawAmount').removeClass("has-error");
        $('#helpBlockWithdrawAmount').html("");
    }
    
    //provider validation
    if ($('#WithdrawalProvider').val().trim() == "" || $('#WithdrawalProvider').val().trim() == null) {
        $('#groupWithdrawalProvider').addClass("has-error"); 
        $('#helpWithdrawalProvider').css("color", "#a94442");
        $('#helpWithdrawalProvider').html(profileselectvaluefromlist); 
        ret = false;
    }
    else {
        $('#groupWithdrawalProvider').removeClass("has-error");
        $('#helpWithdrawalProvider').html("");
    }
    
    bankTransferFields = [
        'BankName',
        'BankBranch',
        'BankCity',
        'BankCountry',
        'BankSwiftAddress',
        'BankAccountName',
        'BankAccountNumber',
        'BankAccountCurrency',
        'BankIBAN'
    ];
    if ($('#WithdrawalProvider option:selected').attr('data-provider') == 'bankTransfer') {
        bankTransferFields.forEach(function(field) {
            if ($('#'+field).length) {
                if($('#'+field).val().trim() == "" || $('#'+field).val().trim() == null) {
                    $('#group'+field).addClass("has-error"); 
                    $('#help'+field).css("color", "#a94442");
                    $('#help'+field).html(textrequiredfield); 
                    ret = false;
                }
                else {
                    $('#group'+field).removeClass("has-error");
                    $('#help'+field).html("");
                }
            }
        });
    } else {
        bankTransferFields.forEach(function(field) {
            $('#'+field).val('');
        });
    }
    
    if (ret) {
        $('#WithdrawSubmit').hide();
        $('#submittingButton').show();

        $('#WithdrawalProviderText').val(
            $("#WithdrawalProvider :selected").text()
        );
        if ($('#DataProvider').length > 0) {
            $('#DataProvider').val(
                $("#WithdrawalProvider :selected").attr('data-provider')
            );
        }
    }
    
    return ret;
}

function validateContactCase() {
    ret = true;
    var currentCaseSubject = null;
    switch($('#caseGroup').val()) {
        case '1':
            currentCaseSubject = $('#casesOne').val();
            break;
        case '2':
            currentCaseSubject = $('#casesTwo').val();
            break;
        case '3':
            currentCaseSubject = $('#casesThree').val();
            break;
        case '4':
            currentCaseSubject = $('#casesFour').val();
            break;
        case '5':
            currentCaseSubject = $('#casesFive').val();
            break;
        case '6':
            currentCaseSubject = $('#casesSix').val();
            break;
        case '7':
            currentCaseSubject = $('#casesSeven').val();
            break;
    
        default:
            currentCaseSubject = null;
    }

    //subject
    if($('#caseGroup').val() == null ) {
        $('#groupSubject').addClass("has-error"); 
        $('#helpBlockSubject').css("color", "#a94442");
        $('#helpBlockSubject').html(chooseasubject);
        ret = false;
    }
    else {
        $('#groupSubject').removeClass("has-error");
        $('#helpBlockSubject').html("");
    }
    if(currentCaseSubject == null ) {
        $('#groupSubject').addClass("has-error"); 
        $('#helpBlockSubject').css("color", "#a94442");
        $('#helpBlockSubject').html(chooseasubject);
        ret = false;
    }
    else {
        $('.casesSubject').removeClass("has-error");
        $('#helpBlockSubject').html("");
    }
    
    //comment
    if($('#description').val().trim() == "" ) {
        $('#groupContactDescription').addClass("has-error"); 
        $('#helpBlockContactDescription').css("color", "#a94442");
        $('#helpBlockContactDescription').html(enteryourmessage); 
        ret = false;
    }
    else {
        $('#groupContactDescription').removeClass("has-error");
        $('#helpBlockContactDescription').html("");
    }
    
    // validate bank transfer receipt input
    if ($('#subject').val().trim() == 'BankTransferReceipt') {
        var sizelimitmin =  0;
        var sizelimitmax = 15728640;

        var BankTransferReceiptForm = $("#BankTransferReceiptForm")[0];
    
        $(BankTransferReceiptForm).parent('.form-group').removeClass("has-error");
        $('#helpBlockBankTransferReceiptForm').html("");

        //check for empty file input fields
        if (BankTransferReceiptForm.files.length > 0) {

            //check file size limit
            if (BankTransferReceiptForm.files[0].size > sizelimitmax || this.files[0].size < sizelimitmin) {
                $(BankTransferReceiptForm).parent('.form-group').addClass("has-error");
                $('#helpBlockBankTransferReceiptForm').css("color", "#a94442");
                $('#helpBlockBankTransferReceiptForm').html(helptextfilesizelimit);
                ret = false;
            } else {
                $(BankTransferReceiptForm).parent('.form-group').removeClass("has-error");
                $('#helpBlockBankTransferReceiptForm').html("");
            }

        } else {
            ret = false;
            $('#helpBlockBankTransferReceiptForm').css("color", "#a94442");
            $('#helpBlockBankTransferReceiptForm').html(helptextnodocs);
            $(BankTransferReceiptForm).parent('.alert').show();
        }
    }
    
    if (ret == true) {
        $('#contactSubmit').hide();
        $('#submittingButton').show();
    }
    
    return ret;
}

function validateG2PUpload() {
    ret = true;
    //subject
    if($('#caseGroup').val() == null ) {
        $('#groupSubject').addClass("has-error"); 
        $('#helpBlockSubject').css("color", "#a94442");
        $('#helpBlockSubject').html(chooseasubject);
        ret = false;
    }
    else {
        $('#groupSubject').removeClass("has-error");
        $('#helpBlockSubject').html("");
    }
    if($('#subGroup').val() == null ) {
        $('#groupSubject').addClass("has-error"); 
        $('#helpBlockSubject').css("color", "#a94442");
        $('#helpBlockSubject').html(chooseasubject);
        ret = false;
    }
    else {
        $('.casesSubject').removeClass("has-error");
        $('#helpBlockSubject').html("");
    }
    
    // validate file upload input
    var sizelimitmin =  0;
    var sizelimitmax = 15728640;

    var uploadFileContact = $("#uploadFileContact")[0];

    $(uploadFileContact).parent('.form-group').removeClass("has-error");
    $('#helpBlockUploadContactAll').html("");

    //check for empty file input fields
    if (uploadFileContact.files.length > 0) {

        //check file size limit
        if (uploadFileContact.files[0].size > sizelimitmax || uploadFileContact.files[0].size < sizelimitmin) {
            $(uploadFileContact).parent('.form-group').addClass("has-error");
            $('#helpBlockuploadFileContact').css("color", "#a94442");
            $('#helpBlockuploadFileContact').html(helptextfilesizelimit);
            ret = false;
        } else {
            $(uploadFileContact).parent('.form-group').removeClass("has-error");
            $('#helpBlockuploadFileContact').html("");
        }

    } else {
        ret = false;
        $('#helpBlockuploadFileContact').css("color", "#a94442");
        $('#helpBlockuploadFileContact').html(helptextnodocs);
        $(uploadFileContact).parent('.alert').show();
    }
    
    if (ret == true) {
        $('#contactSubmit').hide();
        $('#submittingButton').show();
    }
    
    return ret;    
}

function validateNewCompetition() {
    var ret = true;

    // Consent
    if($('#newCompetitionConsent').length > 0 && !$('#newCompetitionConsent').is(':checked')) {
        $('#helpBlockNewCompetitionConsent').addClass("has-error"); 
        $('#helpBlockNewCompetitionConsent').css("color", "#a94442");
        $('#helpBlockNewCompetitionConsent').html(newCompetitionConsentHelp);
        ret = false;
    }
    else {
        $('#helpBlockNewCompetitionConsent').removeClass("has-error");
        $('#helpBlockNewCompetitionConsent').html("");
    }

    // Competition type
    if($('#CompetitionType').val().trim() == "" ) {
        $('#groupCompetitionType').addClass("has-error"); 
        $('#helpBlockCompetitionType').css("color", "#a94442");
        $('#helpBlockCompetitionType').html(newCompetitionTypeHelp); 
        ret = false;
    }
    else {
        $('#groupCompetitionType').removeClass("has-error");
        $('#helpBlockCompetitionType').html("");
    }

    if (ret) {
        $('#newCompetitionSubmitButton').hide();
        $('#submittingButton').show();
    }

    return ret;
}

/*Ajax*/
function ajaxPostProfile(){
    
    //date of birth
    let dobRaw = new Date($('#DateOfBirth').data('datepicker').getFormattedDate('yyyy-mm-dd'));
    let dobDay = dobRaw.getDate();
    let dobMonth = dobRaw.getMonth() + 1;
    let dobYear = dobRaw.getFullYear();  
    //id expiration
    let idRaw = new Date($('#IDExpiration').data('datepicker').getFormattedDate('yyyy-mm-dd'));
    let idDay = idRaw.getDate();
    let idMonth = idRaw.getMonth() + 1;
    let idYear = idRaw.getFullYear(); 

    var profileData = {
        Title : $('#Title').val(),
        FirstName : $('#FirstName').val(),
        LastName : $('#LastName').val(),
        Email : $('#Email').val(),
        DateOfBirthYear : dobYear,
        DateOfBirthMonth : dobMonth,
        DateOfBirthDay : dobDay,
        Education : $('#Education').val(),
        Nationality : $('#Nationality').val(),
        MaritalStatus : $('#MaritalStatus').val(),
        IdNumber : $('#IdNumber').val(),
        PassportId : $('#PassportId').val(),
        IDExpirationYear : idYear,
        IDExpirationMonth : idMonth,
        IDExpirationDay : idDay,
        Gender : $('#Gender').val(), /*new*/
        fullAddress : $('#fullAddress').val(),
        HomeNumber : $('#HomeNumber').val(),
        City : $('#City').val(),
        PostalCode : $('#PostalCode').val(),
        Country : $('#Country').val(),
        Province : $('#Province').val(),
        PhoneNumber : $('#PhoneNumber').val(),
        PhoneCode : $('#phoneCodeHidden').val(),
        MobileNumber : $('#MobileNumber').val(),
        fullAddressAlt : $('#fullAddressAlt').val(),
        HomeNumberAlt : $('#HomeNumberAlt').val(),
        CityAlt : $('#CityAlt').val(),
        PostalCodeAlt : $('#PostalCodeAlt').val(),
        CountryAlt : $('#CountryAlt').val(),
        ExpectedTrade : $('#ExpectedTrade').val(),
        ExpectedFrequency : $('#ExpectedFrequency').val(), /*new*/
        TransactionPurpose : $('#TransactionPurpose').val(), /*new*/
        ForexExp : $('#ForexExp').val(),
        //SharesExp : $('#SharesExp').val(),
        CFDExp : $('#CFDExp').val(),
        OptionsExp : $('#OptionsExp').val(),
        MetalsExp : $('#MetalsExp').val(),
        StockIndiciesExp : $('#StockIndiciesExp').val(),
        CommoditiesExp : $('#CommoditiesExp').val(),
        TradeExpYesNo : $('#TradeExpYesNo').val(),
        EstimatedTurnover : $('#EstimatedTurnover').val(),

        Scoring : $('#hiddenScoring').val(), /*new*/
        StatusOfEmployment : $('#StatusOfEmployment').val(),
        SourceOfWealth: $('#SourceOfWealth').val(),
        Industry: $('#Industry').val(),
        NameOfEmployer : $('#NameOfEmployer').val(),
        PreviousEmployment : $('#PreviousEmployment').val(),
        DescriptionOfEmployer : $('#DescriptionOfEmployer').val(),
        Salary : $('#Salary').val(),
        Savings : $('#Savings').val(),
        Leverage: $('#Leverage').val(),
        //Tax ID info
        TaxApplicable: ($('#TaxIdYesNo').val() == 'true'), // convert to boolean
        TaxReason: $('#TaxIdReason').val(),
        TaxIdPairs: getTaxIdPairs(),
        //End Tax ID info
        //Residence Permit and Citizenship
        ResidencePermitCode: $('#ResidencePermit').val(),
        CitizenshipCode: $('#Citizenship').val(),
        ResidencePermit: $('#ResidencePermit :selected').text(),
        Citizenship: $('#Citizenship :selected').text(),
        //End Residence Permit and Citizenship
        kyc : $('#kyc').val(),
        complete : $('#complete').val(),
        agreement : $('#CAAcheckbox').is(':checked'),
        //Assessment Questionnaire
        ProfileCompletedQuestionnaire: ($('#ProfileCompletedQuestionnaire').length > 0),
        SharesBondsEquitiesVolume: $('[name=SharesBondsEquitiesVolume]:checked').val(),
        DerivativesVolume: $('[name=DerivativesVolume]:checked').val(),
        FX_CFDVolume: $('[name=FX_CFDVolume]:checked').val(),
        AverageInvestedAmount: $('[name=AverageInvestedAmount]:checked').val(),
        AverageLeverageLevel: $('[name=AverageLeverageLevel]:checked').val(),
        QualificationLevel: $('[name=QualificationLevel]:checked').val(),
        TradingHigherLeverage: ($('[name=TradingHigherLeverage]:checked').val() == 'true'),
        InitialMarginRequirement: $('[name=InitialMarginRequirement]:checked').val(),
        LargestPotentialPL: $('[name=LargestPotentialPL]:checked').val(),
        FacebookPriceMovement: $('[name=FacebookPriceMovement]:checked').val(),
        CFDCorrectStatement: $('[name=CFDCorrectStatement]:checked').val(),
        InstrumentComplexityFX: $('[name=InstrumentComplexityFX]').is(':checked'),
        InstrumentComplexityMetals: $('[name=InstrumentComplexityMetals]').is(':checked'),
        InstrumentComplexityIndicies: $('[name=InstrumentComplexityIndicies]').is(':checked'),
        InstrumentComplexityCommodities: $('[name=InstrumentComplexityCommodities]').is(':checked'),
        InstrumentComplexityFutures: $('[name=InstrumentComplexityFutures]').is(':checked'),
        InstrumentComplexityNone: $('[name=InstrumentComplexityNone]').is(':checked'),
        QuestionaryCompleted: $('#QuestionaryCompleted').val() == 'true',
        //Country of Birth
        CountryOfBirthCode: $('#CountryOfBirth').val(),
        CountryOfBirth: $('#CountryOfBirth :selected').text(),
        //Trading Experience (non-cy portals)
        TradeExpYesNo: $('#TradingExperienceYesNo').val(),
        TradingExperience: getTradingExperience(),
        TradingVolumeHistory: getTradingVolumeHistory(),
        TradingApplicableStatements: getTradingApplicableStatements(),
    };


  /*$.ajax(location.origin+'/portal/completeprofileajax', profileData , function(success){
      var data = JSON.parse(success);
      alert(data);
  });*///end post

 $.ajax({ type: "POST",
    url: location.origin+'/portal/completeprofileajax',
    data: profileData,
    dataType: "json",
    success: function(success){
        //alert("Updated ID is: " + success.completion);

        //updating width of progress bar
        $(".profilePercentageNo").html(success.completion+"%");
        //logic for progress bar color based on width
        if (success.completion < 20) {
           $(".progress-bar").removeClass("progress-bar-warning");
           $(".progress-bar").removeClass("progress-bar-success");

           $(".progress-bar").addClass("progress-bar-danger");
        }
        else if(success.completion < 50) {
            $(".progress-bar").removeClass("progress-bar-danger");
            $(".progress-bar").removeClass("progress-bar-success");

            $(".progress-bar").addClass("progress-bar-warning");
        }
        else if(success.completion == 100) {
            $(".progress-bar").removeClass("progress-bar-danger");
            $(".progress-bar").removeClass("progress-bar-warning");

            $(".progress-bar").addClass("progress-bar-success");
        }
        else {
            $(".progress-bar").removeClass("progress-bar-danger");
            $(".progress-bar").removeClass("progress-bar-warning");
            $(".progress-bar").removeClass("progress-bar-success");
        }
        //animate the progress bar
        $(".progress-bar").animate({
            width: success.completion + "%"
        }, 1000);

        //update completion status
        completion = success.completion;
        //alert(success.kyc);

        //update questionnaire messge
        if (success.QScoring <= 6) {
            $('#QuestionaryScoreMessage p').text(QuestionaryScoreMessageBelow6);
            $('#QuestionaryScoreMessage').show();
        } else {
            $('#QuestionaryScoreMessage p').text('');
            $('#QuestionaryScoreMessage').hide();
        }
        
        if (success.Status) {
            location.href=success.RedirectUrl;
        }


    },
    error: function (xhr, ajaxOptions, thrownError) {
        alert("Status: "+xhr.status);
        alert("Error: "+thrownError);
    }
});

}
/*End Ajax*/

function getTradingApplicableStatements() {
    if ($('#TradingExperienceYesNo').val() == 'Yes') {
        return '';
    }

    let statements = [];
    if ($('#TradingApplicableStatementsQualification').is(":checked")) {
        statements.push('I have a relevant educational/professional qualification');
    }
    if ($('#TradingApplicableStatementsNews').is(":checked")) {
        statements.push('I regularly monitor the news/markets');
    }
    if ($('#TradingApplicableStatementsMaterial').is(":checked")) {
        statements.push('I have read educational material on trading');
    }
    if ($('#TradingApplicableStatementsAll').is(":checked")) {
        statements.push('All of the above');
    }
    if ($('#TradingApplicableStatementsNone').is(":checked")) {
        statements.push('None of the above');
    }
    return statements.join(';');
}

function getTradingVolumeHistory() {
    if ($('#TradingExperienceYesNo').val() == 'Yes') {
        return $('#TradingVolumeHistory').val();
    } else {
        return '';
    }
}

function getTradingExperience() {
    if ($('#TradingExperienceYesNo').val() == 'Yes') {
        return $('#TradingExperience').val();
    } else {
        return '';
    }
}

function getTaxIdPairs() {
    $('.taxIdRow').each(function() {
        var val;
        if ($('#TaxIdYesNo').val().trim() == 'false') {
            val = '|';
        } else {
            val = $(this).find('.taxCountry').val() + '|' + $(this).find('.taxIdNumber').val();
        }
        $(this).find('.taxIdPair').val(val);
    });
    var pairs = [];
    $('.taxIdPair').each(function() {
        pairs.push($(this).val());
    });
    return pairs;
}

function getTaxIdPairsFields() {
    var fields = {
        TaxCountry1: '',
        TaxID1: '',
        TaxCountry2: '',
        TaxID2: '',
        TaxCountry3: '',
        TaxID3: '',
        TaxCountry4: '',
        TaxID4: '',
        TaxCountry5: '',
        TaxID5: '',
    };
    var pairs = [];
    $('.taxIdRow').each(function() {
        pairs.push({
            country: $(this).find('.taxCountry').val(),
            id: $(this).find('.taxIdNumber').val()
        });
    });
    for (var i=0; i < pairs.length; i++) {
        fields['TaxCountry'+(i+1)] = pairs[i].country;
        fields['TaxID'+(i+1)] = pairs[i].id;
    }
    return fields;
}

function getOriginOfFunds() {
    let originOfFunds = [];
    if ($('#OriginEuBank').is(":checked")) {
        originOfFunds.push('EU Bank');
    }
    if ($('#OriginCreditCard').is(":checked")) {
        originOfFunds.push('Credit card');
    }
    if ($('#OriginWallet').is(":checked")) {
        originOfFunds.push('E-Wallet');
    }
    return originOfFunds.join(';');
}

function showCaseSubjectList() {
    if ($('#caseGroup').val() == "1") {
        $('#subjectGroup').val("");
        $('#subjectGroup').val($('#caseGroup option:selected').text());
        $('#casesOne').slideDown();
        $('#casesTwo').slideUp();
        $('#casesThree').slideUp();
        $('#casesFour').slideUp();
        $('#casesFive').slideUp();
        $('#casesSix').slideUp();
        $('#casesSeven').slideUp();
        $('#groupUploadContactAll').slideUp();
    }
    if ($('#caseGroup').val() == "2") {
        $('#subjectGroup').val("");
        $('#subjectGroup').val($('#caseGroup option:selected').text());
        $('#casesOne').slideUp();
        $('#casesTwo').slideDown();
        $('#casesThree').slideUp();
        $('#casesFour').slideUp();
        $('#casesFive').slideUp();
        $('#casesSix').slideUp();
        $('#casesSeven').slideUp();
        $('#groupUploadContactAll').slideUp();
    }
    if ($('#caseGroup').val() == "3") {
        $('#subjectGroup').val("");
        $('#subjectGroup').val($('#caseGroup option:selected').text());
        $('#casesOne').slideUp();
        $('#casesTwo').slideUp();
        $('#casesThree').slideDown();
        $('#casesFour').slideUp();
        $('#casesFive').slideUp();
        $('#casesSix').slideUp();
        $('#casesSeven').slideUp();
        $('#groupUploadContactAll').slideUp();
    }
    if ($('#caseGroup').val() == "4") {
        $('#subjectGroup').val("");
        $('#subjectGroup').val($('#caseGroup option:selected').text());
        $('#casesOne').slideUp();
        $('#casesTwo').slideUp();
        $('#casesThree').slideUp();
        $('#casesFour').slideDown();
        $('#casesFive').slideUp();
        $('#casesSix').slideUp();
        $('#casesSeven').slideUp();
        $('#groupUploadContactAll').slideUp();
    }
    if ($('#caseGroup').val() == "5") {
        $('#subjectGroup').val("");
        $('#subjectGroup').val($('#caseGroup option:selected').text());
        $('#casesOne').slideUp();
        $('#casesTwo').slideUp();
        $('#casesThree').slideUp();
        $('#casesFour').slideUp();
        $('#casesFive').slideDown();
        $('#casesSix').slideUp();
        $('#casesSeven').slideUp();
        $('#groupUploadContactAll').slideUp();
    }
    if ($('#caseGroup').val() == "6") {
        $('#subjectGroup').val("");
        $('#subjectGroup').val($('#caseGroup option:selected').text());
        $('#casesOne').slideUp();
        $('#casesTwo').slideUp();
        $('#casesThree').slideUp();
        $('#casesFour').slideUp();
        $('#casesFive').slideUp();
        $('#casesSix').slideDown();
        $('#casesSeven').slideUp();
        $('#groupUploadContactAll').slideUp();
    }
    if ($('#caseGroup').val() == "7") {
        $('#subjectGroup').val("");
        $('#subjectGroup').val($('#caseGroup option:selected').text());
        $('#casesOne').slideUp();
        $('#casesTwo').slideUp();
        $('#casesThree').slideUp();
        $('#casesFour').slideUp();
        $('#casesFive').slideUp();
        $('#casesSix').slideUp();
        $('#casesSeven').slideDown();
        $('#groupUploadContactAll').slideDown();
    }
}

function closeBankTransferReceiptForm() {
    $('#closeBankTransferReceiptForm').hide();
}

function openBankTransferReceiptForm() {
    $('#closeBankTransferReceiptForm').show();
}

function populateCaseSubject(id) {
    $('#subject').val("");
    $('#subject').val($('#' + id).val());
}

function tradingExperienceToggle() {
    $('#groupTradeExpYesNo').removeClass("has-error");
    $('#helpBlockTradeExpYesNo').html("");
                
    if ($('#TradeExpYesNo').val() == "no") {
        $('#tradeExpContainer').slideUp();
        $('#adviseDemoContainer').slideDown();
        
        
        /*$('#ForexExp option[value="Never"]').attr('selected', 'selected');
        $('#CFDExp option[value="Never"]').attr('selected', 'selected');
        $('#OptionsExp option[value="Never"]').attr('selected', 'selected');
        $('#MetalsExp option[value="Never"]').attr('selected', 'selected');
        $('#StockIndiciesExp option[value="Never"]').attr('selected', 'selected');
        $('#CommoditiesExp option[value="Never"]').attr('selected', 'selected');*/
        
        $('#ForexExp').val('Never');
        $('#CFDExp').val('Never');
        $('#OptionsExp').val('Never');
        $('#MetalsExp').val('Never');
        $('#StockIndiciesExp').val('Never');
        $('#CommoditiesExp').val('Never');
    }
    if ($('#TradeExpYesNo').val() == "yes") {
        $('#tradeExpContainer').slideDown();
        $('#adviseDemoContainer').slideUp();
    }
}


function populateEmployerDesc(from) {
    if (from == "Industry") {
        if($('#DescriptionOfEmployer').length) {
            $('#DescriptionOfEmployer').val($('#Industry').val());
        }
    }
    if (from == "SourceOfWealth") {
        if($('#DescriptionOfEmployer').length) {
            $('#DescriptionOfEmployer').val($('#SourceOfWealth').val());
        }
        
        if ($('#SourceOfWealth').val() == 'Other') {
            $('#groupIncomeDescription').show();
        } else {
            $('#IncomeDescription').val('');
            $('#groupIncomeDescription').hide();
        }
    }
}

function employmentStatus() {
    if ($('#StatusOfEmployment').val() == "Employed" || $('#StatusOfEmployment').val() == "Self Employed") {
        if($('#groupPreviousEmployment').length) {
            $('#groupPreviousEmployment').hide();
        }
        $('#groupIndustry').show();
        if($('#groupNameOfEmployer').length) {
            $('#groupNameOfEmployer').show();
        }
        $('#groupPosition').show();
    }
    if ($('#StatusOfEmployment').val() == "Retired" || $('#StatusOfEmployment').val() == "Unemployed" || $('#StatusOfEmployment').val() == "Student" || $('#StatusOfEmployment').val() == "Other") {
        $('#groupSourceOfWealth').show();
        if($('#groupPreviousEmployment').length) {
            $('#groupPreviousEmployment').show();
        }
        $('#groupIndustry').hide();
        if($('#groupNameOfEmployer').length) {
            $('#groupNameOfEmployer').hide();
        }
        $('#groupPosition').hide();
    }
}

function generateTradeExpOptions(tradeExp) {
    var $tradeExpValue = $('#' + tradeExp).val();
    var $tradeExpTr = $('#' + tradeExp).attr('tr');
    var choices = [
        'Never',
        'Less than 1 year',
        '1-3 years',
        '3 years or more'
    ];
    var show = false;

    
    choices.forEach(function(choice) {
        if ($tradeExpValue == choice) {
            show = true;
            
            if (show) {
            $('#' + tradeExp.slice(0,-6)).append($('<option>', {
                selected: 'selected',
                value: choice,
                text: choice
            }));
        }
        
        } else {
            if (show) {
            $('#' + tradeExp.slice(0,-6)).append($('<option>', {
                value: choice,
                text: choice
            }));
        }
        }
        
        
    });
}

function checkTaxIdFromCountry() {
    var showTaxId = false;
    $('.taxCountry option').each(function() {
        if ($(this).val() == $('#Country').val()) {
            showTaxId = true;
        }
    });
    if (showTaxId) {
        $('#panelTaxId').show();
    } else {
        $('#panelTaxId').hide();
        $('#TaxIdYesNo').val('false');
        $('.groupTaxIdCountry').val('');
        $('.groupTaxIdNumber').val('');
        $('#TaxIdReason').val('0');
    }
}

function formatInternalAmount() {
    if ($('#InternalAmount').val() != '') {
        if (!/^\d+$|^\d+(\.\d+)$|^\.\d+$/.test($('#InternalAmount').val())) {
            $('#InternalAmount').val('');
        } else {
            $('#InternalAmount').val(parseFloat($('#InternalAmount').val()).toFixed(2));
        }
    }
}

function showInternalTransferWell() {
    if (validateInternalTransfer()) {
        $('#internalPromptText').text(
            internalPromptText1 + ' ' + $('#InternalAmount').val() + ' ' + $('#currencyFrom').val() + ' ' +
            internalPromptText2 + ' ' + $('#accountFrom').val() + ' ' + internalPromptText3 + ' ' +
            $('#accountTo').val() + internalPromptText4
        );
        $('#internalTransferWell').slideDown();
    }
}

function internalTransferCancel() {
    $('#internalTransferWell').slideUp();
}

function submitInternalTransfer() {
    var ret = validateInternalTransfer();
    if (ret) {
        $('#submitInternalBtn').hide();
        $('#submittingButton').show();
    }
    return ret;
}

function showNewCompetitionWell() {
    $('#newCompetitionWell').slideDown();
}

function newCompetitionCancel() {
    $('#newCompetitionWell').slideUp();
}

function validateUpdateAgreement() {
    var ret = true;
    
    //CAA validation
    if(!$('#CAAcheckbox').is(':checked')) {
        $('#groupCAAcheckbox').addClass("has-error"); 
        $('#helpBlockCAAcheckbox').css("color", "#a94442");
        $('#helpBlockCAAcheckbox').html(profileagreement); 
        ret = false;
    }
    else {
        $('#groupCAAcheckbox').removeClass("has-error");
        $('#helpBlockCAAcheckbox').html("");
    }
    
    //TC validation
    if(!$('#TCcheckbox').is(':checked')) {
        $('#groupTCcheckbox').addClass("has-error"); 
        $('#helpBlockTCcheckbox').css("color", "#a94442");
        $('#helpBlockTCcheckbox').html(profileconditions); 
        ret = false;
    }
    else {
        $('#groupTCcheckbox').removeClass("has-error");
        $('#helpBlockTCcheckbox').html("");
    }
    
    //if all passed good
    if (ret) {
        $('#updateAgreementSubmit').hide();
        $('#submittingButton').show();
    }
    
    return ret;
}

function validateCashbackConsent() {
    var ret = true;
    
    if(!$('#Cashbackcheckbox').is(':checked')) {
        $('#groupCashbackcheckbox').addClass("has-error"); 
        $('#helpBlockCashbackcheckbox').css("color", "#a94442");
        $('#helpBlockCashbackcheckbox').html(genericagreement); 
        ret = false;
    }
    else {
        $('#groupCashbackcheckbox').removeClass("has-error");
        $('#helpBlockCashbackcheckbox').html("");
    }
    
    //if all passed good
    if (ret) {
        $('#updateCashbackSubmit').hide();
        $('#submittingCashbackButton').show();
    }
    
    return ret;
}

function moveAlertsOnMobile() {
    // if small display
    if($('.rowHeader').css('padding-left') == '15px') {
        // if in mainContent
        if ($('.alert-dismissible ').parent('.mainContent').length > 0) {
            // move to the left column
            $('.sideBar').first().prepend($('.alert-dismissible'));
        }
    // if big display
    } else {
        // if in sideBar
        if ($('.alert-dismissible ').parent('.sideBar').length > 0) {
            $('.mainContent').first().prepend($('.alert-dismissible'));
        }
    }
}

function moveSideBarRTLonMobile() {
    // if small display
    if($('.rowHeader').css('padding-left') == '15px') {
        // if RTL
        if ($('.sideBar').hasClass('rtl')) {
            $('.sideBar').removeClass('pull-right');
        }
    // if big display
    } else {
        // if RTL
        if ($('.sideBar').hasClass('rtl')) {
            $('.sideBar').addClass('pull-right');
        }
    }
}

function resizeSideMenuIconsTablet() {
    // if tablet display
    if($('.sideMenu .list-group-item').css('padding-top') == '10px') {
        $('.sideMenu .fa').each(function(){
            if($(this).hasClass('fa-lg')) {
                $(this).removeClass('fa-lg');
                $(this).addClass('fa-md');
            }
        });
    // if big display
    } else {
        $('.sideMenu .fa').each(function(){
            if($(this).hasClass('fa-md')) {
                $(this).removeClass('fa-md');
                $(this).addClass('fa-lg');
            }
        });
    }
}

function collapseSideMenu() {
    // if tablet display
    if($('.sideMenu .list-group-item').css('padding-top') == '10px' || $('.sideMenu').css('width') == '940px') {
        $('#sideMenuHamburger').show();
        $('#sideMenu').collapse('hide');
        $('#sideMenu').removeClass('hiddenHamburger');
    // if big display
    } else {
        // in not collapsed by default
        if (!$('#sideMenu').hasClass('collapsedDefault')) {            
            $('#sideMenuHamburger').hide();
            $('#sideMenu').collapse('show');
            $('#sideMenu').addClass('hiddenHamburger');
        }
    }
}

function collapseTwitterWall() {
    // if tablet display
    if($('.pageTitleRight').css('display') == 'none') {
        $('#twitterWallHamburger').show();
        $('#twitter-timeline').collapse('hide');
        $('#twitter-timeline').removeClass('hiddenHamburger');
    // if big display
    } else {
        // in not collapsed by default
        if (!$('#twitter-timeline').hasClass('collapsedDefault')) {            
            $('#twitterWallHamburger').hide();
            $('#twitter-timeline').collapse('show');
            $('#twitter-timeline').addClass('twitterWallHamburger');
        }
    }
}

function dataTableToCSV(tableID, filename, columnNames) {
    /* Requires alasql */

    var data = [];
    data = $('#' + tableID).DataTable().data().toArray();

    /* Prepare column names */
    var columnNames = columnNames || false;
    var columnNamesQuery = '*';

    if (columnNames != false) {
        var pairs = [];
        for (var i=0; i < columnNames.length; i++) {
            var pair = '[' + i + '] AS [' + columnNames[i] + ']';
            pairs.push(pair);
        }
        var columnNamesQuery = pairs.join(', ');
    }
    /* End prepare column names */

    alasql("SELECT " + columnNamesQuery + " INTO CSV('" + filename + ".csv', {separator:','}) FROM ? ORDER BY 1", [data]);
}

function runTicker() {
    /* Load jquery marquee */
    $.getScript( "/js/jquery.marquee.min.js", function( data, textStatus, jqxhr ) {

        if (jqxhr.status == 200) {
            
            /* Get ticker data */
            try {
                prepopulateTicker();
            } catch (e) {
                // no previous tick
            }
            getTickerData(true);

        } else {
            
            /* Hide the ticker element */
            $('.marquee-ticker').hide();
        
        }
    });
}

function prepopulateTicker() {
    var ticks = JSON.parse(window.localStorage.getItem('ticks'));
    if (ticks) {
        var data = {
            time : '',
            ticks: ticks
        };

        populateTicker(data, true);
    }
}

function getTickerData(startTicker) {
    $.ajax({
        type: "GET",
        datatype: 'json',
        hsts_max_age: 0,
        url: '/data/tickdata',
        async: true,
        cache: false,
        timeout: 1000,
        success: function (data) {
            data = JSON.parse(data);
            
            // if ticker is not explicitely told to start, start it if it is empty
            if (!startTicker) {
                if ($('.marquee-ticker').text().trim() == '') {
                    startTicker = true;
                }
            }

            populateTicker(data);
            
            if (startTicker) {                
                console.log('Ticker started!');
                
                //showTicker();

                $('.marquee-ticker').marquee({
                    duration: 30000,
                    //speed: 8,
                    gap: 10,
                    delayBeforeStart: 0,
                    direction: 'left',
                    duplicated: true,
                    pauseOnHover: true,
                    startVisible: true,
                });
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            setTimeout(function() {
                getTickerData(startTicker);
            }, 5000);
        }
    });
}

function validatePromotionTC() {
    var ret = true;
    
    //TC validation
    if(!$('#PromotionTCcheckbox').is(':checked')) {
        $('#groupPromotionTCcheckbox').addClass("has-error"); 
        $('#helpBlockPromotionTCcheckbox').css("color", "#a94442");
        $('#helpBlockPromotionTCcheckbox').html(profileconditions); 
        ret = false;
    }
    else {
        $('#groupPromotionTCcheckbox').removeClass("has-error");
        $('#helpBlockPromotionTCcheckbox').html("");
    }
    
    //if all passed good
    if (ret) {
        $('#updatePromotionAgreementSubmit').hide();
        $('#submittingPromotionButton').show();
    }
    
    return ret;
}

function validatePromotionBonusTC() {
    var ret = true;
    
    //TC validation
    if(!$('#PromotionBonusTCcheckbox').is(':checked')) {
        $('#groupPromotionBonusTCcheckbox').addClass("has-error"); 
        $('#helpBlockPromotionBonusTCcheckbox').css("color", "#a94442");
        $('#helpBlockPromotionBonusTCcheckbox').html(profileconditions); 
        ret = false;
    }
    else {
        $('#groupPromotionBonusTCcheckbox').removeClass("has-error");
        $('#helpBlockPromotionBonusTCcheckbox').html("");
    }
    
    //if all passed good
    if (ret) {
        $('#updatePromotionBonusAgreementSubmit').hide();
        $('#submittingPromotionBonusButton').show();
    }
    
    return ret;
}

function validatePromotion30pTC() {
    var ret = true;
    
    //TC validation
    if(!$('#PromotionTCcheckbox').is(':checked')) {
        $('#groupPromotionTCcheckbox').addClass("has-error"); 
        $('#helpBlockPromotionTCcheckbox').css("color", "#a94442");
        $('#helpBlockPromotionTCcheckbox').html(profileconditions); 
        ret = false;
    }
    else {
        $('#groupPromotionTCcheckbox').removeClass("has-error");
        $('#helpBlockPromotionTCcheckbox').html("");
    }
    
    //if all passed good
    if (ret) {
        $('#updatePromotionAgreementSubmit').hide();
        $('#submittingPromotionButton').show();
    }
    
    return ret;
}

function populateTicker(data, prepopulate) {
    /* Update marquee if the data has been updated */
    if ($($('.marquee-ticker .tick')[0]).attr('TickTime') != data['time']) {
        
        /* Populate only if new data is avaliable */
        if ((window.localStorage.getItem('ticks') != JSON.stringify(data['ticks'])) || prepopulate) {
            
            try {
                var symbols = Object.keys(data['ticks']).sort();
            } catch (e) {
                hideTicker();
                return;
            }

            for (var i=0; i < symbols.length; i++) {

                var symbol = symbols[i];

                $tick = $($('.marquee-ticker .tick')[i]);
                /* Set new time */
                $tick.attr('TickTime', data['time']);

                /* Change the symbol */
                $tick.find('span[data=tick-symbol]').text(symbol);

                /* Change the direction if needed*/
                var oldMid = $tick.find('span[data=tick-direction]').attr('mid');
                var newMid = data['ticks'][symbol]['mid'];
                var midChange = newMid - oldMid;

                if (midChange == 0 || oldMid == null || oldMid == 'null') {
                
                    $tick.find('span[data=tick-direction]').removeClass();
                    $tick.find('span[data=tick-direction] i').removeClass();
                    //$tick.find('span[data=tick-direction] i').addClass('fa fa-caret-right'); 

                    if (oldMid == null || oldMid == 'null') {
                        $tick.find('span[data=tick-direction]').attr('mid', newMid);
                    }
                
                } else {
                
                    $tick.find('span[data=tick-direction]').attr('mid', newMid);
                    
                    var direction = ((newMid - oldMid) > 0) ? 'up' : 'down';
                    $tick.find('span[data=tick-direction]').removeClass();
                    $tick.find('span[data=tick-direction]').addClass('tick-' + direction);
                    $tick.find('span[data=tick-direction] i').removeClass();
                    $tick.find('span[data=tick-direction] i').addClass('fa fa-arrow-' + direction);
                
                }

                /* Change the price */
                //$tick.find('span[data=tick-ask]').text(data['ticks'][symbol]['ask']);
                //$tick.find('span[data=tick-bid]').text('(' + data['ticks'][symbol]['bid'] + ')');
                $tick.find('span[data=tick-ask]').text(parseFloat(data['ticks'][symbol]['ask']).toFixed(5));
                $tick.find('span[data=tick-bid]').text('(' + parseFloat(data['ticks'][symbol]['bid']).toFixed(5) + ')');
            }

            window.localStorage.setItem('ticks', JSON.stringify(data['ticks']));
        }

    }

    if (!prepopulate) {
        /* Get new data after 5 seconds */
        setTimeout(getTickerData, 5000);
    }
}

function showTicker() {
    $('.rowHeader').animate({'margin-top': '40px'}, 500);
    $('.navbar-default').css('border-style', 'none');
    $('.marquee-ticker').slideDown(500);
}

function hideTicker() {
    $('.rowHeader').animate({'margin-top': '0px'}, 500);
    $('.navbar-default').css('border-style', 'solid');
    $('.marquee-ticker').slideUp(500);
}

function filterDataTable(el, table, column, tableFilter) {
    $(table).DataTable().column(column).search(tableFilter).draw();
    $('.filterBtn').each(function(i, btn) {
        if (btn != el) {
            $(btn).removeClass('blueBtn');
            $(btn).addClass('btnWhiteWithBlue');
        }
    });
    $(el).removeClass('btnWhiteWithBlue');
    $(el).addClass('blueBtn');
}

function filterDropdownDataTable(table, column, selectElement) {
    const tableFilter = $(selectElement).val();
    $(table).DataTable().column(column).search(tableFilter).draw();
}

function latinCharacters(text) {
    return /^[a-zA-Z \-\.\,\']+$/.test(text);
}

function validateUpdateId() {
    var ret = true;

    // first name validation
    if($('#FirstName').val().trim() == "") {
        $('#groupFirstName').addClass("has-error"); 
        $('#helpBlockFirstName').css("color", "#a94442");
        $('#helpBlockFirstName').html(signupfirstname); 
        ret = false;
    }/*
    else if (!latinCharacters($('#FirstName').val().trim())) {
        $('#groupFirstName').addClass("has-error"); 
        $('#helpBlockFirstName').css("color", "#a94442");
        $('#helpBlockFirstName').html(latincharacters);
        $('#groupFirstName').show();
        ret = false;
    }*/
    else {
        $('#groupFirstName').removeClass("has-error");
        $('#helpBlockFirstName').html("");
    }

    // last name validation
    if($('#LastName').val().trim() == "") {
        $('#groupLastName').addClass("has-error"); 
        $('#helpBlockLastName').css("color", "#a94442");
        $('#helpBlockLastName').html(signuplastname); 
        ret = false;
    }/*
    else if (!latinCharacters($('#LastName').val().trim())) {
        $('#groupLastName').addClass("has-error"); 
        $('#helpBlockLastName').css("color", "#a94442");
        $('#helpBlockLastName').html(latincharacters);
        $('#groupLastName').show();
        ret = false;
    }*/
    else {
        $('#groupLastName').removeClass("has-error");
        $('#helpBlockLastName').html("");
    }

    // Tax ID Number validation
    if (!validateTaxIdNumber($('#UpdateIdNumber').val().trim())) {
        $('#groupUpdateIdNumber').addClass('has-error');
        $('#groupUpdateIdNumber').css("color", "#a94442");
        $('#helpBlockUpdateIdNumber').html(profileidno);
        ret = false;
    } else {
        $('#groupUpdateIdNumber').removeClass("has-error");
        $('#helpBlockUpdateIdNumber').html("");
    }

    //street name validation
    if($('#fullAddress').val().trim() == "") {
        $('#groupFullAddress').addClass("has-error"); 
        $('#helpBlockFullAddress').css("color", "#a94442");
        $('#helpBlockFullAddress').html(profilestreetname); 
        ret = false;
    }
    else {
        $('#groupFullAddress').removeClass("has-error");
        $('#helpBlockFullAddress').html("");
    }
    
    //house number validation
    if($('#HomeNumber').val().trim() == "") {
        $('#groupHomeNumber').addClass("has-error"); 
        $('#helpBlockHomeNumber').css("color", "#a94442");
        $('#helpBlockHomeNumber').html(profilehouseno); 
        ret = false;
    }
    else {
        $('#groupHomeNumber').removeClass("has-error");
        $('#helpBlockHomeNumber').html("");
    }
    
    //city validation
    if($('#City').val().trim() == "") {
        $('#groupCity').addClass("has-error"); 
        $('#helpBlockCity').css("color", "#a94442");
        $('#helpBlockCity').html(profilecity); 
        ret = false;
    }
    else {
        $('#groupCity').removeClass("has-error");
        $('#helpBlockCity').html("");
    }
    
    //postal code validation
    if($('#PostalCode').val().trim() == "") {
        $('#groupPostalCode').addClass("has-error"); 
        $('#helpBlockPostalCode').css("color", "#a94442");
        $('#helpBlockPostalCode').html(profilezip); 
        ret = false;
    }
    else {
        $('#groupPostalCode').removeClass("has-error");
        $('#helpBlockPostalCode').html("");
    }

    // ID Document file validation
    if ($('#uploadFilePOI').length > 0) {

        //var sizelimitmin =  106954;
        var sizelimitmin =  0;
        var sizelimitmax = 15728640;

        // Check file size limit
        if ($('#uploadFilePOI')[0].files.length == 0 || $('#uploadFilePOI')[0].files[0].size > sizelimitmax || $('#uploadFilePOI')[0].files[0].size < sizelimitmin) {
            $('#uploadFilePOI').parent('.form-group').addClass("has-error");
            $('#uploadFilePOI').siblings('.help-block').css("color", "#a94442");
            $('#uploadFilePOI').siblings('.help-block').html(helptextfilesizelimit);
            ret = false;
        } else {
            $('#uploadFilePOI').parent('.form-group').removeClass("has-error");
            $('#uploadFilePOI').siblings('.help-block').html("");
        }

    }

    // Address Document file validation
    if ($('#uploadFilePOA').length > 0) {

        //var sizelimitmin =  106954;
        var sizelimitmin =  0;
        var sizelimitmax = 15728640;

        // Check file size limit
        if ($('#uploadFilePOA')[0].files.length == 0 || $('#uploadFilePOA')[0].files[0].size > sizelimitmax || $('#uploadFilePOA')[0].files[0].size < sizelimitmin) {
            $('#uploadFilePOA').parent('.form-group').addClass("has-error");
            $('#uploadFilePOA').siblings('.help-block').css("color", "#a94442");
            $('#uploadFilePOA').siblings('.help-block').html(helptextfilesizelimit);
            ret = false;
        } else {
            $('#uploadFilePOA').parent('.form-group').removeClass("has-error");
            $('#uploadFilePOA').siblings('.help-block').html("");
        }

    }

    // POCrypto file validation
    if ($('#uploadFilePOCryptoFront').length > 0) {

        //var sizelimitmin =  106954;
        var sizelimitmin =  0;
        var sizelimitmax = 15728640;

        // Check file size limit
        if ($('#uploadFilePOCryptoFront')[0].files.length == 0 || $('#uploadFilePOCryptoFront')[0].files[0].size > sizelimitmax || $('#uploadFilePOCryptoFront')[0].files[0].size < sizelimitmin) {
            $('#uploadFilePOCryptoFront').parent('.form-group').addClass("has-error");
            $('#uploadFilePOCryptoFront').siblings('.help-block').css("color", "#a94442");
            $('#uploadFilePOCryptoFront').siblings('.help-block').html(helptextfilesizelimit);
            ret = false;
        } else {
            $('#uploadFilePOCryptoFront').parent('.form-group').removeClass("has-error");
            $('#uploadFilePOCryptoFront').siblings('.help-block').html("");
        }

    }
    
    if (ret == true) {
        $('#updateIdSubmit').hide();
        $('#updateIdSubmittingButton').show();
    }
    
    return ret;
}

//downloads uploaded file from URI
function downloadURIPDF(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    link.click();
}

//check if mobile
window.mobileAndTabletcheck = function() {
    var check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
};

function prepareElectiveProfessionalForm() {
    //TradedCFDsOrFX prepare
    if ($('#TradedCFDsOrFX').is(':checked')) {
        $('#groupTradedWith').show();
        if ($('#TradedWith').val() == 'Other') {
            $('#groupTradedFXBrokerName').show();
        } else {
            $('#groupTradedFXBrokerName').hide();
            $('#TradedFXBrokerName').val($('#TradedWith').val());
        }
    } else {
        $('#groupTradedWith').hide();
        $('#groupTradedFXBrokerName').hide();
    }

    //PortfolioExceedingHalfMillion prepare
    if ($('#PortfolioExceedingHalfMillion').is(':checked')) {
        $('#groupPortfolioValue').show();
    } else {
        $('#groupPortfolioValue').hide();
    }

    //WorkedInFinancialSector prepare
    if ($('#WorkedInFinancialSector').is(':checked')) {
        $('#groupFinancialSectorEmployerName').show();
        $('#groupFinancialSectorJobTitle').show();
        $('#groupFinancialSectorInfo').show();
    } else {
        $('#groupFinancialSectorEmployerName').hide();
        $('#groupFinancialSectorJobTitle').hide();
        $('#groupFinancialSectorInfo').hide();
    }
}

function electiveProTradedWith() {
    if ($('#TradedWith').val() == 'Other') {
        $('#groupTradedFXBrokerName').show();
    } else {
        $('#groupTradedFXBrokerName').hide();
    }
    $('#TradedFXBrokerName').val($('#TradedWith').val());
}

function withdrawalProviderChange() {
    // Show bank transfer form
    if ($('#WithdrawalProvider option:selected').attr('data-provider') == 'bankTransfer') {
        $('#bankTransferForm').show();
        $('#groupWithdrawComment').hide();
    } else {
        $('#bankTransferForm').hide();
        $('#groupWithdrawComment').show();
    }
        
    for(var provider in withdrawalLabelNameChange) {
        if ($('#WithdrawalProvider option:selected').attr('data-provider') == provider) {
            $('#withdrawInputLabel').html(withdrawalLabelNameChange[provider]);
            $('#withdrawComment').prop('disabled', true);
            $('#withdrawComment').hide();
            $('#withdrawCommentInput').show();
            $('#withdrawCommentInput').prop('disabled', false);
            return;
        } else {
            $('#withdrawInputLabel').html(defaultWithdrawalLabelName);
            $('#withdrawComment').show();
            $('#withdrawComment').prop('disabled', false);
            $('#withdrawCommentInput').prop('disabled', true);
            $('#withdrawCommentInput').hide();
        }  
    }
}


function validateElectivePro() {
    let ret = true;

    var sizelimitmin =  0;
    var sizelimitmax = 15728640;

    //Two out of three checked
    var checkedNum = 0;
    $('#PortfolioExceedingHalfMillion, #TradedCFDsOrFX, #WorkedInFinancialSector').each(function() {
        if ($(this).is(':checked')) { checkedNum += 1; }
    });
    
    //Two out of three fields must be checked
    if (checkedNum < 2) {
        $('#PortfolioExceedingHalfMillion, #TradedCFDsOrFX, #WorkedInFinancialSector').each(function() {
            if (!$(this).is(':checked')) {
                $(this).parent('div').addClass("has-error");
                $(this).parent('label').siblings('.help-block').css("color", "#a94442");
                $(this).parent('label').siblings('.help-block').html(twooutofthree);
            }
        });

        $('#helpBlockSubmitButton').parent('div').addClass("has-error");
        $('#helpBlockSubmitButton').css("color", "#a94442");
        $('#helpBlockSubmitButton').html(twooutofthree);

        ret = false;
        return ret;
    } else {
        $('#PortfolioExceedingHalfMillion, #TradedCFDsOrFX, #WorkedInFinancialSector').each(function(i, c) {
            $(this).parent('div').removeClass("has-error"); 
            $(this).parent('label').siblings('.help-block').html('');
        });

        $('#helpBlockSubmitButton').parent('div').removeClass("has-error"); 
        $('#helpBlockSubmitButton').html('');
    }

    //TradedCFDsOrFX validation
    if (!$('#TradedCFDsOrFX').is(':checked')) {
        /*
        $('#groupTradedCFDsOrFX').addClass("has-error"); 
        $('#helpBlockTradedCFDsOrFX').css("color", "#a94442");        
        $('#helpBlockTradedCFDsOrFX').html(requiredfield);
        ret = false;
        */
    } else {
        $('#groupTradedCFDsOrFX').removeClass("has-error"); 
        $('#helpBlockTradedCFDsOrFX').html('');

        //TradedWith validation
        if ($('#TradedWith').val() == '') {
            $('#groupTradedWith').addClass("has-error"); 
            $('#helpBlockTradedWith').css("color", "#a94442");        
            $('#helpBlockTradedWith').html(selectdropdown);
            ret = false;
        } else {
            $('#groupTradedWith').removeClass("has-error"); 
            $('#helpBlockTradedWith').html('');
        }

        //TradedFXBrokerName validation
        if ($('#TradedFXBrokerName').val() == '') {
            $('#groupTradedFXBrokerName').addClass("has-error"); 
            $('#helpBlockTradedFXBrokerName').css("color", "#a94442");        
            $('#helpBlockTradedFXBrokerName').html(requiredfield);
            ret = false;
        } else if (!latinCharactersNumbers($('#TradedFXBrokerName').val().trim())) { 
            $('#groupTradedFXBrokerName').addClass("has-error"); 
            $('#helpBlockTradedFXBrokerName').css("color", "#a94442");        
            $('#helpBlockTradedFXBrokerName').html(latincharactersnumbers);
            ret = false;
        } else {
            $('#groupTradedFXBrokerName').removeClass("has-error"); 
            $('#helpBlockTradedFXBrokerName').html('');
        }

    }

    //PortfolioExceedingHalfMillion validation
    if (!$('#PortfolioExceedingHalfMillion').is(':checked')) {
        /*
        $('#groupPortfolioExceedingHalfMillion').addClass("has-error"); 
        $('#helpBlockPortfolioExceedingHalfMillion').css("color", "#a94442");        
        $('#helpBlockPortfolioExceedingHalfMillion').html(requiredfield);
        ret = false;
        */
    } else {
        $('#groupPortfolioExceedingHalfMillion').removeClass("has-error"); 
        $('#helpBlockPortfolioExceedingHalfMillion').html('');
    
        //PortfolioValue validation
        if ($('#PortfolioValue').val() == '') {
            $('#groupPortfolioValue').addClass("has-error"); 
            $('#helpBlockPortfolioValue').css("color", "#a94442");        
            $('#helpBlockPortfolioValue').html(selectdropdown);
            ret = false;
        } else {
            $('#groupPortfolioValue').removeClass("has-error"); 
            $('#helpBlockPortfolioValue').html('');
        }
    }

    //WorkedInFinancialSector validation
    if (!$('#WorkedInFinancialSector').is(':checked')) {
        /*
        $('#groupWorkedInFinancialSector').addClass("has-error"); 
        $('#helpBlockWorkedInFinancialSector').css("color", "#a94442");        
        $('#helpBlockWorkedInFinancialSector').html(requiredfield);
        ret = false;
        */
    } else {
        $('#groupWorkedInFinancialSector').removeClass("has-error"); 
        $('#helpBlockWorkedInFinancialSector').html('');

        //FinancialSectorEmployerName validation
        if ($('#FinancialSectorEmployerName').val() == '') {
            $('#groupFinancialSectorEmployerName').addClass("has-error"); 
            $('#helpBlockFinancialSectorEmployerName').css("color", "#a94442");        
            $('#helpBlockFinancialSectorEmployerName').html(requiredfield);
            ret = false;
        } else if (!latinCharactersNumbers($('#FinancialSectorEmployerName').val().trim())) { 
            $('#groupFinancialSectorEmployerName').addClass("has-error"); 
            $('#helpBlockFinancialSectorEmployerName').css("color", "#a94442");        
            $('#helpBlockFinancialSectorEmployerName').html(latincharactersnumbers);
            ret = false;
        } else {
            $('#groupFinancialSectorEmployerName').removeClass("has-error"); 
            $('#helpBlockFinancialSectorEmployerName').html('');
        }

        //FinancialSectorJobTitle validation
        if ($('#FinancialSectorJobTitle').val() == '') {
            $('#groupFinancialSectorJobTitle').addClass("has-error"); 
            $('#helpBlockFinancialSectorJobTitle').css("color", "#a94442");        
            $('#helpBlockFinancialSectorJobTitle').html(requiredfield);
            ret = false;
        } else if (!latinCharactersNumbers($('#FinancialSectorJobTitle').val().trim())) { 
            $('#groupFinancialSectorJobTitle').addClass("has-error"); 
            $('#helpBlockFinancialSectorJobTitle').css("color", "#a94442");        
            $('#helpBlockFinancialSectorJobTitle').html(latincharactersnumbers);
            ret = false;
        } else {
            $('#groupFinancialSectorJobTitle').removeClass("has-error"); 
            $('#helpBlockFinancialSectorJobTitle').html('');
        }

        //FinancialSectorInfo validation
        if ($('#FinancialSectorInfo').val() == '') {
            $('#groupFinancialSectorInfo').addClass("has-error"); 
            $('#helpBlockFinancialSectorInfo').css("color", "#a94442");        
            $('#helpBlockFinancialSectorInfo').html(requiredfield);
            ret = false;
        } else if (!latinCharactersNumbers($('#FinancialSectorInfo').val().trim())) { 
            $('#groupFinancialSectorInfo').addClass("has-error"); 
            $('#helpBlockFinancialSectorInfo').css("color", "#a94442");        
            $('#helpBlockFinancialSectorInfo').html(latincharactersnumbers);
            ret = false;
        } else {
            $('#groupFinancialSectorInfo').removeClass("has-error"); 
            $('#helpBlockFinancialSectorInfo').html('');
        }
    }

    //HasElectiveProfessionalDeclaration
    if (!$('#HasElectiveProfessionalDeclaration').is(':checked')) {
        $('#groupHasElectiveProfessionalDeclaration').addClass("has-error"); 
        $('#helpBlockHasElectiveProfessionalDeclaration').css("color", "#a94442");        
        $('#helpBlockHasElectiveProfessionalDeclaration').html(requiredfield);
        ret = false;
    } else {
        $('#groupHasElectiveProfessionalDeclaration').removeClass("has-error"); 
        $('#helpBlockHasElectiveProfessionalDeclaration').html('');
    }

    /* Check File Uploads */
    var fileInputs = $("input:file");
    var uploadFileInputs = [];
    fileInputs.each(function() {
        if ($($(this).attr('data-checkbox')).is(':checked')) {
            uploadFileInputs.push($(this));
        }
    });
    uploadFileInputs = $(uploadFileInputs).map(function () {return this.toArray();});

    uploadFileInputs.each(function() {
        if (this.files.length <= 0) {
            $(this).parent('.form-group').addClass("has-error");
            $(this).siblings('.help-block').css("color", "#a94442");
            $(this).siblings('.help-block').html(helptextnodocs);
            ret = false;
        } else {
            $(this).parent('.form-group').removeClass("has-error");
            $(this).siblings('.help-block').html("");
            //check file size limit
            if (this.files[0].size > sizelimitmax || this.files[0].size < sizelimitmin) {
                $(this).parent('.form-group').addClass("has-error");
                $(this).siblings('.help-block').css("color", "#a94442");
                $(this).siblings('.help-block').html(helptextfilesizelimit);
                ret = false;
            } else {
                $(this).parent('.form-group').removeClass("has-error");
                $(this).siblings('.help-block').html("");
            }
        }
    });

    //Check Additional Declaration
    if (!$('#AdditionalDeclaration').is(':checked')) {
        $('#groupAdditionalDeclaration').addClass("has-error"); 
        $('#helpBlockAdditionalDeclaration').css("color", "#a94442");        
        $('#helpBlockAdditionalDeclaration').html(requiredfield);
        ret = false;
    } else {
        $('#groupAdditionalDeclaration').removeClass("has-error"); 
        $('#helpBlockAdditionalDeclaration').html('');
    }

    if (ret == true) {
        $('#electiveProSubmitButton').hide();
        $('#submittingButton').show();
        $('#helpBlockSubmitButtonAllErrors').html('');
    } else {
        $('#helpBlockSubmitButtonAllErrors').addClass("has-error"); 
        $('#helpBlockSubmitButtonAllErrors').css("color", "#a94442");        
        $('#helpBlockSubmitButtonAllErrors').html(allerrorstext);
    }

    return ret;
}

function checkTwitterWallPresence() {
    if ($('.twitterNoImages').length == 1 && $($('.twitterNoImages')[0]).text().trim() == '') {
        $($('.twitterNoImages')[0]).remove();
    }
}

function setContactBtnPos() {
    if ($(window).width() < 768) {
        const $chatElement = $('.contactChatButtons');
        $chatElement.detach();
        $('.mainContent').append($chatElement);
        $chatElement.show();
    } 
}

function altAdressCheck() {
    if($('#checkboxAddressAlt').length > 0) {
        if ($('#checkboxAddressAlt').is(':checked')) {
            $('#AddressAltWrapper').slideDown();
        }
        else {
            $('#AddressAltWrapper').slideUp();
            $('#StreetAlt').val('');
            $('#StreetNumberAlt').val('');
            $('#CityAlt').val('');
            $('#PostalCodeAlt').val('');
            $('#CountryAlt').val('');
        }
    }
}

function navAccountSizeCheck() {
    // if small display
    if ($('#navAccount').css('border-top-color') == '#00c0fc'
        || $('#navAccount').css('border-top-color') == 'rgb(0, 192, 252)'
        ) {
        activeNav = $('#navbarAccount').find('li.active');
        $('#navAccountButtonText').html(activeNav.text());
    
    // if big display
    } else {
        activeNav = $('#navbarAccount').find('li.active');
        $('#navAccountButtonText').html('');
    }
}

$(document).ready(function(){

    errorBlocksClearListener();

    // datepicker
    $dateInputs = $('.datepicker-input');
    $dateInputs.each(function() {
        // sets up datepicker
        let lang;
        switch (DISPLAY_LANGUAGE) {
            case '':
                lang = 'en-GB';
                break;
            case 'en':
                lang = 'en-GB';
                break;
            case 'zh':
                lang = 'zh-CN';
                break;
            case 'my':
                lang = 'ms';
                break;
            default:
                lang = DISPLAY_LANGUAGE
                break;
        }    
        $(this).datepicker({ 
            language: lang,
            startDate: new Date('1920-1-01')
        });

        // sets dates coming from db 
        let dateDbVal = $(this).attr('data-date');
        if(typeof dateDbVal !== typeof undefined && dateDbVal !== false && dateDbVal != '') {
            $(this).datepicker('update', new Date(dateDbVal));     
        }
        
    });

    // fixing contact buttons position to bottom of the pages
    if ($(window).width() > 768) $('.contactChatButtons').show();

    setContactBtnPos();
    $( window ).resize(function() {
        setContactBtnPos();
    });

    //Assessment Questionnaire checkboxes
    $('[data=questionnaire-multiple-choice] input[type=checkbox]').on('change', function() {
        if ($(this).attr('name') == 'InstrumentComplexityNone') {
            if ($(this).is(':checked')) {
                $('[data=questionnaire-multiple-choice] input[type=checkbox]:not([name=InstrumentComplexityNone])').each(function(i, e) {
                    $(e).prop('checked', false);
                });
            }    
        } else {
            $('[name=InstrumentComplexityNone]').prop('checked', false);
        }
    });

    tradingExperienceChoose();
    
    //Trading Experience checkboxes
    $('#TradingExperienceNo input[type=checkbox]').on('change', function() {
        if ($(this).attr('name') == 'TradingApplicableStatementsNone') {
            if ($(this).is(':checked')) {
                $('#TradingExperienceNo input[type=checkbox]:not([name=TradingApplicableStatementsNone])').each(function(i, e) {
                    $(e).prop('checked', false);
                });
            }
        } else if ($(this).attr('name') == 'TradingApplicableStatementsAll') {
            if ($(this).is(':checked')) {
                $('#TradingExperienceNo input[type=checkbox]:not([name=TradingApplicableStatementsNone])').each(function(i, e) {
                    $(e).prop('checked', true);
                });
                $('[name=TradingApplicableStatementsNone]').prop('checked', false);
            }
        } else {
            if ($('#TradingApplicableStatementsQualification').is(':checked') &&
                $('#TradingApplicableStatementsNews').is(':checked') &&
                $('#TradingApplicableStatementsMaterial').is(':checked')
                ) {
                $('[name=TradingApplicableStatementsAll]').prop('checked', true);
                $('[name=TradingApplicableStatementsNone]').prop('checked', false);
            } else if (!$('#TradingApplicableStatementsQualification').is(':checked') &&
                !$('#TradingApplicableStatementsNews').is(':checked') &&
                !$('#TradingApplicableStatementsMaterial').is(':checked')
                ) {
                //$('[name=TradingApplicableStatementsAll]').prop('checked', false);
                //$('[name=TradingApplicableStatementsNone]').prop('checked', true);
            } else {
                $('[name=TradingApplicableStatementsAll]').prop('checked', false);
                $('[name=TradingApplicableStatementsNone]').prop('checked', false);
            }
        }
    });

    //shows charges of selected pay provider
    $('#WithdrawalProvider').on('change', function() {
        var selectedProvider = $('option:selected', this).attr('data-provider');
        var country = $('#charges').attr('country');
        if (country == 'KR' || country == 'KP') {
            return;
        }

        switch (selectedProvider) {
            case 'card':
                $('#providerCharges').html('3USD / 3GBP / 3EUR ' + perTranslationString);
                $('#charges').show();
                break;
            case 'skrill':
                //don't show for EA countries    
                if (['VN', 'ID', 'TH', 'CN', 'MY'].indexOf($('#charges').attr('country')) > -1) {
                    break;
                }
                //if on BZ portal, show different text
                if ($('option:selected[data-provider-bz]', this).length > 0) {
                    $('#providerCharges').html('1% (' + minimumString + ' $3 / 3EUR / 3GBP)');
                    $('#charges').show();
                    break;
                } else {
                    $('#providerCharges').html('1% (' + minimumString + ' $3 / 3EUR / 3GBP / 3PLN)');
                    $('#charges').show();
                    break; 
                }
            case 'neteller':
                //don't show for EA countries
                if (['VN', 'ID', 'TH', 'CN', 'MY'].indexOf($('#charges').attr('country')) > -1) {
                    break;
                }
                $('#providerCharges').html('3USD / 3GBP / 3EUR');
                $('#charges').show();
                break;
            case 'webMoney':
                $('#providerCharges').html('0.8%');
                $('#charges').show();
                break;
            case 'bankTransfer':
                $('#providerCharges').html(variesString);
                $('#charges').show();
                break;
            default:
                $('#charges').hide();
                break;
        }

    });

    $('#submitNewsletterConsent').on('click', function() {
        //we will later replace #NewsletterConsent with .NewsletterConsent and each
        //checkbox with NewsletterConsent class will have its own name attribute.
        //data sent via ajax call will be { "Newsletter: newsletterName, "Status" : subState }

        $('#newsletterConsentAlert').hide();
        $('#newsletterConsentAlert p').text('');
        
        var subState;

        if($('#NewsletterConsent').is(':checked')) {
            subState = true;
        } else {
            subState = false;
        }
        $('#submitNewsletterConsent .panelLoading').show();
        $('#submitNewsletterConsent').attr('disabled', 'disabled');

        $.ajax({
            type: "POST",
            url: '/portal/updatesubscriptionajax',
            data: {
                'Newsletter' : "Newsletter",
                'Status' : subState
            },
            dataType: "text",
            success: function (data) {
                if (data == 'OK') {
                    $('#newsletterConsentAlert p').text(newslettersuccess);
                } else {
                    $('#newsletterConsentAlert p').text(newslettererror);
                }
                $('#newsletterConsentAlert').show().delay(4000).fadeOut(500);
                $('#submitNewsletterConsent .panelLoading').hide();
                $('#submitNewsletterConsent').removeAttr('disabled');
                //location.href = "/portal/index/newsletterUpdate/success";                
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

            }
        });

    });

    $('#subscribeBtn').on('click', function() {

        $('#startMsg').hide();
        $(this).hide();
        $('#endMsg').fadeIn();
        $(this).parent().removeClass('alert-info');
        $(this).parent().addClass('alert-success');

        $.ajax({
            type: "POST",
            url: '/portal/updatesubscriptionajax',
            dataType: "json",
            data: {
                'Newsletter' : "Newsletter",
                'Status' : true
            },
            success: function (data) {
                
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

            }
        });
        
    });
    
    //overlapping text on RTL fix
    if ($('body').attr('dir') == 'rtl') {
        $('input[type="checkbox"]').css({
            'position': 'static',
            'margin-left': '0'            
        });
    }
    
    $('#bannerCloseButton, #bannerCloseButtonMobile').on('click', function(){

        $.ajax({
            type: "POST",
            url: '/portal/hidebannerajax',
            dataType: "json",
            success: function (data) {
                console.log(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

            }
        });
    });
    $('#bannerMain .bannerLink').on('click', function() {
        $(this).css({
            'text-decoration': 'none',
            'color': '#00bafc'
        });
    });

    
    //sets all negativive amounts in reports to red color
    $('#dashboardTable tbody td').each(function(){
        if ($(this).text().startsWith('-')) {
            $(this).css('color', 'red');
        }
        //console.log($(this).text());
    });

    //sets nationality based on citizenship
    $('#CitizenshipCode').change(function() {
        var currentCitizenship = $('#CitizenshipCode').find(':selected').val();
        $('#Nationality option:selected').each(function(i, el) {
          $(el).removeAttr('selected');
        });      
        var setNationalityTo = $('#Nationality option[value="' + currentCitizenship + '"]');
        setNationalityTo.attr('selected', 'selected');
        $('#Nationality').val(currentCitizenship).change();       
    });
    
    //shows correct document inputs (ID or Passport)
    $('#typeOfProof').change(function() {
        $('#groupUploadPOI').find('.clearValue').val('');
        $('#groupUploadPOI').find('.hide-prev').hide();
        $('#groupUploadPOI').find('.has-error').html('');
      
        if ($('#groupUploadPOI').find('.clearValue').is("[src]")) {
            $('#groupUploadPOI').find('.clearValue').attr('src', '');
        }
        if ($('#groupUploadPOI').find('.clearValue').is("[data]")) {
            $('#groupUploadPOI').find('.clearValue').attr('data', '');
        }
                
        if ($(this).val() == 'notSelected') {
            $('#date-dialog-poi').hide(); 
            $('#typeID').hide();
            $('#typePassport').hide();
            $('#groupPOIIdNumber').hide();
        } else if ($(this).val() == 'ID') {
            $('#typeID').show();
            $('#typePassport').hide();
            $('#date-dialog-poi').show();
            $('#groupPOIIdNumber').show();
        } else if ($(this).val() == 'Passport' || $(this).val() == 'Driving Licence') {
            $('#typeID').hide();
            $('#typePassport').show();
            $('#date-dialog-poi').show();
            $('#groupPOIIdNumber').show();
        }
    });

    //shows correct document inputs (for POA)
    if(SERVER_ORGANIZATION !== 'Cyprus') {
        $('#POASubtype').change(function() {
            $('#groupUploadPOA').find('.clearValue').val('');
            $('#groupUploadPOA').find('.imageInput').val('');
            $('#groupUploadPOA').find('.prieviewImgInput').hide();
            $('#groupUploadPOA').find('.hide-prev').hide();
            $('#groupUploadPOA').find('.has-error').html('');
        
            if ($('#groupUploadPOA').find('.clearValue').is("[src]")) {
                $('#groupUploadPOA').find('.clearValue').attr('src', '');
            }
            if ($('#groupUploadPOA').find('.clearValue').is("[data]")) {
                $('#groupUploadPOA').find('.clearValue').attr('data', '');
            }

            if ($(this).val() == 'notSelected') {
                $('#date-dialog-poa').hide(); 
                $('#POAFileInput').hide();
                $('#groupUpload').hide();
                $('#groupUpload1').hide();
            } else {
                $('#date-dialog-poa').show();
                $('#POAFileInput').show();
                $('#groupUpload').show();
                $('#groupUpload1').show();
            }
        });
    } else {
        $('#groupUploadPOA').find('.clearValue').val('');
        $('#groupUploadPOA').find('.hide-prev').hide();
        $('#groupUploadPOA').find('.has-error').html('');
        
        if ($('#groupUploadPOA').find('.clearValue').is("[src]")) {
            $('#groupUploadPOA').find('.clearValue').attr('src', '');
        }
        if ($('#groupUploadPOA').find('.clearValue').is("[data]")) {
            $('#groupUploadPOA').find('.clearValue').attr('data', '');
        }
        $('#groupUpload').show();
        $('#groupUpload1').show();
    }

    //upload files preview
    $(".imageInput").on("change", function() {
        $('#helpBlockUploadPOIFront').html('');
        $('#helpBlockUploadPOIBack').html('');
        if (window.FileReader) {

            var reader = new FileReader(), rFilter = /^(text\/csv|application\/vnd\.openxmlformats\-officedocument\.spreadsheetml\.sheet|application\/vnd\.openxmlformats\-officedocument\.wordprocessingml\.document|application\/vnd\.ms-excel|application\/msword|application\/pdf|image\/bmp|image\/cis-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x-cmu-raster|image\/x-cmx|image\/x-icon|image\/x-portable-anymap|image\/x-portable-bitmap|image\/x-portable-graymap|image\/x-portable-pixmap|image\/x-rgb|image\/x-xbitmap|image\/x-xpixmap|image\/x-xwindowdump)$/i;
            
            if (($(this))[0].files.length === 0) { return; }  
            var file = ($(this))[0].files[0];  
            if (!rFilter.test(file.type)) { alert("You must select a valid file!"); return; }  
            
            reader.readAsDataURL(file); 

            if (($(this))[0].files[0].type !== "application/pdf"
                && ($(this))[0].files[0].type !== "application/msword"
                && ($(this))[0].files[0].type !== "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                && ($(this))[0].files[0].type !== "application/vnd.ms-excel"
                && ($(this))[0].files[0].type !== "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                && ($(this))[0].files[0].type !== "text/csv"
                ) {
                //hides previous PDF
                $(this).parent().children('.popPDF').hide();

                that = this; //kill me...
                reader.onload = function(oFREvent) {                
                    preview = $('[data-preview=' + $(that).attr('id') + ']');
                    preview.attr('src', oFREvent.target.result);  
                    preview.show();
                };
            } else {
                that = this; //kill me...
                reader.onload = function(oFREvent) {
                    //hides previous picture
                    preview = $('[data-preview=' + $(that).attr('id') + ']');
                    preview.hide();

                    previewObject = $('[data-pdf-object=' + $(that).attr('id') + ']');
                    previewObject.attr('data', oFREvent.target.result);

                    previewIframe = $('[data-pdf-iframe=' + $(that).attr('id') + ']');
                    previewIframe.attr('src', oFREvent.target.result);

                    previewLink = $('[data-pdf-link=' + $(that).attr('id') + ']');
                    previewLink.attr('href', oFREvent.target.result);

                    $(that).parent().children('.popPDF').show();
                };
            }           
                
        } else {
            alert("FileReader object not found :( \nTry using Chrome, Firefox or WebKit");
        } 
    });

    /*bootstrap picture preview*/
    $('.pop').on('click', function(element) {
        var id = $('#' + element.target.id).attr('modal');
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#' + id).modal('show');   
    });

    $('.popPDF').on('click', function(element) {
        var id = $(element.target).attr('modal');
        var mobile = window.mobileAndTabletcheck();
        if(!mobile) {
            $('#' + id + ' object').attr('data', $(this).parent().find('object').attr('data'));
            $('#' + id + ' object p a').attr('href', $(this).parent().find('a').attr('href'));
            $('#' + id).modal('show');
            $('#' + id + ' object').css('height', '58vw');
            $('#' + id + ' .modal-dialog').css('margin', '66px auto');
        } else {
            $('#' + id + ' object').attr('data', $(this).parent().find('object').attr('data'));
            downloadURIPDF($(this).parent().find('object').attr('data'), $(this).parent().find('input.imageInput')[0].files[0].name); 
        }
    });
    /*end bootstrap picture preview*/

    /*close open internal transfer well when input fields are focused*/
    $('#InternalAmount, #listGroupToSearch, .list-group-item').focus(function() {
        internalTransferCancel();
    });

    /*two decimals for internal transfer*/
    $('#InternalAmount').focusout(function() {
        formatInternalAmount();
    });
    /*end two decimals for internal transfer*/
    
    /*filtering cities for CUP payout*/
    var allOptions = $('#PayoutCity option');
    $('#PayoutState').change(function () {
        $('#PayoutCity option').remove();
        var classN = $('select[name="PayoutState"] option:selected').attr('class');
        //alert(classN);
        var opts = allOptions.filter('.' + classN);
        $.each(opts, function (i, j) {
            $(j).appendTo('#PayoutCity');
        });
    });
    
    
    /*setting gender by title*/
    if ($('#Title').val() == 'Mr') {
        $('#Gender').val('Male');
        $('#groupGender').hide();
    }
    else if ($('#Title').val() == 'Mrs' || $('#Title').val() == 'Ms') {
        $('#Gender').val('Female');
        $('#groupGender').hide();
    }
    else if($('#Title').val() == 'Dr') {
        $('#groupGender').show();
    }
    
    $('#Title').change(function() {
        if ($('#Title').val() == 'Mr') {
            $('#Gender').val('Male');
            $('#groupGender').hide();
        }
        else if ($('#Title').val() == 'Mrs' || $('#Title').val() == 'Ms') {
            $('#Gender').val('Female');
            $('#groupGender').hide();
        }
        else if($('#Title').val() == 'Dr') {
            $('#groupGender').show();
        }
    });
    
    $('#passwordChangeDropdown > li > a').click(function() {
        $('#passwordType').val($(this).data("value"));
        //alert($(this).data("value"));
    });
    
    /*complete profile employment*/
    if ($('#StatusOfEmployment').val() == "Employed" || $('#StatusOfEmployment').val() == "Self Employed") {
        if($('#groupPreviousEmployment').length) {
            $('#groupPreviousEmployment').hide();
        }
        $('#groupIndustry').show();
        if($('#groupNameOfEmployer').length) {
            $('#groupNameOfEmployer').show();
        }
        if($('#DescriptionOfEmployer').length) {
            $('#DescriptionOfEmployer').val($('#Industry').val());
        }
    }
    if ($('#StatusOfEmployment').val() == "Retired" || $('#StatusOfEmployment').val() == "Unemployed" || $('#StatusOfEmployment').val() == "Student" || $('#StatusOfEmployment').val() == "Other") {
        if($('#groupPreviousEmployment').length) {
            $('#groupPreviousEmployment').show();
        }
        $('#groupIndustry').hide();
        if($('#groupNameOfEmployer').length) {
            $('#groupNameOfEmployer').hide();
        }
        if($('#DescriptionOfEmployer').length) {
            $('#DescriptionOfEmployer').val($('#SourceOfWealth').val());
        }
    }
    /*end complete profile employment*/
    
   if ($('#TradeExpYesNo').val() == "no") {
        $('#tradeExpContainer').slideUp();
        $('#adviseDemoContainer').slideDown();
        /*
        $('#ForexExp option[value="Never"]').attr('selected', 'selected');
        $('#CFDExp option[value="Never"]').attr('selected', 'selected');
        $('#OptionsExp option[value="Never"]').attr('selected', 'selected');
        $('#MetalsExp option[value="Never"]').attr('selected', 'selected');
        $('#StockIndiciesExp option[value="Never"]').attr('selected', 'selected');
        $('#CommoditiesExp option[value="Never"]').attr('selected', 'selected');*/
        
        $('#ForexExp').val('Never');
        $('#CFDExp').val('Never');
        $('#OptionsExp').val('Never');
        $('#MetalsExp').val('Never');
        $('#StockIndiciesExp').val('Never');
        $('#CommoditiesExp').val('Never');
    }
    if ($('#TradeExpYesNo').val() == "yes") {
        $('#tradeExpContainer').slideDown();
        $('#adviseDemoContainer').slideUp();
    }
    
    $('#ForexExp, #CFDExp, #OptionsExp, #MetalsExp, #StockIndiciesExp, #CommoditiesExp').change(function() {
        if ($('#ForexExp').val() == "Never" && $('#CFDExp').val() == "Never" && $('#OptionsExp').val() == "Never" && $('#MetalsExp').val() == "Never" && $('#StockIndiciesExp').val() == "Never" && $('#CommoditiesExp').val() == "Never") {
            $('#adviseDemoContainer').slideDown();
        }
        else {
            $('#adviseDemoContainer').slideUp();
        }
    });
    
    altAdressCheck();
   
    $('#checkboxAddressAlt').change(function() {
        altAdressCheck();
    });
    
    /*Showing checkboxes for leverage on load*/
    if (parseInt($('#hiddenScoring').val()) >= 0 && parseInt($('#hiddenScoring').val()) <= 3) {
        $('#Score03AllConsent').show();
        $('#Score412AllConsent').hide();
    }
    if (parseInt($('#hiddenScoring').val()) >= 4 && parseInt($('#hiddenScoring').val()) <= 7) {
        $('#Score03AllConsent').hide();
        $('#Score412AllConsent').show();
    }
    if (parseInt($('#hiddenScoring').val()) >= 8 && parseInt($('#hiddenScoring').val()) <= 12) {
        $('#Score03AllConsent').hide();
        $('#Score412AllConsent').show();
    }
    if (parseInt($('#hiddenScoring').val()) >= 13 && parseInt($('#hiddenScoring').val()) <= 18) {
        $('#Score03AllConsent').hide();
        $('#Score412AllConsent').hide();
    }
    
    if ($('#Leverage').val() != '50' && parseInt($('#hiddenScoring').val()) >= 0 && parseInt($('#hiddenScoring').val()) <= 3) {
        $('#Score03AllAdditional').show();
        $('#Score412AllAdditional').hide();
        $('#ScoreOver12AllAdditional').hide();
    }
    
    if ($('#Leverage').val() != '50' && parseInt($('#hiddenScoring').val()) >= 4 && parseInt($('#hiddenScoring').val()) <= 12) {
        $('#Score03AllAdditional').hide();
        $('#Score412AllAdditional').show();
        $('#ScoreOver12AllAdditional').hide();
    }
    
    if ($('#Leverage').val() != '50' && parseInt($('#hiddenScoring').val()) >= 13 && parseInt($('#hiddenScoring').val()) <= 18) {
        $('#Score03AllAdditional').hide();
        $('#Score412AllAdditional').hide();
        $('#ScoreOver12AllAdditional').show();
    }
    /*End showing checkboxes for leverage on load*/
    
    /******************************GBG***********************************/
    
    changeDocumentType();

    onIndustryChange();

    if($('#SourceOfWealth').val() == "Other") {
        $('#groupIncomeDescription').show();
    } else {
        $('#groupIncomeDescription').hide();
    }

    newLiveChangePlatform();

    /* Generate Trade Experience Options */
    var tradeExpIDs = [
        'CFDExpHidden',
        'ForexExpHidden',
        'MetalsExpHidden',
        'StockIndiciesExpHidden',
        'CommoditiesExpHidden',
        'OptionsExpHidden',
    ];
    tradeExpIDs.forEach(function(tradeExp) {
        generateTradeExpOptions(tradeExp);
    }); 

    /******************************GBG***********************************/

    /* Prepare selected accounts as a string */
    $('#groupSelectTradeAccounts input[type=checkbox]').change(function(){
        var checkedAccounts = [];
        $('#groupSelectTradeAccounts input[type=checkbox]').each(function() {
            if (this.checked) {
                checkedAccounts.push(this.name);
            }
        });
        
        $('#selectedaccounts').val(checkedAccounts.join('|'));
    });    
    
    /* bootstrap-list search */
    !function(a){a.fn.btsListFilter=function(b,c){"use strict";function d(a,b){return a.replace(/\{ *([\w_]+) *\}/g,function(a,c){return b[c]||""})}function e(b,d){d=d&&d.replace(new RegExp("[({[^.$*+?\\]})]","g"),"");var e=a(b).text(),f=c.initial?"^":"",g=new RegExp(f+d,c.casesensitive?"":"i");return g.test(e)}function f(a,b){var c;return b=b||300,function(){var d=this,e=arguments;clearTimeout(c),c=setTimeout(function(){a.apply(d,Array.prototype.slice.call(e))},b)}}var g,h,i=this,j=a(this),k=a(b),l=j;return c=a.extend({delay:300,minLength:1,initial:!0,casesensitive:!1,eventKey:"keyup",resetOnBlur:!0,sourceData:null,sourceTmpl:'<a class="list-group-item" href="#"><span>{title}</span></a>',sourceNode:function(a){return d(c.sourceTmpl,a)},emptyNode:function(a){return'<a class="list-group-item well" href="#"><span>No Results</span></a>'},cancelNode:function(){return'<span class="btn glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>'},loadingClass:"bts-loading-list",itemClassTmp:"bts-dynamic-item",itemEl:".list-group-item",itemChild:null,itemFilter:e},c),i.reset=function(){k.val("").trigger(c.eventKey)},a.isFunction(c.cancelNode)&&(g=a(c.cancelNode.call(i)).hide(),k.after(g),k.parents(".form-group").addClass("has-feedback"),k.prev().is(".control-label")||g.css({top:0}),g.css({"pointer-events":"auto"}),g.on("click",i.reset)),k.on(c.eventKey,f(function(b){var d=a(this).val();c.itemEl&&(l=j.find(c.itemEl)),c.itemChild&&(l=l.find(c.itemChild));var e=l.filter(function(){return c.itemFilter.call(i,this,d)}),f=l.not(e);c.itemChild&&(e=e.parents(c.itemEl),f=f.parents(c.itemEl).hide()),""!==d&&d.length>=c.minLength?(e.show(),f.hide(),g.show(),"function"===a.type(c.sourceData)?(e.hide(),f.hide(),h&&(a.isFunction(h.abort)?h.abort():a.isFunction(h.stop)&&h.stop()),j.addClass(c.loadingClass),h=c.sourceData.call(i,d,function(b){if(h=null,e.hide(),f.hide(),j.find("."+c.itemClassTmp).remove(),b&&0!==b.length)for(var g in b)a(c.sourceNode.call(i,b[g])).addClass(c.itemClassTmp).appendTo(j);else a(c.emptyNode.call(i,d)).addClass(c.itemClassTmp).appendTo(j);j.removeClass(c.loadingClass)})):(j.find("."+c.itemClassTmp).remove(),0===e.length&&a(c.emptyNode.call(i,d)).addClass(c.itemClassTmp).appendTo(j))):(e.show(),f.show(),g.hide(),j.find("."+c.itemClassTmp).remove())},c.delay)),c.resetOnBlur&&k.on("blur",function(a){i.reset()}),j}}(jQuery);
    $('#listGroupTo').btsListFilter('#listGroupToSearch', {itemChild: '.accnoitem', resetOnBlur: false});

    /* Tooltip with clickable link */
    var originalLeave = $.fn.tooltip.Constructor.prototype.leave;
    $.fn.tooltip.Constructor.prototype.leave = function(obj){
        var self = obj instanceof this.constructor ?
            obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)
        var container, timeout;

        originalLeave.call(this, obj);

        if(obj.currentTarget) {
            container = $(obj.currentTarget).siblings('.tooltip')
            timeout = self.timeout;
            container.one('mouseenter', function(){
                clearTimeout(timeout);
                container.one('mouseleave', function(){
                    $.fn.tooltip.Constructor.prototype.leave.call(self, self);
                });
            })
        }
    };
    /* END Tooltip with clickable link */

    /* Enable tooltips */
    $('[data-toggle="tooltip"]').tooltip({html:true, delay: {show: 50, hide: 400}}); 
    
    /* Hide twitter feed images from smaller feeds */
    var hideTweetMedia = function() {
        $('.twitterNoImages').find('.twitter-timeline').contents().find('.timeline-Tweet-media').css('display', 'none');
        $('.twitterNoImages').css('height', '100%');
        $('.twitterNoImages').find('.twitter-timeline').contents().find('.timeline-TweetList').bind('DOMSubtreeModified propertychange', function() {
            hideTweetMedia(this);
        });
    }
    if ($('#twitter-timeline').length > 0) {
        $('.twitterNoImages').on('DOMSubtreeModified propertychange','#twitter-widget-0', function() {
            hideTweetMedia();
        });
    }

    /* Buttons for completeprofileupdate page, Tax ID section */
    checkTaxRowButtons();

    /* Move alerts on top of the left column for small displays */
    moveAlertsOnMobile();
    $(window).resize(moveAlertsOnMobile);

    /* Remove pull-right for sideBar for small displays when direction is RTL */
    moveSideBarRTLonMobile();
    $(window).resize(moveSideBarRTLonMobile);

    /* Change sideMenu style for tablet displays */
    resizeSideMenuIconsTablet();
    $(window).resize(resizeSideMenuIconsTablet);

    /* Collapse sideMenu for small displays */
    collapseSideMenu();
    $(window).resize(collapseSideMenu);

    /* Collapse TwitterWall for small displays */
    collapseTwitterWall();
    $(window).resize(collapseTwitterWall);
    checkTwitterWallPresence();

    /* Fix contactChatButtons corners if direction is rtl */
    if ($('body').css('direction') == 'rtl') {
        $('.contactChatButtons').removeClass('contactChatButtons').addClass('contactChatButtonsRTL');
            
        $('.contactChatButtons .list-group-item:not(.disabled):first').css({
            'border-top-left-radius' : '0px',
            'border-bottom-left-radius' : '0px',
            'border-top-right-radius' : '4px',
            'border-bottom-right-radius' : '4px',
        });
        $('.contactChatButtons .list-group-item:not(.disabled):last').css({
            'border-top-left-radius' : '4px',
            'border-bottom-left-radius' : '4px',
            'border-top-right-radius' : '0px',
            'border-bottom-right-radius' : '0px',
        });
        $('.contactChatButtonsRTL .list-group-item:not(.disabled):first').css({
            'border-top-left-radius' : '0px',
            'border-bottom-left-radius' : '0px',
            'border-top-right-radius' : '4px',
            'border-bottom-right-radius' : '4px',
        });
        $('.contactChatButtonsRTL .list-group-item:not(.disabled):last').css({
            'border-top-left-radius' : '4px',
            'border-bottom-left-radius' : '4px',
            'border-top-right-radius' : '0px',
            'border-bottom-right-radius' : '0px',
        });
    }

    /* Prepare and run marquee ticker */
    var isOperaMini = Object.prototype.toString.call(window.operamini) === "[object OperaMini]";
    if ($('.marquee-ticker').length > 0 && !isOperaMini) {
        //runTicker();
        hideTicker();
    }

    /* Open #banksTab tabpanel if the user came to deposit page with #banksTab in URL*/
    if ($('[aria-controls="banksTab"]').length > 0 && window.location.hash == '#banksTab') {
        $('[aria-controls="banksTab"]').click();
    }

    /* Open CUPE Warning modal on page load */
    $('#CUPEWarningModal').modal('show');

    prepareElectiveProfessionalForm();
    $('#electiveProCheckboxes input[type=checkbox]').change(prepareElectiveProfessionalForm);

    navAccountSizeCheck();
    $(window).resize(navAccountSizeCheck);
    $(window).resize(navAccountSizeCheck);
    $('#navAccountButton').on('click', function() {
        if ($('#navbarAccount').attr('aria-expanded') == 'true') {
            activeNav = $('#navbarAccount').find('li.active');
            $('#navAccountButtonText').html(activeNav.text());    
        } else {
            $('#navAccountButtonText').html('');    
        }
    });

});//end document ready