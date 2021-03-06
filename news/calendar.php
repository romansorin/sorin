<?php

$conn   = new Connection();
$calPDO = $conn->connectToDb($db_news, $user_news, $pass_news);

class CalendarWidget {
    // Generates a calendar widget on the page,
    public function generate($range = 7, $start_date = null) {
        date_default_timezone_set('America/New_York');
        // Accept a $start_date, otherwise set it to today's date (useful if you want
        // to start the calendar at a date in the past, for example.)
        if (is_null($start_date)) {
            $start_date = new DateTime();
            $start_date->modify("-1 day");
        } else {
            $start_date = new DateTime($start_date);
        }

        // Draw a calendar div for each day in $range
        for ($x = 0; $x < $range; $x++) {
            // Increment the current date as we loop
            $date = $start_date->modify("+1 day");

            // Get the string to display for the date
            $date_month = $this->formatDateMonth($date);

            // Get the int to display for the date

            $date_day = $this->formatDateDay($date);

            // MYSQL date() command returns 'YEAR-MONTH-DAY' like '2003-12-31'
            // so let's get a string of our date formatted this way, in order to
            // search the database
            $date_selector = $this->formatDateQueryable($date);

            // here is where you would pull in the calendar events you want from the database.
            // Right now I have a hardcoded array as an example.
            // I would use a query like:
            // SELECT description, link, date FROM events WHERE date = $date_selector
            //

            global $calPDO;
            $query = "SELECT category, description, id FROM events WHERE event_date = '$date_selector'";
            $stmt  = $calPDO->query($query);
            $info  = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if each column of a row is null/empty
            if (is_null($info['category'])) {
                $info['category'] = "No events listed";
            }
            if (!(isset($info['description']))) {
                $info['description'] = null;
            }
            if (!(isset($info['id'])) || $info['id'] == "") {
                $info['id'] = null;
            }

            $events = array(
                array(
                    "category" => $info['category'],
                    "text"     => $info['description'],
                    "id"       => $info['id'],
                ),

            );

            // I pretend your database has the following rows:
            //
            // id | date | text | link | category
            //
            // You can customize this obviously, and then tweak the draw event below

            $this->render($date_month, $date_day, $events);

        }

    }

    // draws one "row" of your calendar. Accepts a date string to display in the header
    // and then an array of $events.
    // front page render.
    public function render($date_month, $date_day, $events) {
        require 'calendar_render_html.php';
    }

    // Helpers to format our DateTime
    private function formatDateMonth($date) {
        // returns like 'Jan'
        return $date->format('M');
    }
    private function formatDateDay($date) {
        // returns like '4'
        return $date->format('j');
    }
    private function formatDateQueryable($date) {
        // returns like '1999-12-31'
        return $date->format('Y-m-d');
    }
}