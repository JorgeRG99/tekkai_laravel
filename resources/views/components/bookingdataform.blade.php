<section class="form_sec slide-in-right" id="booking_form_sec">
    <h1 class="title text_box_weight form_title" id="form_title"></h1>
    <form action="{{ route('addBooking') }}" id="booking_form" method="POST">
        @csrf
        <input class="form_input" id="date_input" name="date" type="hidden">
        <input class="form_input" id="hour_input" name="hour" type="hidden">
        <label for="name">Name:</label><input class="form_input" name="name" type="text" required>
        <label for="surname">Surname:</label><input class="form_input" name="surname" type="text" required>
        <label for="phone">Phone Number:</label><input class="form_input" name="phone" type="text" required>
        <label for="email">Email:</label><input class="form_input" name="email" id="email" type="email" required>
        <label for="email">Confirm Email:</label><input class="form_input" id="confirm_email" name="emailConfirm" type="email" required>
        <label for="allergies">Allergies:</label><input class="form_input" name="allergies" type="text">
        <label for="guests">Number of guests:</label>
        <select class="form_input" name="guests">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <div id="error_label" style="color: red;"></div>

        <button type="submit" id="send_booking">Send</button>
    </form>
</section>