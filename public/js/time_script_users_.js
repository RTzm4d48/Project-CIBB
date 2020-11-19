function event(f_day,f_month,f_year){
    
simplyCountdown('#cuenta', {
    year: f_year, // required
    month: f_month, // required
    day: f_day, // required
    hours: 0, // Default is 0 [0-23] integer
    minutes: 0, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
        days: 'día',
        hours: 'hora',
        minutes: 'minuto',
        seconds: 'segundo',
        pluralLetter: 's'
    },
    plural: true, //use plurals
    inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
    inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
    // in case of inline set to false
    enableUtc: true, //Use UTC as default
    onEnd: function(){
        $("#cat_and_des").addClass("no");
        $("#button_and_num_p").addClass("no");
        $("#loading_leader").removeClass("no");
    }, //Callback on countdown end, put your own function here
    refresh: 1000, // default refresh every 1s
    sectionClass: 'simply-section', //section css class
    amountClass: 'simply-amount', // amount css class
    wordClass: 'simply-word', // word css class
    zeroPad: false,
    countUp: false
});
}