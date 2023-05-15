class MasterTableSorter{

    sorterElems = [];

    Init = async () => {
        await totalInvestLoader.totalInvestmentsPromise;
        await masterBalanceHistoryLoader.masterBalanceHistoryPromise;
        console.log("---> Investments Loaded");
        this.SortMasterTable();
    };

    SortMasterTable = () => {
        var elemArray = [];
        document.querySelectorAll('[master-template-tr]').forEach((elem)=>{
            elemArray.push(elem)
        })
        elemArray.sort((a,b) => {
            if(a.querySelector('[sort_stat]') != undefined && b.querySelector('[sort_stat]') != undefined){
                let sort_stat_a = parseFloat(a.querySelector('[sort_stat]').getAttribute('sort_stat'));
                let sort_stat_b = parseFloat(b.querySelector('[sort_stat]').getAttribute('sort_stat'))
                if(sort_stat_a != undefined && sort_stat_b != undefined){
                    if( sort_stat_a > sort_stat_b )
                        return -1;
                }
            }
        })

        this.sorterElems = elemArray;
        this.DisplaySortedElems(this.sorterElems);
    }

    DisplaySortedElems = (sortedElemArray) => {
        let tBody = document.querySelector('table[master-table] > tbody')
        sortedElemArray.forEach((elem) => {
             tBody.appendChild(elem);
        })
    }
}

