class TrdMetrika {
    id;

    Init(_ymId){
        this.id = _ymId;

        document.querySelectorAll('[ya-goal]').forEach((elem) => {
            const element = elem;
            elem.addEventListener('click', (event)=>{
                let yaGoal = element.getAttribute('ya-goal');
                this.SendYAGoal(yaGoal);
            })
        })

    }

    SendYAGoal = (goalTitle) => {
        console.log(goalTitle)
        ym(this.id,'reachGoal',goalTitle);
    }
}

const trd_metrika = new TrdMetrika();
