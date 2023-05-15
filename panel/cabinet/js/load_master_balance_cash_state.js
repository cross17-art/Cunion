MasterBalanceCashLoader = class {
    masters = [];

    Init = async () => {

        this.masters = await this.LoadAllMastersPortfolio();
        this.DisplayAllInvestmentPortfolio();
    };

    LoadAllMastersPortfolio = async () => {

        let url = "load_masters_porfolio.php"; // TODO
        let result = fetch(url).then((rsp) => {
            return rsp.json()
        }).then((data) => {
            console.log("Portfoli:" + data);
            return data.masters_portfolio;
        }).catch((err) => {
            console.log("LoadAllMastersPortfolio", err)
        })
    };

    DisplayAllInvestmentPortfolio = () => {

    }

};

const masterBalanceCashLoader = new MasterBalanceCashLoader();
masterBalanceCashLoader.Init();