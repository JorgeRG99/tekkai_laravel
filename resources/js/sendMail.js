export function sendMail(email) {

    fetch('https://node-mailer-dev-aqgf.3.us-1.fl0.io/sendMail', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: {
            "to": email,
            "subject": "Booked successfully!",
            "html": "<h1>Booking on date</h1>"
          },
    })
        .then(response => {
            console.log(response)
        })
        .catch((error) => {
            console.log(`An error has ocurred: ${error}. Please try again.`)
        });
}
