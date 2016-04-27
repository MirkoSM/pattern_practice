<?php

    require_once 'bootsrap.php';

    $router = new \Routing\Router();

    /*
        Adding the new 'route'  First parameter is the action from url, the second is handler
    */
    $router->post('/addEvent', ['\Pages\Calendar', 'addEvent']);
    $router->post('/changeEventStatus', ['\Pages\Calendar', 'changeEventStatus']);
    $router->post('/deleteEvent', ['\Pages\Calendar', 'deleteEvent']);
    $router->get('/calendar', ['\Pages\Calendar', 'showCalendar']);
    $router->get('/main-page', ['\Pages\MainPageController', 'showMainPage']);
    $router->get('/js-page', ['\Pages\JsPageController', 'showJsPage']);

    try {
        $dispatcher = new \Routing\Dispatcher($router);
        /*
            Handling the current route. If match - run:
            $handler[0](Class Name)->$handler[1](Method name)
        */
        $dispatcher->handle(new \Routing\Request());
    } catch (Exception $e) {
        echo $e->getMessage();
    }

