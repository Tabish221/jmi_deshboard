@extends('cpanel.layout')
@section('content')
    @if ($user->country == '')
        <div class="alert alert-warning">
            To Open Account You Have To Complete Your <a href="/en/cpanel/profile">Profile</a>
        </div>
    @endif

    @if (count($documents) < 1)
        <div class="alert alert-warning" id="live-alert" style-="display: none;">
            To Open Account You Must Have 1 Approved <a href="/en/cpanel/documents"> Documents</a>
        </div>
    @endif

    @if (count($documents) > 1)
        @if ($documents[0]->status == 0 && $documents[1]->status == 0)
            <div class="alert alert-warning " id="live-alert" style-="display: none;">
                To Open Account You Must Have 2 Approved <a href="/en/cpanel/documents"> Documents</a>
            </div>
        @endif
    @endif

    @if (count($documents) > 1)
        <?php $x = 0; ?>
        @foreach ($documents as $document)
            @if ($document->type == 8)
                <?php $x = 1; ?>
            @endif
        @endforeach
    @endif

    @if (count($live_accounts) > 9)
        <div class="alert alert-warning " id="live-alert" style="display: none;">
            You have reached the maximum allowed number (10) of live accounts
        </div>
    @endif

    @if (session('status-success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status-success') }}
        </div>
    @endif

    @if (session('status-error'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status-error') }}
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <?php if ($customer_agreement == null) { ?>
        {!! Form::open(['url' => 'en/cpanel/post-agreement']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body openAccount-tremBox">
                            <div class=" mn-btn">
                                <div style="height: 600px;overflow-y: scroll;margin: 10px 20px;padding: 10px;">
                                    <h4 class="center bold">Customer Account Agreement</h4>

                                    <h5 class="bold left">JMI Brokers LTD is licensed broker from Vanuatu Financial Services Commission as
                                        Dealers in Securities under license number 15010</h5>
                                    <h5 class="bold left">Risk Disclosure Statement</h5>
                                    <p class="left">
                                        Before engaging in the products offered by JMI Brokers LTD
                                    </p>

                                    <p class="left">
                                        you should be aware of the risks which may be involved in trading financial contracts for
                                        differences CFDs:
                                    </p>
                                    <p class="bold left">You should not enter into a transaction unless you fully understand:</p>
                                    <li>The nature and fundamentals of the transaction and the market underlying such transactions.</li>
                                    <li>
                                        The extent of the economic risk to which you are exposed as a result of such
                                        transactions(and determine that such risk is suitable for you in light of your specific
                                        experience in relation to the transaction and your financial objectives, circumstances and
                                        resources).

                                    </li>
                                    <li>
                                        The legal terms and conditions for such transactions.

                                    </li>

                                    <p class="left">
                                        You have the responsibility to fully understand the terms and conditions of the transactions
                                        to be undertaken, including, without limitation:
                                    </p>
                                    <p class="left">
                                        1. The terms as to price, term, and expiration date, restrictions on exercising an OTC and
                                        the terms material to the transaction.
                                    </p>
                                    <p class="left">
                                        2 . Any terms describing risk factors, such as volatility, liquidity, and so on.
                                    </p>
                                    <p class="left">
                                        3. The circumstances under which you may become obliged to make or take delivery of a
                                        Leveraged foreign exchange transaction or Futures contracts.
                                    </p>
                                    <p class="left">
                                        The high degree of leverage that is often obtainable in trading of the products offered by
                                        JMI Brokers LTD can work against you as well as for you, due to fluctuating market
                                        conditions.
                                        Trading in such instruments can lead to large losses as well as gains in response to a small
                                        market movement.
                                    <p class="left">
                                        If the market moves against you, you may not only sustain a total loss of your initial
                                        margin deposit, and any additional funds deposited with JMI Brokers LTD.

                                    </p>
                                    <p class="left">
                                        to maintain your position, but you may also incur further liability to JMI Brokers LTD. You
                                        may be called upon to “top-up” your margin by substantial amounts at short notice to
                                        maintain your position, failing which JMI Brokers LTD may have to liquidate your position at
                                        a loss and you would be liable for any resulting loss. You may sustain substantial losses on
                                        a contract or trade if the market conditions move against your position. It is in your
                                        interest to fully understand the impact of market movements, in particular the extent of
                                        profit/loss you would be exposed to when there is an upward or down ward movement in the
                                        relevant rates and the extent of loss if you have to liquidate a position, if market
                                        conditions move against you.

                                    </p>
                                    <p class="left">Under certain market conditions you may find it difficult or impossible to
                                        liquidate a position, to assess a fair price or assess risk exposure. This can happen, for
                                        example, where the market for a transaction is illiquid or where there is a failure in
                                        electronic or telecommunications systems, or where there is the occurrence of an event
                                        commonly known as “force majeure”. Placing contingent orders, such as “stop-loss” orders,
                                        will not necessarily limit your losses to the intended amounts, as it may be impossible to
                                        execute such orders under certain market conditions.
                                        When placing a stop order or stop loss order, you must be aware that in certain market
                                        conditions you may be filled at a different price than initially requested. Because the
                                        prices and characteristics of over-the-counter transactions are individually negotiated and
                                        there is no central source for obtaining prices, there are in efficiencies in transaction
                                        pricing.
                                        We consequently cannot and do not warrant that our prices or the prices we secure
                                    </p>


                                    <h5 class="bold left">1. TRADING AUTHORIZATION</h5>
                                    <p class="left">JMI Brokers is a financial company authorized and holds a Principals license
                                        from Vanuatu Financial Services Commission (VFSC) as “Dealers in Securities” to carry on the
                                        business of dealing in securities such as financial Contracts for differences. (“CFDs”) in
                                        commodities, equities, indices, and Currency pairs (Fx), etc under three Licenses classes
                                        (A, B, and C) as below: Class A : CFDs in currency pairs ( Fx). Class B: CFDs in Precious
                                        Metals.
                                    </p>
                                    <p class="left">Class C: CFDs in Commodities, equities, indices,etc All CFDs contracts are
                                        leveraged products and will be executed between you as principal and us as principal.
                                        You shall be directly and personally responsible for performing your obligations under every
                                        transaction entered in to between us, whether you are dealing as principal directly or
                                        through an agent, or as agent for another person, and you shall indemnify us in respect of
                                        all liabilities, losses or costs of any kind or nature what so ever which may be incurred by
                                        us as a direct or in direct result of any failure by you to perform any such obligation.
                                        .</p>

                                    <h5 class="bold left">2. APPLICABLE RULES AND REGULATIONS</h5>
                                    <p class="left">All orders entered for the purchase or sale of a Commodity Contract and all
                                        transactions in Commodity Contracts executed for Customer’s accounts shall be subject to the
                                        constitution, by Laws, rules, regulations, customs and usages (collectively “rules”) of the
                                        exchange or market, and its clearing house, if any, where such orders are directed or such
                                        transactions are executed and any applicable self- regulatory organization and to the rules
                                        and regulations promulgated there under (collectively “laws JMI Brokers LTD shall not be
                                        liable to Customer as a result of any action taken by JMI Brokers LTD or its agents in
                                        compliance with any of the foregoing rules or laws. This paragraph is solely for the
                                        protection and benefit of JMI Brokers LTD ,and any failure by JMI Brokers LTD or its agents
                                        to comply with any of the foregoing rules or laws shall not relieve Customer of any
                                        obligation under this agreement nor be construed to create rights under this agreement in
                                        favor of Customer against JMI Brokers LTD
                                    </p>

                                    <h5 class="bold left">3. CHARGES PAYABLE BY CUSTOMER.</h5>
                                    <p class="left">
                                        Customer agrees to pay (a) such commissions and service fees as JMI Brokers LTD may
                                        establish and charge from time to time; (b) the amount of any loss that may result from
                                        transactions by JMI Brokers LTD on Customer’s behalf, including any deficit balance; and(c)
                                        interest on any deficit balance and on any other amounts payable to JMI Brokers LTD under
                                        this agreement at the rate of three percent (3%) over the Prime rate in effect from time to
                                        time, or the maximum rate allowed by law, which ever is less.
                                    </p>

                                    <h5 class="bold left">4. RISK OF LOSS</h5>
                                    <p class="left">

                                        All transactions effected for Customer’s accounts and all fluctuations in the market prices
                                        of the Commodity Contracts carried in Customer’s accounts are at Customer’s sole risk and
                                        Customer shall be solely liable under all circumstances. By execution of this agreement,
                                        Customer warrants that Customer is willing and financially able to sustain any such losses.
                                        JMI Brokers LTD is not responsible for the obligations of the persons with whom Customer’s
                                        transactions are effected, nor is JMI Brokers LTD responsible for delays in transmission,
                                        delivery or execution of Customer’s orders due to malfunctions of communications facilities
                                        or other causes.

                                    </p>



                                    <p class="left">

                                        JMI Brokers LTD shall not be liable to Customer for the loss of any margin deposits which is
                                        the direct or indirect result of the bankruptcy, in solvency, liquidation, receivership,
                                        custodianship or assignment for the benefit of creditors of any bank, another clearing
                                        broker, exchange, clearing organization or similar entity.

                                    </p>

                                    <h5 class="bold left">5. TRADING RECOMMENDATIONS</h5>
                                    <p class="left">Customer acknowledges that any trading recommendations and market or other
                                        information</p>
                                    <p class="left">

                                        Communicated to Customer by JMI Brokers LTD , although based upon information obtained from
                                        sources Believed by JMI Brokers LTD to be reliable, may be incomplete, may not be verified,
                                        may differ from advice given to other customers, and may be changed without notice to
                                        Customer.
                                        Customer understands JMI Brokers LTD or one or more of its affiliates may have apposition in
                                        and buy or sell Commodity Contracts which are the subject of information or recommendations
                                        furnished to Customer and that these positions and transactions of JMI Brokers LTD or any
                                        affiliates may not be consistent with are there commendations furnished to customer.


                                    </p>
                                    <p class="left">
                                        JMI Brokers LTD makes no representation or warranty with respect to the tax consequences of
                                        customer transactions
                                    </p>

                                    <h5 class="bold left">6. INDEMNIFICATION</h5>
                                    <p class="left">
                                        Customer hereby agrees to indemnify JMI Brokers LTD and hold JMI Brokers LTD harmless from
                                        any liability, cost or expense (including attorneys’ fees and expenses and any fines or
                                        penalties imposed by any governmental agency, contract market, exchange, clearing
                                        organization or other self-regulatory body) which JMI Brokers LTD may incur or be subjected
                                        to with respect to Customer’s account or any transaction or position there in. Without
                                        limiting the generality of the foregoing, Customer agrees to reimburse JMI Brokers LTD on
                                        demand for any cost of collection incurred by JMI Brokers LTD in collecting any sums owing
                                        by Customer under this agreement and any cost incurred by JMI Brokers LTD in successfully
                                        defending against any claims asserted by Customer, including all attorneys’ fees, interest
                                        and expenses.
                                        .</p>

                                    <h5 class="bold left">7. RECORDING</h5>
                                    <p class="left">
                                        Customer understands that all conversations regarding Customer’s accounts, orders between
                                        Customer and JMI Brokers LTD maybe recorded by JMI Brokers LTD and Customer irrevocably
                                        consents to such recordings and waives any right to object to JMI Brokers LTD ’s use of such
                                        recordings in any proceeding or as JMI Brokers LTD otherwise deems appropriate.

                                    </p>

                                    <h5 class="bold left">8. FOREIGN CURRENCY</h5>
                                    <p class="left">If any transaction for Customer’s accounts is effected on any exchange or in
                                        any market on which transactions are settled in a foreign currency, any profit or loss
                                        arising as a result of a fluctuation in the rate of exchange between such currency and the
                                        United States Dollar shall be entirely for Customer’s account and at Customer’s sole risk.
                                        JMI Brokers LTD is hereby authorized to convert funds in Customer’s accounts in to and from
                                        such foreign currency at rates of exchange prevailing at the banking and other institutions
                                        with which JMI Brokers LTD normally conducts such business transactions.
                                        .</p>



                                    <h5 class="bold left">9. MARGIN REQUIREMENTS.</h5>
                                    <p class="left">
                                        Customer agrees to maintain at all times without demand from JMI Brokers LTD margin
                                        requirements for the positions in the Customer’s account (s). Customer will at all times
                                        maintain such margin or collateral for Customer’s account (s) as requested from time to time
                                        by JMI Brokers LTD (which requests maybe greater than exchange and clearing house
                                        requirements). Margin deposits shall be made by wire transfer of immediately available
                                        funds, or by such other means as JMI Brokers LTD may direct, and shall be deemed made when
                                        received by JMI Brokers LTD.
                                    </p>
                                    <p class="left">
                                        JMI Brokers LTD failure at anytime to call for a deposit of margin shall not constitute a
                                        waiver of JMI Brokers LTD rights to do so at anytime there after, nor shall it create any
                                        liability of JMI Brokers LTD to Customer.
                                    </p>

                                    <h5 class="bold left">10. LIQUIDATION OF POSITIONS.</h5>
                                    <p class="left">

                                        In the event that (a) Customer shall fail to timely deposit or maintain margin or any amount
                                        hereunder; (b) Customer (if an individual) shall die or be judicially declared incompetent
                                        or (if an entity) shall be dissolved or otherwise terminated; (c) a proceeding under the
                                        Bankruptcy Act, an assignment for the benefit of creditors, or an application for a
                                        receiver, custodian, or trustee shall be filed or applied for by or against
                                        Customer;(d)attachment is levied against Customer’s account; (e) the property deposited as
                                        collateral is determined by JMI Brokers LTD in its sole discretion, regardless of current
                                        market quotations, to be in adequate to properly secure the account; or (f) at anytime JMI
                                        Brokers LTD deems it necessary for its protection for any reason whatsoever, JMI Brokers LTD
                                        may, in the manner it deems appropriate, close out Customer’s open positions in whole or in
                                        part, sell any or all of Customer’s property held by JMI Brokers LTD , buy any securities,
                                        Commodity Contracts, or other property for Customer’s account, and may cancel any
                                        outstanding orders and commitments made by JMI Brokers LTD on behalf of Customer. Such sale,
                                        purchase or cancellation maybe made at JMI Brokers LTD discretion without advertising the
                                        same and without notice to Customer or his personal representatives and without prior
                                        tender, demand for margin or payment, or call of any kind upon Customer. JMI Brokers LTD may
                                        purchase the whole or any part there of free from any right of red emption. It is understood
                                        that a prior demand or call or prior notice of the time and place of such sale or purchase
                                        shall not be a waiver of JMI Brokers LTD right to sell or buy without demand or notice as
                                        here in provided. Subject to applicable laws and rules, and in order to prevent
                                        non-permitted trading in debit/deficit accounts, profits on any trades executed without JMI
                                        Brokers LTD’s express permission, for a Customer account that is debit/deficit at the time
                                        the order is placed ,shall before JMI Brokers LTD account if JMI Brokers LTD in its
                                        discretion so elects. Losses on any such trades shall be jointly and severally borne by the
                                        Introducing Broker, if any, and the Customer. Customer shall remain liable for and pay
                                        JMIBrokers LTD the amount of any deficiency in any account of Customer with JMI Brokers LTD
                                        resulting from any transaction described above. Our determination of the current market
                                        value and the amount of additional and/or variation margin shall be conclusive and shall not
                                        be challenged by the Customer.
                                    </p>
                                    <!--here stop -->

                                    <h5 class="bold left">11. TRADING LIMITATIONS</h5>
                                    <p class="left">JMI at any time, in its sole discretion, may limit the number of positions
                                        which Customer may maintain or acquire through JMI Brokers LTD , and JMI Brokers LTD is
                                        under no obligation to effect any transaction
                                        for Customer’s accounts which would create positions in excess of the limit which JMI
                                        Brokers LTD has set.
                                    </p>
                                    <p class="left">Customer agrees not to exceed the position limits established for any contract
                                        market, whether acting alone or with others, and to promptly advise JMI Brokers LTD if
                                        Customer is required to file any reports on positions.

                                    </p>

                                    <h5 class="bold left">12. EXERCISES AND ASSIGNMENTS</h5>
                                    <p class="left">

                                        With regard to options transactions, Customer understands that some exchange clearing houses
                                        have established exercise requirements for the tender of exercise instructions and that
                                        options will become worth less in the event that Customer does not deliver instructions by
                                        such expiration times. At least two business days prior to the first notice day in the case
                                        of long positions in futures or forward contracts, and at least two business days prior to
                                        the last trading day in the case of short positions in open futures or forward contracts or
                                        long and short positions in options, Customer agrees that Customer will either give JMI
                                        Brokers LTD instructions to liquidate or make or take delivery under such futures or forward
                                        contracts, or to liquidate, exercise, or allow the expiration of such options, and will
                                        deliver to JMI Brokers LTD sufficient funds and/or any documents required in connection with
                                        exercise or delivery. If such instructions or such funds and/or documents, with
                                        regard to option transactions, are not received by JMI prior to the expiration of the
                                        option, JMI Brokers LTD may permit an option to expire. Customer also understands that
                                        certain exchanges and clearing houses automatically exercise some “in-the - money” options
                                        unless instructed otherwise, Customer acknowledges full responsibility for taking action
                                        either to exercise or to prevent exercise of an option contract, as the case maybe JMI
                                        Brokers LTD is not required to take any action with respect to an option, including without
                                        limitation any action to exercise a valuable option contract prior to its expiration or
                                        to prevent the automatic exercise of an option, except upon Customer’s express instructions.
                                        Customer further understands that JMI Brokers LTD also has established exercise cut-off
                                        times which maybe different from the times established by the contract markets in clearing
                                        houses. In the event that timely exercise and assignment instructions are not given,
                                        Customer hereby agrees to waive any and all claims for damage or loss Customer might have
                                        against JMI Brokers LTD arising out of the fact that an option was or was not exercised.
                                        Customer understands that JMI Brokers LTD randomly assigns exercise notices to Customers,
                                        that all short option positions are subject to assignment at anytime, including positions
                                        established on the same day that exercises areas signed, and that exercise assignment
                                        notices are allocated randomly from among all Customers’ short option positions which are
                                        subject to exercise.

                                    </p>


                                    <h5 class="bold left">13. SECURITY AGREEMENT</h5>
                                    <p class="left">
                                        (a) All funds, securities, and other property in Customer’s accounts or otherwise now orat
                                        any time in the future held by JMI Brokers LTD for any purpose, including safekeeping, are
                                        subject to a security interest and general lien in JMI Brokers LTD ’s favor to secure any
                                        indebtedness at any time owing from Customer to JMI Brokers LTD, including any indebtedness
                                        resulting from any guarantee of a transaction or account by Customer or Customer’s
                                        assumption of joint responsibility for any transaction or account. </p>

                                    <p class="left">
                                        (b) Customer hereby grants to JMI Brokers LTD the right to pledge, repledge, or invest
                                        either separately or with the property of other Customers, any securities or other property
                                        held by JMI Brokers LTD for the account of Customer or as collateral therefore, including
                                        without limitation to any exchange or clearing house through which trades of Customer are
                                        executed. JMI Brokers LTD shall be under no obligation to pay to Customer or account for any
                                        interest income, or benefit derived from such property and funds or to deliver the same
                                        securities or other property deposited with or received by JMI Brokers LTD for Customer. JMI
                                        Brokers LTD may deliver securities or other property of like or equivalent kind or amount;
                                        JMI Brokers LTD shall have the right to offset any amounts it holds for or owes to Customer
                                        against any debts or other amounts owed by Customer to JMI Brokers LTD From time to time and
                                        without prior notice to Customer, JMI Brokers LTD may transfer interchangeably between and
                                        among any account of Customer maintained at JMI Brokers LTD any of Customer’s funds
                                        (including segregated funds), securities, or other property for purposes of margin,
                                        reduction or satisfaction of any debit balance, or any reason which JMI Brokers LTD deems
                                        appropriate. Within areas on able time after any such transfer, JMI Brokers LTD will confirm
                                        the transfer in writing to Customer.

                                    </p>

                                    <h5 class="bold left">14. AUTHORITY TO TRANSFER ACCOUNTS</h5>
                                    <p class="left">
                                        Until further notice in writing from the undersigned, JMI Brokers LTD is hereby authorized
                                        at any time, withoutprior notice to the undersigned, to transfer from any account or
                                        accounts of the undersigned maintained at JMI Brokers LTD or any exchange member through
                                        which JMI Brokers LTD clears customer transactions, such excess funds, securities, and other
                                        property of the undersigned as in JMI Brokers LTD ’s sole judgment maybe required for margin
                                        in any other such accountor accounts or to reduce or satisfy any debit balances in any other
                                        account or accounts provided such transfer or transfers comply with relevant governmental
                                        and exchange rules and regulations applicable to the same.
                                        JMI Brokers LTD is further authorized to liquidate any property held in any such account or
                                        accounts of the undersigned whenever, in JMI Brokers LTD ’s sole judgment, such liquidation
                                        is necessary in order to effectuate the above authorized transfer and application of
                                        property. With in areas on able time after making any such transfer or application, JMI
                                        Brokers LTD will Confirm the same in writing to the under signed.

                                    </p>

                                    <h5 class="bold left">15- Monthly Rebate</h5>
                                    <p class="left">
                                        For all both offers whether its offer number 1 Rebate + Bonus or offer number 2 1 pip back
                                        No bonus the value of Monthly Rebate should not exceed the value of original fund deposited
                                        at that month. Therefore the Maximum monthly rebate in any month is equal to sum of monthly
                                        deposits excluding bonus or any other promotions.

                                    </p>


                                    <h5 class="bold left">16. NOTICES AND COMMUNICATIONS</h5>
                                    <p class="left">

                                        Customer shall make all payments, except with regard to wire transfers discussed above, and
                                        deliver all notices and communications to the office of JMI Brokers LTD . All communications
                                        JMI Brokers LTD to Customer maybe sent to the Customer at the address indicated on the
                                        Customer Account Application or to such other address as Customer hereafter directs in
                                        writing. Confirmations of trades, statements of account, margin calls, and any other written
                                        notices shall be binding on Customer for all purposes, unless Customer calls any error there
                                        into JMI Brokers LTD ’s attention in writing (a) prior to the start of business on the
                                        business day next following notification, in the case of margin calls and reports of
                                        executions and (b) within 24 hours of delivery to Customer, in the case of statements of
                                        account and any written notices (other than trade confirmations or margin calls)or demands.
                                        None of these provisions, however, will prevent JMI Brokers LTD upon discovery of any error
                                        or omission, from correcting it. The parties agree that such errors, whether resulting in
                                        profit or loss, will be corrected in Customer’s account, will be credited or debited so that
                                        it is in the same position it would have been in if the error had not occurred. Whenever a
                                        correction is made, JMI Brokers LTD will promptly make written or oral notification to
                                        Customer. All communications, whether by mail, telex, courier, telephone, telegraph,
                                        messenger, facsimile, or otherwise (in the case of mailed notices), or communicated (in the
                                        case of telephone notices), sent to Customer at Customer’s or agent’s address (or telephone
                                        number) as given to JMI Brokers LTD from time to time shall constitute personal delivery to
                                        Customer whether or not actually received by Customer, and Customer hereby waives all claims
                                        resulting from failure to receive such communications.

                                    </p>

                                    <h5 class="bold left">17. PRINTED MEDIA STORAGE</h5>
                                    <p class="left">

                                        Customer acknowledges and agrees that JMI Brokers LTD may reduce all documentation
                                        evidencing Customer’s account, including the original signature documents executed by
                                        Customer in the opening of such Customer’s account with JMI Brokers LTD , utilizing a
                                        printed media storage device such as micro-fiche or optical disc imaging. Customer agrees to
                                        permit the records stored by such printed media storage method to serve as a complete, true
                                        and genuine record of such Customer’s account documents and signatures.
                                    </p>

                                    <h5 class="bold left">18. REPRESENTATIONS</h5>
                                    <p class="left">

                                        Customer represents that (a) (if an individual) he is of the age of majority, of sound mind,
                                        and authorized to open accounts and enter into this agreement and to effectuate transactions
                                        in Commodity Contracts as contemplated hereby; (b) (if an entity) Customer is validly
                                        existing and empowered to enter into this agreement and to effect transactions in Commodity
                                        Contracts as contemplated hereby; (c) the statements and financial information contained on
                                        Customer’s Account Application submitted herewith (including any financial statement there
                                        with)are true and correct; and (d) no person or entity has any interesting or control of the
                                        account to which this agreement pertains except as disclosed in the Customer’s Account
                                        Application. Customer further represents that, except as here to fore disclosed to JMI
                                        Brokers LTD in writing, he is not an officer or employee of any exchange, board of trade,
                                        clearing house, or an employee or affiliate of any futures commission merchant, or an
                                        introducing broker, or an officer ,partner, director, or employee of any securities broker
                                        or dealer. Customer agrees to furnish appropriate financial statements to JMI Brokers LTD to
                                        disclose to JMI Brokers LTD any material changes in the financial position of Customer and
                                        to furnish promptly such other information concerning Customer as JMI Brokers LTD reasonably
                                        requests.

                                    </p>


                                    <h5 class="bold left">19. INTRODUCING BROKER</h5>
                                    <p class="left">
                                        Customer acknowledges that JMI Brokers LTD is not responsible for the conduct,
                                        representations and statements of the introducing broker or its associated persons in the
                                        handling of Customer’s account. Customer agrees to waive any claims Customer may have
                                        against JMI Brokers LTD and to indemnify and hold JMI Brokers LTD harmless for any actions
                                        or omissions of the introducing broker or its associated persons.

                                    </p>

                                    <h5 class="bold left">20. CONFLICTS OF INTEREST</h5>
                                    <p class="left">

                                        JMI Brokers LTD may execute CFDs for Customer’s account (s) either as principal or broker.As
                                        broker, JMI Brokers LTD will execute transaction similar to Customer’s transaction with
                                        another market participant in the financial market. As principal JMI Brokers LTD may not
                                        execute transaction similar to Customer in the financial market and hold the opposing
                                        transaction in JMI Brokers LTD inventory of CFDs.
                                        As a result of acting as principal Customer should realize that JMI Brokers LTD maybe acting
                                        as your counter party and that JMI Brokers LTD maybe placed in such a position that a
                                        conflict of duty occurs. JMI Brokers LTD may execute Commodity Contracts for Customer’s
                                        account (s) either as principal or broker. As broker, JMI Brokers LTD will execute
                                        transaction similar to Customer’s transaction with another market participant in the
                                        financial market. As principal JMI Brokers LTD may not execute transaction similar to
                                        Customer in the financial market and hold the opposing transaction in JMI Brokers LTD
                                        inventory of Commodity Contracts. As a result of acting as principal Customer should realize
                                        that JMI Brokers LTD maybe acting as your counter party and that JMI Brokers LTD maybe
                                        placed in such a position that a conflict of duty occurs. JMI Brokers LTD , its Associates
                                        or other persons connected with JMI Brokers LTD may have an interest, relationship or
                                        arrangement that is material in relation to any Commodity Contract effected under this
                                        Agreement. By entering into this Agreement the Customer agrees that J JMI Brokers LTD may
                                        transact such business without prior reference to the Customer. In addition, JMI Brokers LTD
                                        may provide advice and other services to third parties whose interests maybe in conflict or
                                        competition with the Customer’s interests JMI Brokers LTD , its Associates and the employees
                                        of any of them may take positions opposite to the Customer or maybe in competition with the
                                        Customer to acquire the same or a similar position. JMI Brokers LTD will not deliberately
                                        favor any person over the customer but will not be responsible for any loss which may result
                                        from such competition
                                        JMI Brokers LTD, its Associates or other persons connected with JMI Brokers LTD may have an
                                        interest, relationship or arrangement that is material in relation to any CFDs effected
                                        under this Agreement. By entering into this Agreement the Customer agrees that JMI Brokers
                                        LTD may transact such business without prior reference to the Customer. JMI Brokers LTD ,
                                        its Associates and the employees of any of them may take positions opposite to the Customer
                                        or maybe in competition with the Customer to acquire the same or a similar position. JMI
                                        Brokers LTD will not deliberately favor any person over the customer but will not be
                                        responsible for any loss which may result from such competition

                                    </p>

                                    <h5 class="bold left">21. BINDING EFFECT OF AGREEMENT; MODIFICATIONS</h5>
                                    <p class="left">
                                        This agreement shall be binding upon and inure to the benefit of JMI Brokers LTD ,its
                                        successors and assigns, and Customer’s heirs, executors, administrators, legatees,
                                        successors, personal representatives and assigns. Except as provided in paragraph 2, no
                                        change in or waiver of any provision of this agreement shall be binding unless it is in
                                        writing, dated subsequent to the date hereof, and signed by the party intended to be bound.
                                        No agreement or understanding of any kind shall be binding upon JMI Brokers LTD unless it is
                                        agreed to in writing, accepted and signed by an authorized officer.
                                    </p>

                                    <h5 class="bold left">22. FORCE MAJEURE EVENTS</h5>
                                    <p class="left bold">
                                        We may, in our reasonable opinion, determine that an emergency or an exceptional market
                                        condition exists (a “Force Majeure Event”). A Force Majeure Event shall include, but is not
                                        limited to, the following:

                                    </p>
                                    <ul>
                                        <li>
                                            Any act, event or occurrence (including without limitation any strike, riot or
                                            commotion,
                                            interruption or power supply or electronic or communication equipment failure) which, in
                                            our
                                            opinion, prevents us from maintaining an orderly market in one or more of the
                                            investments in
                                            respects of which we ordinarily deal in CFDs
                                        <li>
                                            The suspension or closure of any market or the abandonment or failure of any event upon
                                            which we base, or to which we in any way relate, our quote, or the imposition of limits
                                            or
                                            special or unusual terms on the trading in any such market or on any such event;

                                        <li>

                                            The occurrence of an excessive movement in the level of any CFDs and/or the underlying
                                            market or our anticipation (acting reasonably) of the occurrence of such movements.
                                        </li>
                                    </ul>

                                    <p class="left bold">
                                        If we determine that a Force Majeure Event exists we may in our absolute is creation without
                                        notice and at any time take one or more of the following steps:
                                    </p>
                                    <ul>
                                        <li>
                                            Increase your deposit requirements; close any or all of your open CFDs at such closing
                                            level
                                            as we reasonably believe to be appropriate.
                                        </li>
                                        <li> Suspend or modify the application of all or any of the terms of this agreement.
                                            to the extent that the Force Majeure Event makes it impossible or impracticable for us
                                            to
                                            comply with the term or terms in question;</li>
                                    </ul>
                                    <p class="left ">OR alter the last time for trading for particular CFDs.</p>
                                    <h6 class="bold">3. Non-Deposited Funds</h6>
                                    <p class="left ">
                                        Funds appearing on Clients’ account may include agreed or voluntary bonuses or any other
                                        sums not directly deposited by the Client or gained from trading on account of actually
                                        deposited funds (“NonDeposited Funds”). JMI Brokers LTD may provide bonuses which can be
                                        used according to the Trader Agreement. All bonus funds is fully belong to JMI Brokers LTD
                                        broker and considered as a Non-Deposited (credited) Funds and can be canceled atany time.
                                    </p>
                                    <h6 class="bold">4. Withdrawing process</h6>
                                    <p class="left ">To withdraw your funds, you should follow several steps and rules below: Log
                                        in to your personal account.
                                        Open withdraw tab and withdraw your funds from the trading account via your requested
                                        method.Open withdraw funds tab and fill out the fields.
                                        <br />If the additional documents are required, we contact you within one working day.
                                        Withdrawing funds to bank accounts are possible only after depositing money through a bank.
                                        <br />
                                        The Company does not charge any commission. Commission based on the beneficiary’s bank.
                                        Withdrawing process will be completed within 3-5 business days from the moment of accepting
                                        withdrawing request by the Company from the Client
                                        .<br />
                                        The Company does not charge any commission. Commission based on the beneficiary’s bank.
                                        <br />
                                        Attention! JMI Brokers LTD, in accordance with international laws on combating terrorist
                                        financing andmoney laundering, does not accept payments from third parties and payments to
                                        third parties are not carried out. JMI Brokers LTD is not liable in case of 3rd parties
                                        delays, who are not related to the company.Bank transfer takes 3-5 banking days under normal
                                        conditions.
                                        <br />
                                        The JMI Brokers LTD company processes withdrawals to the Visa, MasterCard, China Union Pay
                                        Cards within 1business days. But please note that under normal conditions payments go up to
                                        6 banking days.
                                    </p>
                                    <h6 class="bold">5. Additional Terms</h6>
                                    <p class="left ">
                                        Please note this policy cannot be exhaustive, and additional conditions or requirements may
                                        apply at any time due toregulations and policies, including those set in order to prevent
                                        money laundering. Please note any and all usage of the site and services is subject to the
                                        Terms and Conditions, as may be amended from time to time by JMI Brokers LTD, at its sole
                                        discretion.
                                    </p>
                                    <h5 class="bold left">28. ASSIGNMENT</h5>
                                    <p class="left ">
                                        JMI may assign Customer’s account to another registered futures commission merchant by
                                        notifying Customer of the date and name of the intended assignee ten (10) days prior to the
                                        assignment. Unless Customer objects to the assignment in writing prior to the scheduled date
                                        for assignment, the assignment will be binding on Customer.
                                    </p>
                                    <h5 class="bold left">29. CUSTOMER ACKNOWLEDGMENTS AND SIGNATURE</h5>
                                    <p class="left ">
                                        Customer hereby understands the Customer Account Agreement and consents and agrees to all of
                                        the terms and conditionsof the agreement set forth above. Customer acknowledges that trading
                                        in Commodity Contracts is speculative, involves ahigh degree of risk and is appropriate only
                                        for persons who can assume risk of loss in excess of their margin deposits.
                                    </p>
                                    <h5 class="bold left">Online Access Agreement</h5>
                                    <p class="left">
                                        This agreement sets forth the terms and conditions under which we, JMI Brokers LTD ,shall
                                        permit you to have access to one or more terminals, including terminal access through your
                                        internet browser, for the electronic transmission of orders and \ or transactions, for your
                                        accounts with us.
                                    </p>
                                    <p class="left bold">
                                        This agreement also sets forth the terms and conditions under which we shall permit you
                                        electronically to monitor the activity, orders and\or transactions in your account
                                        (collectively, the “Online Service”). For purposes of this Agreement the term “Online
                                        Service” includes all software and communication links, and in consideration thereof,
                                        Customer agrees to the following:
                                    </p>

                                    <h5 class="bold left">1. LICENSE GRANT AND RIGHT OF USE</h5>
                                    <p class="left">By this Agreement, where we are supplying you with software for use with the
                                        Online Service, you may use the software solely for your own internal business purposes.
                                        Neither the software not the Online Service maybe used to provide third party training or as
                                        a service bureau for any third parties. You agree to use the Online Service and the software
                                        strictly in accordance with the terms and conditions of JMI Brokers LTD Customer Account
                                        Agreement, as amended from time to time. You also agree to be bound by any rules, procedures
                                        and conditions established by JMI Brokers LTD concerning the use of the Online Service
                                        provided by JMI Brokers LTD</p>

                                    <h5 class="bold left">2. ACCESS AND SECURITY</h5>
                                    <p class="left">
                                        The Online Service maybe used to transmit, received and confirms execution of orders,
                                        subject to prevailing market conditions and applicable rules and regulations.</p>
                                    <p class="left bold">
                                        JMI Brokers LTD consent to your access and use in reliance upon your having adopted
                                        procedures to prevent unauthorized access to and use of the Online Service, and in any
                                        event, you agree to any financial liability for trades executed through the Online Service.
                                        You acknowledge, represent and warrant that:
                                    </p>
                                    <ul>
                                        <li>A) You have received a number, code or other sequence which provides access to the
                                            Online
                                            Service (the “Password”).</li>
                                        <li>B) You are the sole and exclusive owner of the password.</li>
                                        <li>C) You are the sole and exclusive owner of any identification number or Login number(the
                                            “Login”). </li>
                                        <li>D) You accept full responsibility for use and protection of the Password and the Login
                                            as
                                            well as or any transaction occurring in account opened, held or accessed through the
                                            Login
                                            and \ or Password. You accept responsibility for the monitoring of your account(s).</li>
                                        <li>You will immediately notify JMI Brokers LTD in writing if you become aware of any of the
                                            following:</li>
                                        <li>A) Any loss, theft or unauthorized use of your Password(s), Login and\or account
                                            number(s).
                                        </li>
                                        <li>B) Any failure by you to receive a massage indicating that an order was received and\or
                                            executed.</li>
                                        <li>C) Any failure by you to receive an accurate confirmation of an execution.</li>
                                        <li>D) Any receipt of confirmation of an order and\or execution which you did not place.
                                        </li>
                                        <li>E) Any inaccurate information in your account balances, positions, or transaction
                                            history.
                                        </li>

                                    </ul>
                                    <h5 class="bold left">3. RISKS OF ONLINE TRADING</h5>
                                    <p class="left">
                                        Your access to the Online Service, or any portion thereof, maybe restricted or unavailable
                                        during periods of peak demands, extreme market volatility, systems upgrades or other
                                        reasons.
                                    </p>
                                    <p class="left">
                                        Your access to the Online Service, or any portion thereof, maybe restricted or unavailable
                                        during periods of peak demands, extreme market volatility, systems upgrades or other
                                        reasons.
                                        JMI Brokers LTD makes no express or implied representations or warranties to you regarding
                                        the
                                        usability, condition or operation thereof. We do not warrant that access to or use of the
                                        Online
                                        Service will be uninterrupted or error free or that the Online Service will meet any
                                        particular
                                        criteria of performance or quality. Under no circumstances including negligence, shall JMI
                                        Brokers LTD or anyone else involved in creating, producing, delivering or managing that
                                        Online
                                        Service be liable for any direct, indirect incidental, special or consequential damages that
                                        result from the use of or inability to use the Online Service, or out of any breech of any
                                        warranty, including, without limitation, those for business interruption or loss of profits.
                                        You
                                        expressly agree that your use of the Online Service is of your sole risk, you assume full
                                        responsibility and risk of loss
                                        resulting from use of, or materials obtained through, the Online Service, neither we nor any
                                        of
                                        our directors, officers, employees ,agents, contractors, affiliates, third party vendors,
                                        facilities, information providers, licensors, exchanges, clearing organizations or other
                                        suppliers providing data, information, or services, warrant that the Online Service will be
                                        uninterrupted or error free; nor do we make any warranty as to the results that maybe
                                        obtained
                                        from the use of the Online Service or as to the timeliness, sequence, accuracy,
                                        completeness,
                                        reliability or content of any information, service, or transaction provided through the
                                        Online
                                        Service. In the event that your access to the Online Service, or any portion thereof, is
                                        restricted unavailable, you agree to use other means to place your orders or access
                                        information,
                                        such as calling JMI Brokers LTD representative. By placing an order through the Online
                                        Service,
                                        you acknowledge that your order may not be reviewed by a registered representative prior to
                                        execution, you agree that JMI Brokers LTD is not liable to you for any losses, lost
                                        opportunities or increased commissions that may result from your inability to use the Online
                                        Service to place order or access information.
                                    </p>

                                    <h5 class="bold left">4. MARKET DATA AND INFORMATION</h5>
                                    <p class="left">
                                        Neither we nor any provider shall be liable in any way to you or to any other person for: a)
                                        Any
                                        inaccuracy, error or delay in, or omission of any such data, information or message or the
                                        transmission or delivery of any such data, information or message; or b) Any loss or damage
                                        arising from or occasioned by any such inaccuracy, error, delay, omission, non- performance,
                                        interruption in any such data, information or message, due to either to any negligent act or
                                        omission or to any condition of force majeure or any other cause , whether or not within our
                                        or
                                        any provider’s control. We shall not be deemed to have received any order or communication
                                        transmitted electronically by you until we have actual knowledge of such order or
                                        communication
                                    </p>

                                    <h5 class="bold left">5. ADDITIONAL IMPORTANT INFORMATION AND DISCLAIMERS REGARDING EXPERT
                                        ADVISORS
                                    </h5>
                                    <p class="left">
                                        The expert advisors are intended merely as a tool for implementing technical ideas that can
                                        be
                                        incorporated into a personally designed trading strategy or system for experienced traders
                                        only.
                                        No support, technical, advisory or otherwise, is offered by JMI Brokers LTD in their usage.
                                        Use
                                        of the Expert Advisors is entirely at your own risk and you acknowledge & understand that
                                        JMI
                                        Brokers LTD make no warranties or representations concerning the use of Expert Advisors and
                                        that
                                        JMI Brokers LTD . Does not, by implication or otherwise, endorse or approve of the use of
                                        the
                                        Expert Advisors & shall not be responsible for any loss to you occasioned by their usage.
                                    </p>

                                    <h5 class="bold left">6. REPRESENTATIONS</h5>
                                    <p class="left">
                                        You acknowledge that from time to time, and for any reason, the Online Service may not be
                                        operational or otherwise unavailable for your use due to servicing, hardware malfunction,
                                        software defect, service or transmission interruption or other cause, and you agree to hold
                                        us
                                        and any provider harmless from liability of any damage which results from the unavailability
                                        of
                                        the Online Service. You acknowledge that you have alternative arrangements which will remain
                                        in
                                        place for the transmission and execution of your orders, in the event, for any reason,
                                        circumstances prevent the transmission and execution of all, or any portion of, your orders
                                        through the Online Service. You represent and warrant that you are fully authorized to inter
                                        this Agreement and under no legal disability which prevent you from trading and that you are
                                        &
                                        shall remain in compliance with all laws, rules and regulations applicable to your business.
                                        You
                                        agree that you are familiar with and will abide by any rules or procedures adopted by us and
                                        any
                                        provider in connection with use of the Online Service & you have provided necessary training
                                        in
                                        its use. You shall not (and shall not permit any third party) to copy, use analyze, modify,
                                        decompile, disassemble, reverse engineer, translate or convert any software provided to you
                                        in
                                        connection with use of the Online Service or distribute the software or the Online Service
                                        to
                                        any other third party.
                                    </p>

                                    <h5 class="bold left">7. TERMINATION</h5>
                                    <p class="left">
                                        We may, at our sole discretion, terminate or restrict your access to the Online Service and
                                        may
                                        terminate this Agreement at any time. Upon termination, any software license granted to you
                                        herein shall automatically terminate.
                                    </p>

                                    <h5 class="bold left">8. INDEMNITY</h5>
                                    <p class="left">You
                                        agree to indemnify & hold harmless us & each provider & their respective principles,
                                        Affiliates
                                        &agents from and against all claims, demands, proceedings, suits and all losses (direct,
                                        indirect or otherwise), liabilities costs and expenses (including attorney fees and
                                        disbursements),paid in settlement, incurred or suffered by us and\or a providers and\or our
                                        or
                                        their respective principals, affiliates & agents arising from or relating to your use of the
                                        Online Service or the transactions contemplated hereunder. This indemnity provision shall
                                        survive termination of this Agreement.
                                    </p>

                                    <h5 class="bold left">9. MISCELLANEOUS</h5>
                                    <p class="left">
                                        You may not amend the terms of this Agreement. We may amend the terms of this Agreement upon
                                        notice to you (including electronic delivery). By continued access to and use of the Online
                                        Service, you agree to any such amendments to this Agreement. This Agreement us the entire
                                        Agreement between the parties relating to the subject hereof, and, except with respect to
                                        the
                                        Customer Account Agreement between the parties, all prior negotiations and understandings
                                        between the parties, whether written or oral, are hereby merged into this Agreement. Nothing
                                        in
                                        this Agreement shall be deemed to supersede or modify a party’s right and obligations under
                                        the
                                        Agreement
                                    </p>

                                    <p class="left" style="display:none;">* JMI Brokers LTD will not cover any profits or losses
                                        that may occur in any client account if market slip up or down more then 300 pips in 24
                                        hours.
                                    </p>

                                    <h5 class="bold left">Contact us</h5>
                                    <p class="left">JMI Brokers LTD</p>

                                    <ul>
                                        <li>Address: 1276, Govant Building, Kumul Highway, Port Vila, Republic of Vanuatu:</li>
                                        <li>Phone no: +678 24404</li>
                                        <li>Fax no: +678 23693</li>
                                        <li>Website: <a href="https://www.jmibrokers.com">www.jmibrokers.com</a></li>
                                    </ul>
                                </div>

                                <div class="inputSignature">
                                    <label>Signature</label>
                                    <input type="text" name="signature" id="signature"
                                    placeholder="Full Name English Signature" required />
                                </div>

                                <div>
                                    <label for="iagree1" class="iagreecheck"><input type="checkbox" value="0" required
                                            id="iagree1"> I agree the terms and conditions</label>
                                </div>

                                <button type="submit" id="submit" value="Open Account" class="sm">
                                    <i class="far fa-long-arrow-alt-right me-3"></i>
                                    Open Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    <?php } else { ?>
        {!! Form::open(['url' => 'en/cpanel/open-account']) !!}
            <!-- Package AREA START -->
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="packageSec-main">
                        <div class="row">
                            <div class="col">
                                <div class="pakageCard">
                                    <div class="pakageCard-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="35"
                                            viewBox="0 0 43 35" fill="none">
                                            <path
                                                d="M17.431 29.0003C17.2416 28.6703 17.0616 28.3403 16.9004 28.001C16.9004 28.001 2.40116 28.001 2.33012 28.0104C1.31949 28.1266 0.554525 28.9816 0.550781 29.9997V32.9997C0.554531 34.1022 1.44703 34.9965 2.5514 35.0003H23.5512C23.7499 35.0003 23.9506 34.9703 24.14 34.9103C23.5193 34.6515 22.9175 34.3459 22.34 33.9991C20.3094 32.7728 18.62 31.0534 17.431 29.0003Z"
                                                fill="url(#paint0_linear_623_67364)" />
                                            <path
                                                d="M2.82078 21.9991C2.64453 22.3028 2.55078 22.6478 2.55078 23.0003V26.0003C2.55078 26.3509 2.64453 26.6959 2.82078 26.9996H16.48C15.8631 25.404 15.5481 23.709 15.55 21.999L2.82078 21.9991Z"
                                                fill="url(#paint1_linear_623_67364)" />
                                            <path opacity="0.3"
                                                d="M2.33018 20.9909C2.4033 20.9984 2.47643 21.0021 2.55143 21.0003H15.59C15.6106 20.6609 15.65 20.3309 15.6894 20.0009H15.6913C15.9444 18.2366 16.535 16.5397 17.4313 15.0003C17.6244 14.6553 17.8381 14.3216 18.0706 14.001H2.5514C1.44703 14.0029 0.554525 14.8972 0.550781 15.9997V18.9997C0.560156 20.0159 1.32147 20.869 2.33018 20.9909Z"
                                                fill="white" />
                                            <path opacity="0.3"
                                                d="M3.82078 8.00005C3.64453 8.30379 3.55078 8.64881 3.55078 8.9994V11.9994C3.55078 12.35 3.64453 12.695 3.82078 12.9987H18.8413C20.9562 10.4694 23.9019 8.7725 27.1509 8.21C26.9784 8.075 26.7684 8.00188 26.551 8L3.82078 8.00005Z"
                                                fill="white" />
                                            <path opacity="0.3"
                                                d="M3.33204 6.98996C3.40142 6.99934 24.5512 6.99934 24.5512 6.99934C25.0818 6.99934 25.5899 6.78934 25.9649 6.41432C26.3399 6.0393 26.5518 5.53123 26.5518 5.00059V2.00062C26.5481 0.896247 25.6537 0.00374396 24.5512 0H3.5514C2.4489 0.00374972 1.55453 0.896247 1.55078 2.00062V5.00059C1.55453 6.01871 2.31959 6.87371 3.33204 6.98996Z"
                                                fill="white" />
                                            <path
                                                d="M29.5552 14.001C27.4327 14.001 25.3983 14.8428 23.8984 16.3428C22.3985 17.8428 21.5547 19.879 21.5547 21.9996C21.5547 24.1221 22.3984 26.1564 23.8984 27.6563C25.3984 29.1562 27.4328 30 29.5552 30C31.6758 30 33.712 29.1563 35.2119 27.6563C36.7118 26.1563 37.5537 24.122 37.5537 21.9996C37.5519 19.879 36.7081 17.8465 35.2082 16.3467C33.7082 14.8468 31.6756 14.0028 29.5552 14.001ZM31.5558 21.0003H31.5539C31.8201 21.0003 32.0733 21.1053 32.2608 21.2928C32.4483 21.4803 32.5552 21.7353 32.5552 21.9997V24.9996C32.5552 25.2659 32.4483 25.519 32.2608 25.7065C32.0733 25.894 31.8202 26.0009 31.5539 26.0009H30.5545C30.5545 26.5521 30.1064 27.0002 29.5552 27.0002C29.0021 27.0002 28.554 26.5521 28.554 26.0009H27.5546C27.0015 26.0009 26.5553 25.5528 26.5553 24.9997C26.5553 24.4484 27.0015 24.0003 27.5546 24.0003H30.5546V23.001H27.5546C27.0015 23.001 26.5553 22.5528 26.5553 21.9997V18.9998C26.5553 18.4485 27.0015 18.0004 27.5546 18.0004H28.554C28.554 17.4473 29.0021 17.0011 29.5552 17.0011C30.1064 17.0011 30.5545 17.4473 30.5545 18.0004H31.5539C32.107 18.0004 32.5551 18.4485 32.5551 18.9998C32.5551 19.5529 32.107 20.001 31.5539 20.001H28.5539V21.0003L31.5558 21.0003Z"
                                                fill="url(#paint2_linear_623_67364)" />
                                            <path
                                                d="M29.5519 8.9991C25.8957 8.9916 22.4081 10.5328 19.952 13.2384C19.7326 13.4878 19.5114 13.7391 19.3126 13.9978L19.3108 13.9996C19.0576 14.3203 18.8214 14.654 18.602 14.999C17.6232 16.5177 16.9764 18.224 16.7008 20.0092C16.607 20.6692 16.5564 21.3329 16.5508 21.9985C16.5508 23.716 16.892 25.4147 17.552 26.9991C17.8201 27.6497 18.1445 28.2741 18.5214 28.8685C19.862 31.0322 21.8101 32.7534 24.1219 33.8182C24.4519 33.9588 24.7819 34.0975 25.1213 34.2175V34.2194C26.5388 34.7406 28.0406 35.005 29.5519 34.9994C34.1962 34.9994 38.488 32.5207 40.8092 28.4988C43.1323 24.477 43.1323 19.5215 40.8092 15.4996C38.488 11.4759 34.1963 8.9991 29.5519 8.9991ZM29.5519 31.9995C26.8988 31.9995 24.3564 30.9458 22.4796 29.0708C20.6047 27.1939 19.5509 24.6515 19.5509 21.9985C19.5509 19.3473 20.6046 16.8031 22.4796 14.9282C24.3565 13.0532 26.899 11.9995 29.5519 11.9995C32.2031 11.9995 34.7474 13.0532 36.6222 14.9282C38.4971 16.8032 39.551 19.3475 39.551 21.9985C39.5472 24.6497 38.4916 27.1901 36.6166 29.0655C34.7435 30.9404 32.2014 31.9939 29.5519 31.9995Z"
                                                fill="url(#paint3_linear_623_67364)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_623_67364" x1="-0.502307" y1="28.001"
                                                    x2="23.9311" y2="36.3517" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_623_67364" x1="1.92894" y1="21.999"
                                                    x2="16.8512" y2="26.2143" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint2_linear_623_67364" x1="20.8404" y1="14.001"
                                                    x2="39.1594" y2="15.8587" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint3_linear_623_67364" x1="15.39" y1="8.99903"
                                                    x2="45.161" y2="12.0182" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>

                                    <div class="pakageCard-title">
                                        <h6>minimum funding</h6>
                                        <h5>100 USD</h5>
                                        <h4>FIXED SPREAD ACCOUNT</h4>
                                        <span>Benefit from industry-leading entry prices</span>
                                    </div>

                                    <div class="pakageCard-detail mn-btn">
                                        <ul>
                                            <li>1 PIP fixed spread</li>
                                            <li>Up To 1:500 Leverage</li>
                                            <li>100$ Minimum funding</li>
                                            <li>USD is the main currency</li>
                                            <li>Islamic account - No Swap</li>
                                            <li>Minimum lot 0.01</li>
                                            <li>Expert advisor</li>
                                            <li>Heading is available</li>
                                            <li>4 Digits</li>
                                            <li>Scalping is not available</li>
                                        </ul>

                                        <a val="1" href="#" class="gd-btn buyPackage">Buy Package</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="pakageCard">
                                    <div class="pakageCard-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="35"
                                            viewBox="0 0 43 35" fill="none">
                                            <path
                                                d="M17.0599 29.0003C16.8705 28.6703 16.6906 28.3403 16.5293 28.001C16.5293 28.001 2.03007 28.001 1.95903 28.0104C0.9484 28.1266 0.183431 28.9816 0.179688 29.9997V32.9997C0.183437 34.1022 1.07593 34.9965 2.18031 35.0003H23.1801C23.3788 35.0003 23.5795 34.9703 23.7689 34.9103C23.1482 34.6515 22.5464 34.3459 21.9689 33.9991C19.9383 32.7728 18.2489 31.0534 17.0599 29.0003Z"
                                                fill="url(#paint0_linear_623_67382)" />
                                            <path
                                                d="M2.44968 21.9991C2.27344 22.3028 2.17969 22.6478 2.17969 23.0003V26.0003C2.17969 26.3509 2.27344 26.6959 2.44968 26.9996H16.1089C15.492 25.404 15.177 23.709 15.1789 21.999L2.44968 21.9991Z"
                                                fill="url(#paint1_linear_623_67382)" />
                                            <path
                                                d="M1.95909 20.9909C2.03221 20.9984 2.10534 21.0021 2.18034 21.0003H15.2189C15.2396 20.6609 15.2789 20.3309 15.3183 20.0009H15.3202C15.5733 18.2366 16.1639 16.5397 17.0602 15.0003C17.2533 14.6553 17.467 14.3216 17.6995 14.001H2.18031C1.07593 14.0029 0.183431 14.8972 0.179688 15.9997V18.9997C0.189062 20.0159 0.950379 20.869 1.95909 20.9909Z"
                                                fill="url(#paint2_linear_623_67382)" />
                                            <path opacity="0.3"
                                                d="M3.44968 8.00005C3.27344 8.30379 3.17969 8.64881 3.17969 8.9994V11.9994C3.17969 12.35 3.27344 12.695 3.44968 12.9987H18.4702C20.5851 10.4694 23.5308 8.7725 26.7799 8.21C26.6074 8.075 26.3974 8.00188 26.1799 8L3.44968 8.00005Z"
                                                fill="white" />
                                            <path opacity="0.3"
                                                d="M2.96095 6.98996C3.03032 6.99934 24.1801 6.99934 24.1801 6.99934C24.7107 6.99934 25.2189 6.78934 25.5938 6.41432C25.9688 6.0393 26.1807 5.53123 26.1807 5.00059V2.00062C26.177 0.896247 25.2826 0.00374396 24.1801 0H3.18031C2.07781 0.00374972 1.18343 0.896247 1.17969 2.00062V5.00059C1.18344 6.01871 1.9485 6.87371 2.96095 6.98996Z"
                                                fill="white" />
                                            <path
                                                d="M29.1841 14.001C27.0616 14.001 25.0272 14.8428 23.5273 16.3428C22.0274 17.8428 21.1836 19.879 21.1836 21.9996C21.1836 24.1221 22.0273 26.1564 23.5273 27.6563C25.0273 29.1562 27.0617 30 29.1841 30C31.3047 30 33.3409 29.1563 34.8408 27.6563C36.3407 26.1563 37.1827 24.122 37.1827 21.9996C37.1808 19.879 36.337 17.8465 34.8371 16.3467C33.3371 14.8468 31.3045 14.0028 29.1841 14.001ZM31.1847 21.0003H31.1828C31.4491 21.0003 31.7022 21.1053 31.8897 21.2928C32.0772 21.4803 32.1841 21.7353 32.1841 21.9997V24.9996C32.1841 25.2659 32.0772 25.519 31.8897 25.7065C31.7022 25.894 31.4491 26.0009 31.1828 26.0009H30.1835C30.1835 26.5521 29.7353 27.0002 29.1841 27.0002C28.631 27.0002 28.1829 26.5521 28.1829 26.0009H27.1835C26.6304 26.0009 26.1842 25.5528 26.1842 24.9997C26.1842 24.4484 26.6304 24.0003 27.1835 24.0003H30.1835V23.001H27.1835C26.6304 23.001 26.1842 22.5528 26.1842 21.9997V18.9998C26.1842 18.4485 26.6304 18.0004 27.1835 18.0004H28.1829C28.1829 17.4473 28.631 17.0011 29.1841 17.0011C29.7353 17.0011 30.1835 17.4473 30.1835 18.0004H31.1828C31.7359 18.0004 32.184 18.4485 32.184 18.9998C32.184 19.5529 31.7359 20.001 31.1828 20.001H28.1828V21.0003L31.1847 21.0003Z"
                                                fill="url(#paint3_linear_623_67382)" />
                                            <path
                                                d="M29.1808 8.9991C25.5246 8.9916 22.037 10.5328 19.5809 13.2384C19.3615 13.4878 19.1403 13.7391 18.9415 13.9978L18.9397 13.9996C18.6865 14.3203 18.4503 14.654 18.2309 14.999C17.2521 16.5177 16.6053 18.224 16.3297 20.0092C16.2359 20.6692 16.1853 21.3329 16.1797 21.9985C16.1797 23.716 16.5209 25.4147 17.1809 26.9991C17.449 27.6497 17.7734 28.2741 18.1503 28.8685C19.4909 31.0322 21.439 32.7534 23.7508 33.8182C24.0808 33.9588 24.4108 34.0975 24.7502 34.2175V34.2194C26.1677 34.7406 27.6695 35.005 29.1808 34.9994C33.8251 34.9994 38.1169 32.5207 40.4381 28.4988C42.7612 24.477 42.7612 19.5215 40.4381 15.4996C38.1169 11.4759 33.8252 8.9991 29.1808 8.9991ZM29.1808 31.9995C26.5277 31.9995 23.9853 30.9458 22.1085 29.0708C20.2336 27.1939 19.1798 24.6515 19.1798 21.9985C19.1798 19.3473 20.2335 16.8031 22.1085 14.9282C23.9854 13.0532 26.5279 11.9995 29.1808 11.9995C31.832 11.9995 34.3763 13.0532 36.2511 14.9282C38.126 16.8032 39.1799 19.3475 39.1799 21.9985C39.1761 24.6497 38.1205 27.1901 36.2455 29.0655C34.3724 30.9404 31.8303 31.9939 29.1808 31.9995Z"
                                                fill="url(#paint4_linear_623_67382)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_623_67382" x1="-0.873401" y1="28.001"
                                                    x2="23.56" y2="36.3517" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_623_67382" x1="1.55785" y1="21.999"
                                                    x2="16.4802" y2="26.2143" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint2_linear_623_67382" x1="-0.602448" y1="14.001"
                                                    x2="18.4375" y2="18.8337" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint3_linear_623_67382" x1="20.4693" y1="14.001"
                                                    x2="38.7883" y2="15.8587" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint4_linear_623_67382" x1="15.0189" y1="8.99903"
                                                    x2="44.7899" y2="12.0182" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>

                                    <div class="pakageCard-title">
                                        <h6>minimum funding</h6>
                                        <h5>500 USD</h5>
                                        <h4>Variable spread account</h4>
                                        <span>Receive even tighter spreads and commissions</span>
                                    </div>

                                    <div class="pakageCard-detail mn-btn">
                                        <ul>
                                            <li>0.1 PIP spread</li>
                                            <li>Up To 1:200 Leverage</li>
                                            <li>500$ Minimum funding</li>
                                            <li>USD is the main currency</li>
                                            <li>Islamic account - No Swap</li>
                                            <li>Minimum lot 0.01</li>
                                            <li>Expert advisor</li>
                                            <li>Heading is available</li>
                                            <li>5 Digits</li>
                                            <li>Scalping is not available</li>
                                        </ul>

                                        <a val="3" href="#" class="gd-btn buyPackage">Buy Package</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="pakageCard">
                                    <div class="pakageCard-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="35"
                                            viewBox="0 0 43 35" fill="none">
                                            <path
                                                d="M17.6966 29.0003C17.5073 28.6703 17.3273 28.3403 17.166 28.001C17.166 28.001 2.66679 28.001 2.59575 28.0104C1.58512 28.1266 0.82015 28.9816 0.816406 29.9997V32.9997C0.820156 34.1022 1.71265 34.9965 2.81703 35.0003H23.8168C24.0156 35.0003 24.2162 34.9703 24.4056 34.9103C23.7849 34.6515 23.1831 34.3459 22.6056 33.9991C20.575 32.7728 18.8856 31.0534 17.6966 29.0003Z"
                                                fill="url(#paint0_linear_623_67425)" />
                                            <path
                                                d="M3.0864 21.9991C2.91015 22.3028 2.81641 22.6478 2.81641 23.0003V26.0003C2.81641 26.3509 2.91015 26.6959 3.0864 26.9996H16.7456C16.1287 25.404 15.8138 23.709 15.8156 21.999L3.0864 21.9991Z"
                                                fill="url(#paint1_linear_623_67425)" />
                                            <path
                                                d="M2.59581 20.9909C2.66893 20.9984 2.74206 21.0021 2.81706 21.0003H15.8556C15.8763 20.6609 15.9156 20.3309 15.955 20.0009H15.9569C16.21 18.2366 16.8006 16.5397 17.6969 15.0003C17.89 14.6553 18.1038 14.3216 18.3362 14.001H2.81703C1.71265 14.0029 0.82015 14.8972 0.816406 15.9997V18.9997C0.825781 20.0159 1.5871 20.869 2.59581 20.9909Z"
                                                fill="url(#paint2_linear_623_67425)" />
                                            <path
                                                d="M4.0864 8.00005C3.91015 8.30379 3.81641 8.64881 3.81641 8.9994V11.9994C3.81641 12.35 3.91015 12.695 4.0864 12.9987H19.1069C21.2218 10.4694 24.1675 8.7725 27.4166 8.21C27.2441 8.075 27.0341 8.00188 26.8166 8L4.0864 8.00005Z"
                                                fill="url(#paint3_linear_623_67425)" />
                                            <path opacity="0.3"
                                                d="M3.59767 6.98996C3.66704 6.99934 24.8168 6.99934 24.8168 6.99934C25.3475 6.99934 25.8556 6.78934 26.2305 6.41432C26.6055 6.0393 26.8174 5.53123 26.8174 5.00059V2.00062C26.8137 0.896247 25.9193 0.00374396 24.8168 0H3.81703C2.71453 0.00374972 1.82015 0.896247 1.81641 2.00062V5.00059C1.82016 6.01871 2.58521 6.87371 3.59767 6.98996Z"
                                                fill="white" />
                                            <path
                                                d="M29.8208 14.001C27.6983 14.001 25.6639 14.8428 24.164 16.3428C22.6641 17.8428 21.8203 19.879 21.8203 21.9996C21.8203 24.1221 22.664 26.1564 24.164 27.6563C25.664 29.1562 27.6984 30 29.8208 30C31.9414 30 33.9776 29.1563 35.4775 27.6563C36.9774 26.1563 37.8194 24.122 37.8194 21.9996C37.8175 19.879 36.9738 17.8465 35.4738 16.3467C33.9738 14.8468 31.9412 14.0028 29.8208 14.001ZM31.8214 21.0003H31.8195C32.0858 21.0003 32.3389 21.1053 32.5264 21.2928C32.7139 21.4803 32.8208 21.7353 32.8208 21.9997V24.9996C32.8208 25.2659 32.7139 25.519 32.5264 25.7065C32.3389 25.894 32.0858 26.0009 31.8195 26.0009H30.8202C30.8202 26.5521 30.3721 27.0002 29.8208 27.0002C29.2677 27.0002 28.8196 26.5521 28.8196 26.0009H27.8203C27.2672 26.0009 26.8209 25.5528 26.8209 24.9997C26.8209 24.4484 27.2671 24.0003 27.8203 24.0003H30.8202V23.001H27.8203C27.2672 23.001 26.8209 22.5528 26.8209 21.9997V18.9998C26.8209 18.4485 27.2671 18.0004 27.8203 18.0004H28.8196C28.8196 17.4473 29.2677 17.0011 29.8208 17.0011C30.372 17.0011 30.8202 17.4473 30.8202 18.0004H31.8195C32.3726 18.0004 32.8207 18.4485 32.8207 18.9998C32.8207 19.5529 32.3726 20.001 31.8195 20.001H28.8196V21.0003L31.8214 21.0003Z"
                                                fill="url(#paint4_linear_623_67425)" />
                                            <path
                                                d="M29.8175 8.9991C26.1613 8.9916 22.6737 10.5328 20.2176 13.2384C19.9982 13.4878 19.777 13.7391 19.5783 13.9978L19.5764 13.9996C19.3233 14.3203 19.087 14.654 18.8676 14.999C17.8889 16.5177 17.242 18.224 16.9664 20.0092C16.8727 20.6692 16.822 21.3329 16.8164 21.9985C16.8164 23.716 17.1577 25.4147 17.8176 26.9991C18.0857 27.6497 18.4101 28.2741 18.787 28.8685C20.1276 31.0322 22.0757 32.7534 24.3876 33.8182C24.7176 33.9588 25.0476 34.0975 25.3869 34.2175V34.2194C26.8044 34.7406 28.3062 35.005 29.8175 34.9994C34.4618 34.9994 38.7536 32.5207 41.0748 28.4988C43.3979 24.477 43.3979 19.5215 41.0748 15.4996C38.7536 11.4759 34.4619 8.9991 29.8175 8.9991ZM29.8175 31.9995C27.1644 31.9995 24.622 30.9458 22.7453 29.0708C20.8703 27.1939 19.8165 24.6515 19.8165 21.9985C19.8165 19.3473 20.8703 16.8031 22.7453 14.9282C24.6221 13.0532 27.1646 11.9995 29.8175 11.9995C32.4687 11.9995 35.013 13.0532 36.8878 14.9282C38.7627 16.8032 39.8166 19.3475 39.8166 21.9985C39.8128 24.6497 38.7572 27.1901 36.8822 29.0655C35.0091 30.9404 32.467 31.9939 29.8175 31.9995Z"
                                                fill="url(#paint5_linear_623_67425)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_623_67425" x1="-0.236682" y1="28.001"
                                                    x2="24.1967" y2="36.3517" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_623_67425" x1="2.19457" y1="21.999"
                                                    x2="17.1169" y2="26.2143" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint2_linear_623_67425" x1="0.0342709" y1="14.001"
                                                    x2="19.0742" y2="18.8337" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint3_linear_623_67425" x1="2.76283" y1="8"
                                                    x2="24.9719" y2="18.6334" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint4_linear_623_67425" x1="21.1061" y1="14.001"
                                                    x2="39.4251" y2="15.8587" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint5_linear_623_67425" x1="15.6557" y1="8.99903"
                                                    x2="45.4266" y2="12.0182" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>

                                    <div class="pakageCard-title">
                                        <h6>minimum funding</h6>
                                        <h5>1000 USD</h5>
                                        <h4>Scalping account</h4>
                                        <span>Benefit from industry-leading entry prices</span>
                                    </div>

                                    <div class="pakageCard-detail mn-btn">
                                        <ul>
                                            <li>1.7 PIP</li>
                                            <li>Up to 1:100 Leverage</li>
                                            <li>1000$ Minimum funding</li>
                                            <li>USD is the main currency</li>
                                            <li>Islamic account - No Swap</li>
                                            <li>Minimum lot 0.01</li>
                                            <li>Expert advisor</li>
                                            <li>Heading is available</li>
                                            <li>5 Digits</li>
                                            <li>Scalping is not available</li>
                                        </ul>

                                        <a val="5" href="#" class="gd-btn buyPackage">Buy Package</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="pakageCard">
                                    <div class="pakageCard-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="35"
                                            viewBox="0 0 43 35" fill="none">
                                            <path
                                                d="M17.3255 29.0003C17.1362 28.6703 16.9562 28.3403 16.7949 28.001C16.7949 28.001 2.29569 28.001 2.22466 28.0104C1.21403 28.1266 0.449056 28.9816 0.445312 29.9997V32.9997C0.449062 34.1022 1.34156 34.9965 2.44593 35.0003H23.4457C23.6445 35.0003 23.8451 34.9703 24.0345 34.9103C23.4139 34.6515 22.812 34.3459 22.2345 33.9991C20.2039 32.7728 18.5145 31.0534 17.3255 29.0003Z"
                                                fill="url(#paint0_linear_623_67458)" />
                                            <path
                                                d="M2.71531 21.9991C2.53906 22.3028 2.44531 22.6478 2.44531 23.0003V26.0003C2.44531 26.3509 2.53906 26.6959 2.71531 26.9996H16.3745C15.7576 25.404 15.4427 23.709 15.4445 21.999L2.71531 21.9991Z"
                                                fill="url(#paint1_linear_623_67458)" />
                                            <path
                                                d="M2.22471 20.9909C2.29784 20.9984 2.37096 21.0021 2.44596 21.0003H15.4846C15.5052 20.6609 15.5446 20.3309 15.5839 20.0009H15.5858C15.8389 18.2366 16.4295 16.5397 17.3258 15.0003C17.5189 14.6553 17.7327 14.3216 17.9651 14.001H2.44593C1.34156 14.0029 0.449056 14.8972 0.445312 15.9997V18.9997C0.454687 20.0159 1.216 20.869 2.22471 20.9909Z"
                                                fill="url(#paint2_linear_623_67458)" />
                                            <path
                                                d="M3.71531 8.00005C3.53906 8.30379 3.44531 8.64881 3.44531 8.9994V11.9994C3.44531 12.35 3.53906 12.695 3.71531 12.9987H18.7358C20.8508 10.4694 23.7964 8.7725 27.0455 8.21C26.873 8.075 26.663 8.00188 26.4455 8L3.71531 8.00005Z"
                                                fill="url(#paint3_linear_623_67458)" />
                                            <path
                                                d="M3.22657 6.98996C3.29595 6.99934 24.4457 6.99934 24.4457 6.99934C24.9764 6.99934 25.4845 6.78934 25.8595 6.41432C26.2344 6.0393 26.4463 5.53123 26.4463 5.00059V2.00062C26.4426 0.896247 25.5482 0.00374396 24.4457 0H3.44593C2.34343 0.00374972 1.44906 0.896247 1.44531 2.00062V5.00059C1.44906 6.01871 2.21412 6.87371 3.22657 6.98996Z"
                                                fill="url(#paint4_linear_623_67458)" />
                                            <path
                                                d="M29.4497 14.001C27.3272 14.001 25.2928 14.8428 23.7929 16.3428C22.2931 17.8428 21.4492 19.879 21.4492 21.9996C21.4492 24.1221 22.293 26.1564 23.7929 27.6563C25.2929 29.1562 27.3273 30 29.4497 30C31.5703 30 33.6065 29.1563 35.1064 27.6563C36.6063 26.1563 37.4483 24.122 37.4483 21.9996C37.4464 19.879 36.6027 17.8465 35.1027 16.3467C33.6027 14.8468 31.5701 14.0028 29.4497 14.001ZM31.4503 21.0003H31.4484C31.7147 21.0003 31.9678 21.1053 32.1553 21.2928C32.3428 21.4803 32.4497 21.7353 32.4497 21.9997V24.9996C32.4497 25.2659 32.3428 25.519 32.1553 25.7065C31.9678 25.894 31.7147 26.0009 31.4484 26.0009H30.4491C30.4491 26.5521 30.001 27.0002 29.4497 27.0002C28.8966 27.0002 28.4485 26.5521 28.4485 26.0009H27.4492C26.8961 26.0009 26.4498 25.5528 26.4498 24.9997C26.4498 24.4484 26.8961 24.0003 27.4492 24.0003H30.4491V23.001H27.4492C26.8961 23.001 26.4498 22.5528 26.4498 21.9997V18.9998C26.4498 18.4485 26.8961 18.0004 27.4492 18.0004H28.4485C28.4485 17.4473 28.8966 17.0011 29.4497 17.0011C30.001 17.0011 30.4491 17.4473 30.4491 18.0004H31.4484C32.0015 18.0004 32.4496 18.4485 32.4496 18.9998C32.4496 19.5529 32.0015 20.001 31.4484 20.001H28.4485V21.0003L31.4503 21.0003Z"
                                                fill="url(#paint5_linear_623_67458)" />
                                            <path
                                                d="M29.4464 8.9991C25.7902 8.9916 22.3026 10.5328 19.8465 13.2384C19.6271 13.4878 19.4059 13.7391 19.2072 13.9978L19.2053 13.9996C18.9522 14.3203 18.7159 14.654 18.4965 14.999C17.5178 16.5177 16.8709 18.224 16.5953 20.0092C16.5016 20.6692 16.4509 21.3329 16.4453 21.9985C16.4453 23.716 16.7866 25.4147 17.4465 26.9991C17.7147 27.6497 18.039 28.2741 18.4159 28.8685C19.7565 31.0322 21.7046 32.7534 24.0165 33.8182C24.3465 33.9588 24.6765 34.0975 25.0158 34.2175V34.2194C26.4333 34.7406 27.9351 35.005 29.4464 34.9994C34.0908 34.9994 38.3825 32.5207 40.7037 28.4988C43.0268 24.477 43.0268 19.5215 40.7037 15.4996C38.3825 11.4759 34.0909 8.9991 29.4464 8.9991ZM29.4464 31.9995C26.7933 31.9995 24.2509 30.9458 22.3742 29.0708C20.4992 27.1939 19.4454 24.6515 19.4454 21.9985C19.4454 19.3473 20.4992 16.8031 22.3742 14.9282C24.251 13.0532 26.7935 11.9995 29.4464 11.9995C32.0976 11.9995 34.6419 13.0532 36.5167 14.9282C38.3916 16.8032 39.4455 19.3475 39.4455 21.9985C39.4417 24.6497 38.3861 27.1901 36.5111 29.0655C34.638 30.9404 32.0959 31.9939 29.4464 31.9995Z"
                                                fill="url(#paint6_linear_623_67458)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_623_67458" x1="-0.607776" y1="28.001"
                                                    x2="23.8256" y2="36.3517" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_623_67458" x1="1.82347" y1="21.999"
                                                    x2="16.7458" y2="26.2143" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint2_linear_623_67458" x1="-0.336823" y1="14.001"
                                                    x2="18.7031" y2="18.8337" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint3_linear_623_67458" x1="2.39173" y1="8"
                                                    x2="24.6008" y2="18.6334" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint4_linear_623_67458" x1="0.329195" y1="1.12202e-06"
                                                    x2="25.8953" y2="9.26084" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint5_linear_623_67458" x1="20.735" y1="14.001"
                                                    x2="39.054" y2="15.8587" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                                <linearGradient id="paint6_linear_623_67458" x1="15.2846" y1="8.99903"
                                                    x2="45.0555" y2="12.0182" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FEDC18" />
                                                    <stop offset="1" stop-color="#FFF7C5" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>

                                    <div class="pakageCard-title">
                                        <h6>minimum funding</h6>
                                        <h5>100 USD</h5>
                                        <h4>Bonus account</h4>
                                        <span>Benefit from industry-leading entry prices</span>
                                    </div>

                                    <div class="pakageCard-detail mn-btn">
                                        <ul>
                                            <li>2 PIP fixed spread</li>
                                            <li>Up To 1:500 Leverage</li>
                                            <li>100$ Minimum funding</li>
                                            <li>USD is the main currency</li>
                                            <li>Islamic account - No Swap</li>
                                            <li>Minimum lot 0.01</li>
                                            <li>Expert advisor</li>
                                            <li>Heading is available</li>
                                            <li>4 Digits</li>
                                            <li>Scalping is not available</li>
                                        </ul>

                                        <a val="4" href="#" class="gd-btn buyPackage">Buy Package</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Package AREA END -->

            {{-- FORM AREA START --}}
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="openAccount-form theam-form">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="account_type">Account Type:</label>

                                <select name="account_type" id="account_type" required>
                                    <option value="" disabled selected>- Select -</option>
                                    <option value="1">Individual</option>
                                    <option value="2">IB</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="account_group">Account Group:</label>

                                <select name="account_group" id="account_group" onchange="accountGroup()" required>
                                    <option value="" disabled selected>- Select -</option>
                                    <option value="1" class="forlive" style-="display:none;">Fixed spread account
                                    </option>
                                    <option value="3" class="forlive" style-="display:none;">Variable spread account
                                    </option>
                                    <option value="5" class="forlive" style-="display:none;">Scalping account</option>
                                    <option value="4" class="forlive" style-="display:none;">Bonus account</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="currency">Currency base:</label>

                                <select name="currency" id="currency" required>
                                    <option value="" selected disabled>- Select -</option>
                                    <option value="1" selected>USD</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- FORM AREA END --}}

            {{-- CONTENT AREA START --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body openAccount-tremBox">
                            <div class=" mn-btn">
                                <div style="height: 600px;overflow-y: scroll;margin: 10px 20px;padding: 10px;">
                                    <h4 class="head">Customer Account Agreement</h4>
                                    <h6 class="boldText">JMI Brokers LTD is licensed broker from Vanuatu Financial Services
                                        Commission as Dealers in Securities under license number 15010</h6>
                                    <h5 class="blue">Risk Disclosure Statement</h5>
                                    <p class="big">Before engaging in the products offered by JMI Brokers LTD you should be
                                        aware of the risks which may be involved in such trading.</p>
                                    <p class="blue">You should not enter into a transaction unless you fully understand:</p>
                                    <ul>
                                        <li>The nature and fundamentals of the transaction and the market underlying such
                                            transactions.</li>
                                        <li>The extent of the economic risk to which you are exposed as a result of such
                                            transactions(and determine that such risk is suitable for you in light of your
                                            specific experience in relation to the transaction and your financial objectives,
                                            circumstances and resources).</li>
                                        <li>The legal terms and conditions for such transactions.</li>
                                    </ul>
                                    <p>You have the responsibility to fully understand the terms and conditions of the
                                        transactions to be undertaken, including, without limitation:</p>
                                    <p>1. The terms as to price, term, and expiration date, restrictions on exercising an OTC
                                        option and futures and of the terms material to the transaction.</p>
                                    <p>2 . Any terms describing risk factors, such as volatility, liquidity, and so on.</p>
                                    <p>3. The circumstances under which you may become obliged to make or take delivery of a
                                        Leveraged foreign exchange transaction or Futures contracts.</p>
                                    <p>The high degree of leverage that is often obtainable in trading of the products offered
                                        by JMI Brokers LTD can work against you as well as for you, due to fluctuating market
                                        conditions. Trading in such instruments can lead to large losses as well as gains in
                                        response to a small market movement.</p>
                                    <p>If the market moves against you, you may not only sustain a total loss of your initial
                                        margin deposit, and any additional funds deposited with JMI Brokers LTD.</p>
                                    <p>to maintain your position, but you may also incur further liability to JMI Brokers LTD.
                                        You may be called upon to “top-up” your margin by substantial amounts at short notice to
                                        maintain your position, failing which JMI Brokers LTD may have to liquidate your
                                        position at a loss and you would be liable for any resulting loss. You may sustain
                                        substantial losses on a contract or trade if the market conditions move against your
                                        position. It is in your interest to fully understand the impact of market movements, in
                                        particular the extent of profit/loss you would be exposed to when there is an upward or
                                        down ward movement in the relevant rates and the extent of loss if you have to liquidate
                                        a position, if market conditions move against you.</p>
                                    <p>Under certain market conditions you may find it difficult or impossible to liquidate a
                                        position ,to assess a fair price or assess risk exposure. This can happen, for example,
                                        where the market for a transaction is illiquid or where there is a failure in electronic
                                        or telecommunications systems, or where there is the occurrence of an event commonly
                                        known as “force majeure”. Placing contingent orders, such as “stop-loss” orders, will
                                        not necessarily limit your losses to the intended amounts, as it may be impossible to
                                        execute such orders under certain market conditions. When placing a stop order or stop
                                        loss order, you must be aware that in certain market conditions you may be filled at a
                                        different price than initially requested. Because the prices and characteristics of
                                        over-the-counter transactions are individually negotiated and there is no central source
                                        for obtaining prices, there are in efficiencies in transaction pricing. We consequently
                                        cannot and do not warrant that our prices or the prices we secure for you are or will at
                                        any time be the best prices available to you. Transactions in futures and options
                                        involve a high degree of risk and are not suitable for many members of the public. Such
                                        transactions should be entered into only by persons who have read, understood and
                                        familiarized themselves with the type of futures and options, style of exercise, the
                                        nature and extent of rights and obligations and the associated risks. The objective of
                                        this statement is to explain to you, briefly, the nature of trading in the products
                                        offered by JMI Brokers LTD, prior to your engaging in such transactions. In particular,
                                        you must be aware that the risk of loss in trading foreign exchange and precious metals
                                        and Futures (OTC) can be substantial. However, this statement does not purport to
                                        disclose or discuss all of the risks and other significant aspects of any transaction
                                        .You should therefore consult with your own legal, tax and financial advisers prior to
                                        entering into any particular transaction. By signing this Risk Disclosure Statement, you
                                        understand that no one can guarantee trading profits and past results do not assure
                                        future profitability, and you acknowledge and confirm that you have fully read and
                                        understood the Risk Disclosure Statement and that you are treated as experienced and/or
                                        professional Customer.</p>
                                    <h5 class="blue">1. TRADING AUTHORIZATION</h5>
                                    <p class="left">JMI Brokers is a financial company authorized and holds a Principals
                                        license from Vanuatu Financial Services Commission (VFSC) as “Dealers in Securities” to
                                        carry on the business of dealing in securities such as financial Contracts for
                                        differences. (“CFDs”) in commodities, equities, indices, and Currency pairs (Fx), etc
                                        under three Licenses classes (A, B, and C) as below: Class A : CFDs in currency pairs (
                                        Fx). Class B: CFDs in Precious Metals.</p>
                                    <p class="left">Class C: CFDs in Commodities, equities, indices,etc All CFDs contracts
                                        are leveraged products and will be executed between you as principal and us as
                                        principal. You shall be directly and personally responsible for performing your
                                        obligations under every transaction entered in to between us, whether you are dealing as
                                        principal directly or through an agent, or as agent for another person, and you shall
                                        indemnify us in respect of all liabilities, losses or costs of any kind or nature what
                                        so ever which may be incurred by us as a direct or in direct result of any failure by
                                        you to perform any such obligation.</p>
                                    <h5 class="blue">2. APPLICABLE RULES AND REGULATIONS</h5>
                                    <p>All orders entered for the purchase or sale of a Commodity Contract and all transactions
                                        in Commodity Contracts executed for Customer’s accounts shall be subject to the
                                        constitution, by Laws, rules, regulations, customs and usages (collectively “rules”) of
                                        the exchange or market, and its clearing house, if any, where such orders are directed
                                        or such transactions are executed and any applicable self- regulatory organization and
                                        to the rules and regulations promulgated there under (collectively “laws JMI Brokers LTD
                                        shall not be liable to Customer as a result of any action taken by JMI Brokers LTD or
                                        its agents in compliance with any of the foregoing rules or laws. This paragraph is
                                        solely for the protection and benefit of JMI Brokers LTD ,and any failure by JMI Brokers
                                        LTD or its agents to comply with any of the foregoing rules or laws shall not relieve
                                        Customer of any obligation under this agreement nor be construed to create rights under
                                        this agreement in favor of Customer against JMI Brokers LTD</p>
                                    <h5 class="blue">3. CHARGES PAYABLE BY CUSTOMER.</h5>
                                    <p>Customer agrees to pay (a) such commissions and service fees as JMI Brokers LTD may
                                        establish and charge from time to time; (b) the amount of any loss that may result from
                                        transactions by JMI Brokers LTD on Customer’s behalf, including any deficit balance;
                                        and(c) interest on any deficit balance and on any other amounts payable to JMI Brokers
                                        LTD under this agreement at the rate of three percent (3%) over the Prime rate in effect
                                        from time to time, or the maximum rate allowed by law, which ever is less.</p>
                                    <h5 class="blue">4. RISK OF LOSS</h5>
                                    <p>All transactions effected for Customer’s accounts and all fluctuations in the market
                                        prices of the Commodity Contracts carried in Customer’s accounts are at Customer’s sole
                                        risk and Customer shall be solely liable under all circumstances. By execution of this
                                        agreement, Customer warrants that Customer is willing and financially able to sustain
                                        any such losses. JMI Brokers LTD is not responsible for the obligations of the persons
                                        with whom Customer’s transactions are effected, nor is JMI Brokers LTD responsible for
                                        delays in transmission, delivery or execution of Customer’s orders due to malfunctions
                                        of communications facilities or other causes.</p>
                                    <p>JMI Brokers LTD shall not be liable to Customer for the loss of any margin deposits which
                                        is the direct or indirect result of the bankruptcy, in solvency, liquidation,
                                        receivership, custodianship or assignment for the benefit of creditors of any bank,
                                        another clearing broker, exchange, clearing organization or similar entity.</p>
                                    <h5 class="blue">5. TRADING RECOMMENDATIONS</h5>
                                    <p>Customer acknowledges that any trading recommendations and market or other information
                                    </p>
                                    <p>Communicated to Customer by JMI Brokers LTD , although based upon information obtained
                                        from sources Believed by JMI Brokers LTD to be reliable, may be incomplete, may not be
                                        verified, may differ from advice given to other customers, and may be changed without
                                        notice to Customer. Customer understands JMI Brokers LTD or one or more of its
                                        affiliates may have apposition in and buy or sell Commodity Contracts which are the
                                        subject of information or recommendations furnished to Customer and that these positions
                                        and transactions of JMI Brokers LTD or any affiliates may not be consistent with are
                                        there commendations furnished to customer.</p>
                                    <p>JMI Brokers LTD makes no representation or warranty with respect to the tax consequences
                                        of customer transactions</p>
                                    <h5 class="blue">6. INDEMNIFICATION</h5>
                                    <p>Customer hereby agrees to indemnify JMI Brokers LTD and hold JMI Brokers LTD harmless
                                        from any liability, cost or expense (including attorneys’ fees and expenses and any
                                        fines or penalties imposed by any governmental agency, contract market, exchange,
                                        clearing organization or other self-regulatory body) which JMI Brokers LTD may incur or
                                        be subjected to with respect to Customer’s account or any transaction or position there
                                        in. Without limiting the generality of the foregoing, Customer agrees to reimburse JMI
                                        Brokers LTD on demand for any cost of collection incurred by JMI Brokers LTD in
                                        collecting any sums owing by Customer under this agreement and any cost incurred by JMI
                                        Brokers LTD in successfully defending against any claims asserted by Customer, including
                                        all attorneys’ fees, interest and expenses.</p>
                                    <h5 class="blue">7. RECORDING</h5>
                                    <p>Customer understands that all conversations regarding Customer’s accounts, orders and
                                        Commodity Contracts between Customer and JMI Brokers LTD maybe recorded by JMI Brokers
                                        LTD and Customer irrevocably consents to such recordings and waives any right to object
                                        to JMI Brokers LTD ’s use of such recordings in any proceeding or as JMI Brokers LTD
                                        otherwise deems appropriate.</p>
                                    <h5 class="blue">8. FOREIGN CURRENCY</h5>
                                    <p>If any transaction for Customer’s accounts is effected on any exchange or in any market
                                        on which transactions are settled in a foreign currency, any profit or loss arising as a
                                        result of a fluctuation in the rate of exchange between such currency and the United
                                        States Dollar shall be entirely for Customer’s account and at Customer’s sole risk. JMI
                                        Brokers LTD is hereby authorized to convert funds in Customer’s accounts in to and from
                                        such foreign currency at rates of exchange prevailing at the banking and other
                                        institutions with which JMI Brokers LTD normally conducts such business transactions.
                                    </p>
                                    <h5 class="blue">9. MARGIN REQUIREMENTS.</h5>
                                    <p>Customer agrees to maintain at all times without demand from JMI Brokers LTD margin
                                        requirements for the positions in the Customer’s account (s). Customer will at all times
                                        maintain such margin or collateral for Customer’s account (s) as requested from time to
                                        time by JMI Brokers LTD (which requests maybe greater than exchange and clearing house
                                        requirements). Margin deposits shall be made by wire transfer of immediately available
                                        funds, or by such other means as JMI Brokers LTD may direct, and shall be deemed made
                                        when received by JMI Brokers LTD.</p>
                                    <p>JMI Brokers LTD failure at anytime to call for a deposit of margin shall not constitute a
                                        waiver of JMI Brokers LTD rights to do so at anytime there after, nor shall it create
                                        any liability of JMI Brokers LTD to Customer.</p>
                                    <h5 class="blue">10. LIQUIDATION OF POSITIONS.</h5>
                                    <p>In the event that (a) Customer shall fail to timely deposit or maintain margin or any
                                        amount hereunder; (b) Customer (if an individual) shall die or be judicially declared
                                        incompetent or (if an entity) shall be dissolved or otherwise terminated; (c) a
                                        proceeding under the Bankruptcy Act, an assignment for the benefit of creditors, or an
                                        application for a receiver, custodian, or trustee shall be filed or applied for by or
                                        against Customer;(d)attachment is levied against Customer’s account; (e) the property
                                        deposited as collateral is determined by JMI Brokers LTD in its sole discretion,
                                        regardless of current market quotations, to be in adequate to properly secure the
                                        account; or (f) at anytime JMI Brokers LTD deems it necessary for its protection for any
                                        reason whatsoever, JMI Brokers LTD may, in the manner it deems appropriate, close out
                                        Customer’s open positions in whole or in part, sell any or all of Customer’s property
                                        held by JMI Brokers LTD , buy any securities, Commodity Contracts, or other property for
                                        Customer’s account, and may cancel any outstanding orders and commitments made by JMI
                                        Brokers LTD on behalf of Customer. Such sale, purchase or cancellation maybe made at JMI
                                        Brokers LTD discretion without advertising the same and without notice to Customer or
                                        his personal representatives and without prior tender, demand for margin or payment, or
                                        call of any kind upon Customer. JMI Brokers LTD may purchase the whole or any part there
                                        of free from any right of red emption. It is understood that a prior demand or call or
                                        prior notice of the time and place of such sale or purchase shall not be a waiver of JMI
                                        Brokers LTD right to sell or buy without demand or notice as here in provided. Subject
                                        to applicable laws and rules, and in order to prevent non-permitted trading in
                                        debit/deficit accounts, profits on any trades executed without JMI Brokers LTD’s express
                                        permission, for a Customer account that is debit/deficit at the time the order is placed
                                        ,shall before JMI Brokers LTD account if JMI Brokers LTD in its discretion so elects.
                                        Losses on any such trades shall be jointly and severally borne by the Introducing
                                        Broker, if any, and the Customer. Customer shall remain liable for and pay JMIBrokers
                                        LTD the amount of any deficiency in any account of Customer with JMI Brokers LTD
                                        resulting from any transaction described above. Our determination of the current market
                                        value and the amount of additional and/or variation margin shall be conclusive and shall
                                        not be challenged by the Customer.</p>
                                    <h5 class="blue">11. TRADING LIMITATIONS</h5>
                                    <p>JMI at any time, in its sole discretion, may limit the number of positions which Customer
                                        may maintain or acquire through JMI Brokers LTD , and JMI Brokers LTD is under no
                                        obligation to effect any transaction for Customer’s accounts which would create
                                        positions in excess of the limit which JMI Brokers LTD has set.</p>
                                    <p>Customer agrees not to exceed the position limits established for any contract market,
                                        whether acting alone or with others, and to promptly advise JMI Brokers LTD if Customer
                                        is required to file any reports on positions. </p>
                                    <h5 class="blue">12. EXERCISES AND ASSIGNMENTS</h5>
                                    <p>With regard to options transactions, Customer understands that some exchange clearing
                                        houses have established exercise requirements for the tender of exercise instructions
                                        and that options will become worth less in the event that Customer does not deliver
                                        instructions by such expiration times. At least two business days prior to the first
                                        notice day in the case of long positions in futures or forward contracts, and at least
                                        two business days prior to the last trading day in the case of short positions in open
                                        futures or forward contracts or long and short positions in options, Customer agrees
                                        that Customer will either give JMI Brokers LTD instructions to liquidate or make or take
                                        delivery under such futures or forward contracts, or to liquidate, exercise, or allow
                                        the expiration of such options, and will deliver to JMI Brokers LTD sufficient funds
                                        and/or any documents required in connection with exercise or delivery. If such
                                        instructions or such funds and/or documents, with regard to option transactions, are not
                                        received by JMI prior to the expiration of the option, JMI Brokers LTD may permit an
                                        option to expire. Customer also understands that certain exchanges and clearing houses
                                        automatically exercise some “in-the -money” options unless instructed otherwise,
                                        Customer acknowledges full responsibility for taking action either to exercise or to
                                        prevent exercise of an option contract, as the case maybe JMI Brokers LTD is not
                                        required to take any action with respect to an option, including without limitation any
                                        action to exercise a valuable option contract prior to its expiration or to prevent the
                                        automatic exercise of an option, except upon Customer’s express instructions. Customer
                                        further understands that JMI Brokers LTD also has established exercise cut-off times
                                        which maybe different from the times established by the contract markets in clearing
                                        houses. In the event that timely exercise and assignment instructions are not given,
                                        Customer hereby agrees to waive any and all claims for damage or loss Customer might
                                        have against JMI Brokers LTD arising out of the fact that an option was or was not
                                        exercised. Customer understands that JMI Brokers LTD randomly assigns exercise notices
                                        to Customers, that all short option positions are subject to assignment at anytime,
                                        including positions established on the same day that exercises areas signed, and that
                                        exercise assignment notices are allocated randomly from among all Customers’ short
                                        option positions which are subject to exercise.</p>
                                    <h5 class="blue">13. SECURITY AGREEMENT</h5>
                                    <p>(a) All Commodity Contracts, funds, securities, and other property in Customer’s accounts
                                        or otherwise now or at any time in the future held by JMI Brokers LTD for any purpose,
                                        including safekeeping, are subject to a security interest and general lien in JMI
                                        Brokers LTD ’s favor to secure any indebtedness at any time owing from Customer to JMI
                                        Brokers LTD, including any indebtedness resulting from any guarantee of a transaction or
                                        account by Customer or Customer’s assumption of joint responsibility for any transaction
                                        or account. From time to time and without prior notice to Customer, JMI Brokers LTD may
                                        transfer interchangeably between and among any account of Customer maintained at JMI
                                        Brokers LTD any of Customer’s funds (including segregated funds), securities,
                                        commodities, or other property for purposes of margin, reduction or satisfaction of any
                                        debit balance, or any reason which JMI Brokers LTD deems appropriate. Within areas on
                                        able time after any such transfer, JMI Brokers LTD will confirm the transfer in writing
                                        to Customer.</p>
                                    <p>(b) Customer hereby grants to JMI Brokers LTD the right to pledge, repledge, or invest
                                        either separately or with the property of other Customers, any securities or other
                                        property held by JMI Brokers LTD for the account of Customer or as collateral therefore,
                                        including without limitation to any exchange or clearing house through which trades of
                                        Customer are executed. JMI Brokers LTD shall be under no obligation to pay to Customer
                                        or account for any interest income, or benefit derived from such property and funds or
                                        to deliver the same securities or other property deposited with or received by JMI
                                        Brokers LTD for Customer. JMI Brokers LTD may deliver securities or other property of
                                        like or equivalent kind or amount; JMI Brokers LTD shall have the right to offset any
                                        amounts it holds for or owes to Customer against any debts or other amounts owed by
                                        Customer to JMI Brokers LTD </p>
                                    <h5 class="blue">14. AUTHORITY TO TRANSFER ACCOUNTS</h5>
                                    <p>Until further notice in writing from the undersigned, JMI Brokers LTD is hereby
                                        authorized at anytime, without prior notice to the undersigned, to transfer from any
                                        account or accounts of the undersigned maintained at JMI Brokers LTD or any exchange
                                        member through which JMI Brokers LTD clears customer transactions, such excess funds,
                                        securities, commodities, commodity futures contracts, commodity options, and other
                                        property of the undersigned as in JMI Brokers LTD ’s sole judgment maybe required for
                                        margin in any other such account or accounts or to reduce or satisfy any debit balances
                                        in any other account or accounts provided such transfer or transfers comply with
                                        relevant governmental and exchange rules and regulations applicable to the same. JMI
                                        Brokers LTD is further authorized to liquidate any property held in any such account or
                                        accounts of the undersigned whenever, in JMI Brokers LTD ’s sole judgment, such
                                        liquidation is necessary in order to effectuate the above authorized transfer and
                                        application of property. With in areas on able time after making any such transfer or
                                        application, JMI Brokers LTD will Confirm the same in writing to the under signed.</p>
                                    <h5 class="blue">15- Monthly Rebate</h5>
                                    <p>For all both offers whether its offer number 1 Rebate + Bonus or offer number 2 1 pip
                                        back No bonus the value of Monthly Rebate should not exceed the value of original fund
                                        deposited at that month. Therefore the Maximum monthly rebate in any month is equal to
                                        sum of monthly deposits excluding bonus or any other promotions.</p>
                                    <h5 class="blue">16. NOTICES AND COMMUNICATIONS</h5>
                                    <p>Customer shall make all payments, except with regard to wire transfers discussed above,
                                        and deliver all notices and communications to the office of JMI Brokers LTD . All
                                        communications JMI Brokers LTD to Customer maybe sent to the Customer at the address
                                        indicated on the Customer Account Application or to such other address as Customer
                                        hereafter directs in writing. Confirmations of trades, statements of account, margin
                                        calls, and any other written notices shall be binding on Customerfor all purposes,
                                        unless Customer calls any error there into JMI Brokers LTD ’s attention in writing (a)
                                        prior to the start of business on the business day next following notification, in the
                                        case of margin calls and reports of executions and (b) within 24 hours of delivery to
                                        Customer, in the case of statements of account and any written notices (other than trade
                                        confirmations or margin calls)or demands. None of these provisions, however, will
                                        prevent JMI Brokers LTD upon discovery of any error or omission, from correcting it. The
                                        parties agree that such errors, whether resulting in profit or loss, will be corrected
                                        in Customer’s account, will be credited or debited so that it is in the same position it
                                        would have been in if the error had not occurred. Whenever a correction is made, JMI
                                        Brokers LTD will promptly make written or oral notification to Customer. All
                                        communications, whether by mail, telex, courier, telephone, telegraph, messenger,
                                        facsimile, or otherwise (in the case of mailed notices), or communicated (in the case of
                                        telephone notices), sent to Customer at Customer’s or agent’s address (or telephone
                                        number) as given to JMI Brokers LTD from time to time shall constitute personal delivery
                                        to Customer whether or not actually received by Customer, and Customer hereby waives all
                                        claims resulting from failure to receive such communications.</p>
                                    <h5 class="blue">17. PRINTED MEDIA STORAGE</h5>
                                    <p>Customer acknowledges and agrees that JMI Brokers LTD may reduce all documentation
                                        evidencing Customer’s account, including the original signature documents executed by
                                        Customer in the opening of such Customer’s account with JMI Brokers LTD , utilizing a
                                        printed media storage device such as micro-fiche or optical disc imaging. Customer
                                        agrees to permit the records stored by such printed media storage method to serve as a
                                        complete, true and genuine record of such Customer’s account documents and signatures.
                                    </p>
                                    <h5 class="blue">18. REPRESENTATIONS</h5>
                                    <p>Customer represents that (a) (if an individual) he is of the age of majority, of sound
                                        mind, and authorized to open accounts and enter into this agreement and to effectuate
                                        transactions in Commodity Contracts as contemplated hereby; (b) (if an entity) Customer
                                        is validly existing and empowered to enter into this agreement and to effect
                                        transactions in Commodity Contracts as contemplated hereby; (c) the statements and
                                        financial information contained on Customer’s Account Application submitted herewith
                                        (including any financial statement there with)are true and correct; and (d) no person or
                                        entity has any interesting or control of the account to which this agreement pertains
                                        except as disclosed in the Customer’s Account Application. Customer further represents
                                        that, except as here to fore disclosed to JMI Brokers LTD in writing, he is not an
                                        officer or employee of any exchange, board of trade, clearing house, or an employee or
                                        affiliate of any futures commission merchant, or an introducing broker, or an officer
                                        ,partner, director, or employee of any securities broker or dealer. Customer agrees to
                                        furnish appropriate financial statements to JMI Brokers LTD to disclose to JMI Brokers
                                        LTD any material changes in the financial position of Customer and to furnish promptly
                                        such other information concerning Customer as JMI Brokers LTD reasonably requests.</p>
                                    <h5 class="blue">19. INTRODUCING BROKER</h5>
                                    <p>Customer acknowledges that JMI Brokers LTD is not responsible for the conduct,
                                        representations and statements of the introducing broker or its associated persons in
                                        the handling of Customer’s account. Customer agrees to waive any claims Customer may
                                        have against JMI Brokers LTD and to indemnify and hold JMI Brokers LTD harmless for any
                                        actions or omissions of the introducing broker or its associated persons. </p>
                                    <h5 class="blue">20. CONFLICTS OF INTEREST</h5>
                                    <p>JMI Brokers LTD may execute Commodity Contracts for Customer’s account (s) either as
                                        principal or broker. As broker, JMI Brokers LTD will execute transaction similar to
                                        Customer’s transaction with another market participant in the financial market. As
                                        principal JMI Brokers LTD may not execute transaction similar to Customer in the
                                        financial market and hold the opposing transaction in JMI Brokers LTD inventory of
                                        Commodity Contracts. As a result of acting as principal Customer should realize that JMI
                                        Brokers LTD maybe acting as your counter party and that JMI Brokers LTD maybe placed in
                                        such a position that a conflict of duty occurs. JMI Brokers LTD , its Associates or
                                        other persons connected with JMI Brokers LTD may have an interest, relationship or
                                        arrangement that is material in relation to any Commodity Contract effected under this
                                        Agreement. By entering into this Agreement the Customer agrees that J JMI Brokers LTD
                                        may transact such business without prior reference to the Customer. In addition, JMI
                                        Brokers LTD may provide advice and other services to third parties whose interests maybe
                                        in conflict or competition with the Customer’s interests JMI Brokers LTD , its
                                        Associates and the employees of any of them may take positions opposite to the Customer
                                        or maybe in competition with the Customer to acquire the same or a similar position. JMI
                                        Brokers LTD will not deliberately favor any person over the customer but will not be
                                        responsible for any loss which may result from such competition</p>
                                    <h5 class="blue">21. BINDING EFFECT OF AGREEMENT; MODIFICATIONS</h5>
                                    <p>This agreement shall be binding upon and inure to the benefit of JMI Brokers LTD ,its
                                        successors and assigns, and Customer’s heirs, executors, administrators, legatees,
                                        successors, personal representatives and assigns. Except as provided in paragraph 2, no
                                        change in or waiver of any provision of this agreement shall be binding unless it is in
                                        writing, dated subsequent to the date hereof, and signed by the party intended to be
                                        bound. No agreement or understanding of any kind shall be binding upon JMI Brokers LTD
                                        unless it is agreed to in writing, accepted and signed by an authorized officer.</p>
                                    <h5 class="blue">22. FORCE MAJEURE EVENTS</h5>
                                    <p class="bold">We may, in our reasonable opinion, determine that an emergency or an
                                        exceptional market condition exists (a “Force Majeure Event”). A Force Majeure Event
                                        shall include, but is not limited to, the following:</p>
                                    <ul>
                                        <li>Any act, event or occurrence (including without limitation any strike, riot or
                                            commotion, interruption or power supply or electronic or communication equipment
                                            failure) which, in our opinion, prevents us from maintaining an orderly market in
                                            one or more of the investments in respects of which we ordinarily deal in Commodity
                                            Contracts</li>
                                        <li>The suspension or closure of any market or the abandonment or failure of any event
                                            upon which we base, or to which we in any way relate, our quote, or the imposition
                                            of limits or special or unusual terms on the trading in any such market or on any
                                            such event;</li>
                                        <li>The occurrence of an excessive movement in the level of any Commodity Contract
                                            and/or the underlying market or our anticipation (acting reasonably) of the
                                            occurrence of such movements.</li>
                                    </ul>
                                    <p class="left ">If we determine that a Force Majeure Event exists we may in our absolute
                                        is creation without notice and at any time take one or more of the following steps:</p>
                                    <ul>
                                        <li>Increase your deposit requirements; close any or all of your open Commodity
                                            Contracts at such closing level as we reasonably believe to be appropriate.</li>
                                        <li>Suspend or modify the application of all or any of the terms of this agreement. to
                                            the extent that the Force Majeure Event makes it impossible or impracticable for us
                                            to comply with the term or terms in question;</li>
                                        <li>OR alter the last time for trading for particular Commodity Contract.</li>
                                    </ul>
                                    <h5 class="blue">23. HEADINGS</h5>
                                    <p class="left ">The headings of each provision are for descriptive purposes only and
                                        shall not be deemed to modify or qualify any of the rights or obligations set forth in
                                        each provision.</p>
                                    <h5 class="blue">24. GOVERNING LAW</h5>
                                    <p class="left ">This agreement shall be governed by the laws of Republic of Vanuatu ,
                                        regardless of form, arising out of transactions under this agreement maybe brought by
                                        customer more than three months after the cause of action arose.</p>
                                    <h5 class="blue">25. ACCEPTANCE OF AGREEMENT</h5>
                                    <p class="left ">This agreement shall constitute an effective contract between JMI and
                                        Customer upon acceptance by an authorized officer of JMI.</p>
                                    <h5 class="blue">26. MULTIPLE ACCOUNTS</h5>
                                    <p class="left ">Customer agrees that JMI Brokers LTD may, from time to time, change the
                                        account number assigned to any account covered by this agreement, and that this
                                        agreement shall remain in full force and effect.</p>
                                    <p class="left ">Customer agrees further that this account, if closed and reopened, as
                                        well as all additional accounts opened in Customer’s name at JMI, shall be covered by
                                        this same agreement with the exception of any account for which a new customer agreement
                                        is signed.</p>
                                    <h5 class="blue">27. ASSIGNMENT</h5>
                                    <p class="left ">JMI may assign Customer’s account to another registered futures
                                        commission merchant by notifying Customer of the date and name of the intended assignee
                                        ten (10) days prior to the assignment. Unless Customer objects to the assignment in
                                        writing prior to the scheduled date for assignment, the assignment will be binding on
                                        Customer.</p>
                                    <h5 class="blue">28. CUSTOMER ACKNOWLEDGMENTS AND SIGNATURE</h5>
                                    <p class="left ">Customer hereby understands the Customer Account Agreement and consents
                                        and agrees to all of the terms and conditions of the agreement set forth above. Customer
                                        acknowledges that trading in Commodity Contracts is speculative, involves a high degree
                                        of risk and is appropriate only for persons who can assume risk of loss in excess of
                                        their margin deposits.</p>
                                    <h5 class=" left">Online Access Agreement</h5>
                                    <p>This agreement sets forth the terms and conditions under which we, JMI Brokers LTD ,shall
                                        permit you to have access to one or more terminals, including terminal access through
                                        your internet browser, for the electronic transmission of orders and \ or transactions,
                                        for your accounts with us. </p>
                                    <p class="left ">This agreement also sets forth the terms and conditions under which we
                                        shall permit you electronically to monitor the activity, orders and\or transactions in
                                        your account (collectively, the “Online Service”). For purposes of this Agreement the
                                        term “Online Service” includes all software and communication links, and in
                                        consideration thereof, Customer agrees to the following:</p>
                                    <h5 class="blue">1. LICENSE GRANT AND RIGHT OF USE</h5>
                                    <p>By this Agreement, where we are supplying you with software for use with the Online
                                        Service, you may use the software solely for your own internal business purposes.
                                        Neither the software not the Online Service maybe used to provide third party training
                                        or as a service bureau for any third parties. You agree to use the Online Service and
                                        the software strictly in accordance with the terms and conditions of JMI Brokers LTD
                                        Customer Account Agreement, as amended from time to time. You also agree to be bound by
                                        any rules, procedures and conditions established by JMI Brokers LTD concerning the use
                                        of the Online Service provided by JMI Brokers LTD</p>
                                    <h5 class="blue">2. ACCESS AND SECURITY</h5>
                                    <p>The Online Service maybe used to transmit, received and confirms execution of orders,
                                        subject to prevailing market conditions and applicable rules and regulations.</p>
                                    <p class="left "> JMI Brokers LTD consent to your access and use in reliance upon your
                                        having adopted procedures to prevent unauthorized access to and use of the Online
                                        Service, and in any event, you agree to any financial liability for trades executed
                                        through the Online Service. You acknowledge, represent and warrant that:</p>
                                    <ul>
                                        <li>A) You have received a number, code or other sequence which provides access to the
                                            Online Service (the “Password”).</li>
                                        <li>B) You are the sole and exclusive owner of the password.</li>
                                        <li>C) You are the sole and exclusive owner of any identification number or Login
                                            number(the “Login”). </li>
                                        <li>D) You accept full responsibility for use and protection of the Password and the
                                            Login as well as or any transaction occurring in account opened, held or accessed
                                            hrough the Login and \ or Password. You accept responsibility for the monitoring of
                                            your account(s).</li>
                                        <li>You will immediately notify JMI Brokers LTD in writing if you become aware of any of
                                            the following:</li>
                                        <li>A) Any loss, theft or unauthorized use of your Password(s), Login and\or account
                                            number(s).</li>
                                        <li>B) Any failure by you to receive a massage indicating that an order was received
                                            and\or executed.</li>
                                        <li>C) Any failure by you to receive an accurate confirmation of an execution.</li>
                                        <li>D) Any receipt of confirmation of an order and\or execution which you did not place.
                                        </li>
                                        <li>E) Any inaccurate information in your account balances, positions, or transaction
                                            history.</li>
                                    </ul>
                                    <h5 class="blue">3. RISKS OF ONLINE TRADING</h5>
                                    <p>Your access to the Online Service, or any portion thereof, maybe restricted or
                                        unavailable during periods of peak demands, extreme market volatility, systems upgrades
                                        or other reasons.</p>
                                    <p>JMI Brokers LTD makes no express or implied representations or warranties to you
                                        regarding the usability, condition or operation thereof. We do not warrant that access
                                        to or use of the Online Service will be uninterrupted or error free or that the Online
                                        Service will meet any particular criteria of performance or quality. Under no
                                        circumstances including negligence, shall JMI Brokers LTD or anyone else involved in
                                        creating, producing, delivering or managing that Online Service be liable for any
                                        direct, indirect incidental, special or consequential damages that result from the use
                                        of or inability to use the Online Service, or out of any breech of any warranty,
                                        including, without limitation, those for business interruption or loss of profits. You
                                        expressly agree that your use of the Online Service is of your sole risk, you assume
                                        full responsibility and risk of loss resulting from use of, or materials obtained
                                        through, the Online Service, neither we nor any of our directors, officers, employees
                                        ,agents, contractors, affiliates, third party vendors, facilities, information
                                        providers, licensors, exchanges, clearing organizations or other suppliers providing
                                        data, information, or services, warrant that the Online Service will be uninterrupted or
                                        error free; nor do we make any warranty as to the results that maybe obtained from the
                                        use of the Online Service or as to the timeliness, sequence, accuracy, completeness,
                                        reliability or content of any information, service, or transaction provided through the
                                        Online Service. In the event that your access to the Online Service, or any portion
                                        thereof, is restricted unavailable, you agree to use other means to place your orders or
                                        access information, such as calling JMI Brokers LTD representative. By placing an order
                                        through the Online Service, you acknowledge that your order may not be reviewed by a
                                        registered representative prior to execution, you agree that JMI Brokers LTD is not
                                        liable to you for any losses, lost opportunities or increased commissions that may
                                        result from your inability to use the Online Service to place order or access
                                        information.</p>
                                    <h5 class="blue">4. MARKET DATA AND INFORMATION</h5>
                                    <p>Neither we nor any provider shall be liable in any way to you or to any other person for:
                                        a) Any inaccuracy, error or delay in, or omission of any such data, information or
                                        message or the transmission or delivery of any such data, information or message; or b)
                                        Any loss or damage arising from or occasioned by any such inaccuracy, error, delay,
                                        omission, non-performance, interruption in any such data, information or message, due to
                                        either to any negligent act or omission or to any condition of force majeure or any
                                        other cause , whether or not within our or any provider’s control. We shall not be
                                        deemed to have received any order or communication transmitted electronically by you
                                        until we have actual knowledge of such order or communication</p>
                                    <h5 class="blue">5. ADDITIONAL IMPORTANT INFORMATION AND DISCLAIMERS REGARDING EXPERT
                                        ADVISORS</h5>
                                    <p>The expert advisors are intended merely as a tool for implementing technical ideas that
                                        can be incorporated into a personally designed trading strategy or system for
                                        experienced traders only. No support, technical, advisory or otherwise, is offered by
                                        JMI Brokers LTD in their usage. Use of the Expert Advisors is entirely at your own risk
                                        and you acknowledge & understand that JMI Brokers LTD make no warranties or
                                        representations concerning the use of Expert Advisors and that JMI Brokers LTD . Does
                                        not, by implication or otherwise, endorse or approve of the use of the Expert Advisors &
                                        shall not be responsible for any loss to you occasioned by their usage.</p>
                                    <h5 class="blue">6. REPRESENTATIONS</h5>
                                    <p>You acknowledge that from time to time, and for any reason, the Online Service may not be
                                        operational or otherwise unavailable for your use due to servicing, hardware
                                        malfunction, software defect, service or transmission interruption or other cause, and
                                        you agree to hold us and any provider harmless from liability of any damage which
                                        results from the unavailability of the Online Service. You acknowledge that you have
                                        alternative arrangements which will remain in place for the transmission and execution
                                        of your orders, in the event, for any reason, circumstances prevent the transmission and
                                        execution of all, or any portion of, your orders through the Online Service. You
                                        represent and warrant that you are fully authorized to inter this Agreement and under no
                                        legal disability which prevent you from trading and that you are & shall remain in
                                        compliance with all laws, rules and regulations applicable to your business. You agree
                                        that you are familiar with and will abide by any rules or procedures adopted by us and
                                        any provider in connection with use of the Online Service & you have provided necessary
                                        training in its use. You shall not (and shall not permit any third party) to copy, use
                                        analyze, modify, decompile, disassemble, reverse engineer, translate or convert any
                                        software provided to you in connection with use of the Online Service or distribute the
                                        software or the Online Service to any other third party.</p>
                                    <h5 class="blue">7. TERMINATION</h5>
                                    <p>We may, at our sole discretion, terminate or restrict your access to the Online Service
                                        and may terminate this Agreement at any time. Upon termination, any software license
                                        granted to you herein shall automatically terminate.</p>
                                    <h5 class="blue">8. INDEMNITY</h5>
                                    <p>You agree to indemnify & hold harmless us & each provider & their respective principles,
                                        Affiliates &agents from and against all claims, demands, proceedings, suits and all
                                        losses (direct, indirect or otherwise), liabilities costs and expenses (including
                                        attorney fees and disbursements),paid in settlement, incurred or suffered by us and\or a
                                        providers and\or our or their respective principals, affiliates & agents arising from or
                                        relating to your use of the Online Service or the transactions contemplated hereunder.
                                        This indemnity provision shall survive termination of this Agreement.</p>
                                    <h5 class="blue">9. MISCELLANEOUS</h5>
                                    <p>You may not amend the terms of this Agreement. We may amend the terms of this Agreement
                                        upon notice to you (including electronic delivery). By continued access to and use of
                                        the Online Service, you agree to any such amendments to this Agreement. This Agreement
                                        us the entire Agreement between the parties relating to the subject hereof, and, except
                                        with respect to the Customer Account Agreement between the parties, all prior
                                        negotiations and understandings between the parties, whether written or oral, are hereby
                                        merged into this Agreement. Nothing in this Agreement shall be deemed to supersede or
                                        modify a party’s right and obligations under the Agreement</p>
                                    <div class="contacatAera">
                                        <h5> Contact us</h5>
                                        <p class="bold blue">JMI Brokers LTD</p>
                                        <ul id="bottomUl">
                                            <li>Address: <span>1276, Govant Building, Kumul Highway, Port Vila, Republic of
                                                    Vanuatu:</span></li>
                                            <li>Phone no: <span>+678 24404</span></li>
                                            <li>Fax no: <span>+678 23693</span></li>
                                            <li>Website: <span><a
                                                        href="https://www.jmibrokers.com">www.jmibrokers.com</a></span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="pt-3">
                                    <label for="iagree" class="iagreecheck"><input type="checkbox" value="0" required
                                            id="iagree"> I agree the terms and conditions</label>
                                </div>

                                <div class="controls">
                                    <input type="number" class="form-control" name="account_radio_type" value="1"
                                        required style="display:none;" />
                                </div>

                                <button type="submit" id="submit" value="Open Account" class="sm">
                                    <i class="far fa-long-arrow-alt-right me-3"></i>
                                    Open Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CONTENT AREA END --}}
        {!! Form::close() !!}
    <?php } ?>
@stop
