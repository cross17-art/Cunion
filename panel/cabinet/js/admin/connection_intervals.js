class ConnectionIntervalsHandler {

    connectionRecords = [];
    connectionIntervals = [];

    GetConnectionRecords = async () => {
        return this.connectionRecords = await fetch('https://cunion.io/panel/cabinet/php_scripts/get_connection_records.php')
            .then((rsp)=>{
                return rsp.json();
            }).then((data)=>{
                if(data.status == 'success'){
                    this.connectionRecords = data.connection_records;
                    return data.connection_records;
                } else {
                    console.log("Some error while getting the connection intervalss records")
                    return null;
                }
            }).catch((err)=>{
                console.log("Critical error while getting the connection intervalss records")
                return null;
            })
    };

    CalculateConnectionIntervals = (connectionRecords) => {

    }

}

connection_intervals_handler = new ConnectionIntervalsHandler();