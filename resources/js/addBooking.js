import { sendMail } from "./sendMail"

export function addBooking(csrfToken) {
    const email = document.getElementById('email').value
    const name = document.getElementById('name_input').value
    const surname = document.getElementById('surname_input').value
    const date = document.getElementById('date_input').value
    const hour = document.getElementById('hour_input').value
    const phone = document.getElementById('phone_input').value
    const allergies = document.getElementById('allergies_input').value

    const data = {
        email: email,
        name: name,
        surname: surname,
        date: date,
        hour: hour,
        phone: phone,
        allergies: allergies
      };

    fetch('addBooking', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'url': '/addBooking',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            sendMail(email)
        })
        .catch((error) => {
            alert(`An error has ocurred: ${error}. Please try again.`)
        });
}