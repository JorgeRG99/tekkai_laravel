<div class="form_img_box">
    <img src="{{asset('assets/img/bookings/booking_img.png')}}" width="100%" alt="">
</div>
<section class="form_sec">
    <h1 class="title text_box_weight form_title">BOOK THE EXPERIENCE</h1>
    <form action="" method="POST">
        <label for="name">Name:</label><input class="form_input" name="name" type="text">
        <label for="phone">Phone Number:</label><input class="form_input" name="phone" type="number">
        <label for="guests">Number of guests:</label>
        <select class="form_input" name="guests">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        <label for="date">Select Date:</label><input class="form_input" name="date" type="date">
        <label for="hour">Select Hour:</label>
        <select class="form_input hour_selector" name="hour">
            <option value="20:30">20:30</option>
            <option value="21:00">21:00</option>
            <option value="21:30">21:30</option>
            <option value="22:00">22:00</option>
            <option value="22:30">22:30</option>
        </select>
        <button type="submit">Send</button>
    </form>
</section>