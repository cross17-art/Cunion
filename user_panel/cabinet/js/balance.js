
balance = {
    coins: [],
    labels: [],
    colors: [],
    availableActives : [],

    availableUSDT : 0,
    onOrderUSDT : 0,

    history : {},
    serverPrices : {},
    serverBalanceData: {},

    kucoinBalanceHistory: [],

    ComposeBalance : function(data, prices){
        console.log("Try to compose the balance from data");
        console.log(data);

        this.serverBalanceData = data;
        this.serverPrices = prices;

        this.coins = [];
        this.labels = [];
        this.colors = [];
        this.actives =[];

        Object.entries(data).forEach(entry => {
            const [key, value] = entry;
            if(value.available > 0){
                if(key != "USDT"){
                    this.availableActives.push({"active" : key, "balance" : value.available, "price": prices[key + "USDT"]})
                } else {
                    this.availableUSDT = value.available;
                    this.onOrderUSDT = value.onOrder;
                }
            }
        });

        this.availableActives.forEach((coin) => {
            this.coins.push(coin.balance * coin.price);
            this.labels.push(coin.active);
            this.actives.push(coin.balance);
        });
        this.ComposeColors(this.availableActives.length);
    },

    ComposeColors : function (length){
        for(let i=allColors.length; i<length+allColors.length; i++){
            balance.colors.push(allColors[i%allColors.length])
        }
    },

    GetSymbolsPair : function (){
        let symbolPairs = "";

        balance.availableActives.forEach((active, index) => {
            symbolPairs += active.active + "USDT" + (index < balance.availableActives.length-1 ? "," : "");
        })
        return symbolPairs;
    },

    ComposeHistoryBalance : function (historyBalanceData){
        console.log("Try to compose Balance History", balance)
        balance.history = historyBalanceData.balance;
    }
};

var allColors = ["#3f80ea", "#d9534f", "#ec9c13", "#4bbf73", "#d9534f"];