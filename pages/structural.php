<main class="android-content mdl-layout__content">
    <div class="mdl-grid">
        <div class="mdl-cell--2-col"></div>
        <div class="mdl-cell--8-col">
            <div class="page-title-card structural-page-title-card mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Structural patterns Page</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    Structural Patterns implementations
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

            <div class="lesson-block-card facade-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Ski Facade <span class="subtitle">lib/Patterns/Structural/Facade</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Provide a unified interface to a set of interfaces in a subsystem.
                        Facade defines a higher-level interface that makes the subsystem easier to use.
                    </p>
                    <p class="small-description">
                        Just imagine you are going to the 'Bukovel'. You want to know price ranges.
                        We create Hotel Booking class (to know hotel prices), Ski Booking class (to know ski prices)
                        and Ticket Booking class (to know tickets prices). Then in the Facade class we have all this booking
                        systems and get the needed rest according to the situation.
                        In Facade constructor we create all objects we want to use. We can manipulate data rom this objects
                        in the one place.
                    </p>
                    <hr>
                    <?php
                        $skiFacade = new Patterns\Structural\Facade\SkiResortFacade();
                        echo "<p>Price for Good Rest: " . $skiFacade->haveGoodRest(180,65,40,5,5) . "</p>";
                        echo "<p>Price for Rest with own ski: " . $skiFacade->restWithOwnSki(5) . "</p>";
                    ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect show-pattern-diagram-btn"
                    onclick="togglePatternDiagram('facade', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper facade-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_facade.png" alt="facade_uml_diagram" />
                </div>
            </div>

            <div class="lesson-block-card decorator-pattern mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Car Decorator <span class="subtitle">lib/Patterns/Structural/Decorator</span></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class="description">
                        Attach additional responsibilities to an object dynamically. Decorator provides
                        a flexible alternative to subclassing for extending functionality.
                    </p>
                    <p class="small-description">
                        Here we have a default car class (default toyota). Also we have the main decorator class (CarDecorator).
                        Now imagine you want to make you car police or medical. At first you have to create a default car and then
                        send the this default car to the decorator class. Imagine that in the decorator some people make your car tuning.
                        So you just <strong>WRAP</strong> you car. You can wrapping your car as many times as you want.
                    </p>
                    <hr>
                    <?php
                        echo '<strong>Declaring Toyota (default car):</strong>';
                        $car = new Patterns\Structural\Decorator\Car("Toyota");
                        $car->go();

                        echo '<strong>Declaring Medical Toyota:</strong> <br>';
                        $car = new Patterns\Structural\Decorator\Car("Toyota");
                        $medicalCar = new Patterns\Structural\Decorator\MedicalCar($car);
                        $medicalCar->go();

                        echo '<strong>Declaring Police Toyota:</strong> <br>';
                        $car = new Patterns\Structural\Decorator\Car("Toyota");
                        $policeCar = new Patterns\Structural\Decorator\PoliceCar($car);
                        $policeCar->go();

                        echo '<strong>Declaring Police and Medical Toyota (all in one):</strong> <br>';
                        $car = new Patterns\Structural\Decorator\Car("Toyota");
                        $policeCar = new Patterns\Structural\Decorator\PoliceCar($car);
                        $allInOneCar = new Patterns\Structural\Decorator\MedicalCar($policeCar);
                        $allInOneCar->go();

                    ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       onclick="togglePatternDiagram('decorator', this)">
                        Show/Hide UML Diagram
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
                <div class="pattern-diagram-wrapper decorator-diagram">
                    <img src="/images/patterns_uml_diagrams/diagram_decorator.png" alt="decorator_uml_diagram" />
                </div>
            </div>

        </div>
        <div class="mdl-cell--2-col"></div>
    </div>
</main>