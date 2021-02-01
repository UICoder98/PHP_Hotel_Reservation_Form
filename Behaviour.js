setInterval(checkError);

function checkError ()
{
    const ERRORS = document.getElementsByClassName("error");

    const ARRIVALS = document.getElementsByClassName("arrival");
    const DEPARTURES = document.getElementsByClassName("departure");

    const ERROR_MESSAGE = "Abreise darf nicht in der Vergangenheit liegen.";


    if (ARRIVALS[0].value > DEPARTURES[0].value)
    {
        ERRORS[0].innerHTML = ERROR_MESSAGE;
    }
    else
    {
        ERRORS[0].innerHTML = "";
    }

    if (ARRIVALS[1].value > DEPARTURES[1].value)
    {
        ERRORS[1].innerHTML = ERROR_MESSAGE;
    }
    else
    {
        ERRORS[1].innerHTML = "";
    }

    if (ARRIVALS[2].value > DEPARTURES[2].value)
    {
        ERRORS[2].innerHTML = ERROR_MESSAGE;
    }
    else
    {
        ERRORS[2].innerHTML = "";
    }

    if (ARRIVALS[0].value <= DEPARTURES[0].value && ARRIVALS[1].value <= DEPARTURES[1].value
    && ARRIVALS[2].value <= DEPARTURES[2].value)
    {
        enableSubmit();
    }
    else
    {
        disableSubmit();
    }
}

function enableSubmit ()
{
    const SUBMIT = document.getElementById("submit");

    SUBMIT.disabled = false;
}

function disableSubmit ()
{
    const SUBMIT = document.getElementById("submit");

    SUBMIT.disabled = true;
}