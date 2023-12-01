
jQuery(function() {
    pricetickerInit();
    jQuery(".pricesWrapperLine").simplyScroll({'speed': 0});
});

function pricetickerInit() {
    var wRect = $('#pricesWrapperRect'),
    wLine = $('.pricesWrapperLine'),
    options = {
        target: '#pricesWrapperRect',
        hideSpread: true,
        expand: true,
        /*group: 'Forex Majors, Forex, CHF cross, US Shares, UK Shares, German Shares, French Shares, Energy Futures, Spot Indices, Gold, Silver',*/
        group: 'Forex Majors, Forex, Gold, Silver, CHF cross',
        //debug: true,
        groupTitle: true
    };
    if(wRect.length) {
        if(wRect.hasClass('size-2')) {
            options.hideCredit = true;
            options.expand = false;
            //options.hidePips = true;
            options.hideSearch = true;
        }
        
        options.callback = groupControl;
        //options.onTick = tickCallback;
        prices = new PriceFeed(options);
    }
    if(wLine.length) {
        options.target = '.pricesWrapperLine';
        options.isLine = true;
        options.expand = false;
        options.group = 'Forex Majors, Forex, Gold, Silver, CHF cross';
        prices = new PriceFeed(options);
    }
}

function tickCallback(tick) {
    //console.log(tick);
    // do something with tick
}

function groupControl() {
    $('tr.groupControl td').on('click', function() {
        var rowClass = '.' + $(this).attr('id');

        if ($(this).hasClass('active')) {
            $(rowClass).each(function() {
                if (!$(this).hasClass('hide')) {
                    $(this).addClass('hide');
                }
            });

            $(this).removeClass('active');
        } else {

            $(rowClass).each(function() {
                if (!$(this).hasClass('filter-hide')) {
                    $(this).removeClass('hide');
                }
            });

            $(this).addClass('active');
        }
    });
}

var PriceFeed = (function(params) {
    var params = params || {},
    config = {
        target: params.target || '#prices',
        address: params.address || 'wss://ws-pq.fxpro.com:443/jms',
        queue: params.queue || '/queue/request.quotes.queue',
        type: 100,
        log: params.debug || false,
        expand: params.expand || false,
        hidePips: params.hidePips || false,
        hideCredit: params.hideCredit || false,
        hideSearch: params.hideSearch || false,
        hideSpread: params.hideSpread || false,
        groupTitle: params.groupTitle || false,
        group: params.group || '',
        callback: params.callback || function(){},
        onTick: params.onTick || null,
        assets: params.assets || '/pricefeed/',
        isLine: params.isLine || false
    },
    selectedSymbol = null,
    globalCounter = {};
    
    var HTML = '<div class="tPrices">';
    
    if(config.isLine === true) { 
        var HTML = '{rows}';
    }
    else {
        if(config.hideSearch === false) { HTML += '<input maxlength="6" style="display:none;" id="filterQuotes" placeholder="Search...">'; }
        if(config.hideCredit === false) { HTML += '<span class="pricePoweredBy" style="display:none;"><a href="' + ibLink + '" target="_blank">Powered by FxPro</a></span>'; }    
        HTML += '<table class="prices" style="margin:0 auto;">';
        HTML += '<thead><tr><th class="first">Symbol</th>';
        if(config.hidePips === false) { HTML += '<th class="pips"  style="display:none;">Change</th>'; }
        HTML += '<th  style="display:none;">Bid</th>';
        HTML += '<th>Price</th>';
        if(config.hideSpread === false) { HTML += '<th class="spread">Spread</th>'; }
        HTML += '</thead><tbody>{rows}';
        HTML += '</tbody></table></div>';
        
        // box HTML
        var BOX_HTML = '<table class="boxTable" style="display:none;"><tbody>';
        BOX_HTML += '<tr class="ohl"><td class="o"><span>O: {o}</span>';
        BOX_HTML += '<td class="h"><span>H: {h}</span></td><td class="l"><span>L: {l}</span></td></tr>';
        BOX_HTML += '<tr class="askbid {c}"><td colspan="5">';
        BOX_HTML += '<div class="boxWrapper">';
        BOX_HTML += '<div class="bid"><Strong>{b}</strong>';
        BOX_HTML += '<small>Sell</small></div>';
        BOX_HTML += '<div class="ask"><Strong>{a}</strong>';
        BOX_HTML += '<small>Buy</small></div>';
        BOX_HTML += '<div class="spread"><span>S:{s}</span></div></div></td>';
        BOX_HTML += '</tr>';
        BOX_HTML += '</tbody></table>';
    }
    
    // Create a variable to store the connection            
    var connection = null,
    // last prices
    lastPrices = {},
    
    // append rows or create table
    append = false;

    function PriceFeed() {
        beginConnection(config.address);
    }
    
    PriceFeed.prototype.quotes = function() {
        return lastPrices;
    };
    
    /*
     Create a function for creating a session and setting up 
     Topics, Queues, Consumers, Providers, and Listeners.
     The following function is called when the connection has been created
     but before starting the flow of data. 
     */
    function setUp() {
        // Typical session options shown.
        session = connection.createSession(false, Session.AUTO_ACKNOWLEDGE);

        // Add your code here to set up Topics, Queues, Consumers, Providers, and Listeners
        var queue = session.createQueue(config.queue);
        createProducers(queue, config.group);
    }

    // The following function is called when the connection is ready to use and data is flowing.
    function connectionStarted() {
        log('connection started');
        setUp();
    }

    // This function is called from the index.html page when the page loads
    function beginConnection(url) {
        if (connection) {
            connectionStarted();
        } else {
            var factory = new JmsConnectionFactory(url);
            var future = factory.createConnection('', '', function() {
                try {
                    connection = future.getValue();
                    connection.start(connectionStarted);
                } catch (e) {
                    //alert(e.message);
                }
            });
        }
    }

    /**
     * groups is a coma seperated groups names
     * 
     * @param {object} queue
     * @param {string} groups
     * @returns {undefined}
     */
    function createProducers(queue, groups) {
        var groups = groups.split(","),
                producers = [],
                consumers = [],
                messages = [],
                topics = [];

        for (var i = 0; i < groups.length; i++) {
            producers[i] = session.createProducer(queue);
            topics[i] = session.createTemporaryTopic();
            consumers[i] = session.createConsumer(topics[i]);
            consumers[i].setMessageListener(function(data) {
                data = JSON.parse(data.getText());
                makeTable(data);
                setUpPriceConsumer(data);
            });

            messageBody = { Group: groups[i].trim() };
            messages[i] = session.createTextMessage(JSON.stringify(messageBody));
            log(messageBody);

            messages[i].setJMSCorrelationID(Math.random().toString());
            messages[i].setJMSReplyTo(topics[i]);
            messages[i].setJMSType('100');
            producers[i].send(messages[i], function() {});
        }
    }

    function log(message) {
        if (config.log === true) {
            if (typeof console === 'undefined') { alert(message); }
            else { console.log(message); }
        }
    }

    /**
     * 
     * @param {json} data
     * @returns {undefined}
     */
    function onPriceMessage(data) {
        data = JSON.parse(data.getText());
        
        if(typeof globalCounter[data.S] === 'undefined') { globalCounter[data.S] = 0; }
        else if(globalCounter[data.S]++ < 10) { return; }
        else { globalCounter[data.S] = 0; }
        
        // give data to callback function
        if(typeof config.onTick === 'function') { config.onTick(data); }
        updateDom(data);
    }

    /**
     * 
     * @param {object} data
     * @returns {undefined}
     */
    function setUpPriceConsumer(data) {
        log(data);
        var topic = session.createTopic("/topic/" + data.PriceTopic),
            consumer = session.createConsumer(topic);
        consumer.setMessageListener(onPriceMessage);
    }

    /**
     * 
     * @param {object} data
     * @returns {undefined}
     */
    function makeTable(data) {
        var element = document.querySelector(config.target);

        if (element === null) {
            log('element' + config.target + " Doesn't exist");
            connection.close();
            return;
        }

        var rows = '',
            groups = [];

        for (var i = 0; i < data.Prices.length; i++) {
            var item = data.Prices[i];

            // if wants to show group titles
            if(!config.isLine && config.groupTitle) {
                if(groups.indexOf(item.G) === -1) {
                    rows += '<tr class="groupControl"><td class="active" id="'+item.G.replace(/\#|\s/, '')+'" colspan="5">'+item.G+'</td></tr>';
                    groups.push(item.G);
                }
            }
            item.S = item.S.replace('#', '');

            // if this is a future symbol
            if (item.S.indexOf('#')) { item["type"] = 'future'; }
            if (!item.A || !item.S) { continue; }
            item.multiplier = getMultiplier(item.A);
            lastPrices[item.S] = item;

            if(config.isLine) {
                rows += '<p id="' + item.S.replace('#', '') + '">' + '<span style="display:block;" class="name">' + item.S + '</span> '; 
                rows += '<span class="bid" style="display:none;">' + item.B + '</span>'; 
                rows += '<span style="margin-top:20px;" class="ask">' + item.A + '</span></p>'; 
            }
            else {
                rows += '<tr class="item '+item.G.replace(/\#|\s/, '')+'" id="' + item.S.replace('#', '') + '">';
                rows += '<td style="margin-left:10px" class="name">' + item.S + '</td>';
                if(config.hidePips === false) { rows += '<td class="pips " style="display:none;">' + getChange(item) + ' (' + item['CHG%'] + '%)</td>'; }
                rows += '<td class="bid"  style="display:none;">' + item.B + '</td>';
                rows += '<td style="margin-top:20px;" class="ask">' + item.A + '</td>';
                if (config.hideSpread === false) { rows += '<td class="spread">' + getSpread(item) + '</td>'; }
                rows += '<td class="box" colspan="5"></td></tr>';
            }
        }

        if (append === false) {
            element.innerHTML = HTML.replace('{rows}', rows);
            append = true;
        }
        else {
            if(config.isLine === true) { $('.pricesWrapperLine').append(+rows); }
            else { element.querySelector('tbody').innerHTML += rows; }
        }
        if (config.expand === true) { addEvenetsListeners(); }
        config.callback();
    }

    function updateDom(pair) {
        log(pair);
        var elementID = '#' + pair.S.replace('#', ''),
            element = document.querySelector(elementID);

        if (typeof element === null) { return; }

        if (pair.A > lastPrices[pair.S].A) {
            $(elementID).removeClass('down no-change').addClass('up');
        } else if (pair.A < lastPrices[pair.S].A) {
            $(elementID).removeClass('up no-change').addClass('down');
        } else {
            $(elementID).addClass('no-change');
        }

        // change td class and value
        if(!config.isLine) { var pipTd = document.querySelector(elementID + ' .pips'); }
        
        var span = '';

        if (pair.CHG === lastPrices[pair.S].CHG) { span = '<span class="no-change">'; }
        else if (pair.CHG > 0) { span = '<span class="up">'; }
        else { span = '<span class="down">'; }

        if(!config.isLine) { pipTd.innerHTML = span + getChange(pair) + ' (' + pair["CHG%"] + '%)</span>'; }

        document.querySelector(elementID + ' .bid').textContent = pair.B;
        document.querySelector(elementID + ' .ask').textContent = pair.A;

        try {
            document.querySelector(elementID + ' .spread').textContent = getSpread(pair);
        } catch (e) {
            log('No element: ' + elementID + ' .spread');
        }

        // update Box
        if (document.querySelector('tr.box')) {
            if (pair.S === selectedSymbol) {
                fillBox(pair);
            }
        }

        // update last price
        mCopy = lastPrices[pair.S].multiplier;
        lastPrices[pair.S] = pair;
        lastPrices[pair.S].multiplier = mCopy;

    }

    function getMultiplier(digits) {
        var d = digits.toString(),
            pieces = d.split(/\./);

        if (pieces.length < 1) { }
        else { var multiplier = pieces[1].length; }

        switch (multiplier) {
            case 6: return 100000;
            case 5: return 10000;
            case 4: return 1000;
            case 3: return 100;
            case 2: return 10;
            default: return 1;
        }
    }

    function getChange(pair) {
        return pair.CHG;
    }

    function getSpread(pair) {
        return pair.SPR;
    }

    function addEvenetsListeners() {
        var trs = document.querySelectorAll('tbody tr.item');

        for (var i = 0; i < trs.length; i++) {
            trs[i].addEventListener('click', function() {

                try {
                    $('tr.expanded').removeClass('expanded');
                } catch (e) {
                    log(e.Message);
                }

                // remove any expanded box if available
                try {
                    this.parentNode.removeChild(document.querySelector('tr.box'));
                } catch (e) {
                    log(e.message);
                }

                // build the expanded box
                this.className = this.className + ' expanded';

                if (this.id === selectedSymbol) {
                    selectedSymbol = null;
                    $('#' + this.id).removeClass('expanded');
                    return;
                }

                // create the dynamic box
                selectedSymbol = this.id;
                createBox(lastPrices[this.id], this);

            }.bind(trs[i]));
        }

        try {
            var searchInput = document.querySelector('#filterQuotes');
            searchInput.onkeyup = function() {
                filterSymbols(searchInput.value);
            };

        } catch (e) {
            log(e.message);
        }

    }

    function filterSymbols(str) {
        var trs = document.querySelectorAll('tbody tr');
        for (var i = 0; i < trs.length; i++) {
            if (typeof trs[i].id === 'undefined') { continue; }

            var id = '#' + trs[i].id;
            if (trs[i].id.match(str.toUpperCase()) === null) {
                $(id).addClass('hide filter-hide');
            } else {
                $(id).removeClass('hide filter-hide');
            }
        }
    }

    function insertAfter(referenceNode, newNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    function createBox(pair, tr) {
        var box = document.createElement('tr');
        box.className = 'box ' + pair.G.replace(/\#|\s/, '');
        var boxTd = document.createElement('td');
        boxTd.setAttribute('colspan', 5);
        box.appendChild(boxTd);

        // add and fill box to DOM
        insertAfter(tr, box);
        fillBox(pair);

    }

    function fillBox(pair) {
        var trClass = '';
        if (pair.A > lastPrices[pair.S].A) { trClass = 'up'; }
        else if (pair.A < lastPrices[pair.S].A) { trClass = 'down'; }
        else { trClass = 'no-change'; }

        var html = BOX_HTML.replace('{o}', pair.DO)
            .replace('{c}', trClass)
            .replace('{s}', getSpread(pair))
            .replace('{l}', pair.DL)
            .replace('{b}', mixedSizeDigits(pair.B))
            .replace('{a}', mixedSizeDigits(pair.A))
            .replace('{h}', pair.DH);

        document.querySelector('tr.box td').innerHTML = html;
    }

    function mixedSizeDigits(digits) {
        var d = digits.toString(),
            newDigits = '';

        newDigits += d.slice(0, d.length - 1);
        newDigits += '<b class="small">' + d.slice(-1) + '</b>';

        return newDigits;

    }

    return new PriceFeed(params);
});

