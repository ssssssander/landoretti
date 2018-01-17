<script>
    let remainingTimeElems = document.getElementsByClassName('remaining-time');

    for(let i = 0; i < remainingTimeElems.length; i++) {
        let countDownDate = new Date(remainingTimeElems[i].getAttribute('data-end-date')).getTime();

        if(!countDownDate) {
            continue;
        }

        let now = new Date().getTime();
        let distance = countDownDate - now;

        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

        remainingTimeElems[i].innerHTML = days + 'd ' + hours + 'h ' + minutes + 'm ';
    }
</script>
