<?php
    require_once '../patterns/singleton.php';
    require_once '../patterns/builder.php';
?>
<html lang="en">
    <?php require_once '../skeleton/head.php'; ?>
    <body>
        <?php require_once '../skeleton/header.php'; ?>
        <main>
            <div class="singleton-pattern lesson-block">
                <h3>Book Singleton <span>(creational)</span><em>/patterns/singleton.php</em></h3>
                <p class="description">
                    Ensure a class only has one instance, and provide a global point
                    of access to it.
                </p>
                <p class="small-description">There are two peoples want to read the same book. Sara and Lee</p>
                <?php
                    $Sara = new BookBorrower();
                    $Lee = new BookBorrower();

                    $Sara->borrowBook();
                    echo "<p>Sara borrows a book: {$Sara->getAuthorAndTitle()}</p>";

                    $Lee->borrowBook();
                    echo "<p>Lee borrows a book: {$Lee->getAuthorAndTitle()}</p>";

                    $Sara->returnBook();
                    echo "<p>Sara returns a book</p>";

                    $Lee->borrowBook();
                    echo "<p>Lee borrows a book again: {$Lee->getAuthorAndTitle()}</p>";
                ?>
            </div>
            <div class="builder-pattern lesson-block">
                <h3>Page Builder <span>(creational)</span><em>/patterns/builder.php</em></h3>
                <p class="description">
                    Separate the construction of a complex object from its representation so that
                    the same construction process can create different representations.
                </p>
                <p class="small-description">
                    Imagine you want to create some page builder. <strong>Builder</strong> classes is the structure of pages.
                    <strong>Page director</strong> is the content of pages. In this case there is one page director to
                    both pages. You can use different directors. Depending on what you want you can construct the needed page.
                    Also you can define which methods should be used in Builder and in Director classes by defining them in Abstract classes.
                </p>
                <?php
                    $pageBuilder = new OneColumnPageBuilder();
                    $pageDirector = new PageDirector($pageBuilder);
                    $pageDirector->buildPage();
                    $page = $pageDirector->getPage();
                    echo $page->showPage();
                    echo "<hr />";
                    $pageWithSidebarBuilder = new TwoColumnsRightPageBuilder();
                    $pageDirector = new PageDirector($pageWithSidebarBuilder);
                    $pageDirector->buildPage();
                    $pageTwoColumnsFight = $pageDirector->getPage();
                    echo $pageTwoColumnsFight->showPage();
                ?>
            </div>
        </main>
        <?php require_once '../skeleton/footer.php'; ?>
    </body>
</html>