import { addBooking } from './addBooking'

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
// TODO -> mostrar las horas disponibles en ese dia
const HOURS = ['13:00:00', '13:30:00', '14:00:00', '14:30:00', '15:00:00', '15:30:00']
let currentDate = new Date();

let emailValidation = () => {
    let email = document.getElementById('email').value;
    let confirmEmail = document.getElementById('confirm_email').value;
    let errorLabel = document.getElementById('error_label');

    if (email !== confirmEmail) {
        errorLabel.textContent = 'Emails do not match.';
        return false;
    } else {
        errorLabel.textContent = '';
        return true;
    }
}

let change_form = (selectedDate) => {
    let booking_btn = document.getElementById('make_booking_btn')
    let calendar = document.getElementById('date_selector')


    booking_btn.addEventListener('click', () => {
        calendar.classList.add('slide-out-right')
        let selectedHour = document.getElementById('hour_select').value

        calendar.addEventListener('animationend', () => {

            let booking_form_sec = document.getElementById('booking_form_sec')
            let booking_form_title = document.getElementById('form_title')
            let form = document.getElementById('booking_form')
            let form_submit = document.getElementById('send_booking')
            let date_input = document.getElementById('date_input')
            let hour_input = document.getElementById('hour_input')

            date_input.value = selectedDate
            hour_input.value = selectedHour + ':00'

            booking_form_title.textContent = `Booking on ${selectedDate} at ${selectedHour}`
            booking_form_sec.classList.add('visible_form')

            form_submit.addEventListener('click', () => {
                if (emailValidation() === true) {
                    addBooking(csrfToken)
                }
            })

        });
    })
}

let removePreviousHours = () => {
    let previousHoursBox = document.getElementById('hours-box')

    if (previousHoursBox !== null) {
        let date_box = document.getElementById('date_selector')

        date_box.removeChild(previousHoursBox)
    }
}

let noHoursAvailable = (box) => {
    let noHoursText = document.createElement('p')
    noHoursText.textContent = "No hours availables on the selected date"

    box.appendChild(noHoursText)
    document.getElementById('date_selector').appendChild(box)
}

let selectHour = (box, selectedDate) => {
    let hour_select = document.createElement('select')
    hour_select.id = 'hour_select'

    HOURS.forEach((item) => {
        let format_item = item.slice(0, 5)
        let option_hour = document.createElement('option')
        option_hour.textContent = format_item
        option_hour.value = format_item
        hour_select.appendChild(option_hour)
    })

    let booking_btn = document.createElement('button')
    booking_btn.textContent = 'Make a booking'
    booking_btn.id = 'make_booking_btn'

    box.appendChild(hour_select)
    box.appendChild(booking_btn)
    document.getElementById('date_selector').appendChild(box)

    change_form(selectedDate)
}

let displayHoursForm = (hours, selectedDate) => {
    removePreviousHours()

    let box = document.createElement('div')
    box.id = 'hours-box'

    hours.length === 4 ? noHoursAvailable(box) : selectHour(box, selectedDate)
}

document.addEventListener('DOMContentLoaded', () => {
    let calendarEl = document.getElementById('calendar')

    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: new Date().toJSON().slice(0, 10),
        selectable: true,
        dateClick: (info) => {
            if (info.date <= currentDate) {
                removePreviousHours()
                alert("You can't select past dates.")
                calendar.unselect()
            } else {
                fetch('getBookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ data: info.dateStr }),
                })
                    .then(response => response.json())
                    .then(data => {
                        displayHoursForm(data['booked_hours'], info.dateStr)
                    })
                    .catch((error) => {
                        alert(`An error has ocurred: ${error}. Please try again.`)
                    });
            }
        },
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridMonth'
        }
    })

    calendar.render()
})