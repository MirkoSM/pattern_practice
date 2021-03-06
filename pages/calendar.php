<?php
    // Definition the Calendar class
    $calendar = new lib\Pages\Calendar();
    $allEvents = $calendar->getAllEventsTimestamp();

?>
<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col mdl-cell--12-col-phone mdl-cell--12-col-tablet"></div>
        <div class="mdl-cell--8-col mdl-cell--12-col-phone mdl-cell--12-col-tablet">
            <div class="page-title-card calendar-page-title-card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Events Calendar</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p>
                        You need to set your MySQL connection in the
                        <strong>"lib/config.xml" </strong>.
                    </p>
                    <p>
                        Event handler (Calendar class) file: <strong>"lib/Pages/Calendar.php"</strong>
                    </p>
                    <h5>Features</h5>
                    <ul class="features-events-list mdl-list">
                        <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">event</i>
                        Adding events
                    </span>
                        </li>
                        <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">swap_horiz</i>
                        Event status
                    </span>
                        </li>
                        <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">delete</i>
                        Deleting events
                    </span>
                        </li>
                    </ul>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Button...
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
            </div>

            <script type="text/javascript">
                function goPrevMonth (month, year) {
                    if (month == 1) {
                        --year;
                        month = 13;
                    }
                    --month;
                    var monthString = "" + month + "";
                    if (monthString.length <= 1) {
                        monthString = "0" + month + "";
                    }
                    document.location.href = "?month=" + monthString + "&year=" + year;
                }

                function goNextMonth (month, year) {
                    if (month == 12) {
                        ++year;
                        month = 0;
                    }
                    ++month;
                    var monthString = "" + month + "";
                    if (monthString.length <= 1) {
                        monthString = "0" + month + "";
                    }
                    document.location.href = "?month=" + monthString + "&year=" + year;
                }
            </script>
            <?php
            // DAY
            if (isset($_GET['day'])) {
                $day = $_GET['day'];
            } else {
                $day = date('j');
            }
            // MONTH
            if (isset($_GET['month'])) {
                $month = $_GET['month'];
            } else {
                $month = date('n');
            }
            // YEAR
            if (isset($_GET['year'])) {
                $year = $_GET['year'];
            } else {
                $year = date('Y');
            }

            // Calendar variable
            $currentTimeStamp = strtotime("{$year}-{$month}-{$day}");

            // Get current month
            $currentMonth = date('F', $currentTimeStamp);

            // Get how many days are in the current month
            $numDays = date('t', $currentTimeStamp);

            // Counter for the loop
            $counter = 0;

            ?>

            <table class="mdl-data-table main-calendar-table mdl-js-data-table">
                <thead>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab mdl-button--colored" onclick="goPrevMonth(<?php echo $month . ',' . $year; ?>)">
                                <i class="material-icons">skip_previous</i>
                            </button>
                        </td class="mdl-data-table__cell--non-numeric">
                        <td colspan="5">
                            <?php echo $currentMonth . " / " . $year; ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab mdl-button--colored" onclick="goNextMonth(<?php echo $month . ',' . $year; ?>)">
                                <i class="material-icons">skip_next</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Sun</th>
                        <th class="mdl-data-table__cell--non-numeric">Mon</th>
                        <th class="mdl-data-table__cell--non-numeric">Tue</th>
                        <th class="mdl-data-table__cell--non-numeric">Wed</th>
                        <th class="mdl-data-table__cell--non-numeric">Thu</th>
                        <th class="mdl-data-table__cell--non-numeric">Fri</th>
                        <th class="mdl-data-table__cell--non-numeric">Sat</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 1; $i < $numDays + 1; $i++, $counter++):
                    $firstColumn = false;
                    if ($counter % 7 == 0) {
                        $firstColumn = true;
                        echo "<tr>";
                    }
                    // Timestamp for each day in month
                    $dayTimeStamp = strtotime("{$year}-{$month}-{$i}");

                    if ($i == 1) {
                        $firstColumn = false;
                        // First day in month
                        $firstDay = date('w', $dayTimeStamp);
                        for ($j = 0; $j < $firstDay; $j++, $counter++) {
                            // blank place
                            echo "<td></td>";
                        }
                    }
                    if (strlen($month) <= 1) {
                        $month = "0" . $month;
                    }
                    if (strlen($day) <= 1) {
                        $day = "0" . $day;
                    }
                ?>
                    <td align='center'

                        class='events-cell mdl-data-table__cell--non-numeric <?php echo ($currentTimeStamp == $dayTimeStamp && $month == date('n')) ? 'cell-active-data' : ''; ?>'>
                        <button type='button'
                                id="dialog_btn_<?php echo $i; ?>"
                                data-current_date="<?php echo $dayTimeStamp; ?>"
                                title="Add Event"
                                class='mdl-button show-dialog'>
                            <?php echo $i; ?>
                        </button>
                        <?php if (in_array($dayTimeStamp, $allEvents)): ?>
                            <button id="events-menu-dropdown-<?php echo $i; ?>"
                                    class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored show-events-btn"
                                    title="EVENTS HERE!">
                                <i class="material-icons">date_range</i>
                            </button>
                            <ul class="mdl-menu day-events-list <?php echo $firstColumn ? 'mdl-menu--bottom-left' : 'mdl-menu--bottom-right' ; ?>  mdl-js-menu mdl-js-ripple-effect"
                                for="events-menu-dropdown-<?php echo $i; ?>">
                                <?php
                                    $eventData = $calendar->getEventData($dayTimeStamp);
                                    $x = 0;
                                    foreach ($eventData as $event):
                                ?>
                                <li class="mdl-list__item mdl-list__item--three-line" id="event_<?php echo $event['id']; ?>">
                                    <span class="mdl-list__item-primary-content">
                                        <i class="material-icons day-event-icon">alarm</i>
                                        <span><?php echo $event['title']; ?></span>
                                        <span class="mdl-list__item-text-body">
                                            <?php echo $event['detail']; ?>
                                        </span>
                                    </span>
                                    <button class="mdl-button mdl-js-button mdl-button--colored mdl-button--icon"
                                            title="Delete Event"
                                            onclick="deleteEvent(<?php echo $event['id']; ?>)">
                                        <i class="material-icons">delete_forever</i>
                                    </button>
                                    <span class="mdl-list__item-secondary-content">
                                        <span class="mdl-list__item-secondary-info"
                                              id="event-status-<?php echo $i . $x; ?>"
                                              style="color: <?php echo $event['status'] == '1' ? 'green' : 'red'; ?>">
                                            <?php echo $event['status'] == '1' ? 'Active' : 'Not active'; ?>
                                        </span>
                                        <span class="mdl-list__item-secondary-action">
                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="list-switch-<?php echo $i . $x; ?>">
                                                <input type="checkbox"
                                                       id="list-switch-<?php echo $i . $x; ?>"
                                                       class="mdl-switch__input event-status-toggle-checkbox"
                                                       <?php
                                                            echo $event['status'] == '1' ? 'checked' : '';
                                                       ?>
                                                       onchange="changeEventStatus('event-status-<?php echo $i . $x; ?>', this, <?php echo $event['id']; ?>)" />
                                            </label>
                                        </span>
                                    </span>
                                </li>
                                <?php $x++; endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </td>
                <?php endfor; ?>
                </tbody>
            </table>

            <dialog class="mdl-dialog">
                <h4 class="mdl-dialog__title">Some Event?</h4>
                <div class="mdl-dialog__content">
                    <p class="event-date"></p>
                    <form id="event-form" method="post">
                        <input type="hidden" name="event-timestamp" value="" />
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" name="event_title" type="text">
                            <label class="mdl-textfield__label" for="event_title">Title...</label>
                            <span class="mdl-textfield__error"></span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" name="event_details" rows= "3"></textarea>
                            <label class="mdl-textfield__label" for="event_details">Event details...</label>
                            <span class="mdl-textfield__error"></span>
                        </div>
                        <div id="event-adding-progress" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                        <br>
                        <div class="mdl-dialog__actions">
                            <button type="submit" class="mdl-button">Add Event</button>
                            <button type="button" class="mdl-button close">Close</button>
                        </div>
                    </form>
                </div>
            </dialog>

            <div id="event-snackbar-success" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button"></button>
            </div>

            <!--JAVASCRIPT FUNCTIONS-->
            <script src="/js/moCalendar/moCalendarPageFunctions.js"></script>
            <!-- End JavaScript -->

        </div>
        <div class="mdl-cell--2-col mdl-cell--12-col-phone mdl-cell--12-col-tablet"></div>
    </div>
</main>