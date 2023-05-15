class TrdTimer {
    startDate = '09/01/2021';

    Init(){
        setInterval(()=>{
            let pastMonth = this.GetPastMonth();
            let pastDays = this.GetPastDays();
            let pastHours = this.GetPastHours();
            let pastMinutes = this.GetPastMinutes()
            let pastSeconds = this.GetPastSeconds();

            document.querySelector('.countdown-time[timer_days]').innerHTML = pastDays;
            document.querySelector('.countdown-time[timer_hours]').innerHTML = pastHours;
            document.querySelector('.countdown-time[timer_minutes]').innerHTML = pastMinutes;
            document.querySelector('.countdown-time[timer_seconds]').innerHTML = pastSeconds;
            document.querySelector('.countdown-time[timer_month]').innerHTML = pastMonth;
        }, 1000)
    }

    PastTime() {
        return Date.now() - new Date(this.startDate).getTime()
    }

    //--- Month

    GetPastMonth(){
        return parseInt(this.PastTime() / 1000 / 60 / 60 / 24 / 30);
    }

    GetPastMonthInMilliseconds(){
        return this.GetPastMonth() * 30 * 24 * 60 * 60 * 1000;
    }

    //--- Days
    GetPastDays() {
        return parseInt((this.PastTime() - this.GetPastMonthInMilliseconds()) / 1000 / 60 / 60 / 24);
    }

    GetPastDaysInMilliseconds(){
        return this.GetPastDays() * 24 * 60 * 60 * 1000;
    }

    //--- Hours
    GetPastHours() {
        return parseInt((this.PastTime() - this.GetPastMonthInMilliseconds() - this.GetPastDaysInMilliseconds()) / 1000 / 60 / 60);
    }

    GetPastHoursInMilliseconds(){
        return this.GetPastHours() * 60 * 60 * 1000;
    }

    //--- Minutes
    GetPastMinutes() {
        return parseInt((this.PastTime() - this.GetPastMonthInMilliseconds() - this.GetPastDaysInMilliseconds() - this.GetPastHoursInMilliseconds()) / 1000 / 60);
    }

    GetPastMinutesInMilliseconds(){
        return this.GetPastMinutes() * 1000 * 60;
    }

    //--- Seconds
    GetPastSeconds() {
        return parseInt((this.PastTime() - this.GetPastMonthInMilliseconds() - this.GetPastDaysInMilliseconds() - this.GetPastHoursInMilliseconds() - this.GetPastMinutesInMilliseconds()) / 1000)
    }
}

const trd_timer = new TrdTimer();
document.addEventListener("DOMContentLoaded", ()=> {
    trd_timer.Init();
})