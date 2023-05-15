class DateHandler {

    Format(date, deviationHours = 0){

        //deviation param - mileseconds deviation if needed

        let time = new Date(new Date(date).setHours(new Date(date).getHours() + deviationHours));
        let hours = time.getHours();
        let minutes = time.getMinutes();
        let seconds = time.getSeconds();
        let formatTime =
            time.getFullYear() + "/" +
            ((time.getMonth()+1) < 10 ? "0" + (time.getMonth() + 1) : (time.getMonth() + 1)) + "/" +
            (time.getDate() < 10 ? "0" + time.getDate() : time.getDate()) + " " +
            (hours < 10 ? "0" + hours : hours) + ":" +
            (minutes < 10 ? "0" + minutes : minutes) + ":" +
            (seconds < 10 ? "0" + seconds : seconds);
        return formatTime

    }


    FormatDMY(date){
        let time = new Date(date);

        let formatTime =
            time.getFullYear() + "/" +
            ((time.getMonth()+1) < 10 ? "0" + (time.getMonth() + 1) : (time.getMonth() + 1)) + "/" +
            (time.getDate() < 10 ? "0" + time.getDate() : time.getDate());
        return formatTime

    }

    GetStartOfTheDay(date){
        let time = new Date(date);
        let Month = time.getUTCMonth() + 1;
        let Day = time.getUTCDate();
        let Year = time.getUTCFullYear();

        return new Date(Month + "/" + Day + "/" + Year);
    }

}

date_handler = new DateHandler()